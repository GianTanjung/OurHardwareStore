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
            'biaya_admin' => '1000',
            'tipe_pembayaran_id' => '1'
        ]);
        DB::table('pembayarans')->insert([
            'nama' => 'BCA Kredit',
            'biaya_admin' => '1000',
            'tipe_pembayaran_id' => '1'
        ]);
        DB::table('pembayarans')->insert([
            'nama' => 'Cash On Delivery',
            'biaya_admin' => '0',
            'tipe_pembayaran_id' => '1'
        ]);
    }
}
