<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				@if(auth()->user()->role == 'admin')
				<li><a href="/buku" class=""><i class="lnr lnr-book"></i> <span>Buku</span></a></li>
				<li><a href="/anggota" class=""><i class="lnr lnr-users"></i> <span>Anggota</span></a></li>
				@endif
				<li><a href="/transaksi" class=""><i class="fa fa-pencil-square-o"></i> <span>Transaksi</span></a></li>
				<li>
				<a href="#subPages" data-toggle="collapse" class="collapsed" aria-expanded="false"><i class="fa fa-print"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
				<div id="subPages" class="collapse" aria-expanded="false" style="height: 0px;">
					<ul class="nav">
						<li><a href="/laporan/buku" class="">Laporan Buku</a></li>
						<li><a href="/laporan/transaksi" class="">Laporan Transaksi</a></li>
					</ul>
				</div>
				</li>
			</ul>
		</nav>
	</div>
</div>