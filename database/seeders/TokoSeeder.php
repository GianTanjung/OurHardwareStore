<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'alamat' => 'Jl Ahmad Yani 41',
            'kecamata' => 'Gedangan',
            'kota' => 'Sidoarjo',
            'provinsi' => 'Jawa timur',
            'noTelp' => '081133308281',
            'kodePos' => '61254'
        ]);
        DB::table('tokos')->insert([
            'nama' => 'Depo Malang',
            'alamat' => 'Jl Raya Karanglo 69',
            'kecamata' => 'Blimbing',
            'kota' => 'Malanng',
            'provinsi' => 'Jawa timur',
            'noTelp' => '081133308281',
            'kodePos' => '65153'
        ]);
        DB::table('tokos')->insert([
            'nama' => 'Depo Surabaya',
            'alamat' => 'Jl Rajawali 55',
            'kecamata' => 'Krembangan',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa timur',
            'noTelp' => '089683213464',
            'kodePos' => '60175'
        ]);
        DB::table('tokos')->insert([
            'nama' => 'Depo Surabaya',
            'alamat' => 'Jl Kalilom Lor Indah 10',
            'kecamata' => 'Kedinding',
            'kota' => 'Surabaya',
            'provinsi' => 'Jawa timur',
            'noTelp' => '081133308281',
            'kodePos' => '60129'
        ]);
    }
}
