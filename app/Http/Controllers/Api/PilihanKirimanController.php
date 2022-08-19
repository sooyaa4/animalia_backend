<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\JenisKirim;

class PilihanKirimanController extends Controller
{
    
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_jasa = $request->input('nama_janis_kirim');
        $ongkir = $request->input('ongkir');

        if($id)
        {
            $kirim = JenisKirim::get()->find($id);

            if($kirim) {
                return ResponseFormatter::success(
                    $kirim,
                    'Data jasa pengiriman berhasil diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data jasa pengiriman tidak ada',
                    404
                );
            }
        }

        $kirim = JenisKirim::query();

        if($nama_jasa)
            $kirim->where('nama_janis_kirim', 'like', '%' . $nama_jasa . '%');
        

        if($ongkir)
            $kirim->where('ongkir', 'like', '%' . $ongkir . '%');




        return ResponseFormatter::success(
            $kirim->paginate($limit),
            'Data list jenis pengiriman berhasil diambil'
        );
    }
    
}
