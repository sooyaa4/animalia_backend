<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\MetodeBayar;

class MetodeBayarController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_metode = $request->input('nama_metode');
        $nomer_rek = $request->input('nomer_rek');

        if($id)
        {
            $metode = MetodeBayar::get()->find($id);

            if($metode) {
                return ResponseFormatter::success(
                    $metode,
                    'Data Metode pembayaran berhasil diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data Metode pembayaran tidak ada',
                    404
                );
            }
        }

        $metode = MetodeBayar::query();

        if($nama_metode)
            $metode->where('nama_metode', 'like', '%' . $nama_metode . '%');
        
        if($nomer_rek)
            $metode->where('nomer_rek', 'like', '%' . $nomer_rek . '%');


        return ResponseFormatter::success(
            $metode->paginate($limit),
            'Data Metode pembayaran berhasil diambil'
        );
    }
}
