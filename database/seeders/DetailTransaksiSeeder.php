<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks=0;');
        DB::table('detail_transaksis')->insert([
            ['produk_toko_id' => '1',
                'transaksi_id' => '1',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '2',
                'transaksi_id' => '1',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '2',
                'transaksi_id' => '2',
                'kuantitas' => '5',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '3',
                'transaksi_id' => '3',
                'kuantitas' => '4',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '4',
                'transaksi_id' => '3',
                'kuantitas' => '4',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '5',
                'transaksi_id' => '4',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '6',
                'transaksi_id' => '4',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '7',
                'transaksi_id' => '4',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '7',
                'transaksi_id' => '5',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '8',
                'transaksi_id' => '5',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '9',
                'transaksi_id' => '6',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '10',
                'transaksi_id' => '6',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '13',
                'transaksi_id' => '6',
                'kuantitas' => '5',
                'total' => '800000',
                'diskon' => '0'],
            ['produk_toko_id' => '17',
                'transaksi_id' => '6',
                'kuantitas' => '1',
                'total' => '800000',
                'diskon' => '0']
        ]);
        DB::statement('SET foreign_key_checks=1;');
    }
}
