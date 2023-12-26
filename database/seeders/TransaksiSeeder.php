<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiSeeder extends Seeder
{

    public function run()
    {
        DB::table('transaksis')->insert([
            ['tanggal_transaksi' => Carbon::now(),
                'tanggal_jatuh_tempo' => Carbon::now()->addDays(7),
                'tanggal_bayar' => Carbon::now()->subDays(3),
                'kode_nota' => 'SBYINV16720974',
                'status' => 'Selesai',
                'subtotal' => 195800,
                'biaya_pengiriman' => 0,
                'harga_diskon' => 19580,
                'biaya_pajak' => 19384,
                'grand_total' => 195604,
                'pengiriman' => 'Ambil Toko',
                'pelanggan_id' => 1,
                'promo_id' => 1,
                'pembayaran_id' => 1,
                'toko_id' => 1],

            ['tanggal_transaksi' => '2023-10-11 06:51:11',
                'tanggal_jatuh_tempo' => '2023-09-11 06:51:11',
                'tanggal_bayar' => '2023-10-11 06:51:11',
                'kode_nota' => 'SBYINV16720935',
                'status' => 'Selesai',
                'subtotal' => 365500,
                'biaya_pengiriman' => 0,
                'harga_diskon' => null,
                'biaya_pajak' => 40205,
                'grandTotal' => 405705,
                'pengiriman' => 'Antar Di tempat',
                'pelanggan_id' => 2,
                'promo_id' => 2,
                'pembayaran_id' => 2,
                'toko_id' => 2],

            ['tanggal_transaksi' => '2023-10-13 06:51:11',
                'tanggal_jatuh_tempo' => '2023-09-11 06:51:11',
                'tanggal_bayar' => '2023-10-13 06:51:11',
                'kode_nota' => 'SBYINV16720912',
                'status' => 'Selesai',
                'subtotal' => 113600,
                'biaya_pengiriman' => 50000,
                'harga_diskon' => 16360,
                'biaya_pajak' => 16196,
                'grandTotal' => 163436,
                'pengiriman' => 'Antar Di tempat',
                'pelanggan_id' => 3,
                'promo_id' => 1,
                'pembayaran_id' => 3,
                'toko_id' => 3],

            ['tanggal_transaksi' => '2023-11-13 06:51:11',
                'tanggal_jatuh_tempo' => '2023-09-11 06:51:11',
                'tanggal_bayar' => '2023-11-13 06:51:11',
                'kode_nota' => 'SBYINV16720944',
                'status' => 'Selesai',
                'subtotal' => 5172900,
                'biaya_pengiriman' => 0,
                'harga_diskon' => null,
                'biaya_pajak' => 569019,
                'grandTotal' => 5741919,
                'pengiriman' => 'Ambil Toko',
                'pelanggan_id' => 1,
                'promo_id' => null,
                'pembayaran_id' => 3,
                'toko_id' => 3],

            ['tanggal_transaksi' => '2023-12-11 06:51:11',
                'tanggal_jatuh_tempo' => '2023-09-11 06:51:11',
                'tanggal_bayar' => '2023-12-11 06:51:11',
                'kode_nota' => 'SBYINV16720989',
                'status' => 'Selesai',
                'subtotal' => 4859000,
                'biaya_pengiriman' => 0,
                'harga_diskon' => null,
                'biaya_pajak' => 534490,
                'grandTotal' => 5393490,
                'pengiriman' => 'Antar Di tempat',
                'pelanggan_id' => 2,
                'promo_id' => 2,
                'pembayaran_id' => 2,
                'toko_id' => 2],

            ['tanggal_transaksi' => '2023-12-27 06:51:11',
                'tanggal_jatuh_tempo' => '2023-09-11 06:51:11',
                'tanggal_bayar' => '2023-12-27 06:51:11',
                'kode_nota' => 'SBYINV16720908',
                'status' => 'Selesai',
                'subtotal' => 13567444,
                'biaya_pengiriman' => 0,
                'harga_diskon' => 50000,
                'biaya_pajak' => 1486918,
                'grandTotal' => 15004362,
                'pengiriman' => 'Ambil Toko',
                'pelanggan_id' => 3,
                'promo_id' => 1,
                'pembayaran_id' => 1,
                'toko_id' => 1],
        ]);
    }
}
