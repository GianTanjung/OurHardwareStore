<?php

namespace Database\Seeders;
use DB;
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
            'nama' => 'Sunlex'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Philps'
        ]);
        DB::table('merks')->insert([
            'nama' => 'NIppon Paint'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Aquaproof'
        ]);
    }
}
