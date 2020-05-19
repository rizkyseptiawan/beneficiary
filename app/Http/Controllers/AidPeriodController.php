<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class AidPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periods = new \App\FundsAssistancePeriod;
        if($request->has('search')){
            $search = $request->search;
            $periods = \App\FundsAssistancePeriod::where('periode_bantuan','like',"%".$search."%")->paginate(10);
            return view('periode.index',compact('periods'));
        }
        $periods = \App\FundsAssistancePeriod::paginate(10);
        return view('periode.index',compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $dataValidation = [
            'periode_bantuan' => 'required|string|min:3',
            'item_bantuan' => 'required|string|min:3',
            'jenis_bantuan' => 'required|in:dana,sembako',
            'status' => 'required|in:Dibuka,Ditutup',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $periode = \App\FundsAssistancePeriod::firstOrCreate([
            'periode_bantuan' => $request->periode_bantuan,
            'item_bantuan' => $request->item_bantuan,
            'jenis_bantuan' => $request->jenis_bantuan,
            'status' => $request->status,
        ]);
        return redirect()->back()->withToastSuccess('Berhasil menambahkan data periode');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $period = \App\FundsAssistancePeriod::findOrFail($id);
        return view('periode.edit',compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $period = \App\FundsAssistancePeriod::findOrFail($id);
        $input = $request->all();
        $dataValidation = [
            'periode_bantuan' => 'required|string|min:3',
            'item_bantuan' => 'required|string|min:3',
            'jenis_bantuan' => 'required|in:dana,sembako',
            'status' => 'required|in:Dibuka,Ditutup',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $period->update([
            'periode_bantuan' => $request->periode_bantuan,
            'item_bantuan' => $request->item_bantuan,
            'jenis_bantuan' => $request->jenis_bantuan,
            'status' => $request->status,
        ]);
        return redirect()->back()->withToastSuccess('Berhasil memperbarui data periode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period = \App\FundsAssistancePeriod::find($id);
        if(is_null($period)){
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 403);
        }
        $period->delete();
        return response()->json(['status' => true, 'message' => 'Data Berhasil Dihapus']);
    }
}
