<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Karyawan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert([
            [
                'nama_karyawan'              => 'admin',
                'no_hp'                      => '0812121',
                'jabatan_id'                 => '1',
                'user_id'                    => '1',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_karyawan'              => 'Jaka',
                'no_hp'                      => '0812121',
                'jabatan_id'                 => '2',
                'user_id'                    => '2',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
