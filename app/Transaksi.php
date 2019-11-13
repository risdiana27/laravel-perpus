<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['kode', 'anggota_id', 'buku_id', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket' ];

    public function anggota() {
    	return $this->belongsTo(Anggota::class);
    }

    public function buku() {
    	return $this->belongsTo(Buku::class);
    }
}
