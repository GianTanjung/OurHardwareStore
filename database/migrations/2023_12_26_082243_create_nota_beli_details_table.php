<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_beli_details', function (Blueprint $table) {
            $table->unsignedBigInteger('nota_beli_id');
            $table->foreign('nota_beli_id')->references('id')->on('nota_belis');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->double('harga');
            $table->integer('qty');
            $table->double('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota_beli_details', function (Blueprint $table) {
            $table->dropForeign(['nota_beli_id']);
            $table->dropColumn('nota_beli_id');
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
        });
        Schema::dropIfExists('nota_beli_details');
    }
};
