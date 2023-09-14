<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Chel',
            'email' => 'c@gmail.com',
            'password' => Hash::make('1111'),
            'role_id' => '1'
        ]);
        DB::table('users')->insert([
            'nama' => 'Gi',
            'email' => 'g@gmail.com',
            'password' => Hash::make('1111'),
            'role_id' => '1'
        ]);
        DB::table('users')->insert([
            'nama' => 'Fre',
            'email' => 'f@gmail.com',
            'password' => Hash::make('1111'),
            'role_id' => '1'
        ]);
        DB::table('users')->insert([
            'nama' => 'Ba',
            'email' => 'b@gmail.com',
            'password' => Hash::make('1111'),
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'nama' => 'Chelsea Clarista Valencia',
            'email' => 'chelsea@gmail.com',
            'password' => Hash::make('2222'),
            'role_id' => '2'
        ]);
        DB::table('users')->insert([
            'nama' => 'Gian Tanjung',
            'email' => 'gian@gmail.com',
            'password' => Hash::make('2222'),
            'role_id' => '2'
        ]);
        DB::table('users')->insert([
            'nama' => 'Frederick Nelson Halim',
            'email' => 'frederick@gmail.com',
            'password' => Hash::make('2222'),
            'role_id' => '2'
        ]);
        DB::table('users')->insert([
            'nama' => 'Bagus Surya Bumi',
            'email' => 'bagus@gmail.com',
            'password' => Hash::make('2222'),
            'role_id' => '2'
        ]);
    }
}
