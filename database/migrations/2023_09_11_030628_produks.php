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
            $table->string('deskripsi');
            $table->string('fotoProduk');
            $table->string('tipe');
            $table->double('harga');
            $table->string('warna');
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
        Schema::table('produks', function (Blueprint $table) {
            $table->dropForeign(['merk_id']);
            $table->dropColumn('merk_id');
            $table->dropForeign(['ruangan_id']);
            $table->dropColumn('ruangan_id');
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
        Schema::dropIfExists('produks');
    }
}
