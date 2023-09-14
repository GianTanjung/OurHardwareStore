<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembayarans')->insert([
            'nama' => 'BCA VA',
            'biayaAdmin' => '1000'
        ]);
        DB::table('pembayarans')->insert([
            'nama' => 'BCA Kredit',
            'biayaAdmin' => '1000'
        ]);
        DB::table('pembayarans')->insert([
            'nama' => 'Cash On Delivery',
            'biayaAdmin' => '0'
        ]);
    }
}
