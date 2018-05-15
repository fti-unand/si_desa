@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('penduduk.destroy', [ $penduduk->id]) }}" onclick="event.preventDefault();confirmDeletion();"><i class="icon-trash"></i> Hapus</a>
    <a class="btn" href="{{ route('penduduk.edit', [ $penduduk->id]) }}"><i class="icon-pencil"></i> Edit</a>
    <a class="btn" href="{{ route('penduduk.index') }}"><i class="icon-list"></i> List</a>

    <form style="display: none" action="{{ route('penduduk.destroy', [$penduduk->id]) }}" method="post" id="form-delete">
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
                <i class="fa fa-align-justify"></i> Informasi penduduk
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">NIK</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $penduduk->nik }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Kartu Keluarga</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $kartu_keluarga[$penduduk->kartu_keluarga_id] }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $penduduk->nama }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tempat Lahir</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $penduduk->tempat_lahir }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $penduduk->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Meninggal</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $penduduk->tanggal_meninggal }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-9">
                            <p class="col-form-label">
                              @if($penduduk->jenis_kelamin == 1)
                             <a>Laki-laki</a>
                              @else
                              <a>Perempuan</a>
                              @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Kewarganegaraan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">
                              @if($penduduk->kewarganegaraan == 1)
                             <a>Indonesia</a>
                              @else
                              <a>Warga Negara Asing</a>
                              @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Photo</label>
                        <div class="col-md-9">
                            <img src="public/img/penduduk/{{$penduduk->photo}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status Perkawinan</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $status_perkawinan[$penduduk->status_perkawinan_id ]}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status Penduduk</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $status_penduduk[$penduduk->status_penduduk_id] }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tempat Lahir</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $agama[$penduduk->agama_id] }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Hubungan Keluarga</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $hubungan_keluarga[$penduduk->hubungan_keluarga_id] }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Ayah</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $p[$penduduk->ayah_id] }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Ibu</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $p[$penduduk->ibu_id] }}</p>
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
        if(confirm('Anda yakin akan menghapus penduduk ini?')){
            form = document.querySelector('form-delete');
            form.submit();
        }
    }
</script>
