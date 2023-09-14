<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_pembayarans')->insert([
            'nama' => 'Virtual Account'
        ]);
        DB::table('tipe_pembayarans')->insert([
            'nama' => 'Kartu Kredit'
        ]);
        DB::table('tipe_pembayarans')->insert([
            'nama' => 'Cash on Delivery'
        ]);
    }
}
