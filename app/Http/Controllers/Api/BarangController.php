<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama_barang = $request->input('nama_barang');
        $description = $request->input('deskripsi_barang');
        $berat = $request->input('berat');
        $stok = $request->input('stok');
        $merk = $request->input('merk_barang');
        $categories = $request->input('kategori_barang');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $product = Produk::with(['katbarang','galeri'])->find($id);

            if($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data produk berhasil diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
            }
        }

        $product = Produk::with(['katbarang', 'galeri']);

        if($nama_barang)
            $product->where('nama_barang', 'like', '%' . $nama_barang . '%');
        
        if($merk)
            $product->where('merk', 'like', '%' . $merk . '%');

        if($description)
            $product->where('deskripsi', 'like', '%' . $description . '%');

        if($berat)
            $product->where('berat', 'like', '%' . $berat . '%');

        if($stok)
            $product->where('stok', 'like', '%' . $stok . '%');

        if($price_from)
            $product->where('harga', '>=', $price_from);

        if($price_to)
            $product->where('harga', '<=', $price_to);

        if($categories)
            $product->where('kategori_id', $categories);

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}
