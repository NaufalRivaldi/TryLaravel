@extends('template')

@section('title', 'Detail')

@section('konten')
	<div class="col-md-12">
		<div id="siswa">
			<h2>Data Siswa</h2>
			<table class="table table-striped">
				<tr>
					<td>NISN</td>
					<td>: {{$siswa->nisn}}</td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>: {{$siswa->nama_siswa}}</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>: {{$siswa->tgl_lahir}}</td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>: {{$siswa->kelas->nama_kelas}}</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>: {{$siswa->jk}}</td>
				</tr>
				<tr>
					<td>No Telepon</td>
					<td>: 
						{{
							!empty($siswa->telepon->no_telp) ? $siswa->telepon->no_telp : '-'
						}}
					</td>
				</tr>	
			</table>
		</div>
	</div>
@stop