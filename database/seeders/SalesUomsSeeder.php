<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesUomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_uoms')->insert([
            'nama' => 'UNIT',
        ]);
        DB::table('sales_uoms')->insert([
            'nama' => 'BOX',
        ]);
        DB::table('sales_uoms')->insert([
            'nama' => 'SET',
        ]);
    }
}
