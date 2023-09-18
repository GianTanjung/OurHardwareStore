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
            $table->foreignId('produk_id')->constrained('produks');
            $table->foreignId('pelanggan_id')->constrained('pelanggans');
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
        Schema::table('keranjangs', function (Blueprint $table) {
            $table->dropForeign(['pelaggan_id']);
            $table->dropColumn('pelanggan_id');
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
        });
        Schema::dropIfExists('keranjangs');
    }
}
