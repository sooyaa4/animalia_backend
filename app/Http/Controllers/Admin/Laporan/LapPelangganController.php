<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Pelanggan;
use App\Exports\ExportUser;
use App\Exports\ExportUserView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LapPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelanggan::with(['user'])->get();

        return view('Admin.Laporan.lappelanggan', [
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
       $data = Pelanggan::with(['user'])->get();

        return view('Admin.print.lappelanggan.print_all', [
            'data' => $data,
            'title' => 'Laporan_Pelanggan_terdaftar'
        ]);
    }
    
    public function exportUsers(Request $request){
        // return Excel::download(new ExportUser, 'data_user.xlsx');
        return Excel::download(new ExportUserView, 'data_user.xlsx');
    }
}
