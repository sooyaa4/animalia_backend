<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Jabatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan'     => 'Admin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_jabatan'     => 'Karyawan transaksi',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_jabatan'     => 'Karyawan pembayaran',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_jabatan'     => 'Karyawan pengiriman',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_jabatan'     => 'Karyawan Gudang',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
