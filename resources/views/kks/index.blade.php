@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ route('kks.create') }}"><i class="icon-plus"></i>Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Kartu Keluarga
            </div>
            
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No. KK</th>
                            <th class="text-center">Jorong</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kks as $kk)
                        <tr>
                            <td>{{ $kk->no_kk }}</td>
                            <td>{{ $kk->jorong->nama }}</td>
                            <td>{{ $kk->alamat }}</td>
                            
                            <td class="text-center">
                                <a href="{{ route('kks.show', [$kk->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> Detail</i> 
                                </a>
                                <a href="{{ route('kks.edit', [$kk->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                                <button onclick="event.preventDefault();confirmDeletion('{{ route('kks.destroy', [$kk->id]) }}');" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"> Delete</i>
                                </button>
                                
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        
    </div>
</div>

<form style="display: none" action="#" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>

@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus kk ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
    
    function activation(url){
        form = document.querySelector('#form-activation');
        form.action = url;
        form.submit();
    }
</script>
@endpush

