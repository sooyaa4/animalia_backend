<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email'         => 'admin@gmail.com',
                'password'      => Hash::make('admin'),
                'role'          => 'Admin',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'email'         => 'jaka@gmail.com',
                'password'      => Hash::make('jaka123!!'),
                'role'          => 'Karyawan_transaksi',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'email'         => 'jaki@gmail.com',
                'password'      => Hash::make('jaki123!!'),
                'role'          => 'Pelanggan',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ]);
    }
}
