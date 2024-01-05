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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_nota')->unique();
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->references('id')->on('tokos');
            $table->timestamp('tanggal_transaksi')->default(now());
            $table->enum('status',['Diproses', 'Dikirim', 'Siap Diambil', 'Selesai']);
            $table->double('subtotal');
            $table->enum('pengiriman', ['Ambil Toko','Antar Di tempat']);
            $table->string('tipe_jasa_kirim')->nullable();
            $table->double('biaya_pengiriman')->nullable();
            $table->double('biaya_pajak');
            $table->double('grand_total')->nullable();
            $table->double('poin')->nullable();
            $table->text('keterangan')->nullable();      
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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
            $table->dropForeign(['toko_id']);
            $table->dropColumn('toko_id');
        });
        Schema::dropIfExists('transaksis');
    }
};
