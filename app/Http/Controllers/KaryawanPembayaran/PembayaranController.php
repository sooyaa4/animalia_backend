<?php

namespace App\Http\Controllers\KaryawanPembayaran;

use App\Models\Transaksi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pembayaran = Pembayaran::with(['transaksi'])->where('status', 'Pembayaran di cek')->get();

        return view('keuangan.pembayaran', [
            'transaksi'   =>  $pembayaran,
            'title'     =>  'Daftar Pembayaran',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_transaksi/pembayaran',
                    'title' => 'Pembayaran'
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
        $pembayaran = Pembayaran::with(['transaksi'])->where('status', 'Pembayaran di cek')->find($id);
        $bayar = Pembayaran::with(['metodbayar'])->first();

        return view('Keuangan.detail_pembayaran', [
            'pembayaran'   => $pembayaran,
            'bayar' => $bayar,
            'title'     => 'Detail Pembayaran',
            'breadcrumbs'   => [

            [
                'path' => 'karyawan_keuangan/pembayaran',
                'title' => 'Pembayaran'
            ],
            [
                'path' => 'karyawan_keuangan/transaprod/' . $pembayaran->id . '/show',
                'title' => 'Detail Pembayaran'
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
        $pembayaran = Pembayaran::find($id);

        return view('Keuangan.edit_pembayaran', [
            'transaksi'   => $pembayaran,
            'title'     => 'Edit Status Pembayaran',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_keuangan/pembayaran',
                    'title' => 'Pembayaran'
                ],
                [
                    'path' => 'karyawan_keuangan/pembayaran/' . $id . '/edit',
                    'title' => 'Edit Status Pembayaran'
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
        $transaksi = Pembayaran::find($id);

        $validatedData = $request->validate([
            'status'      => 'required',
        ]);
        $karyawan =  Auth::user()->karyawan->id;
        
        $updateData = [
            'status'      => $request->status,
            'karyawan_id' => $karyawan,
        ];
        
        $transaksi->update($updateData);


        return redirect()->route('pembayaran.index');
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
