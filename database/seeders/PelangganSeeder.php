<?php

namespace Database\Seeders;
use DB;
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
            'noHp' => '082211334455',
            'alamat' => 'Jl. Terbaik No.1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sukolilo',
            'kodePos' => '10101',
            'user_id' => '1'
        ]);
        DB::table('pelanggans')->insert([
            'nama' => 'Gian Tanjung',
            'noHp' => '081122334455',
            'alamat' => 'Jl. Sawangan No.1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sukolilo',
            'kodePos' => '20202',
            'user_id' => '2'
        ]);
        DB::table('pelanggans')->insert([
            'nama' => 'Frederick Nelson Halim',
            'noHp' => '083322114455',
            'alamat' => 'Jl. Kenangan No.1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sawahan',
            'kodePos' => '30303',
            'user_id' => '3'
        ]);
        DB::table('pelanggans')->insert([
            'nama' => 'Bagus Surya Bumi',
            'noHp' => '084422113355',
            'alamat' => 'Jl. Jalan No. 1',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'kecamatan' => 'Sukosuko',
            'kodePos' => '40404',
            'user_id' => '4'
        ]);
    }
}
