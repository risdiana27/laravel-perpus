<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->Increments('id');
            $table->String('judul',255);
            $table->String('isbn',25);
            $table->String('pengarang',255);
            $table->String('penerbit',255);
            $table->Integer('tahun_terbit');
            $table->Integer('jumlah_buku');
            $table->Text('deskripsi');
            $table->String('lokasi');
            $table->String('cover',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
