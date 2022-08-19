<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::with(['Jabatan'])->get();

        return view('Admin.Karyawan.karyawan', [
            'jabatan' => Jabatan::all(),
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
        $jabatan = Jabatan::all();
        return view('Admin.Karyawan.tambahdata', compact('jabatan'));
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
           'nama_karyawan'   => 'required|min:1',
           'no_hp'            => 'required',
           'jabatan_id'      => 'required',
           'email'           => 'required|email|unique:users',
           'password'        => 'required',
        ]);

        if ($validatedData['jabatan_id'] == 1) {
            $role = 'Admin';
        }elseif($validatedData['jabatan_id'] == 2){
            $role = 'karyawan_transaksi';
        }elseif($validatedData['jabatan_id'] == 3){
            $role = 'karyawan_pembayaran';
        }elseif($validatedData['jabatan_id'] == 4){
            $role = 'karyawan_pengiriman';
        }elseif($validatedData['jabatan_id'] == 5){
            $role = 'karyawan_gudang';
        }elseif($validatedData['jabatan_id'] == 6){
            $role = 'karyawan_treatment';
        }

        if ($validatedData['password']) {
                $password = Hash::make($validatedData['password']);
                } else {
                    $password = Hash::make('password123');
                }

                


                $user = [
                    'email'     => $validatedData['email'],
                    'password'  => $password,
                    'role'      => $role,
                ];

                $user_id = User::create($user)->id;

                $karyawan = [
                    'nama_karyawan' => $validatedData['nama_karyawan'],
                    'no_hp'       => $validatedData['no_hp'],
                    'user_id'       => $user_id,
                    'jabatan_id'     => $validatedData['jabatan_id'],
                ];

                Karyawan::create($karyawan);
                return redirect(route('karyawan.index'));
                // return dd();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::find($id);

        return view('Admin.Karyawan.showkaryawan', [
            'karyawan'   => $karyawan->load(['jabatan','user'])
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
        $karyawan = Karyawan::find($id);
        $user = User::find($karyawan->user_id);

        return view('Admin.Karyawan.editkaryawan', [
            'karyawan'   => $karyawan,
            'jabatan'    => Jabatan::all(),
            'user'         =>$user,
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
        $karyawan = Karyawan::find($id);
        $user = User::find($karyawan->user_id);
        
        $validatedData = $request->validate([
            'nama_karyawan'      => 'required',
            'email'      => 'required',
            'no_hp'      => 'required',
            'jabatan_id'    => 'required',
            'role'       => 'required'
        ]);

        $updateDatauser = [
            'email'              => $request->email,
            'role'               => $request->role,
        ];

        $updateDatakaryawan = [
            'nama_karyawan'              => $request->nama_karyawan,
            'no_hp'               => $request->no_hp,
            'jabatan_id'            => $request->jabatan_id,
        ];

        $user->update($updateDatauser);

        $karyawan->update($updateDatakaryawan);

        return redirect(route('karyawan.index'));
        
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
