<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('content');
            $table->double('rating');
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->unsignedBigInteger('dt_produk_toko_id');
            $table->foreign('dt_produk_toko_id')->references('produk_toko_id')->on('detail_transaksis');
            $table->unsignedBigInteger('dt_transaksi_id');
            $table->foreign('dt_transaksi_id')->references('transaksi_id')->on('detail_transaksis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::table('ratings', function (Blueprint $table) {
        $table->dropForeign(['pelanggan_id']);
        $table->dropColumn('pelanggan_id');
        $table->dropForeign(['dt_produk_toko_id']);
        $table->dropColumn('dt_produk_toko_id');
        $table->dropForeign(['dt_transaksi_id']);
        $table->dropColumn('dt_transaksi_id');
    });
        Schema::dropIfExists('ratings');
    }
}
