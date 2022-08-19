<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\MetodeBayarController;
use App\Http\Controllers\Api\TransaksiBarangController;
use App\Http\Controllers\Api\LayananTreatmentController;
use App\Http\Controllers\Api\PilihanKirimanController;
use App\Http\Controllers\Api\TransaksiTreatmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('fetch/{user_id}', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('transactions/{user_id}', [TransaksiBarangController::class, 'all']);
    // Route::get('transactions', [TransaksiBarangController::class, 'all']);

    Route::post('cobarang', [TransaksiBarangController::class, 'checkout']);

    Route::post('alldone', [TransaksiBarangController::class, 'Alldone']);

    Route::get('treatments/{user_id}', [TransaksiTreatmentController::class, 'all']);
    Route::post('cotreatment', [TransaksiTreatmentController::class, 'checkout']);
});

Route::get('produk', [BarangController::class, 'all']);
Route::get('kategori', [KategoriController::class, 'all']);
Route::get('treatment', [TreatmentController::class, 'all']);
Route::get('layanan', [LayananTreatmentController::class, 'all']);
Route::get('metodbayar', [MetodeBayarController::class, 'all']);
Route::get('pengiriman', [PilihanKirimanController::class, 'all']);

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);