@extends('layouts.main')
@section('title','Kalkulasi Dukungan Keputusan')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Isikan Data Pengajuan Bantuan dengan Jujur</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('history.calculate') }}" method="post">
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
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Bantu Keputusan Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection