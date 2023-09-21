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
        DB::table('detail_transaksis')->insert([
            ['produk_id' => '1',
            'transaksi_id' => '1',
            'kuantitas' => '1'],
            ['produk_id' => '2',
            'transaksi_id' => '1',
            'kuantitas' => '1'],
            ['produk_id' => '2',
            'transaksi_id' => '2',
            'kuantitas' => '5'],
            ['produk_id' => '3',
            'transaksi_id' => '3',
            'kuantitas' => '4'],
            ['produk_id' => '4',
            'transaksi_id' => '3',
            'kuantitas' => '4'],
            ['produk_id' => '5',
            'transaksi_id' => '4',
            'kuantitas' => '1'],
            ['produk_id' => '6',
            'transaksi_id' => '4',
            'kuantitas' => '1'],
            ['produk_id' => '7',
            'transaksi_id' => '4',
            'kuantitas' => '1'],
            ['produk_id' => '7',
            'transaksi_id' => '5',
            'kuantitas' => '1'],
            ['produk_id' => '8',
            'transaksi_id' => '5',
            'kuantitas' => '1'],
            ['produk_id' => '9',
            'transaksi_id' => '6',
            'kuantitas' => '1'],
            ['produk_id' => '10',
            'transaksi_id' => '6',
            'kuantitas' => '1'],
            ['produk_id' => '13',
            'transaksi_id' => '6',
            'kuantitas' => '5'],
            ['produk_id' => '17',
            'transaksi_id' => '6',
            'kuantitas' => '1']
        ]);
    }
}
