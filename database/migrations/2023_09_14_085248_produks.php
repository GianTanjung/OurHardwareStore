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
            $table->unsignedBigInteger('sales_uoms_id');
            $table->foreign('sales_uoms_id')->references('id')->on('sales_uoms');
            $table->string('sku')->unique();
            $table->string('nama');
            $table->string('fotoProduk');
            $table->string('tipe');
            $table->double('harga');
            $table->enum('publikasi', ['Ya', 'Tidak']);
            $table->double('lebar');
            $table->double('panjang');
            $table->double('tinggi');
            $table->double('berat');
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
            $table->dropForeign(['sales_uoms_id']);
            $table->dropColumn('sales_uoms_id');
        });
        Schema::dropIfExists('produks');
    }
}
