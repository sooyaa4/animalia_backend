<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\DetailBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with(['detailbarang'])->where('jenis', 'Barang')->get();

        return view('Admin.DetailTrans.index', [
            'transaksi'   =>  $transaksi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::with(['detailbarang.produk'])->where('jenis', 'Barang')->find($id);
        $detil = DetailBarang::with(['produk'])->where('transaksi_id', $id)->get();
        $bayar = Pembayaran::with(['metodbayar','transaksi'])->where('transaksi_id', $id)->first();
        $kirim = Pengiriman::with(['metodkirim','transaksi'])->where('transaksi_id', $id)->first();

        return view('Admin.DetailTrans.transaksi_barang', [
            'transaksi'   => $transaksi,
            'detil' => $detil,
            'bayar' => $bayar,
            'kirim' => $kirim,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
