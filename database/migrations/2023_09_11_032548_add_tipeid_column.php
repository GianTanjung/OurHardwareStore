<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipeidColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function(Blueprint $table) {
            $table->unsignedBigInteger('tipe_id');
            $table->foreign('tipe_id')->references('id')->on('tipes');
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
            $table->dropForeign(['tipe_id']);
            $table->dropColumn('tipe_id');
        });
    }
}
