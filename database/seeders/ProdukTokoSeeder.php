<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_tokos')->insert([
            'produk_id' => '1',
            'toko_id' => '1',
            'stok' => '100'
        ]);
        DB::table('produk_tokos')->insert([
            'produk_id' => '1',
            'toko_id' => '2',
            'stok' => '200'
        ]);
        DB::table('produk_tokos')->insert([
            'produk_id' => '1',
            'toko_id' => '3',
            'stok' => '50'
        ]);
        DB::table('produk_tokos')->insert([
            'produk_id' => '1',
            'toko_id' => '4',
            'stok' => '110'
        ]);
    }
}
