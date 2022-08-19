<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jasa;
use App\Models\Produk;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $itung2 = Transaksi::where('jenis', 'barang')->count();
        $itung7 = Transaksi::where('jenis', 'barang')->where('status','Selesai')->count();
        $persen = ($itung7 / $itung2 * 100);

        $itung1 = Transaksi::where('jenis', 'treatment')->count();
        $itung2 = Transaksi::where('jenis', 'treatment')->where('status','Selesai')->count();
        $persen1 = ($itung2 / $itung1 * 100);
        

            return view('admin.dashboard', [
            'itung' => Produk::get(),
            'itung1' => Pelanggan::get(),
            'itung2' => Transaksi::where('jenis', 'barang')->get(),
            'itung3' => Transaksi::where('jenis', 'barang')->where('status', 'selesai')->sum('total_harga'),
            'itung4' => Transaksi::where('jenis', 'treatment')->get(),
            'itung5' => Transaksi::where('jenis', 'treatment')->where('status', 'selesai')->sum('total_harga'),
            'itung6' => Jasa::get(),    
            'itung7' => Transaksi::where('jenis', 'barang')->where('status','Selesai')->get(),
            'itung8' => Transaksi::where('jenis', 'treatment')->where('status','Selesai')->get(),
            // 'itung3' => Transaksi::get()->where('status','pending')->get(),
            'persen' => $persen,
            'persen1' => $persen1,
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
}
