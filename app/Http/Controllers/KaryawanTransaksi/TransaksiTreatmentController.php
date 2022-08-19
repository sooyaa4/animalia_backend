<?php

namespace App\Http\Controllers\KaryawanTransaksi;

use App\Models\Transaksi;
use App\Models\DetailJasa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiTreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->get();

        return view('Transaksi.Treatment.index', [
            'transaksi'   =>  $transaksi,
            'title'     =>  'Daftar Transaksi Treatment',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_transaksi/transament',
                    'title' => 'Daftar Transaksi Treatment'
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
       
        $transaksi = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->find($id);
        $detil = DetailJasa::with(['jasa','layanan'])->where('transaksi_id', $id)->get();
        $bayar =  Pembayaran::with(['metodbayar','transaksi'])->where('transaksi_id', $id)->first();

        return view('Transaksi.Treatment.transaksi_jasa', [
            'transaksi'   => $transaksi,
            'detil' => $detil,
            'bayar' => $bayar,
            'title'     => 'Detail Transaksi Treatment',
            'breadcrumbs'   => [

            [
                'path' => 'karyawan_transaksi/transament',
                'title' => 'Daftar Transaksi Treatment'
            ],
            [
                'path' => 'karyawan_transaksi/transament/' . $transaksi->id . '/show',
                'title' => 'Detail Transaksi Treatment'
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

        return view('Transaksi.Treatment.edit_transaksi_treatment', [
            'transaksi'   => $transaksi,
            'title'     => 'Edit Status transaksi Treatment',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_transaksi/transament',
                    'title' => 'Daftar Transaksi Treatment'
                ],
                [
                    'path' => 'karyawan_transaksi/transament/' . $id . '/edit',
                    'title' => 'Edit Status transaksi Treatment'
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
            'status'     => $request->status,
            'karyawan_id' => $karyawan,
        ];
        
        $transaksi->update($updateData);


        return redirect()->route('transament.index');
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
