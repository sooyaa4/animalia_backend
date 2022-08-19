<?php

namespace App\Http\Controllers\Api;

use App\Models\Katbarang;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_kategori = $request->input('nama_kategori');
        $show_product = $request->input('show_product');

        if($id)
        {
            $category = Katbarang::with(['produk'])->find($id);

            if($category)
                return ResponseFormatter::success(
                    $category,
                    'Data produk berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data kategori produk tidak ada',
                    404
                );
        }

        $category = Katbarang::query();

        if($nama_kategori)
            $category->where('nama_kategori', 'like', '%' . $nama_kategori . '%');

        if($show_product)
            $category->with('produk');

        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data list kategori produk berhasil diambil'
        );
    }
}
