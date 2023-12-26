<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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
            'nama' => 'Owner'
        ]);
        DB::table('roles')->insert([
            'nama' => 'Staff'
        ]);
        DB::table('roles')->insert([
            'nama' => 'Pelanggan'
        ]);
    }
}
