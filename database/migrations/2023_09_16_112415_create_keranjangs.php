<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->integer('kuantitas');
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks');
<<<<<<< Updated upstream
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')->references('id')->on('cities');
            $table->timestamps();
            
=======
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->references('id')->on('tokos');
            $table->timestamps();
>>>>>>> Stashed changes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keranjangs', function (Blueprint $table) {
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
<<<<<<< Updated upstream
            $table->dropForeign(['kota_id']);
            $table->dropColumn('kota_id');
=======
            $table->dropForeign(['toko_id']);
            $table->dropColumn('toko_id');
>>>>>>> Stashed changes
        });
        Schema::dropIfExists('keranjangs');
    }
}
