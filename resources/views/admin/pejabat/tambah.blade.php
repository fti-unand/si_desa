@extends('blank')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
          {!! Form::open(['route' => 'pejabat.store', 'method' => 'post', 'enctype' => 'multipart/form-data'] ) !!}

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Entry Data Pejabat
            </div>

            <div class="card-body">

            <div class="form-group">
              <label for="namapejabat">Nama Pejabat</label>
              {{ Form::text('namapejabat',null, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
              <label for="nagari">Nagari</label>
              {{ Form::select('nagari',$nagari, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              {{ Form::select('jabatan',$jabatan, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              <label for="nosk">No SK</label>
              {{ Form::text('nosk',null, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
              <label for="tglsk">Tanggal SK</label>
              {{ Form::date('tglsk',null, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
              <label for="mulaitgl">Mulai tanggal</label>
              {{ Form::date('mulaitgl',null, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
              <label for="sampaitgl">Sampai tanggal</label>
              {{ Form::date('sampaitgl',null, ['class' => 'form-control'])}}
            </div>

            <div class="form-group">
              <label for="uploadsk">Upload SK</label>
              {{ Form::file('fotosk', ['class' => 'form-control'])}}
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    {{ Form::close() }}
  @endsection
