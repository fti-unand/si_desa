
<div class="form-group">
    <label for="nik">NIK</label>
      {{ Form::text('nik', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="nama">Nama</label>
      {{ Form::text('nama', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="kartu_keluarga_id">Kartu Keluarga</label>
      {{ Form::select('kartu_keluarga_id', $kartu_keluarga, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih id Kartu Keluarga ...'])}}
</div>

<div class="form-group" >
    <label for="tempat_lahir">Tempat Lahir</label>
      {{ Form::text('tempat_lahir', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
      {{ Form::date('tanggal_lahir', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="tanggal_meninggal">Tanggal Meninggal</label>
    {{ Form::date('tanggal_meninggal', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    {{ Form::select('jenis_kelamin',['1'=>'Laki-laki', '2'=>'Perempuan'] ,null, ['class' => 'form-control', 'placeholder' => 'Pilih Jenis Kelamin ...'])}}
</div>

<div class="form-group">
    <label for="kewarganegaraan">Kewarganegaraan</label>
    {{ Form::select('kewarganegaraan',['1'=>'Indonesia','2'=>'Lain-lain'], null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="photo">Photo</label>
    {{ Form::file('photo', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="status_perkawinan_id">Status Perkawinan</label>
    {{ Form::select('status_perkawinan_id', $status_perkawinan, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih Id Status Perkawinan ...'])}}
</div>

<div class="form-group">
    <label for="status_penduduk_id">Status Penduduk</label>
    {{ Form::select('status_penduduk_id', $status_penduduk, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih Id Status Penduduk ...'])}}
</div>

<div class="form-group">
    <label for="agama_id">Agama</label>
    {{ Form::select('agama_id', $agama, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih Id Agama ...'])}}
</div>

<div class="form-group">
    <label for="hubungan_keluarga_id">Hubungan Keluarga</label>
    {{ Form::select('hubungan_keluarga_id', $hubungan_keluarga, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih Id Hubungan Keluarga ...'])}}
</div>

<div class="form-group">
    <label for="ayah_id">Ayah</label>
    {{ Form::select('ayah_id', $ayah, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih Id Ayah...'])}}
</div>

<div class="form-group">
    <label for="ibu_id">Ibu</label>
    {{ Form::select('ibu_id', $ibu, null, [ 'class' => 'form-control', 'placeholder' => 'Pilih Id Ibu ...'])}}
</div>
