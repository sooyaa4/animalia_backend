<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Metode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metode_bayar')->insert([
        [
        'nama_metode'       => 'BCA',
         'nomer_rek'             => '1020030115',
         'created_at'        => now(),
         'updated_at'        => now(),
        ]
        ]);
    }
}
