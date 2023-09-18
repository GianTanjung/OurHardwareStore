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
            $table->double('biaya_admin');          
            $table->unsignedBigInteger('tipe_pembayaran_id');
            $table->foreign('tipe_pembayaran_id')->references('id')->on('tipe_pembayarans');
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
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['tipe_pembayaran_id']);
            $table->dropColumn('tipe_pembayaran_id');
        });
        Schema::dropIfExists('pembayarans');
    }
};
