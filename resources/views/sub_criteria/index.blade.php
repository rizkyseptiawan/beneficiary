@extends('layouts.main')
@section('title','Daftar Sub Kriteria')
@section('action')
<div class="section-header-breadcrumb">
    <a href="{{ route('subcriteria.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Sub Kriteria</a>        
</div>
@endsection
@section('action')
<div class="section-header-breadcrumb">
    <a href="{{ route('subcriteria.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kriteria</a>        
</div>
@endsection
@section('content')
    <div class="row">
        @forelse ($subcriterias as $item)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-secondary">
                <div class="card-header">
                  <h4>{{ $item->nama_sub_kriteria }}</h4>
                  <div class="card-header-action">
                    <a href="{{ route('subcriteria.edit',$item->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="#" onClick="deleteData('{{ route('subcriteria.delete',$item->id) }}','{{ $item->nama_sub_kriteria }}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </div>
                </div>
                <div class="card-body">
                    <p>Nilai Sub Kriteria akan digunakan untuk perhitungan pada metode SAW</p>
                    <span class="badge badge-warning">Kriteria : {{ $item->criteria->nama_kriteria }}</span>
                    <span class="badge badge-success">Nilai Sub Kriteria : {{ $item->nilai_sub_kriteria }}</span>
                </div>
              </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-danger text-center" role="alert">
                <strong>Data Sub Kriteria Belum Tersedia</strong>
            </div>
        </div>
            
        @endforelse
        
    </div>
@endsection