<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Jasa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jasa')->insert([
            [
                'nama_jasa'              => 'Wash kucing',
                'deskripsi'              => 'dapat membantu memandikan kucing nada',
                'harga'                  => '80000',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
