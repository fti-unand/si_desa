@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('pendidikans.destroy', [ $pendidikan->id]) }}" onclick="event.preventDefault();confirmDeletion();"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('pendidikans.edit', [ $pendidikan->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('pendidikans.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('pendidikans.destroy', [$pendidikan->id]) }}" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> Informasi Pendidikan
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Nama Penduduk</label>
                    <div class="col-md-9">
                        <p class="col-form-label">{{ $pendidikan->penduduk->nama }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Jenjang Pendidikan</label>
                    <div class="col-md-9">
                        <p class="col-form-label">{{ $pendidikan->jenjang->nama }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Tahun Mulai</label>
                    <div class="col-md-9">
                        <p class="col-form-label">{{ $pendidikan->tahun_mulai }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Tahun Selesai</label>
                    <div class="col-md-9">
                        <p class="col-form-label">{{ $pendidikan->tahun_selesai }}</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('javascript')
<script>
    function confirmDeletion(){
        if(confirm('Anda yakin akan menghapus pendidikan ini?')){
            form = document.querySelector('form-delete');
            form.submit();
        }
    }
</script>