@extends('layouts.main')
@section('title','Daftar Pengajuan Bantuan')
@section('content')
    <div class="row">
        @forelse ($histories as $item)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-secondary">
                <div class="card-header">
                  <h4>{{ $item->kode_pengajuan }}</h4>
                  <div class="card-header-action">
                  <a href="#" onClick="deleteData('{{ route('subcriteria.delete',$item->id) }}','{{ $item->nama_sub_kriteria }}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </div>
                </div>
                <div class="card-body">
                    <p>Nilai Sub Kriteria akan digunakan untuk perhitungan pada metode SAW</p>
                    <span class="badge badge-warning">Status Pengajuan : {{ $item->status_pengajuan }}</span>
                    <span class="badge badge-success">Nilai Total Kriteria : {{ $item->nilai_total_kriteria }}</span>
                </div>
              </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-danger text-center" role="alert">
                <strong>Data Pengajuan Belum Tersedia</strong>
            </div>
        </div>
        @endforelse
    </div>
@endsection