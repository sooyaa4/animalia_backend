<?php

namespace App\Http\Controllers\Api;

use Exception;


use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //  public function fetch(Request $request)
    // {
    //     $a = User::with(['pelanggan'])->where(Auth::user()->id, 'user_id')->get();
    //     return ResponseFormatter::success($a,'Data profile user berhasil diambil');
    //     // return ResponseFormatter::success($request->user(),'Data profile user berhasil diambil');
    // }
    public function fetch(Request $request, $user_id)
    {
        $id = $user_id;
        $nama = $request->input('nama');

        if($id)
        {
            $user = Pelanggan::with(['user'])->where('user_id', $id)->get();

            if($user) {
                return ResponseFormatter::success(
                    $user,
                    'Data user berhasil diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data user tidak ada',
                    404
                );
            }
        }

        $user = Pelanggan::with(['user'])->where('user_id', $id);
        
        if($nama)
            $user->where('nama', $nama);

        return ResponseFormatter::success(
            $user,
            'Data user berhasil diambil'
        );
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ],'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();
            if ( ! Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }


    public function register(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:pelanggan'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
            ]);

            $userinput = [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Pelanggan',
            ];

            $user_id = User::create($userinput)->id;

            Pelanggan::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'user_id'  => $user_id,
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'User Registered');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token,'Token Revoked');
    }

    // public function updateProfile(Request $request)
    // {
    //     $data = $request->all();

    //     $user = Auth::user()->pelanggan->id;
    //     $user->update($data);

    //     return ResponseFormatter::success($user,'Profile Updated');
    // }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        
        $user->update($data);
        $user->password = Hash::make($request->password);
        $user->save();
        return ResponseFormatter::success($user,'Profile Updated');
    }


}
