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
						  <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
						  	<i class="fa fa-plus"></i>
						  </a>
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
									<th>Judul</th>
									<th>ISBN</th>
									<th>Pengarang</th>
									<th>Tahun</th>
									<th>Jumlah</th>
									<th>Lokasi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data_buku as $buku)
									<tr>
										<td>
											<img src="{{$buku->getCover()}}" class="cover-sm" style="margin-right: 10px;" />
											<a href="/buku/{{$buku->id}}/detail">{{$buku->judul}}</a>
										</td>
										<td>{{$buku->isbn}}</td>
										<td>{{$buku->pengarang}}</td>
										<td>{{$buku->tahun_terbit}}</td>
										<td>{{$buku->jumlah_buku}}</td>
										<td>{{$buku->lokasi}}</td>	
										<td>
											<a href="/buku/{{$buku->id}}/edit" class="btn btn-success btn-sm">
												<i class="fa fa-pencil">
												</i>
											</a>
											<a href="/buku/{{$buku->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin data ini akan dihapus?')">
												<i class="fa fa-trash">
												</i>
											</a>
										</td>	
									</tr>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/buku/create" method="POST" enctype="multipart/form-data">
      	  {{csrf_field()}}	

		  <div class="form-group{{$errors->has('judul') ? ' has-error' : ''}}">
		    <label>Judul</label>
		    <input name="judul" type="text" class="form-control" placeholder="Judul" value="{{old('judul')}}">
		    @if($errors->has('judul'))
				<span class="help-block">{{$errors->first('judul')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('isbn') ? ' has-error' : ''}}">
		    <label>ISBN</label>
		    <input name="isbn" type="text" class="form-control" placeholder="ISBN" value="{{old('isbn')}}">
		    @if($errors->has('isbn'))
				<span class="help-block">{{$errors->first('isbn')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('pengarang') ? ' has-error' : ''}}">
		    <label>Pengarang</label>
		    <input name="pengarang" type="text" class="form-control" placeholder="Pengarang" value="{{old('pengarang')}}">
		    @if($errors->has('pengarang'))
				<span class="help-block">{{$errors->first('pengarang')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('penerbit') ? ' has-error' : ''}}">
		    <label>Penerbit</label>
		    <input name="penerbit" type="text" class="form-control" placeholder="Penerbit" value="{{old('penerbit')}}">
		    @if($errors->has('penerbit'))
				<span class="help-block">{{$errors->first('penerbit')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('tahun_terbit') ? ' has-error' : ''}}">
		    <label>Tahun</label>
		    <input name="tahun_terbit" type="text" class="form-control" placeholder="Tahun" value="{{old('tahun_terbit')}}">
		    @if($errors->has('tahun_terbit'))
				<span class="help-block">{{$errors->first('tahun_terbit')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('jumlah_buku') ? ' has-error' : ''}}">
		    <label>Jumlah</label>
		    <input name="jumlah_buku" type="text" class="form-control" placeholder="Jumlah" value="{{old('jumlah_buku')}}">
		    @if($errors->has('jumlah_buku'))
				<span class="help-block">{{$errors->first('jumlah_buku')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		    <label>Deskripsi</label>
		    <textarea name="deskripsi" class="form-control" rows="3">{{old('nama')}}</textarea>
		  </div>

		  <div class="form-group{{$errors->has('lokasi') ? ' has-error' : ''}}">
		    <label>Lokasi Buku</label>
		    <select name="lokasi" class="form-control">
		      <option value="Rak 1"{{(old('lokasi') == 'Rak 1') ? 'selected' : ''}}>Rak 1</option>
			  <option value="Rak 2"{{(old('lokasi') == 'Rak 2') ? 'selected' : ''}}>Rak 2</option>
			  <option value="Rak 3"{{(old('lokasi') == 'Rak 3') ? 'selected' : ''}}>Rak 3</option>
		    </select>
		    @if($errors->has('lokasi'))
				<span class="help-block">{{$errors->first('lokasi')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('cover') ? ' has-error' : ''}}">
		    <label>Cover</label>
		    <input name="cover" type="file" class="form-control">
		    @if($errors->has('cover'))
				<span class="help-block">{{$errors->first('cover')}}</span>
			@endif
		  </div>

      </div>

      <div class="modal-footer">
		  <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

@stop
@section('content1')
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
	  {{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-6">
			<h1>Data Buku</h1>
		</div>
		<div class="col-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
			  Tambah Buku
			</button>
		</div>
		<table class="table table-hover">
			<tr>
				<th>Judul</th>
				<th>ISBN</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Tahun</th>
				<th>Jumlah</th>
				<th>Deskripsi</th>
				<th>Lokasi</th>
				<th>Aksi</th>
			</tr>
			@foreach($data_buku as $buku)
			<tr>
				<td>{{$buku->judul}}</td>
				<td>{{$buku->isbn}}</td>
				<td>{{$buku->pengarang}}</td>
				<td>{{$buku->penerbit}}</td>
				<td>{{$buku->tahun_terbit}}</td>
				<td>{{$buku->jumlah_buku}}</td>
				<td>{{$buku->deskripsi}}</td>
				<td>{{$buku->lokasi}}</td>	
				<td>
					<a href="/buku/{{$buku->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
					<a href="/buku/{{$buku->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin data ini akan dihapus?')">Delete</a>
				</td>	
			</tr>
			@endforeach
		</table>
	</div>

	

@endsection

