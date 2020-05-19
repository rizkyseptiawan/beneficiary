<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = \App\Criteria::all();
        return view('criteria.index',compact('criterias'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criteria.create');
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
            'nama_kriteria' => 'required|string|min:3',
            'bobot' => 'required|numeric|min:1',
            'tipe_bobot' => 'required|in:benefit,cost',
            'deskripsi_kriteria' => 'required|string|min:3',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $criteria = \App\Criteria::firstOrCreate([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'tipe_bobot' => $request->tipe_bobot,
            'deskripsi_kriteria' => $request->deskripsi_kriteria,
        ]);
        return redirect()->back()->withToastSuccess('Berhasil menambahkan data kriteria baru');
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
        $criteria = \App\Criteria::findOrFail($id);
        return view('criteria.edit',compact('criteria'));
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
        $criteria = \App\Criteria::findOrFail($id);
        $input = $request->all();
        $dataValidation = [
            'nama_kriteria' => 'required|string|min:3',
            'bobot' => 'required|numeric|min:1',
            'tipe_bobot' => 'required|in:benefit,cost',
            'deskripsi_kriteria' => 'required|string|min:3',
        ];
        $validation = Validator::make($input,$dataValidation);
        if($validation->fails()){
            return redirect()->back()->withToastError($validation->messages()->all()[0])->withInput();
        }
        $criteria->update([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'tipe_bobot' => $request->tipe_bobot,
            'deskripsi_kriteria' => $request->deskripsi_kriteria,
        ]);
        return redirect()->back()->withToastSuccess('Berhasil mengubah data kriteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $criteria = \App\Criteria::find($id);
        if(is_null($criteria)){
            return response()->json(['status' => false,'message' => 'Kriteria Tidak Dapat Dihapus'], 403);
        }
        $criteria->delete();
        return response()->json(['status' => true,'message' => 'Kriteria Berhasil Dihapus'], 200);
    }
}
