@extends('layouts.master')

@section('content')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Buku</h3>
						</div>
						<div class="panel-body">
							@if(session('sukses'))
							<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-check-circle"></i> {{session('sukses')}}
							</div>
							@endif
							<form action="/anggota/{{$anggota->id}}/update" method="POST" enctype="multipart/form-data">
					      	  {{csrf_field()}}

					      	  <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
							    <label>Nama</label>
							    <input name="nama" type="text" class="form-control" placeholder="Nama" value="{{$anggota->nama}}" required>
							    @if($errors->has('nama'))
									<span class="help-block">{{$errors->first('nama')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('tempat_lahir') ? ' has-error' : ''}}">
							    <label>Tempat Lahr</label>
							    <input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="{{$anggota->tempat_lahir}}" required>
							    @if($errors->has('tempat_lahir'))
									<span class="help-block">{{$errors->first('tempat_lahir')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
							    <label>Tanggal Lahir</label>
							    <input name="tanggal_lahir" type="date" class="form-control" placeholder="Tanggal lahir" value="{{$anggota->tanggal_lahir}}" required>
							    @if($errors->has('tanggal_lahir'))
									<span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
							    <label>Jenis Kelamin</label>
							    <select name="jenis_kelamin" class="form-control" required>
							      <option @if($anggota->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
							      <option @if($anggota->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
							    </select>
							    @if($errors->has('jenis_kelamin'))
									<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('no_telp') ? ' has-error' : ''}}">
							    <label>No Telp</label>
							    <input name="no_telp" type="text" class="form-control" placeholder="No Telp" value="{{$anggota->no_telp}}" required>
							    @if($errors->has('no_telp'))
									<span class="help-block">{{$errors->first('no_telp')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
							    <label>Alamat</label>
							    <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{$anggota->alamat}}" required>
							    @if($errors->has('alamat'))
									<span class="help-block">{{$errors->first('alamat')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
							    <label>Avatar</label>
							    <input name="avatar" type="file" class="form-control">
							    @if($errors->has('avatar'))
									<span class="help-block">{{$errors->first('avatar')}}</span>
								@endif
							  </div><br><br>

							  <button type="submit" class="btn btn-primary">Update</button>						      
					      	</form>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop