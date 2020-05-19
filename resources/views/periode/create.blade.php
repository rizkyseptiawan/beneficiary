@extends('layouts.main')
@section('title','Tambah Periode Bantuan')
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Isikan Data Periode Bantuan</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('periode.store') }}" method="post">
              @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Periode Bantuan</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="periode_bantuan" class="form-control" value="{{ old('periode_bantuan') }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Bantuan</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="item_bantuan" class="form-control" value="{{ old('item_bantuan') }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Bantuan</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="jenis_bantuan" class="form-control selectric">
                        <option value="" disabled selected>Pilih jenis bantuan</option>
                      <option value="dana" @if(old('jenis_bantuan') == 'dana') selected @endif>Bantuan Dana</option>
                      <option value="sembako" @if(old('jenis_bantuan') == 'sembako') selected @endif>Bantuan Sembako</option>
                    </select>
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