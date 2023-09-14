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
            ProdukSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PelangganSeeder::class
        ]);
        // User::factory(10)->create();
    }
}
