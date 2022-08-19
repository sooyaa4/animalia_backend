<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katbarang;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::with(['katbarang'])->get();

        return view('admin.produk', [
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
        $kategori = Katbarang::all();
        return view('Admin.Produk.tambahproduk', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            foreach ($files as $file) {
                $path = $file->storeAs('public/gallery', $file->getClientOriginalName());
                
                Produk::create($files)([
                    'url' => $path
                ]);
            }
        }
        
        $data = $request->all();
        Produk::create($data);
        return redirect()->route('produkbar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);

        return view('Admin.Produk.showproduk', [
            'produk'   => $produk->load(['katbarang'])
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
        $produk = Produk::find($id);

        return view('Admin.Produk.editproduk', [
            'produk'   => $produk->load(['katbarang']),
            'kategori' => Katbarang::all(),
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
        $produk = Produk::find($id);

        if ($request->nama_barang) {
            $produk->nama_barang = $request->nama_barang;
        }

        if ($request->merk_barang) {
            $produk->merk_barang = $request->merk_barang;
        }

        if ($request->deskripsi_barang) {
            $produk->deskripsi_barang = $request->deskripsi_barang;
        }

        if ($request->berat) {
            $produk->berat = $request->berat;
        }

        if ($request->satuan) {
            $produk->satuan = $request->satuan;
        }

        if ($request->stok) {
            $produk->stok = $request->stok;
        }

        if ($request->harga) {
            $produk->harga = $request->harga;
        }

        if ($request->kategori_id) {
            $produk->kategori_id = $request->kategori_id;
        }
        
        $produk->save();

        return redirect()->route('produkbar.index');
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
