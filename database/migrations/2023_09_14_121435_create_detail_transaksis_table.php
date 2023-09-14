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
        Schema::table('detail_transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->preferences('id')->on('detail_transaksis');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->preferences('id')->on('detail_transaksis');
        });
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->integer('kuantitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_transaksis', function(Blueprint $table){
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
            $table->dropForeign(['transaksi_id']);
            $table->dropColumn('transaksi_id');
        });
        Schema::dropIfExists('detail_transaksis');
    }
};
