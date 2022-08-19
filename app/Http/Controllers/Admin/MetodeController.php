<?php

namespace App\Http\Controllers\Admin;

use App\Models\MetodeBayar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'metode'    => MetodeBayar::get(),
        ];

        return view('admin.Metode.metode', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Metode.tambahdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metode = [
            'nama_metode'  => $request->nama_metode,
            'nomer_rek'  => $request->nomer_rek,
        ];
        
        MetodeBayar::create($metode);


        return redirect(route('metode.index'));
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
        $metode = MetodeBayar::find($id);

        return view('Admin.Metode.editmetode', [
            'metode'   => $metode
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
        $metode = MetodeBayar::find($id);

        if ($request->nama_metode) {
            $metode->nama_metode = $request->nama_metode;
        }

        if ($request->nomer_rek) {
            $metode->nomer_rek = $request->nomer_rek;
        }

        $metode->save();
        return redirect()->route('metode.index');
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
