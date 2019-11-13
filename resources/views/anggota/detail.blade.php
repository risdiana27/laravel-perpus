@extends('layouts.master')

@section('content')

	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<img class="avatar" src="{{$anggota->getAvatar()}}" >
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							  <div class="form-group">
							    <label for="exampleInputPassword1">Nama</label>
							    <input name="nama" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" value="{{$anggota->nama}}" readonly="true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Tempat Lahr</label>
							    <input name="tempat_lahir" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir" value="{{$anggota->tempat_lahir}}" readonly="true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Tanggal Lahir</label>
							    <input name="tanggal_lahir" type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal lahir" value="{{$anggota->tanggal_lahir}}" readonly="true">
							  </div>
							  <div class="form-group">
							    <label for="exampleFormControlSelect2">Jenis Kelamin</label>
							    <input name="jenis_kelamin" type="text" class="form-control" id="exampleInputPassword1" value="{{$anggota->jenis_kelamin}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">No Telp</label>
							    <input name="no_telp" type="text" class="form-control" id="exampleInputPassword1" placeholder="No Telp" value="{{$anggota->no_telp}}" readonly="true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Alamat</label>
							    <input name="alamat" type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" value="{{$anggota->alamat}}" readonly="true">
							  </div>							  
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

@stop