<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        return view('layouts.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        $remember = $request->remember ? true : false;

        Auth::attempt($data, $remember);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth

            //Login Success
            $role = Auth::user()->role;
            // activity()->log(Auth::user()->nama . ' berhasil login');

            return redirect()->route($role);
        } else { // false

            //Login Fail
            return redirect()->route('login')->withErrors('Email atau password salah')->withInput();
        }
    }

    public function postLogout()
    {
        $nama = Auth::user()->nama;
        Auth::logout(); // menghapus session yang aktif

        // activity()->log($nama . ' logout');
        return redirect()->route('login');
    }

    public function postChangePassword(Request $request)
    {
        $rules = [
            'sandi'         => 'required|min:8|same:sandi-ulang',
            'sandi-ulang'   => 'required|min:8|same:sandi',
        ];

        $messages = [
            'required'  => 'The :attribute field is required.',
            'min'       => 'The :attribute must have at least 8 character',
            'same'      => 'The :attribute and :other must match.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            $request['modal-password'] = 'aktif';
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::find(Auth::User()->id);
        $user->password = Hash::make($request->input('sandi'));
        $user->save();

        // activity()->log(Auth::user()->nama . ' mengganti password');
        return redirect()->back()->with('success', 'Password berhasil diubah');

    }

    public function getEmail()
    {
        return view('auth.forgetPasswordLink');
    }

    public function postEmail(Request $request)
    {
        $emailUser = User::where('email', $request->email)->first();

        // if (!$emailUser) {
        //     return redirect('/login')->with('fail', 'Email anda belum terdaftar silahkan hubungi admin');
        // }

        $rules = ['email' => 'required|email|exists:users'];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.exists'          => 'Email anda belum terdaftar'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        $attr = [
            'tokenLink' => route('url.password.change', ['token' => $token, 'email' => $request->email]),
            'nama' => $emailUser->nama,
            'subject' => 'Reset Password Notification',
        ];
        Mail::to($request->email)->send(new ForgotPassword($attr));

        // Mail::send('auth.verify', , function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset Password Notification');
        // });

        return back()->with('success', 'Silahkan periksa email anda, link reset password telah dikirimkan');
    }

    public function getPassword($token)
    {
        return view('auth.forgetPassword', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8',
            'p-password' => 'required|same:password',
        ];

        $messages = [
            'email.required'        =>  'Email wajib diisi',
            'email.email'           =>  'Email tidak valid',
            'email.exists'          =>  'Email anda belum terdaftar',
            'password.required'     =>  'Password wajib diisi',
            'password.min'          =>  'Password minimal 8 karakter',
            'p-password.required'   =>  'Konfirmasi password wajib diisi',
            'p-password.same'       =>  'Konfirmasi password berbeda, silahkan periksa kembali',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$updatePassword) return back()->withInput()->with('fail', 'Invalid token!');

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('success', 'Password berhasil diubah');
    }
}
