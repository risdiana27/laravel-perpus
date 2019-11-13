<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['judul', 'isbn', 'pengarang', 'penerbit', 'tahun_terbit', 'jumlah_buku', 'deskripsi', 'lokasi', 'cover'];

    public function getCover() {
    	if(!$this->cover){
    		return asset('images/default.png');
    	}
    	return asset('images/'.$this->cover);
    }

    public function transaksi() {
    	return $this->hasMany(Transaksi::class);
    }
}
