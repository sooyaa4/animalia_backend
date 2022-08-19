<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Jasa;

class TreatmentController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_jasa = $request->input('nama_jasa');
        $description = $request->input('deskripsi_barang');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $jasa = Jasa::get()->find($id);

            if($jasa) {
                return ResponseFormatter::success(
                    $jasa,
                    'Data jasa berhasil diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data jasa tidak ada',
                    404
                );
            }
        }

        $jasa = Jasa::query();

        if($nama_jasa)
            $jasa->where('nama_jasa', 'like', '%' . $nama_jasa . '%');
        

        if($description)
            $jasa->where('deskripsi', 'like', '%' . $description . '%');


        if($price_from)
            $jasa->where('harga', '>=', $price_from);

        if($price_to)
            $jasa->where('harga', '<=', $price_to);



        return ResponseFormatter::success(
            $jasa->paginate($limit),
            'Data list treatment berhasil diambil'
        );
    }
}
