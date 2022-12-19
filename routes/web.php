<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\JasaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MetodeController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\JenisKirimController;
use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\CookieController;
use App\Http\Controllers\Admin\TransaksiJasaController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\Laporan\LapBmasukController;
use App\Http\Controllers\Admin\Laporan\LapPelangganController;
use App\Http\Controllers\KaryawanPembayaran\DashboardController;
use App\Http\Controllers\KaryawanTransaksi\DashboardKController;
use App\Http\Controllers\KaryawanPembayaran\PembayaranController;
use App\Http\Controllers\Admin\Laporan\LapTransaksiProdController;
use App\Http\Controllers\KaryawanTreatment\KarTreatmentController;

use App\Http\Controllers\Admin\Laporan\LapTransaksiTreatController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\KaryawanPengiriman\PengirimanKarController;
use App\Http\Controllers\KaryawanTransaksi\TransaksiBarangController;
use App\Http\Controllers\KaryawanTransaksi\TransaksiTreatmentController;
use App\Http\Controllers\KaryawanPengiriman\DahsboardPengirimanController;
use App\Http\Controllers\KaryawanTreatment\DashboardKarTreatmentController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('auth.post.login');
Route::get('/postLogout', [AuthController::class, 'postLogout'])->name('auth.post.logout');

Route::get('/setck',[CookieController::class,'setCookie']);
Route::get('/getck',[CookieController::class,'getCookie']);

Route::get('/', function () {
    return view('layouts.login');
})->name('login');


Route::group(['middleware' => 'role:Admin'], function () {

    Route::prefix('Admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('Admin');
        
        Route::get('/session',[SessionController::class,'index']);
        Route::resource('katbarang', KategoriProdukController::class);
        Route::resource('produkbar', ProdukController::class);
        Route::resource('produkbar.gambar', GalleryController::class);
        Route::resource('jasa', JasaController::class);
        Route::resource('layanan', LayananController::class);
        
        Route::resource('metode', MetodeController::class);
        Route::resource('jenis', JenisKirimController::class);

        Route::resource('karyawan', KaryawanController::class);
        Route::resource('jabatan', JabatanController::class);

        Route::resource('pelanggan', PelangganController::class);
        
        Route::resource('masuk', BarangMasukController::class);

        Route::resource('belibarang', TransaksiController::class);
        
        Route::resource('sewajasa', TransaksiJasaController::class);

        Route::resource('lappelanggan', LapPelangganController::class);
        Route::get('/print_pdf/{id}', [LapPelangganController::class, 'exportPDF']);
        Route::get('/print_all', [LapPelangganController::class, 'printAllReport'])->name('print.all.report');
        Route::get('/export_user', [LapPelangganController::class, 'exportUsers'])->name('export.users');


        Route::resource('laptransaksiprod', LapTransaksiProdController::class);
        Route::get('/print_transaprod', [LapTransaksiProdController::class, 'printAllReporttransaprod'])->name('print.all.transapod');
        Route::get('/print_pdf/{id}', [LapTransaksiProdController::class, 'printPdf']);

        Route::resource('laptransaksiment', LapTransaksiTreatController::class);
        Route::get('/print_transament', [LapTransaksiTreatController::class, 'printAllReporttransament'])->name('print.all.transament');
        Route::get('/print_pdf_treatment/{id}', [LapTransaksiTreatController::class, 'printPdf']);

        Route::resource('lapbarmasuk', LapBmasukController::class);
        Route::get('/print_barangmasuk', [LapBmasukController::class, 'printAllReport'])->name('print.all.barangmasuk');
    });

    

    
});
Route::group(['middleware' => 'role:karyawan_transaksi'], function () {

    Route::prefix('karyawan_transaksi')->group(function () {
        Route::get('/dashboard', [DashboardKController::class, 'index'])->name('karyawan_transaksi');
        Route::resource('transaprod', TransaksiBarangController::class);
        Route::resource('transament', TransaksiTreatmentController::class);

    });

    

    
});

Route::group(['middleware' => 'role:karyawan_keuangan'], function () {

    Route::prefix('karyawan_keuangan')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('karyawan_keuangan');
        
        Route::resource('pembayaran', PembayaranController::class);


    });

    

    
});

Route::group(['middleware' => 'role:karyawan_pengiriman'], function () {

    Route::prefix('karyawan_pengiriman')->group(function () {
        Route::get('/dashboard', [DahsboardPengirimanController::class, 'index'])->name('karyawan_pengiriman');
        
        Route::resource('pengiriman', PengirimanKarController::class);


    });

    

    
});

Route::group(['middleware' => 'role:karyawan_treatment'], function () {

    Route::prefix('karyawan_treatment')->group(function () {
        Route::get('/dashboard', [DashboardKarTreatmentController::class, 'index'])->name('karyawan_treatment');
        
        Route::resource('kartrans', KarTreatmentController::class);


    });

    

    
});