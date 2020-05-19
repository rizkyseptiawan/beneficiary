<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            $beneficiaries = \App\Beneficiary::where('nama_penerima','like',"%".$search."%")->paginate(10);
            return view('beneficiary.index',compact('beneficiaries'));
        }
        $beneficiaries = \App\Beneficiary::paginate(10);
        return view('beneficiary.index',compact('beneficiaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficiary.create');
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
            'nama_penerima' => 'required|string|min:3',
            'nomor_ktp' => 'required|numeric|digits_between:16,16',
            'nomor_induk_keluarga' => 'required|numeric|digits_between:16,16',
            'nomor_rekening' => 'required|numeric|digits_between:10,15',
            'nomor_telpon' => 'required|numeric|digits_between:9,13',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:pria,wanita',
            'alamat_asal' => 'required|string|min:3',
            'alamat_domisili' => 'required|string|min:3',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $beneficiary = \App\Beneficiary::firstOrCreate([
            'nama_penerima' => $request->nama_penerima,
            'nomor_ktp' => $request->nomor_ktp,
            'nomor_induk_keluarga' => $request->nomor_induk_keluarga,
            'nomor_rekening' => $request->nomor_rekening,
            'nomor_telpon' => $request->nomor_telpon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_asal' => $request->alamat_asal,
            'alamat_domisili' => $request->alamat_domisili,
        ]);
        return redirect()->back()->withToastSuccess('Berhasil menambahkan data penerimabantuan baru');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
