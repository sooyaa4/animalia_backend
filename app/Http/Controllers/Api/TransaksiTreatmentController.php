<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaksi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DetailJasa;
use Illuminate\Support\Facades\Auth;

class TransaksiTreatmentController extends Controller
{
    // public function all(Request $request)
    // {
    //     $id = $request->input('id');
    //     $limit = $request->input('limit', 6);
    //     $status = $request->input('status');

    //     if($id)
    //     {
    //         $transaction = Transaksi::with(['detailjasa.jasa', 'detailjasa.layanan','pembayaran.metodbayar'])->where('jenis','Treatment')->find($id);

    //         if($transaction)
    //             return ResponseFormatter::success(
    //                 $transaction,
    //                 'Data transaksi treatment berhasil diambil'
    //             );
    //         else
    //             return ResponseFormatter::error(
    //                 null,
    //                 'Data transaksi treatment tidak ada',
    //                 404
    //             );
    //     }

    //     $transaction = Transaksi::with(['detailjasa.jasa', 'detailjasa.layanan','pembayaran.metodbayar'])->where('jenis','Treatment')->where('user_id', Auth::user()->id);

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
            $transaction =  Transaksi::with(['detailjasa.jasa', 'detailjasa.layanan','pembayaran.metodbayar'])->where('jenis','Treatment')->where('user_id', $id)->get();

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

        $transaction =  Transaksi::with(['detailjasa.jasa', 'detailjasa.layanan','pembayaran.metodbayar'])->where('jenis','Treatment')->where('user_id', Auth::user()->id);

        if($status)
            $transaction->where('status', $status);

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data list transaksi berhasil diambil'
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'exists:jasa,id',
            'total_harga' => 'required',
            'subtotal' => 'required',
            'alamat' => 'required',
            'layanan_id' => 'required',
            'metode_id' => 'required',
            'url' => 'required',
            'tanggal_pembelian' => 'required',
            'tanggal_booking' => 'required'
        ]);

        $transaction = Transaksi::create([
            'user_id' => Auth::user()->id,
            'alamat' => $request->alamat,
            'subtotal' => $request->subtotal,
            'total_harga' => $request->total_harga,
            'status' => 'Pending',
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'tanggal_booking' => $request->tanggal_booking,
            'jenis' => 'Treatment',
        ]);
        
        foreach ($request->items as $treatment) {
            DetailJasa::create([
                'jasa_id' => $treatment['id'],
                'layanan_id' => $request->layanan_id,
                'transaksi_id' => $transaction->id,
                'jumlah_pesan_jasa' => $treatment['jumlah_pesan_jasa']
            ]);
        }

        $bayar = Pembayaran::create([
            'transaksi_id' => $transaction->id,
            'metode_id' => $request->metode_id,
            'url' => $request->url,
            'status' => 'Pembayaran di cek'
        ]);
        
        return ResponseFormatter::success($transaction->load('detailjasa.jasa', 'detailjasa.layanan'), $bayar->load('metodbayar'), 'Transaksi berhasil');
    }
}
