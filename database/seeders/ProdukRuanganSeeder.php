<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukRuanganSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET foreign_key_checks=0;');

        DB::table('produk_ruangans')->insert([
            [
                'produk_id' => 1,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 2,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 2,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 2,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 2,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 2,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 3,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 3,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 3,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 3,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 3,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 3,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 4,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 4,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 4,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 5,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 5,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 5,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 5,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 6,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 7,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 7,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 7,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 7,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 7,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 8,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 9,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 10,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 10,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 10,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 10,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 10,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 10,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 11,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 11,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 11,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 11,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 11,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 11,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 12,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 12,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 12,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 12,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 12,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 12,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 13,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 13,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 13,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 13,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 13,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 13,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 14,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 14,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 14,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 14,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 14,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 14,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 15,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 15,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 15,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 15,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 15,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 15,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 16,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 17,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 6,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 1,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 2,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 3,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 4,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 5,
            ],
            [
                'produk_id' => 18,
                'ruangan_id' => 6,
            ],
        ]);

        DB::statement('SET foreign_key_checks=1;');
    }
}
