<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Transaksi;
use App\Models\DetailJasa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class LapTransaksiTreatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->getdate) {
            $getdate = Carbon::parse(request()->getdate)->toDateTimeString();
            $data = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->whereDate('created_at', $getdate)->get();
        
            }
            else {
                $getdate = Carbon::parse(request()->getdate)->toDateTimeString();
                $data = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->get();
            }
    
            return view('Admin.laporan.laptransment', [
                'data'   =>  $data,
                'getdate'  =>  $getdate,
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
    public function printAllReporttransament()
    {
        $data = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->get();

        return view('Admin.print.laptransament.print_all', [
            'data' => $data,
            'title' => 'Laporan_Semua_Transaksi_Treatment'
        ]);
    }

    public function printPdf($id, Request $request)
    {
        $transaksi = Transaksi::with(['detailjasa'])->where('jenis', 'Treatment')->find($id);
        $detil = DetailJasa::with(['jasa','layanan'])->where('transaksi_id', $id)->get();
        $bayar = Pembayaran::with(['metodbayar','transaksi'])->where('transaksi_id', $id)->first();

        return view('Admin.print.laptransament.invoice', [
            'transaksi'   => $transaksi,
            'detil' => $detil,
            'bayar' => $bayar,
        ]);
    }
}
