<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMerkidColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function(Blueprint $table) {
            $table->unsignedBigInteger('merk_id');
            $table->foreign('merk_id')->references('id')->on('merks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produks', function(Blueprint $table){
            $table->dropForeign(['merk_id']);
            $table->dropColumn('merk_id');
        });
    }
}
