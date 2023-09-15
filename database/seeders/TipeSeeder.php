<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama' =>'Accessories',
            'kategori_id' =>'1'],
            ['nama' =>'Jendela',
            'kategori_id' =>'1'],
            ['nama' =>'Handle',
            'kategori_id' =>'1'],
            ['nama' =>'Kusen',
            'kategori_id' =>'1'],
            ['nama' =>'Accessories',
            'kategori_id' =>'2'],
            ['nama' =>'Kabel',
            'kategori_id' =>'2'],
            ['nama' =>'Keramik',
            'kategori_id' =>'3'],
            ['nama' =>'Laminate',
            'kategori_id' =>'3'],
            ['nama' =>'Furniture',
            'kategori_id' =>'4'],
            ['nama' =>'Kitchen Equipment',
            'kategori_id' =>'4'],
            ['nama' =>'Penyejuk Ruangan',
            'kategori_id' =>'4'],
            ['nama' =>'Penyimpanan Makanan',
            'kategori_id' =>'4'],
            ['nama' =>'Peralatan Kebersihan',
            'kategori_id' =>'4'],
            ['nama' =>'Cat',
            'kategori_id' =>'5'],
            ['nama' =>'Lem & Sealants',
            'kategori_id' =>'5'],
            ['nama' =>'Semen & Semen Additive',
            'kategori_id' =>'5'],
            ['nama' =>'Pompa',
            'kategori_id' =>'6'],
            ['nama' =>'Tangki Air',
            'kategori_id' =>'6'],
            ['nama' =>'Water Heater',
            'kategori_id' =>'6'],
            ['nama' =>'Sanitary',
            'kategori_id' =>'6'],
            ['nama' =>'Automotives',
            'kategori_id' =>'7'],
            ['nama' =>'Fastener',
            'kategori_id' =>'7'],
            ['nama' =>'Handtools',
            'kategori_id' =>'7'],
            ['nama' =>'Lawn & Garden',
            'kategori_id' =>'7'],
            ['nama' =>'Powertools',
            'kategori_id' =>'7'],
        ]);
    }
}
