<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;

class CookieController extends Controller
{
    public function setCookie()
    {
        return response()->json(['Cookie set successfully.'])->cookie(
            'test-cookie', 'Demo 2', 120
        );
    }

    public function getCookie(Request $request)
    {
        $value = Cookie::get('test-cookie');
        dd($value);
    }
     
}
