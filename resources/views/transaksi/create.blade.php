@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
                document.getElementById("buku_id").value = $(this).attr('data-buku_id');
                $('#ModalBuku').modal('hide');
            });

            $(document).on('click', '.pilih_anggota', function (e) {
                document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
                document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                $('#ModalAnggota').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>
@stop
@extends('layouts.master')

@section('content')

<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Tambah Transaksi</h3>
						</div>
						<div class="panel-body">
							<form action="{{ route('transaksi.store') }}" method="POST">
							  {{csrf_field()}}	
							  <div class="form-group">
							    <label for="exampleInputPassword1">Kode</label>
							    <input name="kode" type="text" class="form-control" id="exampleInputPassword1" placeholder="kode" value="{{ $kode }}" readonly>
							  </div>
							  <div class="form-group">
							  	<label for="exampleInputPassword1">Anggota</label>
							  <div class="input-group">
								<input id="anggota_nama" class="form-control" type="text" readonly="">
								<input id="anggota_id" type="hidden" name="anggota_id" value="" readonly="">
								<span class="input-group-btn">
								  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalAnggota" >Cari Anggota <span class="fa fa-search"></span></button></span>
							  </div>
							  </div>
							  <div class="form-group">
								<label for="exampleInputPassword1">Buku</label>
                              <div class="input-group">
								<input id="buku_judul" class="form-control" type="text" readonly="">
								<input id="buku_id" type="hidden" name="buku_id" value="" readonly="">
								<span class="input-group-btn">
								  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalBuku" >Cari Buku <span class="fa fa-search"></span></button></span>
							  </div>			
							  </div>	  
							  <div class="form-group">
							    <label for="exampleInputPassword1">Tangggal Pinjam</label>
							    <input name="tgl_pinjam" type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Tanggal Kembali</label>
							    <input name="tgl_kembali" type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString())) }}">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Keterangan</label>
							    <input name="ket" type="text" class="form-control" id="exampleInputPassword1" placeholder="Keterangan">
							  </div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Buku -->
<div class="modal fade bd-example-modal-lg" id="ModalBuku" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>Judul</th>
					<th>ISBN</th>
					<th>Pengarang</th>
					<th>Tahun</th>
					<th>Stock</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_buku as $buku)
				<tr class="pilih" data-buku_id="<?php echo $buku->id; ?>" data-buku_judul="<?php echo $buku->judul; ?>">
					<td>
						<img src="{{$buku->getCover()}}" class="cover-sm" style="margin-right: 10px;" />
						{{$buku->judul}}
					</td>
					<td>{{$buku->isbn}}</td>
					<td>{{$buku->pengarang}}</td>
					<td>{{$buku->tahun_terbit}}</td>
					<td>{{$buku->jumlah_buku}}</td>	
				</tr>
				@endforeach
			</tbody>
		</table>
      </div>	
    </div>
  </div>
</div>
								
<!-- Modal Anggota -->
<div class="modal fade bd-example-modal-lg" id="ModalAnggota" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>Nama</th>
					<th>No Telp</th>
					<th>Alamat</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_anggota as $anggota)
				<tr class="pilih_anggota" data-anggota_id="<?php echo $anggota->id; ?>" data-anggota_nama="<?php echo $anggota->nama; ?>" >
					<td><img src="{{$anggota->getAvatar()}}" class="cover-sm" style="margin-right: 10px;" />
						{{$anggota->nama}}</td>
					<td>{{$anggota->no_telp}}</td>
					<td>{{$anggota->alamat}}</td>	
				</tr>
				@endforeach
			</tbody>
		</table>
      </div>	
    </div>
  </div>
</div>

@endsection