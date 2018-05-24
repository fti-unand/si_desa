<div class="form-group">
    <label for="role">Nagari</label>
    {{ Form::select('nagari',$nagari,null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="name">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="keterangan">Keterangan</label>
    {{ Form::text('keterangan', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="tahunbangun">Tahun Bangun</label>
    {{ Form::text('tahun_bangun', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="foto">Foto</label>
    {{ Form::file('foto', ['class' => 'form-control']) }}
</div>
