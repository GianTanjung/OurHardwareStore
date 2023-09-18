<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTokos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_tokos', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('produk_id')->constrained('produks');
            $table->foreignId('toko_id')->constrained('tokos');
            $table->float('stok');
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
        Schema::table('produk_tokos', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
            $table->dropForeign(['toko_id']);
            $table->dropColumn('toko_id');
        });
        Schema::dropIfExists('produk_tokos');
    }
}
