<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_toko_id');
            $table->foreign('produk_toko_id')->references('id')->on('produk_tokos');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksis');
            $table->integer('kuantitas');
            $table->double('total');       
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
        
        Schema::table('detail_transaksis', function (Blueprint $table) {
            $table->dropForeign(['produk_toko_id']);
            $table->dropColumn('produk_toko_id');
            $table->dropForeign(['transaksi_id']);
            $table->dropColumn('transaksi_id');
        });
        Schema::dropIfExists('detail_transaksis');
       
    }
};
