<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPengiriman extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pengiriman')->insert([
            [
                'nama_jenis_kirim'  => 'JNT',
                'ongkir'            => '10000',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_jenis_kirim'  => 'JNE',
                'ongkir'            => '10000',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
