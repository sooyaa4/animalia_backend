<?php

namespace App\Http\Controllers\KaryawanTransaksi;

use App\Models\User;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\DetailBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Pembayaran::with(['transaksi'])->where('status', 'Pembayaran di terima')->latest()->get();
        // $transaksi = Transaksi::with(['detailbarang', 'pembayaran'])->where('jenis', 'Barang')->where('status', $status)->get();

        return view('Transaksi.produk_beli', [
            'transaksi'   =>  $transaksi,
            'title'     =>  'Daftar Transaksi Produk',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_transaksi/transacprod',
                    'title' => 'Daftar Transaksi Produk'
                ]
            ]
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

        return view('Transaksi.detil_transaksi_barang', [
            'transaksi'   => $transaksi,
            'detil' => $detil,
            'bayar' => $bayar,
            'kirim' => $kirim,
            'title'     => 'Detail Transaksi Produk',
            'breadcrumbs'   => [

            [
                'path' => 'karyawan_transaksi/transaprod',
                'title' => 'Daftar Transaksi Produk'
            ],
            [
                'path' => 'karyawan_transaksi/transaprod/' . $transaksi->id . '/show',
                'title' => 'Detail Transaksi Produk'
            ]
            ]
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
        $transaksi = Transaksi::find($id);

        return view('Transaksi.edit_transaksi_barang', [
            'transaksi'   => $transaksi,
            'title'     => 'Edit Status transaksi',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_transaksi/transaprod',
                    'title' => 'Daftar Transaksi Produk'
                ],
                [
                    'path' => 'karyawan_transaksi/transaprod/' . $id . '/edit',
                    'title' => 'Edit Status transaksi'
                ]
            ]
        ]);
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
        $transaksi = Transaksi::find($id);

        $validatedData = $request->validate([
            'status'      => 'required',
            
        ]);
        $karyawan =  Auth::user()->karyawan->id;
        
        $updateData = [
            'status'              => $request->status,
            'karyawan_id' => $karyawan,
        ];
        
        $transaksi->update($updateData);


        return redirect()->route('transaprod.index');
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
