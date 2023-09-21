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
            TokoSeeder::class,
            ProdukSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PelangganSeeder::class,
            PromoSeeder::class,
            PembayaranSeeder::class,
            PromoSeeder::class,
            PembayaranSeeder::class,
            TransaksiSeeder::class,
            DetailTransaksiSeeder::class

        ]);
        // User::factory(10)->create();
    }
}
