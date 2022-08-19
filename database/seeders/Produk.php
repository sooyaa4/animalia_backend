<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Produk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_barang')->insert([
            [
            'nama_barang'          => 'WET FOOD KUCING',
            'merk_barang'            => 'Whiskas',
            'deskripsi_barang'     => 'Wetfood untuk kucing yang enakkkk',
            'berat'                => '350',
            'satuan'               => 'Gram',
            'harga'                => '15000',
            'stok'                 => '12',
            'kategori_id'          => '1',
            'created_at'           => now(),
            'updated_at'           => now(),
            ],
            [
                'nama_barang'          => 'WET FOOD ANJING',
                'merk_barang'            => 'Whiskas',
                'deskripsi_barang'     => 'Wetfood untuk anjing yang enakkkk',
                'berat'                => '350',
                'satuan'               => 'Gram',
                'harga'                => '17000',
                'stok'                 => '13',
                'kategori_id'          => '2',
                'created_at'           => now(),
                'updated_at'           => now(),
                ],
            ]);
    }
}
