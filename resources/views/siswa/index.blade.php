@extends('template')

@section('title', 'Home')

@section('konten')
	<div class="col-md-12">
		<div id="siswa">
			<h2>Siswa</h2><br>
			<a href="siswa/create" class="btn btn-primary">Tambah Siswa</a>
			@if(!empty($siswa_list))
				<table class="table">
					<thead>
						<tr>
							<th>NISN</th>
							<th>Nama</th>
							<th>Tgl Lahir</th>
							<th>Kelas</th>
							<th>JK</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($siswa_list as $data): ?>
							<tr>
								<td>{{$data->nisn}}</td>
								<td>{{$data->nama_siswa}}</td>
								<td>{{$data->tgl_lahir}}</td>
								<td>{{$data->kelas->nama_kelas}}</td>
								<td>{{$data->jk}}</td>
								<td>
									<a href="siswa/{{$data->id}}" class="btn btn-primary">Detail</a> 
									<a href="siswa/{{$data->id}}/edit" class="btn btn-success">Edit</a>
									<a href="siswa/{{$data->id}}/delete" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			@else
				<p>Data Kosong.</p>
			@endif

			<div class="table-bottom">
				<div class="pull-left">
					<strong>Jumlah Siswa : {{$jml_siswa}} Orang</strong>
				</div>
				<div class="pull-right">
					{{$siswa_list->links()}}
				</div>
			</div>
		</div>
	</div>
@stop