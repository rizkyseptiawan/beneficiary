@extends('layouts.main')
@section('title','Periode Bantuan')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="{{ route('periode.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                <th>Periode Bantuan</th>
                                <th class="text-center">Jenis Bantuan</th>
                                <th class="text-center">Item Bantuan</th>
                                <th class="text-center">Status Periode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($periods as $item)
                            <tr>
                                <td class="text-center">
                                    <div class="sort-handler">
                                        <i class="fas fa-th"></i>
                                    </div>
                                </td>
                                <td>{{ $item->periode_bantuan }}</td>
                                <td class="text-center">
                                    <div class="badge badge-success text-capitalize">{{ $item->jenis_bantuan }}</div>
                                </td>
                                <td class="text-center">{{ $item->item_bantuan }}</td>
                                <td class="text-center">
                                    @if($item->status == 'Dibuka')
                                    <div class="badge badge-info">
                                        {{ $item->status }}
                                    </div>
                                    @else
                                    <div class="badge badge-danger">
                                        {{ $item->status }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('periode.edit',$item->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>      
                                        <a href="#" onclick="deleteData('{{ route('periode.delete',$item->id) }}','{{ $item->periode_bantuan }}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>      
                                    </div>
                                </td>
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
            {{ $periods->links() }}
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
    var link = "{{ route('periode.index') }}";
    var query = "?search="
    var text= $(this).val();
    $('#btn-search').attr('href', link + query + text);
    console.log(link + query + text);
});
</script>
@endsection