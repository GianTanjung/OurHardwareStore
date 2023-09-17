<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'produk_id' => '1',
        ]);
        DB::table('keranjangs')->insert([
            'kuantitas' => '1',
            'pelanggan_id' => '2',
            'produk_id' => '1',
        ]);
        DB::table('keranjangs')->insert([
            'kuantitas' => '5',
            'pelanggan_id' => '3',
            'produk_id' => '1',
        ]);
        DB::table('keranjangs')->insert([
            'kuantitas' => '3',
            'pelanggan_id' => '4',
            'produk_id' => '1',
        ]);
    }
}
