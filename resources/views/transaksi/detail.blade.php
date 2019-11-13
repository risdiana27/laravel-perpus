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
								<img class="cover" src="{{$transaksi->buku->getCover()}}" >
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							  <div class="form-group">
							    <label for="exampleInputPassword1">Kode Transaksi</label>
							    <input name="judul" type="text" class="form-control" id="exampleInputPassword1" value="{{$transaksi->kode}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Buku</label>
							    <input name="judul" type="text" class="form-control" id="exampleInputPassword1" value="{{$transaksi->buku->judul}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Peminjam</label>
							    <input name="judul" type="text" class="form-control" id="exampleInputPassword1" value="{{$transaksi->anggota->nama}}" readonly = "true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Tanggal Pinjam</label>
							    <input name="tgl_pinjam" type="date" class="form-control" id="exampleInputPassword1" value="{{$transaksi->tgl_pinjam}}" readonly="true">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Tanggal Kembali</label>
							    <input name="tgl_kembali" type="date" class="form-control" id="exampleInputPassword1" value="{{$transaksi->tgl_kembali}}" readonly="true">
							  </div>
							  <div class="form-group">
							  	<label for="exampleInputPassword1">Status</label> </br>
                                @if($transaksi->status == 'pinjam')
	                              <label class="label label-warning">Pinjam</label>
	                            @else
	                              <label class="label label-success">Kembali</label>
	                          	@endif
                              </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Keterangan</label>
							    <input name="ket" type="text" class="form-control" id="exampleInputPassword1" value="{{$transaksi->ket}}" readonly = "true">
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