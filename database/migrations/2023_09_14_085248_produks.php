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
            $table->unsignedBigInteger('merk_id');
            $table->foreign('merk_id')->references('id')->on('merks');
            $table->unsignedBigInteger('ruangan_id');
            $table->foreign('ruangan_id')->references('id')->on('ruangans');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->string('sku')->unique();
            $table->string('nama');
            $table->string('tipe');
            $table->string('foto_produk')->nullable();
            $table->double('harga');
            $table->integer('total_stok')->nullable();
            $table->string('publikasi')->nullable();
            $table->string('warna')->nullable();
            $table->string('permukaan')->nullable();
            $table->string('bentuk')->nullable();
            $table->string('material')->nullable();
            $table->string('finishing')->nullable();
            $table->string('penggunaan')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('volume')->nullable();
            $table->text('deskripsi')->nullable();
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
