<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProduk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_barang')->insert([
            [
                'nama_kategori'     => 'Makanan kucing',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_kategori'     => 'Makanan Anjing',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
