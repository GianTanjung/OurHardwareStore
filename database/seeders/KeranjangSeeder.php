<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keranjangs')->insert([
            'kuantitas' => '10',
            'pelanggan_id' => '1',
            'produks_id' => '1',
        ]);
        DB::table('keranjangs')->insert([
            'kuantitas' => '1',
            'pelanggan_id' => '2',
            'produks_id' => '1',
        ]);
        DB::table('keranjangs')->insert([
            'kuantitas' => '5',
            'pelanggan_id' => '3',
            'produks_id' => '1',
        ]);
        DB::table('keranjangs')->insert([
            'kuantitas' => '3',
            'pelanggan_id' => '4',
            'produks_id' => '1',
        ]);
    }
}
