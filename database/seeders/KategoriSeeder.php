<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama' =>'Builder Hardwares'],
            ['nama' =>'Electrical'],
            ['nama' =>'Housewares'],
            ['nama' =>'Paints'],
            ['nama' =>'Plumbing & Sanitary'],
            ['nama' =>'Flooring'],
            ['nama' =>'Tools & Others']
        ]);
    }
}
