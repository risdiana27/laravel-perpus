<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'user')
        {
            $data_transaksi = Transaksi::where('anggota_id', Auth::user()->anggota->id)->get();
        } else {
            $data_transaksi = Transaksi::get();
        }
        return view('transaksi.index', compact('data_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = \App\Transaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "TR00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "TR0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "TR000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "TR00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "TR0".''.($lastId->id + 1);
            } else {
                    $kode = "TR".''.($lastId->id + 1);
            }
        }

        $data_buku = \App\Buku::where('jumlah_buku', '>', 0)->get();
        $data_anggota = \App\Anggota::get();
        return view('transaksi.create', compact('data_buku', 'kode', 'data_anggota'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = \App\Transaksi::create([
                'kode' => $request->get('kode'),
                'anggota_id' => $request->get('anggota_id'),
                'buku_id' => $request->get('buku_id'),
                'tgl_pinjam' => $request->get('tgl_pinjam'),
                'tgl_kembali' => $request->get('tgl_kembali'),
                'ket' => $request->get('ket'),
                'status' => 'pinjam'
            ]);

        $transaksi->buku->where('id', $transaksi->buku_id)
                        ->update([
                            'jumlah_buku' => ($transaksi->buku->jumlah_buku - 1),
                            ]);

        return redirect()->route('transaksi.index')->with('sukses','Data Berhasil Diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = \App\Transaksi::find($id);
        return view('transaksi.detail',['transaksi' => $transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = \App\Transaksi::find($id);

        $transaksi->update([
                'status' => 'kembali'
                ]);

        $transaksi->buku->where('id', $transaksi->buku->id)
                        ->update([
                            'jumlah_buku' => ($transaksi->buku->jumlah_buku + 1),
                            ]);

        return redirect()->route('transaksi.index')->with('sukses','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = \App\Transaksi::find($id)->delete();
        return redirect()->route('transaksi.index')->with('sukses','Data Berhasil Dihapus');
    }
}
