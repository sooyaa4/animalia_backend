<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'jasa'    => Jasa::get(),
        ];

        return view('admin.Jasa.jasa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Jasa.tambahjasa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jasa = [
            'nama_jasa'  => $request->nama_jasa,
            'deskripsi'  => $request->deskripsi,
            'harga'  => $request->harga,
        ];
        Jasa::create($jasa);

        return redirect(route('jasa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jasa = Jasa::find($id);

        return view('Admin.Jasa.editjasa', [
            'jasa'   => $jasa
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
        $jasa = Jasa::find($id);

        return view('Admin.Jasa.editjasa', [
            'jasa'   => $jasa
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
        $jasa = Jasa::find($id);

        if ($request->nama_jasa) {
            $jasa->nama_jasa = $request->nama_jasa;
        }

        if ($request->deskripsi) {
            $jasa->deskripsi = $request->deskripsi;
        }

        if ($request->harga) {
            $jasa->harga = $request->harga;
        }

        $jasa->save();

        return redirect()->route('jasa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Jasa::find($id);

        $program->delete();
    }
}
