<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            [
                'nama'              => 'Jiki',
                'username'              => 'Jikisaja',
                'alamat'              => 'Jl Jabung',
                'no_telp'                      => '0812121',
                'user_id'                    => '3',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
