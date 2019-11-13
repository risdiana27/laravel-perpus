<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = ['user_id', 'nama', 'jenis_kelamin', 'no_telp', 'alamat', 'tempat_lahir', 'tanggal_lahir','avatar'];

    public function getAvatar() {
    	if(!$this->avatar){
    		return asset('images/avatar.jpg');
    	}
    	return asset('images/'.$this->avatar);
    }

    public function transaksi(){
    	return $this->hasMany(Transaksi::class);
    }

    public function user() {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'avatar.jpg']);
    }
}
