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
            'nama' => '10 Maret',
            'kode_promo' => 'DEPOBANGUNANMAR10',
            'deskripsi' => 'Promo 10 Maret nih bosque'
        ]);
        DB::table('promos')->insert([
            'nama' => '11 Mei',
            'kodePromo' => 'DEPOBANGUNANMEI11',
            'deskripsi' => 'Promo 11 Mei nih bosque'
        ]);
        DB::table('promos')->insert([
            'nama' => '1 Januari',
            'kodePromo' => 'DEPOBANGUNANJAN1',
            'deskripsi' => 'Promo 1 Januari nih bosque, Tahun Baru'
        ]);
    }
}
