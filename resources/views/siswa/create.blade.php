@extends('template')

@section('title', 'Home')

@section('konten')
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<fieldset>
			<legend>Form Tambah Siswa</legend>
			@include('error.error_form_list')
			<form method="post" action="{{URL::to('siswa')}}">
				{{csrf_field()}}
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="form-group">
					<label for="nisn" class="control-label">NISN</label>
					<input type="text" name="nisn" class="form-control">
				</div>
				<div class="form-group">
					<label for="nama_siswa" class="control-label">Nama Siswa</label>
					<input type="text" name="nama_siswa" class="form-control">
				</div>
				<div class="form-group">
					<label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control">
				</div>
				<div class="form-group">
					<label>Kelas</label>
					@if(count($kelas) > 0)
						<select name="id_kelas" class="form-control">
							<option value="">Pilih Kelas</option>
							@foreach($kelas as $list)
								<option value="{{$list->id}}">{{$list->nama_kelas}}</option>
							@endforeach
						</select>
					@endif
				</div>
				<div class="form-group">
					<label for="jk" class="control-label">Jenis Kelamin</label>
					<div class="radio">
						<label>
							<input type="radio" name="jk" value="L" checked>Laki - laki
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="jk" value="P">Perempuan
						</label>
					</div>
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" name="no_telp" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="btn" value="Tambah Siswa" class="btn btn-primary btn-block">
				</div>
			</form>
		</fieldset>
	</div>
	<div class="col-md-2"></div>
@stop