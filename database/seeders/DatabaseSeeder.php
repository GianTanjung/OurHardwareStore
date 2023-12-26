<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MerkSeeder::class,
            RuanganSeeder::class,
            KategoriSeeder::class,
            SalesUomsSeeder::class,
            TokoSeeder::class,
            ProdukSeeder::class,
            ProdukTokoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PelangganSeeder::class,
            PromoSeeder::class,
            PembayaranSeeder::class,
            PromoSeeder::class,
            PembayaranSeeder::class,
            TransaksiSeeder::class,
            DetailTransaksiSeeder::class,
            LocationsSeeder::class,
        ]);
        // User::factory(10)->create();
    }
}
