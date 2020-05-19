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
            'status_periode' => 'required|in:Dibuka,Ditutup',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $periode = \App\FundsAssistancePeriod::firstOrCreate([
            'periode_bantuan' => $request->periode_bantuan,
            'item_bantuan' => $request->item_bantuan,
            'jenis_bantuan' => $request->jenis_bantuan,
            'status_periode' => $request->status_periode,
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
