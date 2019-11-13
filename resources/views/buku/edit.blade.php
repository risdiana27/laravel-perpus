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
							<form action="/buku/{{$buku->id}}/update" method="POST" enctype="multipart/form-data">
					      	  {{csrf_field()}}	

							  <div class="form-group{{$errors->has('judul') ? ' has-error' : ''}}">
							    <label>Judul</label>
							    <input name="judul" type="text" class="form-control" placeholder="Judul" value="{{$buku->judul}}">
							    @if($errors->has('judul'))
									<span class="help-block">{{$errors->first('judul')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('isbn') ? ' has-error' : ''}}">
							    <label>ISBN</label>
							    <input name="isbn" type="text" class="form-control" placeholder="ISBN" value="{{$buku->isbn}}">
							    @if($errors->has('isbn'))
									<span class="help-block">{{$errors->first('isbn')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('pengarang') ? ' has-error' : ''}}">
							    <label>Pengarang</label>
							    <input name="pengarang" type="text" class="form-control" placeholder="Pengarang" value="{{$buku->pengarang}}">
							    @if($errors->has('pengarang'))
									<span class="help-block">{{$errors->first('pengarang')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('penerbit') ? ' has-error' : ''}}">
							    <label>Penerbit</label>
							    <input name="penerbit" type="text" class="form-control" placeholder="Penerbit" value="{{$buku->penerbit}}">
							    @if($errors->has('penerbit'))
									<span class="help-block">{{$errors->first('penerbit')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('tahun_terbit') ? ' has-error' : ''}}">
							    <label>Tahun</label>
							    <input name="tahun_terbit" type="text" class="form-control" placeholder="Tahun" value="{{$buku->tahun_terbit}}">
							    @if($errors->has('tahun_terbit'))
									<span class="help-block">{{$errors->first('tahun_terbit')}}</span>
								@endif
							  </div>

							  <div class="form-group{{$errors->has('jumlah_buku') ? ' has-error' : ''}}">
							    <label>Jumlah</label>
							    <input name="jumlah_buku" type="text" class="form-control" placeholder="Jumlah" value="{{$buku->jumlah_buku}}">
							    @if($errors->has('jumlah_buku'))
									<span class="help-block">{{$errors->first('jumlah_buku')}}</span>
								@endif
							  </div>

							  <div class="form-group">
							    <label>Deskripsi</label>
							    <textarea name="deskripsi" class="form-control" rows="3">{{$buku->deskripsi}}</textarea>
							  </div>

							  <div class="form-group{{$errors->has('lokasi') ? ' has-error' : ''}}">
							    <label>Lokasi Buku</label>
							    <select name="lokasi" class="form-control">
							      <option @if($buku->lokasi == 'Rak 1') selected @endif>Rak 1</option>
							      <option @if($buku->lokasi == 'Rak 2') selected @endif>Rak 2</option>
							      <option @if($buku->lokasi == 'Rak 3') selected @endif>Rak 3</option>
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
							  </div><br><br>

							  <button type="submit" class="btn btn-primary btn-warning">Update</button>
					      </form>
						</div>
					</div>
				</div>
			</div>
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
		<h1>Edit Data Siswa</h1>
		<div class="col-lg-12">
		<form action="/buku/{{$buku->id}}/update" method="POST">
      	  {{csrf_field()}}	
		  <div class="form-group">
		    <label for="exampleInputPassword1">Judul</label>
		    <input name="judul" type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul" value="{{$buku->judul}}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">ISBN</label>
		    <input name="isbn" type="text" class="form-control" id="exampleInputPassword1" placeholder="ISBN" value="{{$buku->isbn}}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Pengarang</label>
		    <input name="pengarang" type="text" class="form-control" id="exampleInputPassword1" placeholder="Pengarang" value="{{$buku->pengarang}}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Penerbit</label>
		    <input name="penerbit" type="text" class="form-control" id="exampleInputPassword1" placeholder="Penerbit" value="{{$buku->penerbit}}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Tahun</label>
		    <input name="tahun_terbit" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tahun" value="{{$buku->tahun_terbit}}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Jumlah</label>
		    <input name="jumlah_buku" type="text" class="form-control" id="exampleInputPassword1" placeholder="Jumlah" value="{{$buku->jumlah_buku}}">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Deskripsi</label>
		    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$buku->deskripsi}}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect2">Lokasi Buku</label>
		    <select name="lokasi" class="form-control" id="exampleFormControlSelect2">
		      <option @if($buku->lokasi == 'Rak 1') selected @endif>Rak 1</option>
		      <option @if($buku->lokasi == 'Rak 2') selected @endif>Rak 2</option>
		      <option @if($buku->lokasi == 'Rak 3') selected @endif>Rak 3</option>
		    </select>
		  </div>
		  <button type="submit" class="btn btn-primary btn-warning">Update</button>
      </form>
  	  </div>
	</div>
@endsection