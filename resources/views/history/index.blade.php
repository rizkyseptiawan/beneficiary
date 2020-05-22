@extends('layouts.main')
@section('title','Daftar Pengajuan Bantuan')
@section('action')
<div class="section-header-breadcrumb">
    <div class="row">
        <div class="col-lg-5 col-sm-12 mr-n4">
            <select name="periode" class="form-control select2 d-inline-block">
                <option value="" disabled selected>Pilih Periode</option> 
                @forelse ($periodes as $item)
                    <option value="{{ $item->id }}">{{ $item->periode_bantuan }}</option>                  
                @empty
                    <option value="">Tidak Ada Periode</option>
                @endforelse
            </select>   
        </div>
        <div class="col-lg-4 col-sm-12">
            <select name="status" class="form-control">
                <option value="" disabled selected>Pilih Status</option> 
                <option value="Pengajuan">Pengajuan</option> 
                <option value="Seleksi">Seleksi</option> 
                <option value="Diterima">Diterima</option> 
                <option value="Belum Berkesempatan">Belum Berkesempatan</option> 
            </select>
        </div>
        <div class="col-lg-3 col-sm-12">
            <button type="button" id="seleksi" class="btn btn-primary"><i class="fas fa-tasks"></i> Seleksi</button>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="row">
        @forelse ($histories as $item)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-secondary">
                <div class="card-header">
                  <h4><span class="badge badge-primary">{{ $item->beneficiary->nama_penerima }}</span></h4>
                  @role('admin')
                  <div class="card-header-action">
                  <a href="javascript:void(0)" onClick="deleteData('{{ route('history.delete',$item->id) }}','{{ $item->nama_sub_kriteria }}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  <div class="dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Aksi</a>
                    <div class="dropdown-menu">
                      <a href="javascript:void(0)" onClick="acceptData('{{ route('history.accept',$item->id) }}','{{ $item->beneficiary->nama_penerima }}')" class="dropdown-item has-icon text-success"><i class="fas fa-check"></i> Terima</a>
                      <a href="javascript:void(0)" onClick="declineData('{{ route('history.decline',$item->id) }}','{{ $item->beneficiary->nama_penerima }}')" class="dropdown-item has-icon text-danger"><i class="fas fa-ban"></i> Tolak</a>
                    </div>
                  </div>
                  @endrole
                </div>
                </div>
                <div class="card-body">
                    <strong><span class="text-primary">#{{ $item->kode_pengajuan }}</span></strong>
                    <p>Pada pengajuan ini penerima bantuan akan mendapatkan bantuan berupa : {{ $item->funds_assistance_period->item_bantuan }} </p>
                    <p class="m-0"><strong>Status :</strong> <span class="badge badge-warning">{{ $item->status_pengajuan }}</span></p>
                    <p class="m-0"><strong>Nilai Total Kriteria :</strong> <span class="badge badge-success">@if(!empty($item->nilai_total_kriteria)){{ $item->nilai_total_kriteria }}@else - @endif</span></p>
                    <p class="m-0"><strong>Periode Pengajuan :</strong> <span class="badge badge-info">{{ $item->funds_assistance_period->periode_bantuan }}</span></p>
                    <span class="text-secondary"><strong>Tanggal Pengajuan :</strong> {{ $item->created_at }}</span>
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
        <div class="col-md-12">
            {{ $histories->links() }}
        </div>
    </div>
@endsection
@section('custom')
<script>
    var link = "{{ route('history.index') }}";
    var periode;
    var status;
    var queryPeriode = "?periode=";
    var queryStatus = "?status=";
    $('select[name=periode]').on('change', function(){
        periode = $(this).children("option:selected").val()
        // console.log(periode);
        queryPeriode = "?periode="+periode;
    });
    $('select[name=status]').on('change', function(){
        status = $(this).children("option:selected").val()
        queryStatus = "&status="+status;
    });
    $('#seleksi').on('click', function(){
        var href = link + queryPeriode + queryStatus;
        console.log(href);
        window.location.href = href;
    });
</script>
@endsection