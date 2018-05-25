<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

	<div style="margin:3%;">

		<div align="center">
				<h3>KARTU KELUARGA</h3>
				<h4>SALINAN</h4>
				<h5>No.@foreach($kk as $data1){{$data1->no_kk}}@endforeach </h4>
			</div>

			<br>

			<table width="100%" cellpadding="1" cellspacing="1">
				<tr>
					<td width="100">Nama KK</td>
					<td width="600">Kepala kk</td>
					<td width="160">Kcamatan</td>
					<td width="150">Jorong</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>kepala kk</td>
					<td>Kabupaten/Kota</td>
					<td>Nama kabupaten</td>
				</tr>
				<tr>
					<td>RT / RW</td>
					<td>Kepala RT atau RW</td>
					<td>Kode Pos</td>
					<td>Kode Pos</td>
				</tr>
				<tr>
					<td>Kelurahan/Sebutan desa</td>
					<td>Nama desa/ jorong</td>
					<td>Provinsi</td>
					<td>Provinsi</td>
				</tr>
			</table>

			<br>

			<table class="border thick ">
				<thead>
				<tr class="border thick">
					<th width="100" style="padding-left:1%;">No</th>
					<th width='280'>Nama</th>
					<th width='200'>NIK</th>
					<th width='200'>Jenis Kelamin</th>
					<th width='200'>Tempat Lahir</th>
					<th width='220'>Tanggal Lahir</th>
					<th width='200'>Agama</th>
					<th width='200'>Pendidikan</th>
					<th width='180'>Pekerjaan</th>
				</tr>
				</thead>
				<tbody>
					<tr class="data">
						<td style="padding-left:1%;">  1</td>
						<td>  Jono</td>
						<td>  12131241231</td>
						<td>  Laki-laki</td>
						<td>  Padang</td>
						<td>  11-05-1997</td>
						<td>  Islam</td>
						<td>  Pendidikan</td>
						<td>  Pekerjaan</td>
					</tr>
				</tbody>
			</table>

			<br>

			<table class="border thick ">
				<thead>
					<tr class="border thick">
						<th style="padding-left:1%;" width="200">No</th>
						<th width='300'>Status Perkawinan</th>
						<th width='240'>Status Hubungan dalam Keluarga</th>
						<th width='200'>Kewarganegaraan</th>
						<th width='200'>Nama Ayah</th>
						<th width='200'>Nama Ibu</th>
						<th width='200'>Golongan darah</th>
					</tr>
				</thead>
				<tbody>
						<tr class="data">
							<td style="padding-left:1%;" width="200"> 1</td>
							<td width='300'>  Belum Kawin</td>
							<td width='250'>  Ayah</td>
							<td width='220'>  Indonesia</td>
							<td width='220'>  Badu</td>
							<td width='220'>  Siti</td>
							<td align="center" width="200"> O</td>
						</tr>
				</tbody>
			</table>

			<br>

			<table width="100%" cellpadding="3" cellspacing="4">
				<tr>
					<td width="25%"></td>
					<td width="50%"></td>
					<td width="25%" align="center"> Nama Jorong ,   23 Februari 2019</td>
					</tr>
					<td width="25%" align="center">KEPALA KELUARGA</td>
					<td width="50%"></td>
					<td align="center" width="150">KEPALA   Jorong</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="25%" align="center"> Kepala</td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150">  Kepala Jorong</td>
				</tr>
			</table>

	</div>

</body>
</html>
