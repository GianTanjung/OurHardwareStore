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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->double('biayaAdmin');          
        });
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->unsignedBigInteger('tipePembayaran_id');
            $table->foreign('tipePembayaran_id')->preferences('id')->on('pembayarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayarans', function(Blueprint $table){
            $table->dropForeign(['tipePembayaran_id']);
            $table->dropColumn('tipePembayaran_id');
        });
        Schema::dropIfExists('pembayarans');
    }
};
