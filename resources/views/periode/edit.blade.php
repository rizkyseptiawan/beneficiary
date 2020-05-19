@extends('layouts.main')
@section('title','Ubah Data Periode Bantuan')
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Ubah Data Periode Bantuan</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('periode.update',$period->id) }}" method="post">
              @csrf
              @method('patch')
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Periode Bantuan</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="periode_bantuan" class="form-control" value="{{ $period->periode_bantuan }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Bantuan</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="item_bantuan" class="form-control" value="{{ $period->item_bantuan }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Bantuan</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="jenis_bantuan" class="form-control selectric">
                        <option value="" disabled selected>Pilih jenis bantuan</option>
                      <option value="dana" @if($period->jenis_bantuan == 'dana') selected @endif>Bantuan Dana</option>
                      <option value="sembako" @if($period->jenis_bantuan == 'sembako') selected @endif>Bantuan Sembako</option>
                    </select>
                  </div>
              </div>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Periode</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="status" class="form-control selectric">
                      <option value="" disabled selected>Pilih status periode</option>
                      <option value="Dibuka" @if($period->status == 'Dibuka') selected @endif>Dibuka</option>
                      <option value="Ditutup" @if($period->status == 'Ditutup') selected @endif>Ditutup</option>
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