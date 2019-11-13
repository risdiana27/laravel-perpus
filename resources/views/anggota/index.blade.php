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
						<h3 class="panel-title">Data Anggota</h3>
						<div class="right">
						  <a href="" class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#exampleModal">
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
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>No Telp</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data_anggota as $anggota)
								<tr>
									<td>
										<img src="{{$anggota->getAvatar()}}" class="cover-sm" style="margin-right: 10px;" />
										<a href="/anggota/{{$anggota->id}}/detail">{{$anggota->nama}}</a>
									</td>
									<td>{{$anggota->jenis_kelamin}}</td>
									<td>{{$anggota->no_telp}}</td>
									<td>{{$anggota->alamat}}</td>	
									<td>
										<a href="/anggota/{{$anggota->id}}/edit" class="btn btn-success btn-sm">
											<i class="fa fa-pencil">
											</i>
										</a>
										<a href="/anggota/{{$anggota->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin data ini akan dihapus?')">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="/anggota/create" method="POST" enctype="multipart/form-data">
      	  {{csrf_field()}}	

		  <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
		    <label>Nama</label>
		    <input name="nama" type="text" class="form-control" placeholder="Nama" value="{{old('nama')}}">
		    @if($errors->has('nama'))
				<span class="help-block">{{$errors->first('nama')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
		    <label>Username</label>
		    <input name="username" type="text" class="form-control" placeholder="Username" value="{{old('username')}}">
		    @if($errors->has('username'))
				<span class="help-block">{{$errors->first('username')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
		    <label>Email</label>
		    <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
		    @if($errors->has('email'))
				<span class="help-block">{{$errors->first('email')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('tempat_lahir') ? ' has-error' : ''}}">
		    <label>Tempat Lahr</label>
		    <input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
		    @if($errors->has('tempat_lahir'))
				<span class="help-block">{{$errors->first('tempat_lahir')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
		    <label>Tanggal Lahir</label>
		    <input name="tanggal_lahir" type="date" class="form-control" placeholder="Tanggal lahir" value="{{old('tanggal_lahir')}}">
		    @if($errors->has('tanggal_lahir'))
				<span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
		    <label >Jenis Kelamin</label>
		    <select name="jenis_kelamin" class="form-control">
		      <option value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? 'selected' : ''}}>Laki-laki</option>
			  <option value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? 'selected' : ''}}>Perempuan</option>
		    </select>
		    @if($errors->has('jenis_kelamin'))
				<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('no_telp') ? ' has-error' : ''}}">
		    <label>No Telp</label>
		    <input name="no_telp" type="text" class="form-control" placeholder="No Telp" value="{{old('no_telp')}}">
		    @if($errors->has('no_telp'))
				<span class="help-block">{{$errors->first('no_telp')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
		    <label>Alamat</label>
		    <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{old('alamat')}}">
		    @if($errors->has('alamat'))
				<span class="help-block">{{$errors->first('alamat')}}</span>
			@endif
		  </div>

		  <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
		    <label>Avatar</label>
		    <input name="avatar" type="file" class="form-control" value="{{old('avatar')}}">
		    @if($errors->has('avatar'))
				<span class="help-block">{{$errors->first('avatar')}}</span>
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