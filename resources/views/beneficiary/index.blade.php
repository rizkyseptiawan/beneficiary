@extends('layouts.main')
@section('title','Daftar Penerima Bantuan')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ route('beneficiary.create') }}" class="btn btn-primary">Tambah Data</a>
                </h4>
                <div class="card-header-action">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" id="input-search" placeholder="Search">
                            <div class="input-group-btn">
                                <a id="btn-search" class="btn btn-primary text-white"><i class="fas fa-search"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Nama Penerima</th>
                                <th>Nomor KTP</th>
                                <th>Nomor Induk Keluarga</th>
                                <th>Nomor Rekening</th>
                                <th>Nomor Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beneficiaries as $item)
                            <tr>
                                <td>
                                    <div class="sort-handler">
                                        <i class="fas fa-th"></i>
                                    </div>
                                </td>
                                <td>{{ $item->nama_penerima }}</td>
                                <td>{{ $item->nomor_ktp }}</td>
                                <td>
                                    {{ $item->nomor_induk_keluarga }}
                                </td>
                                <td>
                                    <div class="badge badge-success">{{ $item->nomor_rekening }}</div>
                                </td>
                                <td>{{ $item->nomor_telpon }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('beneficiary.show',$item->id) }}" class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('beneficiary.edit',$item->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" onClick="deleteData('{{ route('beneficiary.delete',$item->id) }}','{{ $item->nama_penerima }}')"class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>

                                    </div>
                            </tr>
                            @empty
                                <tr >
                                    <td colspan="7" class="alert alert-danger text-center" role="alert">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $beneficiaries->links() }}
            {{-- <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                  </ul>
                </nav>
            </div> --}}
        </div>
    </div>
</div>    
@endsection
@section('custom')
<script>
    $("#sortable-table tbody").sortable({
  handle: '.sort-handler'
});

$('#input-search').on('change', function(){
    var link = "{{ route('beneficiary.index') }}";
    var query = "?search="
    var text= $(this).val();
    $('#btn-search').attr('href', link + query + text);
    console.log(link + query + text);
});
</script>
@endsection