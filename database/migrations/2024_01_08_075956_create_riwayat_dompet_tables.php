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
        Schema::create('riwayat_dompets', function (Blueprint $table) {
            $table->id();
            $table->double('dana');
            $table->enum('arus', ['Masuk', 'Keluar']);
            $table->tinyInteger('validasi_topup');
            $table->dateTime('tanggal');
            $table->string('bukti_transfer')->nullable();
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
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
        Schema::dropIfExists('riwayat_dompets');
        Schema::table('riwayat_dompets', function (Blueprint $table) {
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
        });
    }
};
