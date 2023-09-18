<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('content');
            $table->double('rating');
            $table->foreignId('pelanggan_id')->constrained('pelanggans');
            // $table->foreignId('produk_id')->constrained('detail_transaksis');
            // $table->foreignId('transaksi_id')->constrained('detail_transaksis');
            $table->timestamps();
        });
        DB::table('detail_transaksis') // Replace 'pivot_table_name' with your pivot table name
            ->select('produk_id') // Replace 'foreign_key_column' with the actual foreign key column name
            ->distinct()
            ->get()
            ->each(function ($row) {
                \DB::table('ratings')->insert([
                    'foreign_id' => $row->foreign_key_column,
                    // Set other column values as needed
                ]);
            });
            DB::table('detail_transaksis') // Replace 'pivot_table_name' with your pivot table name
            ->select('transaksi_id') // Replace 'foreign_key_column' with the actual foreign key column name
            ->distinct()
            ->get()
            ->each(function ($row) {
                \DB::table('ratings')->insert([
                    'foreign_id' => $row->foreign_key_column,
                    // Set other column values as needed
                ]);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::table('ratings', function (Blueprint $table) {
        $table->dropForeign(['pelanggan_id']);
        $table->dropColumn('pelanggan_id');
        $table->dropForeign(['produk_id']);
        $table->dropColumn('produk_id');
        $table->dropForeign(['transaksi_id']);
        $table->dropColumn('transaksi_id');
    });
        Schema::dropIfExists('ratings');
    }
}
