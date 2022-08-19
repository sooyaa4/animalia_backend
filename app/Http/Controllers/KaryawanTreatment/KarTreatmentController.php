<?php

namespace App\Http\Controllers\KaryawanTreatment;

use App\Models\Transaksi;
use App\Models\DetailJasa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KarTreatmentController extends Controller
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
            'transaksi' => Transaksi::with(['detailjasa.jasa','detailjasa.layanan'])->where('jenis', 'treatment')->where('karyawan_id', Auth::user()->karyawan->id)->latest()->get(),
            'date' => Carbon::now(),
            'title' => 'Dashboard',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_treatment/kartrans',
                    'title' => 'Daftar Treatment'
                ]
            ]
        ];
        return view('KarTreatment.halamandata', $data);
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

        return view('KarTreatment.detail', [
            'transaksi'   => $transaksi,
            'detil' => $detil,
            'bayar' => $bayar,
            'title'     => 'Detail Transaksi Treatment',
            'breadcrumbs'   => [

            [
                'path' => 'karyawan_treatment/kartrans',
                'title' => 'Daftar Transaksi Treatment'
            ],
            [
                'path' => 'karyawan_treatment/kartrans/' . $transaksi->id . '/show',
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

        return view('KarTreatment.editstatus', [
            'transaksi'   => $transaksi,
            'title'     => 'Edit Status transaksi Treatment',
            'breadcrumbs'   =>  [
                [
                    'path' => 'karyawan_treatment/kartrans',
                    'title' => 'Daftar Treatment'
                ],
                [
                    'path' => 'karyawan_treatment/kartrans/' . $id . '/edit',
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
        $trans = Transaksi::find($id);

        if ($request->status) {
            $trans->status = $request->status;
        }

        $trans->save();

        return redirect()->route('kartrans.index');
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
