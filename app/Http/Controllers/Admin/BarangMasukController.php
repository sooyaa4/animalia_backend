<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use App\Models\Katbarang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BarangMasuk::with(['produk'])->get();

        return view('Admin.Bmasuk.halaman', [
            'produk' => Produk::all(),
            'kategori' => Katbarang::all(),
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Produk::all();
        return view('Admin.Bmasuk.tambah_data', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produk_id'              => 'required',
            'stok_masuk'            => 'required|min:1',
            'tanggal_masuk'      => 'required',
         ]);

         $karyawan =  Auth::user()->karyawan->id;

         $bmasuk = [
            'produk_id' => $validatedData['produk_id'],
            'stok_masuk'       => $validatedData['stok_masuk'],
            'tanggal_masuk'       =>$validatedData['tanggal_masuk'],
            'karyawan_id'     => $karyawan,
        ];

        $create = BarangMasuk::create($bmasuk);

        Produk::with(['barangmasuk'])->where('id', $create->produk_id)->increment('stok', $create->stok_masuk);
        return redirect(route('masuk.index'));
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
