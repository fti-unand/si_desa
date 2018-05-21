@extends('blank')
@section('content')

<!-- <form class="form-control" action="{{URL('pejabat/update'.$datapejabatid)}}" method="post"> -->
{{ Form::model($datapejabatid, array('route' => array('pejabat.update',$datapejabatid->id))) }}
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Update Data Pejabat
            </div>

            <div class="card-body">

              <div class="form-group">
                <label for="namapejabat">Nama Pejabat</label>
                {{ Form::text('namapejabat',$datapejabatid->nama, ['class' => 'form-control'])}}
              </div>

              <div class="form-group">
                <label for="nagari">Nagari</label>
                {{ Form::select('nagari',$nagari, ['class' => 'form-control'])}}
              </div>

              <div class="form-group">
                <label for="nagari">Jabatan</label>
                {{ Form::select('jabatan',$jabatan, ['class' => 'form-control'])}}
              </div>

              <div class="form-group">
                <label for="nosk">No SK</label>
                {{ Form::text('nosk',$datapejabatid->sk_no, ['class' => 'form-control'])}}
              </div>

              <div class="form-group">
                <label for="tglsk">Tanggal SK</label>
                {{ Form::date('tglsk',$datapejabatid->tanggal_sk, ['class' => 'form-control'])}}
              </div>

              <div class="form-group">
                <label for="mulaitgl">Mulai tanggal</label>
                {{ Form::date('mulaitgl',$datapejabatid->mulai_tanggal, ['class' => 'form-control'])}}
              </div>

              <div class="form-group">
                <label for="sampaitgl">Sampai tanggal</label>
                {{ Form::date('sampaitgl',$datapejabatid->sampai_tanggal, ['class' => 'form-control'])}}
              </div>

              <div class="form-group">
                <label for="uploadsk">Upload SK</label>
                {{ Form::file('fotopejabat', ['class' => 'form-control'])}}
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
{{ Form::close() }}
@endsection
