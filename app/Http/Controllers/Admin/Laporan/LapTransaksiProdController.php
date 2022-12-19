<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\DetailBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class LapTransaksiProdController extends Controller
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
        $data = Transaksi::with(['detailbarang'])->where('jenis', 'Barang')->whereDate('created_at',$getdate)->get();
    
        }
        else {
            $getdate = Carbon::parse(request()->getdate)->toDateTimeString();
             $data = Transaksi::with(['detailbarang'])->where('jenis', 'Barang')->get();
        }

        return view('Admin.laporan.laptransprod', [
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

    public function printAllReporttransaprod()
    {
        set_time_limit(300);
        $data = Transaksi::with(['detailbarang'])->where('jenis', 'Barang')->get();

        $pdf = PDF::loadView('Admin.print.laptransaprod.print_all', ['data'   => $data])->setOption(['defaultFont' => 'sans-serif']);

        return $pdf->download('laporan-pembelian-produk.pdf');

        // return view('Admin.print.laptransaprod.print_all', [
        //     'data' => $data,
        //     'title' => 'Laporan_Semua_Transaksi'
        // ]);
    }

    public function printPdf($id, Request $request)
    {
        $data = [
                'transaksi'   => Transaksi::with(['detailbarang.produk'])->where('jenis', 'Barang')->find($id),
                'detil' => DetailBarang::with(['produk'])->where('transaksi_id', $id)->get(),
                'bayar' => Pembayaran::with(['metodbayar','transaksi'])->where('transaksi_id', $id)->first(),
                'kirim' => Pengiriman::with(['metodkirim','transaksi'])->where('transaksi_id', $id)->first(),
        ];
        set_time_limit(300);
        $pdf = pdf::loadView('Admin.print.laptransaprod.invoice', $data);

        return $pdf->download('invoice-pembelian-produk.pdf');

        // $transaksi = Transaksi::with(['detailbarang.produk'])->where('jenis', 'Barang')->find($id);
        // $detil = DetailBarang::with(['produk'])->where('transaksi_id', $id)->get();
        // $bayar = Pembayaran::with(['metodbayar','transaksi'])->where('transaksi_id', $id)->first();
        // $kirim = Pengiriman::with(['metodkirim','transaksi'])->where('transaksi_id', $id)->first();
        // return $pdf->stream();
        // return view('Admin.print.laptransaprod.invoice', ['transaksi'   => $transaksi, 'detil' => $detil,'bayar' => $bayar,'kirim' => $kirim ]);

        // $pdf = App::make('dompdf.wrapper');
        // $pdf = PDF::loadView('Admin.print.laptransaprod.invoice', ['transaksi'   => $transaksi,'detil' => $detil,'bayar' => $bayar,'kirim' => $kirim ]);

        // return view('Admin.print.laptransaprod.invoice', [
        //     'transaksi'   => $transaksi,
        //     'detil' => $detil,
        //     'bayar' => $bayar,
        //     'kirim' => $kirim,
        // ]);
    }
}
