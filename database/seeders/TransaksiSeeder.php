<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksis')->insert([
            ['tanggalTransaksi' => '2023-09-11 06:51:11.000000',
            'tanggalBayar' => '2023-09-11 06:51:11.000000',
            'status' => 'Selesai',
            'grandTotal' => '195800',
            'pengiriman' => 'Ambil Toko',
            'promo_id' => '1',
            'pembayaran_id' => '1',
            'toko_id' => '1'],
            ['tanggalTransaksi' => '2023-10-11 06:51:11.000000',
            'tanggalBayar' => '2023-10-11 06:51:11.000000',
            'status' => 'Selesai',
            'grandTotal' => '365500',
            'pengiriman' => 'Antar Di tempat',
            'promo_id' => '2',
            'pembayaran_id' => '2',
            'toko_id' => '2'],
            ['tanggalTransaksi' => '2023-10-13 06:51:11.000000',
            'tanggalBayar' => '2023-10-13 06:51:11.000000',
            'status' => 'Selesai',
            'grandTotal' => '113600',
            'pengiriman' => 'Antar Di tempat',
            'promo_id' => '3',
            'pembayaran_id' => '3',
            'toko_id' => '3'],
            ['tanggalTransaksi' => '2023-11-13 06:51:11.000000',
            'tanggalBayar' => '2023-11-13 06:51:11.000000',
            'status' => 'Selesai',
            'grandTotal' => '5172900',
            'pengiriman' => 'Ambil Toko',
            'promo_id' => '3',
            'pembayaran_id' => '3',
            'toko_id' => '3'],
            ['tanggalTransaksi' => '2023-12-11 06:51:11.000000',
            'tanggalBayar' => '2023-12-11 06:51:11.000000',
            'status' => 'Selesai',
            'grandTotal' => '4859000',
            'pengiriman' => 'Antar Di tempat',
            'promo_id' => '2',
            'pembayaran_id' => '2',
            'toko_id' => '2'],
            ['tanggalTransaksi' => '2023-12-27 06:51:11.000000',
            'tanggalBayar' => '2023-12-27 06:51:11.000000',
            'status' => 'Selesai',
            'grandTotal' => '13567444',
            'pengiriman' => 'Ambil Toko',
            'promo_id' => '1',
            'pembayaran_id' => '1',
            'toko_id' => '1'],
        ]);
    }
}
