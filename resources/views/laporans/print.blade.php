<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<center><h1>KARTU KELUARGA</h1>
@foreach($kartukeluarga as $kk)
<h2>No. {{$kk->no_kk}}</h2>

</center>
<table>
@foreach($namakeluarga as $ayah)
<tr>
	<th>Nama Kepala Keluarga</th>
	<td>:</td>
	<td>{{$ayah->nama}}</td>
</tr>
@endforeach
<tr>
	<th>Alamat</th>
	<td>:</td>
	<td>{{$kk->alamat}}</td>
</tr>
@endforeach
</table>

<br>
<table class="table">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>NIK</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Agama</th>
		<th>Pendidikan</th>
		<th>Jenis Pekerjaan</th>
	</tr>
	@foreach($namas as $nama)
	<tr>
		<td>{{$nama->nama}}</td>
		<td>{{$nama->nik}}</td>
		<td>{{$nama->nama}}</td>
		@if($namas->jenis_kelamin=2)
		 <td>Laki-Laki</td>
		@else
		 <td>Perempuan</td>
		@endif
		<td>{{$nama->nama}}</td>
		<td>{{$nama->nama}}</td>
		<td>{{$nama->agamas->nama}}</td>
		<td>{{$nama->agamas->nama}}</td>
		<td></td>
	</tr>
	@endforeach
</table>
</body>
</html>