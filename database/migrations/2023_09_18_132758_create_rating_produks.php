<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingProduks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->unsignedBigInteger('rating_id');
            $table->foreign('rating_id')->references('id')->on('ratings');
            $table->integer('jumlah');
            $table->double('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::table('rating_produks', function (Blueprint $table) {
        $table->dropForeign(['produk_id']);
        $table->dropColumn('produk_id');
        $table->dropForeign(['rating_id']);
        $table->dropColumn('rating_id');
    });
        Schema::dropIfExists('rating_produks');
    }
}
