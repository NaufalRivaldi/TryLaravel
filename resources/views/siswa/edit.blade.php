@extends('template')

@section('title', 'Edit')

@section('konten')
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<fieldset>
			<legend>Form Edit Siswa</legend>
			@include('error.error_form_list')
			<form method="post" action="{{URL::to('siswa/update/'.$siswa->id)}}">
				{{csrf_field()}}
				<div class="form-group">
					<label for="nisn" class="control-label">NISN</label>
					<input type="text" name="nisn" class="form-control" value="{{$siswa->nisn}}">
				</div>
				<div class="form-group">
					<label for="nama_siswa" class="control-label">Nama Siswa</label>
					<input type="text" name="nama_siswa" class="form-control" value="{{$siswa->nama_siswa}}">
				</div>
				<div class="form-group">
					<label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control" value="{{$siswa->tgl_lahir}}">
				</div>
				<div class="form-group">
					<label>Kelas</label>
					@if(count($kelas) > 0)
						<select name="id_kelas" class="form-control">
							@foreach($kelas as $list)
								@if($siswa->id_kelas == $list->id)
									<option value="{{$list->id}}" selected>{{$list->nama_kelas}}</option>
								@else
									<option value="{{$list->id}}">{{$list->nama_kelas}}</option>
								@endif
							@endforeach
						</select>
					@endif
				</div>
				<div class="form-group">
					<label for="jk" class="control-label">Jenis Kelamin</label>
					<div class="radio">
						@if($siswa->jk == "L")
						<label>
							<input type="radio" name="jk" value="L" checked>Laki - laki
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="jk" value="P">Perempuan
						</label>
						@else
						<label>
							<input type="radio" name="jk" value="L">Laki - laki
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="jk" value="P" checked>Perempuan
						</label>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="nama_siswa" class="control-label">Telepon</label>
					<input type="text" name="no_telp" class="form-control" value="{{$siswa->no_telp}}">
				</div>
				<div class="form-group">
					<input type="submit" name="btn" value="Update" class="btn btn-primary btn-block">
				</div>
			</form>
		</fieldset>
	</div>
	<div class="col-md-2"></div>
@stop