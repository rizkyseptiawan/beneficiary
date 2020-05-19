<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class SubCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcriterias = \App\SubCriteria::all();
        return view('sub_criteria.index',compact('subcriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criterias = \App\Criteria::all();
        return view('sub_criteria.create',compact('criterias'));
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
            'nama_sub_kriteria' => 'required|string|min:3',
            'nilai_sub_kriteria' => 'required|numeric|min:1',
            'criteria_id' => 'required|exists:criterias,id',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $subCriteria = \App\SubCriteria::firstOrCreate([
            'nama_sub_kriteria' => $request->nama_sub_kriteria,
            'nilai_sub_kriteria' => $request->nilai_sub_kriteria,
            'criteria_id' => $request->criteria_id,
        ]);
        return redirect()->back()->withToastSuccess('Berhasil menambahkan data subkriteria baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCriteria = \App\SubCriteria::findOrFail($id);
        $criterias = \App\Criteria::all();
        return view('sub_criteria.edit',compact('criterias','subCriteria'));
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
        $subCriteria = \App\SubCriteria::findOrFail($id);
        $input = $request->all();
        $dataValidation = [
            'nama_sub_kriteria' => 'required|string|min:3',
            'nilai_sub_kriteria' => 'required|numeric|min:1',
            'criteria_id' => 'required|exists:criterias,id',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $subCriteria->update([
            'nama_sub_kriteria' => $request->nama_sub_kriteria,
            'nilai_sub_kriteria' => $request->nilai_sub_kriteria,
            'criteria_id' => $request->criteria_id,
        ]);
        return redirect()->back()->withToastSuccess('Berhasil mengubah data subkriteria baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCriteria = \App\SubCriteria::find($id);
        if(is_null($subCriteria)){
            return response()->json(['status' => false,'message' => 'Sub Kriteria Tidak Dapat Dihapus'], 403);
        }
        $subCriteria->delete();
        return response()->json(['status' => true,'message' => 'Sub Kriteria Berhasil Dihapus'], 200);
    }
}
