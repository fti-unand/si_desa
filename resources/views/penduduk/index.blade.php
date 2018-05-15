@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
<a class="btn" href="{{ route('penduduk.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Penduduk
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tempat / Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Kewarganegaraan</th>
                            <th class="text-center">Status Perkawinan</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($penduduk as $penduduk)
                        <tr>
                            <td>{{ $penduduk->nik }}</td>
                            <td>{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->tempat_lahir }} / {{ $penduduk->tanggal_lahir }}</td>
                            <td class="text-center">
                                @if($penduduk->jenis_kelamin == 1)
                               <a>Laki-laki</a>
                                @else
                                <a>Perempuan</a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($penduduk->kewarganegaraan == 1)
                               <a>Indonesia</a>
                                @else
                                <a>Warga Negara Asing</a>
                                @endif
                            </td>
                            <td>{{ $status_perkawinan[$penduduk->status_perkawinan_id ]}}</td>
                            <td>{{ $agama[$penduduk->agama_id] }}</td>
                            <td class="text-center">
                                <a href="{{ route('penduduk.show', [$penduduk->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"> </i>
                                </a>
                                <a href="{{ route('penduduk.edit', [$penduduk->id]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <button onclick="event.preventDefault();confirmDeletion('{{ route('penduduk.destroy', [$penduduk->id]) }}');" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"> </i>
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

<form style="display: none" action="#" method="post" id="form-activation">
    @csrf
</form>

@endsection

@push('javascript')
<script>
    function confirmDeletion(url){
        if(confirm('Anda yakin akan menghapus user ini? ')){
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
</script>
@endpush
