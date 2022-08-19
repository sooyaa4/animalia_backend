<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailJasa;
use App\Models\Karyawan;
use App\Models\Pembayaran;

class TransaksiJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->get();

        return view('Admin.DetailJasa.index', [
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
        $transaksi = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->find($id);
        $detil = DetailJasa::with(['jasa','layanan'])->where('transaksi_id', $id)->get();
        $bayar =  Pembayaran::with(['metodbayar','transaksi'])->where('transaksi_id', $id)->first();

        return view('Admin.DetailJasa.transaksi_jasa', [
            'transaksi'   => $transaksi,
            'detil' => $detil,
            'bayar' => $bayar,
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
        $karyawan = Karyawan::with(['jabatan'])->where('jabatan_id', '6')->get();
        return view('Admin.DetailJasa.tambah_data', [
            'karyawan'   => $karyawan ,
            'transaksi' => $transaksi,
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
            'karyawan_id'      => 'required',
        ]);

        $updateData = [
            'karyawan_id'      => $request->karyawan_id,
        ];
        
        $transaksi->update($updateData);


        return redirect()->route('sewajasa.index');
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
