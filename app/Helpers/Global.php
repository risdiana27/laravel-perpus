<?php

use App\Anggota;
use App\Buku;
use App\Transaksi;

function totalBuku() {
	return Buku::count();
}

function totalAnggota() {
	return Anggota::count();
}

function totalTransaksi() {
	return Transaksi::count();
}

function tanggal() {
	$tgl = Carbon\Carbon::now();
	return $tgl->formatLocalized('%d %B %Y');
}

?>