<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKirim;
use Illuminate\Http\Request;

class JenisKirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $data = [
                'jenis'    => JenisKirim::get(),
            ];
    
            return view('Admin.JenisK.jenis', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.JenisK.tambahdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisk = [
            'nama_jenis_kirim'  => $request->nama_jenis_kirim,
            'ongkir'  => $request->ongkir,
        ];
        
        JenisKirim::create($jenisk);


        return redirect(route('jenis.index'));
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
        $jenis = JenisKirim::find($id);

        return view('Admin.JenisK.editjenkir', [
            'jenis'   => $jenis
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
        $jenis = JenisKirim::find($id);

        if ($request->nama_jenis_kirim) {
            $jenis->nama_jenis_kirim = $request->nama_jenis_kirim;
        }

        if ($request->ongkir) {
            $jenis->ongkir = $request->ongkir;
        }

        $jenis->save();
        return redirect()->route('jenis.index');
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
