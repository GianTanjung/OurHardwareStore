<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ulasans')->insert([
            'judul' => 'Review Barang',
            'ulasan' => 'Bagus',
            'rating' => '5',
            'produk_id' => '1',
            'pelanggan_id' => '1',
        ]);
        DB::table('ulasans')->insert([
            'judul' => 'Review Barang',
            'ulasan' => 'Bagus',
            'rating' => '3',
            'produk_id' => '1',
            'pelaggan_id' => '2',
        ]);
        DB::table('ulasans')->insert([
            'judul' => 'Review Barang',
            'ulasan' => 'Bagus',
            'rating' => '4',
            'produk_id' => '1',
            'pelaggan_id' => '3',
        ]);
        DB::table('ulasans')->insert([
            'judul' => 'Review Barang',
            'ulasan' => 'Bagus',
            'rating' => '5',
            'produk_id' => '1',
            'pelanggan_id' => '4',
        ]);
    }
}
