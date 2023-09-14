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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggalTransaksi');
            $table->dateTime('tanggalBayar');
            $table->string('status');
            $table->double('grandTotal');
            $table->enum('pengiriman', ['Ambil Toko','Antar Di tempat']);         
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->preferences('id')->on('transaksis');
            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')->preferences('id')->on('transaksis');
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->preferences('id')->on('transaksis');
            $table->unsignedBigInteger('pembayaran_id');
            $table->foreign('pembayaran_id')->preferences('id')->on('transaksis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function(Blueprint $table){
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
            $table->dropForeign(['promo_id']);
            $table->dropColumn('promo_id');
            $table->dropForeign(['toko_id']);
            $table->dropColumn('toko_id');
            $table->dropForeign(['pembayaran_id']);
            $table->dropColumn('pembayaran_id');
        });
        Schema::dropIfExists('transaksis');
    }
};
