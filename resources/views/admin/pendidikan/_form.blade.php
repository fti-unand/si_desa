<div class="form-group">
    <label for="name">Jenjang Pendidikan</label>
    {{ Form::select('jenjang_id', $jenjang, null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="name">Penduduk</label>
    {{ Form::select('penduduk_id', $penduduk, null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="name">Nama Institusi</label>
    {{ Form::text('nama_institusi', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="name">Tahun Mulai</label>
    {{ Form::number('tahun_mulai', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="name">Tahun Selesai</label>
    {{ Form::number('tahun_selesai', null, ['class' => 'form-control'])}}
</div>
