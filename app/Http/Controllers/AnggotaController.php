<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AnggotaController extends Controller
{
    public function index() {
        $data_anggota = \App\Anggota::all();
    	return view('anggota.index',['data_anggota' => $data_anggota]);
    }

     public function create(Request $request) {
        $this->validate($request,[
            'nama' => 'required|min:3',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'avatar' => 'mimes:jpeg,png'
        ]);

        //insert ke table Users
        $user = new \App\User;
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->role = 'user';
        $user->email = $request->email;
        $user->password = bcrypt('xperiasola');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke table anggota
        $request->request->add(['user_id' => $user->id]);
    	$anggota = \App\Anggota::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $anggota->avatar = $request->file('avatar')->getClientOriginalName();
            $anggota->save();
        }
    	return redirect('/anggota')->with('sukses','Data Berhasil Diinputkan');
    }

    public function edit($id) {
    	$anggota = \App\Anggota::find($id);
    	return view('anggota.edit',['anggota' => $anggota]);
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'nama' => 'required|min:3',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'avatar' => 'mimes:jpeg,png'
        ]);
        $anggota = \App\Anggota::find($id);
    	$anggota->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $anggota->avatar = $request->file('avatar')->getClientOriginalName();
            $anggota->save();
        }
    	return redirect('/anggota')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id) {
    	$anggota = \App\Anggota::find($id);
        $anggota->user->where('id', $anggota->user_id)->delete();
    	$anggota->delete();
    	return redirect('/anggota')->with('sukses','Data Berhasil Di Hapus');
    }

    public function detail($id) {
        $anggota = \App\Anggota::find($id);
        return view('anggota.detail',['anggota' => $anggota]);
    }

    public function setting(){
        return view('anggota.profile');
    }

    public function ubah(Request $request, $id) {
        $user = \App\User::find($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if($request->input('password')) {
            $user->password= bcrypt(($request->input('password')));
        }
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $user->anggota->avatar = $request->file('avatar')->getClientOriginalName();
            $user->anggota->save();
        }

        $user->anggota->nama = $request->input('name');
        $user->anggota->save();

        $user->update();

         
        
        return redirect('/dashboard')->with('sukses','Data Berhasil Di Update');
    }


}
