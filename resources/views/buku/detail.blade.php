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
								<img class="cover" src="{{$buku->getCover()}}" >
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							  <div class="form-group">
							    <label for="exampleInputPassword1">Judul</label>
							    <input name="judul" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->judul}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">ISBN</label>
							    <input name="isbn" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->isbn}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Pengarang</label>
							    <input name="pengarang" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->pengarang}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Penerbit</label>
							    <input name="penerbit" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->penerbit}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Tahun</label>
							    <input name="tahun_terbit" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->tahun_terbit}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Jumlah</label>
							    <input name="jumlah_buku" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->jumlah_buku}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Deskripsi</label>
							    <input name="deskripsi" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->deskripsi}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Lokasi</label>
							    <input name="lokasi" type="text" class="form-control" id="exampleInputPassword1" value="{{$buku->lokasi}}" readonly = "true">
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