@section('js')
    <script type="text/javascript">
		function readURL() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).prev().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function () {
        $(".uploads").change(readURL)
        $("#f").submit(function(){
            // do ajax submit or just classic form submit
          //  alert("fake subminting")
            return false
        })
    })

      var check = function() {
	  if (document.getElementById('password').value ==
	    document.getElementById('confirm_password').value) {
	    document.getElementById('submit').disabled = false;
	    document.getElementById('message').style.color = 'green';
	    document.getElementById('message').innerHTML = 'matching';
	  } else {
	    document.getElementById('submit').disabled = true;
	    document.getElementById('message').style.color = 'red';
	    document.getElementById('message').innerHTML = 'not matching';
	  }
	}
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
							<h3 class="panel-title">Edit User</h3>
						</div>
						<div class="panel-body">
						<form action="/anggota/{{auth()->user()->id}}/ubah" method="POST" enctype="multipart/form-data">
				      	  {{csrf_field()}}
						  <div class="form-group">
						    <label for="exampleInputPassword1">Nama</label>
						    <input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" value="{{auth()->user()->name}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Username</label>
						    <input name="username" type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" value="{{auth()->user()->username}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Email</label>
						    <input name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="{{auth()->user()->email}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input id="password" type="password" class="form-control" onkeyup='check();' name="password">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Confirm Password</label>
						    <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation">
						     <span id='message'></span>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Avatar</label>
						    <img class="review" src="{{auth()->user()->anggota->getAvatar()}}" >
						    <input name="avatar" type="file" class="uploads form-control">
						  </div>
						  <br><br>
						  <button type="submit" class="btn btn-primary" id="submit">Update</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop