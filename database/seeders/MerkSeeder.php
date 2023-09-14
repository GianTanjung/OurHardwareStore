<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merks')->insert([
            'nama' => 'American Standard'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Asian Paints'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Avian'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Dekson'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Dulux'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Meridian'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Modena'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Mowilex'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Nippon Paint'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Panasonic'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Philips'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Roman'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Sandimas'
        ]);
    }
}
