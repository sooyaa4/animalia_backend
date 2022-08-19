<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Layanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('layanan')->insert([
            [
                'nama_layanan'              => 'Home service',
                'biaya'                     => '30000',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
