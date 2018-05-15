@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('beritas.destroy', [ $berita->id]) }}" onclick="event.preventDefault();confirmDeletion();"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('beritas.edit', [ $berita->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('beritas.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('beritas.destroy', [$berita->id]) }}" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> {!! $berita->judul !!}
            </div>
            <div class="card-body">
                <p>Nagari <b>{!! $berita->nagari->nama !!}</b><br> Tanggal : <b>{!! $berita->tanggal_terbit !!}</b></p>
                <p>
                <img src="{!! asset($berita->foto) !!}"></p>
                <p>
                    {!! $berita->isi !!}
                </p>

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