@extends('layouts.main')
@section('title','Ubah Data Penerima Bantuan')
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Ubah Data Penerima Bantuan Secara Lengkap</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('beneficiary.update',$beneficiary->id) }}" method="post">
              @csrf
              @method('patch')
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Penerima</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="nama_penerima" class="form-control" value="{{ $beneficiary->nama_penerima }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor KTP</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="nomor_ktp" class="form-control" value="{{ $beneficiary->nomor_ktp }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Induk Keluarga</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="nomor_induk_keluarga" class="form-control" value="{{ $beneficiary->nomor_induk_keluarga }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Rekening</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="nomor_rekening" class="form-control" value="{{ $beneficiary->nomor_rekening }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telpon</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="nomor_telpon" class="form-control" value="{{ $beneficiary->nomor_telpon }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                <div class="col-sm-12 col-md-7">
                  <input type="date" name="tanggal_lahir" class="form-control" value="{{ $beneficiary->tanggal_lahir->format('Y-m-d') }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="jenis_kelamin" class="form-control selectric">
                      <option value="pria" @if($beneficiary->jenis_kelamin == 'pria') selected @endif>Pria</option>
                      <option value="wanita" @if($beneficiary->jenis_kelamin == 'wanita') selected @endif>Wanita</option>
                    </select>
                  </div>
                </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Asal</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="alamat_asal" class="form-control" rows="60">{{ $beneficiary->alamat_asal }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Domisili</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="alamat_domisili" class="form-control" rows="60">{{ $beneficiary->alamat_domisili }}</textarea>
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