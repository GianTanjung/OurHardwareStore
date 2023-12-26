<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promos')->insert([
            'kode_promo' => 'DEPOBANGUNANDISC10',
            'tipe' => 'Diskon',
            'angka_diskon_cb' => '10',
            'harga_maks' => '50000',
            'deskripsi' => 'Diskon 10% dengan maksimal diskon senilai Rp50.000. Promo berlaku mulai tanggal 1 Desember 2023 - 31 Desember 2023'
        ]);
        // DB::table('promos')->insert([
        //     'kode_promo' => 'DEPOBANGUNANCB10',
        //     'tipe' => 'Cashback',
        //     'angka_diskon_cb' => '10',
        //     'harga_maks' => '50000',
        //     'deskripsi' => 'Cashback 10% dengan maksimal cashback senilai Rp50.000. Promo berlaku mulai tanggal 1 Desember 2023 - 31 Desember 2023. Cashback berupa poin'
        // ]);
        DB::table('promos')->insert([
            'kode_promo' => 'DPBNGNGRATISONGKIR',
            'tipe' => 'Gratis Ongkir',
            'deskripsi' => 'Gratis ongkir ke seluruh Indonesia. Promo berlaku mulai tanggal 1 Desember 2023 - 31 Desember 2023'
        ]);
        DB::table('promos')->insert([
            'kode_promo' => 'DEPOBANGUNANJAN1',
            'angka_diskon_cb' => '15',
            'harga_maks' => '100000',
            'deskripsi' => 'Promo 1 Januari nih bosque, Tahun Baru'
        ]);
    }
}
