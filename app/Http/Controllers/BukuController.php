<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function index(Request $request){
    	if($request->has('cari')){
    		$data_buku = \App\Buku::where('judul','LIKE','%'.$request->cari.'%')->get();
    	}else{
    		$data_buku = \App\Buku::all();
    	}
    	return view('buku.index',['data_buku' => $data_buku]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'judul' => 'required|min:3',
            'isbn' => 'required|numeric|unique:buku',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'jumlah_buku' => 'required|numeric',
            'lokasi' => 'required',
            'cover' => 'mimes:jpeg,png'
        ]);

    	$buku = \App\Buku::create($request->all());
        if($request->hasFile('cover')){
            $request->file('cover')->move('images/',$request->file('cover')->getClientOriginalName());
            $buku->cover = $request->file('cover')->getClientOriginalName();
            $buku->save();
        }
    	return redirect('/buku')->with('sukses','Data Berhasil Diinputkan');
    }

    public function edit($id) {
    	$buku = \App\Buku::find($id);
    	return view('buku.edit',['buku' => $buku]);
    }

    public function update(Request $request, $id) {
        $buku = \App\Buku::find($id);
    	$buku->update($request->all());
        if($request->hasFile('cover')){
            $request->file('cover')->move('images/',$request->file('cover')->getClientOriginalName());
            $buku->cover = $request->file('cover')->getClientOriginalName();
            $buku->save();
        }
    	return redirect('/buku')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id) {
    	$buku = \App\Buku::find($id);
    	$buku->delete();
    	return redirect('/buku')->with('sukses','Data Berhasil Di Hapus');
    }

    public function detail($id) {
        $buku = \App\Buku::find($id);
        return view('buku.detail',['buku' => $buku]);
    }

    public function export() 
    {
        return Excel::download(new BukuExport, 'Buku.xlsx');
    }
}
