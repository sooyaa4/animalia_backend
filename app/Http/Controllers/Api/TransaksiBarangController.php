<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\DetailBarang;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiBarangController extends Controller
{
    // public function all(Request $request)
    // {
    //     $id = $request->input('id');
    //     $status = $request->input('status');
    //     $limit = $request->input('limit', 100);


    //     if($id)
    //     {
    //         $transaction = Transaksi::with(['detailbarang.produk'])->where('jenis','Barang')->where('user_id', $id)->get();

    //         if($transaction)
    //             return ResponseFormatter::success(
    //                 $transaction,
    //                 'Data transaksi berhasil diambil'
    //             );
    //         else
    //             return ResponseFormatter::error(
    //                 null,
    //                 'Data transaksi tidak ada',
    //                 404
    //             );
    //     }

    //     $transaction = Transaksi::with(['detailbarang.produk'])->where('user_id', Auth::user()->id);

    //     if($status)
    //         $transaction->where('status', $status);

    //     return ResponseFormatter::success(
    //         $transaction->paginate($limit),
    //         'Data list transaksi berhasil diambil'
    //     );
    // }

    public function all(Request $request, $user_id)
    {
        $id = $user_id;
        $status =$request->input('status');
        $limit = $request->input('limit', 100);

        if($id)
        {
            $transaction = Transaksi::with(['detailbarang.produk','pembayaran.metodbayar', 'pengiriman.metodkirim'])->where('jenis','Barang')->where('user_id', $id)->get();

            if($transaction)
                return ResponseFormatter::success(
                    $transaction,
                    'Data transaksi berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ada',
                    404
                );
        }

        $transaction = Transaksi::with(['detailbarang.produk','pembayaran.metodbayar', 'pengiriman.metodkirim'])->where('jenis','Barang')->where('user_id', $id);

        if($status)
            $transaction->where('status', $status);

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data list transaksi berhasil diambil'
        );
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'exists:produk_barang,id',
            'total_harga' => 'required',
            'subtotal' => 'required',
            'alamat' => 'required',
            'jenisKirim_id' => 'required',
            'metode_id' => 'required',
            'url' => 'required',
            'tanggal_pembelian' => 'required'
        ]);

        $transaction = Transaksi::create([
            'user_id' => Auth::user()->id,
            'alamat' => $request->alamat,
            'subtotal' => $request->subtotal,
            'total_harga' => $request->total_harga,
            'status' => 'Pending',
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'jenis' => 'Barang',
        ]);
        
        foreach ($request->items as $product) {
            DetailBarang::create([
                'produk_id' => $product['id'],
                'transaksi_id' => $transaction->id,
                'jumlah_pesan' => $product['jumlah_pesan']
            ]);
        }


        $bayar = Pembayaran::create([
            'transaksi_id' => $transaction->id,
            'metode_id' => $request->metode_id,
            'url' => $request->url,
            'status' => 'Pembayaran di cek'
        ]);

        $kirim = Pengiriman::create([
            'transaksi_id' => $transaction->id,
            'jenisKirim_id' => $request->metode_id,
            'status' => 'Paket proses kirim'
        ]);

        // Produk::with(['barangmasuk'])->where('id', $request->items->produk_id)->decrement('stok', $request->items->jumlah_pesan);

        return ResponseFormatter::success($transaction->load('detailbarang.produk'), $bayar->load('metodbayar'), $kirim->load('metodkirim'), 'Transaksi berhasil');
    }

    public function Alldone(Request $request, $id){

        $pengiriman = Pengiriman::find($id);
        $transaksi = Transaksi::find($pengiriman->transaksi_id);

        if ($request->status) {
            $transaksi->status = $request->status;
        }
        $transaksi->save();

        if ($request->status) {
            $pengiriman->status = $request->status;
        }
        $pengiriman->save();
        return ResponseFormatter::success('Transaksi dan pengiriman telah di selesaikan');

    }
}
