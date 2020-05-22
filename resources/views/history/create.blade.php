@extends('layouts.main')
@section('title','Pengajuan Bantuan')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Isikan Data Pengajuan Bantuan dengan Jujur</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('history.store') }}" method="post">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Periode Bantuan</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="funds_assistance_period_id" class="form-control selectric">
                                    <option value="" disabled selected>Pilih Periode</option>
                                    @forelse($periodes as $item)
                                    <option value="{{ $item->id }}" @if(old('funds_assistance_period_id')==$item->id)
                                        selected @endif>{{ $item->periode_bantuan }}</option>
                                    @empty
                                    <option value="" disabled selected>Tidak ditemukan</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        @role('admin')
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penerima Bantuan</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="beneficiary_id" class="form-control select2">
                                    <option value="" disabled selected>Pilih Penerima Bantuan</option>
                                    @forelse($beneficiaries as $item)
                                    <option value="{{ $item->id }}" @if(old('beneficiary_id')==$item->id)
                                        selected @endif>{{ $item->nama_penerima }} - {{ $item->nomor_ktp }}</option>
                                    @empty
                                    <option value="" disabled selected>Tidak ditemukan</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        @endrole
                        <div class="form-group row mb-4">
                            @foreach($criterias as $item)
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $item->nama_kriteria }}</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-switches-stacked mt-2">
                                    @foreach ($item->sub_criterias as $poin)
                                    <label class="custom-switch pl-0">
                                        <input type="radio" name="criterias[{{ $item->id }}]" value="{{ $poin->nilai_sub_kriteria }}" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{ $poin->nama_sub_kriteria }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Ajukan Bantuan Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection