@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 25
    });

} );
</script>
@stop
@extends('layouts.master')

@section('content')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Data Buku</h3>
						<div class="right">
						  <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<div class="panel-body">
						@if(session('sukses'))
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<i class="fa fa-check-circle"></i> {{session('sukses')}}
						</div>
						@endif
						<table class="table table-hover" id="table">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Buku</th>
									<th>Peminjam</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal Kembali</th>
									<th>Aksi</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data_transaksi as $transaksi)
								<tr>
									<td>
										<a href="{{route('transaksi.show', $transaksi->id)}}">{{$transaksi->kode}}</a>
									</td>
									<td>{{$transaksi->buku->judul}}</td>
									<td>{{$transaksi->anggota->nama}}</td>
									<td>{{date('d M Y', strtotime($transaksi->tgl_pinjam))}}</td>
									<td>{{date('d M Y', strtotime($transaksi->tgl_kembali))}}</td>
			                        <td>
			                          @if(auth()->user()->role == 'admin')
			                          	<div class="dropdown">
										  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    aksi &nbsp <i class="fa fa-caret-down"></i>
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										  @if($transaksi->status == 'pinjam')
										  	<form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
				                            {{ csrf_field() }}
				                            {{ method_field('put') }}
										    <button class="dropdown-item" onclick="return confirm('Anda yakin data ini sudah kembali?')"> Sudah Kembali
                            				</button>
                            			    </form>
                            			    @endif
                            			    <form action="{{ route('transaksi.destroy', $transaksi->id) }}"  method="post">
				                            {{ csrf_field() }}
				                            {{ method_field('delete') }}
										    <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            				</button>
                            				</form>
										  </div>
										</div>
										  @else
				                          @if($transaksi->status == 'pinjam')
				                          <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
				                          {{ csrf_field() }}
				                          {{ method_field('put') }}
				                          <button class="btn btn-info btn-xs" onclick="return confirm('Anda yakin data ini sudah kembali?')">Sudah Kembali
				                          </button>
				                          </form>
				                          @else
				                          -
				                          @endif
			                          @endif
			                        </td>
									<td>
									  @if($transaksi->status == 'pinjam')
			                            <label class="label label-warning">Pinjam</label>
			                          @else
			                            <label class="label label-success">Kembali</label>
			                          @endif
			                        </td>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop