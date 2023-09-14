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
            'nama' => 'AVIAN GLOSS SUPER WHITE',
            'hargaAsli' => '73100',
            'hargaSpesial' => '9000',
            'diskon' => '10',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/a/v/avian0300060023_pa.jpg',
            'ukuran' => '12.5x10.5CM',
            'stok' => 100,
            'warna' => 'Putih Super',
            'tanggalMulaiHargaSpesial' => '2023-09-11 06:51:11.000000',
            'tanggalAkhirHargaSpesial' => '2023-09-11 06:51:11.000000',
            'merk_id' => '3'
        ]);
    }
}
