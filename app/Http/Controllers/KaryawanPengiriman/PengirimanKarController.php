<?php

namespace App\Http\Controllers\KaryawanPengiriman;

use App\Models\Pembayaran;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PengirimanKarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengiriman = Pengiriman::with(['transaksi.pembayaran'])->where('status', 'Paket proses kirim')->get();

        return view('Pengiriman.pengiriman', [
            'pengiriman'   =>  $pengiriman,
            'title'     =>  'Daftar Pengiriman',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_pengiriman/pengiriman',
                    'title' => 'Pengiriman'
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
        $pengiriman = Pengiriman::with(['transaksi.pembayaran'])->where('status', 'Paket proses kirim')->find($id);
        $bayar = Pembayaran::with(['metodbayar'])->first();

        return view('Pengiriman.detail', [
            'pengiriman'   => $pengiriman,
            'bayar' => $bayar,
            'title'     => 'Detail Pembayaran',
            'breadcrumbs'   => [

            [
                'path' => 'karyawan_pengiriman/pengiriman',
                'title' => 'Pengiriman'
            ],
            [
                'path' => 'karyawan_pengiriman/pengiriman/' . $pengiriman->id . '/show',
                'title' => 'Detail Pengiriman'
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
        $pengiriman = Pengiriman::find($id);

        return view('Pengiriman.edit', [
            'pengiriman'   => $pengiriman,
            'title'     => 'Edit Status Pengiriman',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_pengiriman/pengiriman',
                    'title' => 'Pembayaran'
                ],
                [
                    'path' => 'karyawan_pengiriman/pengiriman/' . $id . '/edit',
                    'title' => 'Edit Status pengiriman'
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
        $pengiriman = Pengiriman::find($id);
        $date = Carbon::now();

        $validatedData = $request->validate([
            'status'      => 'required',
            'noresi'    => 'nullable',
        ]);
        
        $karyawan =  Auth::user()->karyawan->id;
        
        $updateData = [
            'status'      => $request->status,
            'noresi'      => $request->noresi,
            'karyawan_id' => $karyawan,
            'tanggal_kirim' => $date,
        ];
        
        $pengiriman->update($updateData);


        return redirect()->route('pengiriman.index');
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
