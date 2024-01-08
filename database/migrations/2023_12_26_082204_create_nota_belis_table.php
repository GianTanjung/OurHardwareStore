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
        Schema::create('nota_belis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_nota');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->references('id')->on('tokos');
            $table->timestamp('tgl_pesan');
            $table->timestamp('tgl_terima')->nullable();
            $table->double('grand_total');
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
        Schema::table('nota_belis', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropColumn('supplier_id');
            $table->dropForeign(['toko_id']);
            $table->dropColumn('toko_id');
        });
        Schema::dropIfExists('nota_belis');
    }
};
