<?php

namespace App\Http\Controllers\KaryawanPengiriman;

use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DahsboardPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'page'  => 'dashboard',
            'transaksi' => Pengiriman::with(['metodkirim'])->get(),
            'transaksi_1' => Pengiriman::where('status', 'Paket proses kirim')->get(),
            'transaksi_2' => Pengiriman::where('status', 'Paket di kirim')->get(),
            'transaksi_3' => Pengiriman::where('status', 'Selesai')->get(),
            'title' => 'Dashboard'
        ];
        return view('Pengiriman.index', $data);
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
        //
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
