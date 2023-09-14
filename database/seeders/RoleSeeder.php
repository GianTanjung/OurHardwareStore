<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama' => 'Admin'
        ]);
        DB::table('roles')->insert([
            'nama' => 'Pelanggan'
        ]);
    }
}
