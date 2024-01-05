<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tokos')->insert([
            'nama' => 'Depo Sidoarjo',
            'no_hp' => '081133308281',
            'alamat' => 'Jl Ahmad Yani 41',
            'kode_pos' => '61254',
            'kecamatan' => 'Gedangan',
            'kota' => 'Sidoarjo',
            'provinsi' => 'Jawa timur',
            'negara' => 'Indonesia',
        ]);
        DB::table('tokos')->insert([
            'nama' => 'Depo Malang',
            'no_hp' => '081133308281',
            'alamat' => 'Jl Raya Karanglo 69',
            'kode_pos' => '65153',
            'kecamatan' => 'Blimbing',
            'kota' => 'Malang',
            'provinsi' => 'Jawa timur',
            'negara' => 'Indonesia',
        ]);
        DB::table('tokos')->insert([
            'nama' => 'Depo Surabaya',
            'no_hp' => '089683213464',
            'alamat' => 'Jl Rajawali 55',
            'kode_pos' => '60175',
            'kecamatan' => 'Krembangan',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa timur',
            'negara' => 'Indonesia',
        ]);
    }
}
