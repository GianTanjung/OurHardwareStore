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
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('transaksis');
            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('transaksis');
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->references('id')->on('transaksis');
            $table->unsignedBigInteger('pembayaran_id');
            $table->foreign('pembayaran_id')->references('id')->on('transaksis');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
