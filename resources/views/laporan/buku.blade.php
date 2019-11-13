@extends('layouts.master')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Laporan Data Buku</h3>
						<div class="right">
						  <a href="/laporan/buku/excel" class="btn btn-primary btn-sm" >
						  	<i class="fa fa-download"> Export Excel</i>
						  </a>
						  <a href="/laporan/buku/pdf" class="btn btn-primary btn-sm" target="_blank">
						  	<i class="fa fa-download"> Export PDF</i>
						  </a>
						</div>
					</div>
					<div class="panel-body">

					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop