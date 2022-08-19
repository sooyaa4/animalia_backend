<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class LapBmasukController extends Controller
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
            $data =  BarangMasuk::with(['produk'])->whereDate('tanggal_masuk',$getdate)->get();
        
            }
            else {
                $getdate = Carbon::parse(request()->getdate)->toDateTimeString();
                 $data =  BarangMasuk::with(['produk'])->get();
            }
    
            return view('Admin.Laporan.lapbarangmasuk', [
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

    public function printAllReport()
    {
       $data = BarangMasuk::with(['produk'])->get();

        return view('Admin.print.lapbarangmasuk.print_all', [
            'data' => $data,
            'title' => 'Laporan_Pelanggan_terdaftar'
        ]);
    }
}
