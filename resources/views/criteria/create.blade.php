@extends('layouts.main')
@section('title','Tambah Kriteria')
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Isikan Data Kriteria</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('criteria.store') }}" method="post">
              @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kriteria</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="nama_kriteria" class="form-control" value="{{ old('nama_kriteria') }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bobot Kriteria</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="bobot" min="1" class="form-control" value="{{ old('bobot') }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe Bobot</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="tipe_bobot" class="form-control selectric">
                        <option value="" disabled selected>Pilih tipe bobot</option>
                      <option value="benefit" @if(old('tipe_bobot') == 'benefit') selected @endif>Benefit</option>
                      <option value="cost" @if(old('tipe_bobot') == 'cost') selected @endif>Cost</option>
                    </select>
                  </div>
                </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Kriteria</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="deskripsi_kriteria" class="form-control" rows="60">{{ old('deskripsi_kriteria') }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Tambahkan Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection