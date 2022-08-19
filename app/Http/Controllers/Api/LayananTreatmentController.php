<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Layanan;

class LayananTreatmentController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_layanan = $request->input('nama_layanan');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $jasa = Layanan::get()->find($id);

            if($jasa) {
                return ResponseFormatter::success(
                    $jasa,
                    'Data Layanan Treatment berhasil diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data Layanan Treatment tidak ada',
                    404
                );
            }
        }

        $jasa = Layanan::query();

        if($nama_layanan)
            $jasa->where('nama_layanan', 'like', '%' . $nama_layanan . '%');

        if($price_from)
            $jasa->where('biaya', '>=', $price_from);

        if($price_to)
            $jasa->where('biaya', '<=', $price_to);



        return ResponseFormatter::success(
            $jasa->paginate($limit),
            'Data list layanan berhasil diambil'
        );
    }
}
