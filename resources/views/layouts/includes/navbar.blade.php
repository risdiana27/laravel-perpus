<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<img src="{{asset('admin/assets/img/logo-book.png')}}" alt="Klorofil Logo" class="img-responsive logo" width="100" height="15">
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{auth()->user()->anggota->getAvatar()}}" class="img-circle" alt="Avatar"> <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/anggota/profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>