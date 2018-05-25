
<div class="form-group">
    <label for="nagari_id">Nagari</label>
    {{ Form::select('nagari_id', $nagari, null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="judul">Judul</label>
    {{ Form::text('judul', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="tanggal_terbit">Tanggal Terbit</label>
    {{ Form::date('tanggal_terbit', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="isi">Isi</label>
    {{ Form::textarea('isi', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="foto">Foto</label>
    @isset($berita->foto)
    <p>
                <img src="{!! asset($berita->foto) !!}" style="max-width:800px;min-height:auto"></p>
    @endisset            
    {{ Form::file('foto', ['class' => 'form-control'])}}
</div>

