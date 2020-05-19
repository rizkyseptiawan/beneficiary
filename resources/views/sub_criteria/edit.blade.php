@extends('layouts.main')
@section('title','Ubah Data Sub Kriteria')
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Ubah Data Subkriteria</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('subcriteria.update',$subCriteria->id) }}" method="post">
              @csrf
              @method('patch')
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Sub Kriteria</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="nama_sub_kriteria" class="form-control" value="{{ $subCriteria->nama_sub_kriteria }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai Sub Kriteria</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="nilai_sub_kriteria" min="1" class="form-control" value="{{ $subCriteria->nilai_sub_kriteria }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Kriteria</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="criteria_id" class="form-control selectric">
                    <option value="" disabled selected>Pilih Kriteria</option>
                    @forelse($criterias as $item)
                    <option value="{{ $item->id }}" @if($subCriteria->criteria_id == $item->id) selected @endif>{{ $item->nama_kriteria }}</option>
                    @empty
                    <option value="" disabled selected>Tidak ditemukan</option>
                    @endforelse
                    </select>
                  </div>
                </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Perbarui Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection