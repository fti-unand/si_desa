@extends('blank')

@section('content')
{!! Form::open(['route' => ['pejabat.show',$datapejabatid->id], 'method' => 'post'] ) !!}

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Informasi Pejabat
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <p class="col-form-label"> {{ $datapejabatid->nama }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jabatan</label>
                        <div class="col-md-9">
                            <p class="col-form-label"> {{ $jabatan[$datapejabatid->jabatan_id] }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nagari</label>
                        <div class="col-md-9">
                            <p class="col-form-label"> {{ $nagari[$datapejabatid->nagari_id] }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">No SK</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $datapejabatid->sk_no }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal SK</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $datapejabatid->tanggal_sk }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Berlaku Mulai</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $datapejabatid->mulai_tanggal }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Sampai tanggal</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $datapejabatid->sampai_tanggal }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Foto</label>
                        <div class="col-md-9 text-center">
                            <img src="public/img/avatar/" />
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
{{ Form::close() }}
@endsection
