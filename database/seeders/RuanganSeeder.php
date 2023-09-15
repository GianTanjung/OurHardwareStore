<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruangans')->insert([
            ['nama' =>'Dapur'],
            ['nama' =>'Ruang Tamu'],
            ['nama' =>'Kamar Tidur'],
            ['nama' =>'Ruang Makan'],
            ['nama' =>'Luar Ruang'],
            ['nama' =>'Kamar Mandi']
        ]);
    }
}
