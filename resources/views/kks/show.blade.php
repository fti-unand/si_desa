@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('kks.destroy', [ $kk->id]) }}" onclick="event.preventDefault();confirmDeletion();"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('kks.edit', [ $kk->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('kks.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('kks.destroy', [$kk->id]) }}" method="post" id="form-delete">
        @csrf
        @method('delete')
    </form>
@endsection

{{-- Content Utama --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Informasi kk
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">No. KK</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $kk->no_kk }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">alamat</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $kk->alamat }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal KK</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $kk->tanggal_kk }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jorong</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $kk->jorong->nama }}</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus kk ini?')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
</script>