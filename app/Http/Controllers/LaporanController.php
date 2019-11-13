<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BukuExport;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use \App\Transaksi;
use Auth;
use PDF;

class LaporanController extends Controller
{
	 public function buku() {
    	return view('laporan.buku');
    }

    public function bukuExcel() 
    {
        return Excel::download(new BukuExport, 'Buku_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function bukuPdf() {
    	$buku = \App\Buku::all();
    	$pdf = PDF::loadview('laporan.bukupdf',['buku' => $buku]);
    	return $pdf->stream('Buku_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function transaksi() {
    	return view('laporan.transaksi');
    }

     public function transaksiExcel() 
    {   
        return Excel::download(new TransaksiExport, 'Transaksi_'.date('Y-m-d_H-i-s').'.xlsx');
    }

    public function transaksiPdf() {
    	if(Auth::user()->role == 'user')
        {
            $data_transaksi = Transaksi::where('anggota_id', Auth::user()->anggota->id)->get();
        } else {
            $data_transaksi = Transaksi::get();
        }
    	$pdf = PDF::loadview('laporan.transaksipdf',['data_transaksi' => $data_transaksi]);
    	return $pdf->stream('Transaksi_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
