<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\Buku;
use App\Transaksi;
use Auth;

class DashboardController extends Controller
{
    public function index() {
    	$transaksi = Transaksi::get();
        $anggota   = Anggota::get();
        $buku      = Buku::get();
        if(Auth::user()->role == 'user')
        {
            $data = Transaksi::where('status', 'pinjam')
                                ->where('anggota_id', Auth::user()->anggota->id)
                                ->get();
        } else {
            $data = Transaksi::where('status', 'pinjam')->get();
        }
        return view('dashboards.index', compact('transaksi', 'anggota', 'buku', 'data'));
    }
}
