@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('fasilitas.destroy', [ $sarana->id]) }}" onclick="event.preventDefault();confirmDeletion();"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('fasilitas.edit', [ $sarana->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('fasilitas.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('fasilitas.destroy', [$sarana->id]) }}" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> Informasi Sarana
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Nagari</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $sarana->nagari->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Fasilitas</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $sarana->nama}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Keterangan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $sarana->keterangan }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tahun Bangun</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $sarana->tahun_bangun }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Profile Picture</label>
                        <div class="col-md-9 text-center">
                            <img src="public/img/foto/{{ $sarana->foto }}" />
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
    function confirmDeletion(){
        if(confirm('Anda yakin akan menghapus user ini?')){
            form = document.querySelector('form-delete');
            form.submit();
        }
    }
</script>