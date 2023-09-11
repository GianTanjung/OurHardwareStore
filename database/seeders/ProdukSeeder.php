<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $currentDateTime = Carbon::create(2023, 9, 15, 12, 30, 0);
        DB::table('produks')->insert([
            'nama' => 'cat',
            'hargaAsli' => '10000',
            'hargaSpesial' => '9000',
            'diskon' => '10',
            'fotoProduk' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_light_color_272x92dp.png',
            'ukuran' => '20x10x10',
            'stok' => 10,
            'warna' => 'Merah',
            'tanggalMulaiHargaSpesial' => '2023-09-11 06:51:11.000000',
            'tanggalAkhirHargaSpesial' => '2023-09-11 06:51:11.000000'
        ]);
    }
}
