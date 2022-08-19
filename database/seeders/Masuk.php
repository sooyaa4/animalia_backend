<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Masuk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('barang_masuk')->insert([
            [
                'stok_masuk'              => '20',
                'tanggal_masuk'           =>  now(),
                'produk_id'                => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
            ]);
    }

}
