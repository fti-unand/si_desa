<div class="form-group">
    <label for="no_kk">No. KK</label>
    {{ Form::text('no_kk', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="role">Jorong</label>
    {{ Form::select('jorong_id',$jorong,null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    {{ Form::text('alamat', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="tanggal_kk">Tanggal KK</label>
    {{ Form::date('tanggal_kk', null, ['class' => 'form-control'])}}
</div>