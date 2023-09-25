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
            $table->dateTime('tanggal_transaksi');
            $table->dateTime('tanggal_jatuh_tempo');
            $table->datetime('tanggal_bayar');
            $table->enum('status',['Sudah Bayar','Menunggu Pembayaran','Dibatalkan','Selesai']);
            $table->double('grand_total');
            $table->enum('pengiriman', ['Ambil Toko','Antar Di tempat']);      
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promos');
            $table->unsignedBigInteger('pembayaran_id');
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans');   
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->references('id')->on('tokos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
            $table->dropForeign(['promo_id']);
            $table->dropColumn('promo_id');
            $table->dropForeign(['pembayaran_id']);
            $table->dropColumn('pembayaran_id');
            $table->dropForeign(['toko_id']);
            $table->dropColumn('toko_id');
        });
        Schema::dropIfExists('transaksis');
    }
};
