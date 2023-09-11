<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function(Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->double('hargaAsli');
            $table->double('hargaSpesial');
            $table->float('diskon');
            $table->string('fotoProduk');
            $table->string('ukuran');
            $table->integer('stok');
            $table->string('warna');
            $table->dateTime('tanggalMulaiHargaSpesial');
            $table->dateTime('tanggalAkhirHargaSpesial');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
