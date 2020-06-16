<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\FinancialSubmission;
class FinancialSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,FinancialSubmission $financial)
    {
        $user = auth()->user();
        $periodes = \App\FundsAssistancePeriod::all();
        $datas = $financial->newQuery();
        if($user->hasRole('beneficiary')){
            $datas->where('beneficiary_id',$user->beneficiary->id);
        }
        if($request->has('periode')){
            $datas->where('funds_assistance_period_id',$request->periode);
        }
        if($request->has('status')){
            $datas->where('status_pengajuan',$request->status);
        }
        $histories =$datas->orderByDesc('nilai_total_kriteria')->paginate(9);
        return view('history.index',compact('histories','periodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criterias = \App\Criteria::all();
        $periodes = \App\FundsAssistancePeriod::all();
        $beneficiaries = \App\Beneficiary::all();
        return view('history.create',compact('criterias','periodes','beneficiaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->all();
        $dataValidation = [
            'funds_assistance_period_id' => 'required|exists:funds_assistance_periods,id',
            'criterias.*' => 'required|numeric|exists:sub_criterias,id',
        ];
        if($user->hasRole('admin')){
            $dataValidation['beneficiary_id'] = 'required|exists:beneficiaries,id';
        }
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        if($user->hasRole('admin')){
            $beneficiaryId = $request->beneficiary_id;
        }else{
            $beneficiaryId = $user->beneficiary->id;
        }
        $checkSubmission = \App\FinancialSubmission::where('funds_assistance_period_id',$request->funds_assistance_period_id)->where('beneficiary_id',$beneficiaryId)->get();
        if(!$checkSubmission->isEmpty()){
            return redirect()->back()->withToastError('Anda telah melakukan pengajuan bantuan pada periode ini')->withInput();
        }
        $kodePengajuan = uniqid('SUBM'.$user->id.rand(100,999),FALSE);
        
        $financialSubmission = \App\FinancialSubmission::firstOrCreate([
            'beneficiary_id' => $beneficiaryId,
            'funds_assistance_period_id' => $request->funds_assistance_period_id,
            'kode_pengajuan' => $kodePengajuan,
        ]);
        foreach ($request->criterias as $key => $value) {
            \App\FinancialSubmissionDetail::create([
                'financial_submission_id' => $financialSubmission->id,
                'criteria_id' => $key,
                'nilai_kriteria' => $value,
            ]);
        }
        return redirect()->back()->withToastSuccess('Berhasil mengajukan penerimaan bantuan');
    }

    public function calculateRequest()
    {
        $periodes = \App\FundsAssistancePeriod::all();
        return view('history.calculate',compact('periodes'));
    }
    public function calculateStore(Request $request)
    {
        $input = $request->all();
        $dataValidation = [
            'funds_assistance_period_id' => 'required|exists:funds_assistance_periods,id',
            'criterias' => 'required',

        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $checkStatus = \App\FundsAssistancePeriod::where('id',$request->funds_assistance_period_id)->where('status','Dibuka')->get();
        if($checkStatus->isEmpty()){
            return redirect()->back()->withToastError('Saat ini Periode yang Anda pilih tidak dapat dipilih dikarenakan telah ditutup');
        }
        $alternatives = \App\FinancialSubmission::where('funds_assistance_period_id',$request->funds_assistance_period_id)->where('status_pengajuan','Pengajuan')->get();
        if($alternatives->isEmpty()){
            return redirect()->back()->withToastError('Saat ini Anda tidak melakukan perhitungan pendukung keputusan dikarenakan data pengajuan tidak tersedia');
        }
        $alternativeArray = $alternatives->pluck('id')->toArray();
        $matriks=[];
        foreach ($alternatives as $alternative) {
            // dd($alternative->financial_submission_details);
            $kolom = [];
            foreach ($alternative->financial_submission_details as $detail) {
                $getCriteria = \App\FinancialSubmissionDetail::whereIn('financial_submission_id',$alternativeArray)->where('criteria_id',$detail->criteria_id);
                // dd($getCriteria->max('nilai_kriteria'));
                $value = $detail->nilai_kriteria;
                if($detail->criteria->tipe_bobot == 'benefit'){
                    $max = $getCriteria->max('nilai_kriteria');
                    $hasil = $value/$max;
                }else{
                    $min = $getCriteria->min('nilai_kriteria');
                    $hasil = $min/$value;
                }
                $hasilBobot = $detail->criteria->bobot * $hasil;
                $kolom[] = $hasilBobot;
            }
            $total = array_sum($kolom);
            $matriks[] = $total;
            $alternative->update(['nilai_total_kriteria' => $total,'status_pengajuan' => 'Seleksi']);
        }
        return redirect()->back()->withSuccess('Berhasil melakukan perhitungan bantuan');
        
    }

    /**
     * Accept of financial submission
     *
     * @param [type] $id
     * @return void
     */
    public function accept($id)
    {
        $financialSubmission = FinancialSubmission::find($id);
        if($financialSubmission->get()->isEmpty()){
            return response()->json(['status' => false , 'message' => 'Data Riwayat Pengajuan Tidak ditemukan'], 403);
        }
        if($financialSubmission->status_pengajuan != 'Seleksi' ){
            return response()->json(['status' => false , 'message' => 'Data Riwayat Tidak Dapat Diterima karena status saat ini bukan dalam tahap seleksi'], 403);
        }
        $financialSubmission->update(['status_pengajuan' => 'Diterima']);
        return response()->json(['status' => true , 'message' => 'Data Riwayat Berhasil Diterima'], 200);
    }

    /**
     * Accept of financial submission
     *
     * @param [type] $id
     * @return void
     */
    public function decline($id)
    {
        $financialSubmission = FinancialSubmission::find($id);
        if($financialSubmission->get()->isEmpty()){
            return response()->json(['status' => false , 'message' => 'Data Riwayat Pengajuan Tidak ditemukan'], 403);
        }
        if($financialSubmission->status_pengajuan != 'Seleksi' ){
            return response()->json(['status' => false , 'message' => 'Data Riwayat Tidak Dapat Ditolak karena status saat ini bukan dalam tahap seleksi'], 403);
        }
        $financialSubmission->update(['status_pengajuan' => 'Belum Berkesempatan']);
        return response()->json(['status' => true , 'message' => 'Data Riwayat Berhasil Ditolak'], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $financialSubmission = FinancialSubmission::find($id);
        if($financialSubmission->get()->isEmpty()){
            return response()->json(['status' => false , 'message' => 'Data Riwayat Pengajuan Tidak ditemukan'], 403);
        }
        if($financialSubmission->status_pengajuan != 'Diterima' || $financialSubmission->status_pengajuan != 'Seleksi' ){
            return response()->json(['status' => false , 'message' => 'Data Riwayat Tidak Dapat Dihapus'], 403);
        }
        $financialSubmission->delete();
        return response()->json(['status' => true , 'message' => 'Data Riwayat Berhasil Dihapus'], 200);
    }
}
