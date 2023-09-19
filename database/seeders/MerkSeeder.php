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
            'nama' => 'American Standard',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_13.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Asian Paints',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_22.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Avian',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_14.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Dekson',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_15.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Dulux',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_02.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Meridian',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_20.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Modena',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_19.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Mowilex',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_12.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Nippon Paint',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_05.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Panasonic',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_31.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Philips',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_06.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Roman',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_16.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Sandimas',
            'foto_merk' => 'https://www.depobangunan.co.id/media/brand/images/l/o/logo_03.jpg'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Sanlex',
            'foto_merk' => 'https://picsum.photos/200/300'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Flexy Coat',
            'foto_merk' => 'https://picsum.photos/200/300'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Arca',
            'foto_merk' => 'https://picsum.photos/200/300'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Brillo',
            'foto_merk' => 'https://picsum.photos/200/300'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Magix',
            'foto_merk' => 'https://picsum.photos/200/300'
        ]);
        DB::table('merks')->insert([
            'nama' => 'Aquaproof',
            'foto_merk' => 'https://picsum.photos/200/300'
        ]);
        DB::table('merks')->insert([
            'nama' => 'SCG',
            'foto_merk' => 'https://picsum.photos/200/300'
        ]);
    }
}
