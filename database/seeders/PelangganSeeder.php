<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggans')->insert([
            'nama' => 'Chelsea Clarista Valencia',
            'no_hp' => '082211334455',
            'alamat' => 'Jl. Terbaik No.1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sukolilo',
            'kode_pos' => '10101',
            'user_id' => '1'
        ]);
        DB::table('pelanggans')->insert([
            'nama' => 'Gian Tanjung',
            'no_hp' => '081122334455',
            'alamat' => 'Jl. Sawangan No.1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sukolilo',
            'kode_pos' => '20202',
            'user_id' => '2'
        ]);
        DB::table('pelanggans')->insert([
            'nama' => 'Frederick Nelson Halim',
            'no_hp' => '083322114455',
            'alamat' => 'Jl. Kenangan No.1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sawahan',
            'kode_pos' => '30303',
            'user_id' => '3'
        ]);
        DB::table('pelanggans')->insert([
            'nama' => 'Bagus Surya Bumi',
            'no_hp' => '084422113355',
            'alamat' => 'Jl. Jalan No. 1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sukosuko',
            'kode_pos' => '40404',
            'user_id' => '4'
        ]);
    }
}
