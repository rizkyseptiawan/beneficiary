@extends('layouts.main')
@section('title','Daftar Kriteria')
@section('action')
<div class="section-header-breadcrumb">
    <a href="{{ route('criteria.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kriteria</a>        
</div>
@endsection
@section('content')
    <div class="row">
        @forelse ($criterias as $item)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-secondary">
                <div class="card-header">
                  <h4>{{ $item->nama_kriteria }}</h4>
                  <div class="card-header-action">
                    <a href="{{ route('criteria.edit',$item->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <a href="#" onClick="deleteData('{{ route('criteria.delete',$item->id) }}','{{ $item->nama_kriteria }}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </div>
                </div>
                <div class="card-body">
                    <p>{{ $item->deskripsi_kriteria }}</p>
                    <span class="badge badge-success">Bobot : {{ $item->bobot }}</span>
                    <span class="badge badge-warning">Tipe Bobot : {{ $item->tipe_bobot }}</span>
                </div>
              </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-danger text-center" role="alert">
                <strong>Data Kriteria Belum Tersedia</strong>
            </div>
        </div>
            
        @endforelse
        
    </div>
@endsection