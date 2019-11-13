@extends('layouts.master')

@section('content')

<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Data Perpustakaan</h3>
					<p class="panel-subtitle">{{tanggal()}}</p>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-book"></i></span>
								<p>
									<span class="number">{{totalBuku()}}</span>
									<span class="title">total Buku</span>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-users"></i></span>
								<p>
									<span class="number">{{totalAnggota()}}</span>
									<span class="title">Total Anggota</span>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-pencil-square-o"></i></span>
								<p>
									<span class="number">{{totalTransaksi()}}</span>
									<span class="title">Total Transaksi</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		
				<div class="row">
					<div class="col-md-12">
						<!-- RECENT PURCHASES -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Buku yang sedang dipinjam</h3>
							</div>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No. Transaksi</th>
											<th>Buku</th>
											<th>Peminjam</th>
											<th>Tanggal Pinjam</th>
											<th>Tanggal Kembali</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $dt)
										<tr>
											<td>{{$dt->kode}}</td>
											<td>{{$dt->buku->judul}}</td>
											<td>{{$dt->anggota->nama}}</td>
											<td>{{date('d M Y', strtotime($dt->tgl_pinjam))}}</td>
											<td>{{date('d M Y', strtotime($dt->tgl_kembali))}}</td>
											<td>
												<label class="label label-warning">{{$dt->status}}</label>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						<!-- END RECENT PURCHASES -->
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
