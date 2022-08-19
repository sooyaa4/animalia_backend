@extends('layouts.app')

@section('header')
<div class="container mt-3">
    <div class="d-md-flex bd-highlight align-items-center">
        <div class="me-auto p-2 mb-2 mb-md-0 bd-highlight">
            <h1>Daftar Pembayaran</h1>
            <h3 class="fw-normal">Pembayaran Pelanggan</h3>
        </div>
    </div>
</div>
@endsection

@section('content')
<main class="dashboard">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-3">
            <div class="col">
              <div class="card card-satu mb-3">
                <div class="card-body text-white p-4">
                  <h5 class="card-title">{{ $pembayaran_1->count() }}</h5>
                  <p class="card-text fw-light">Status Pembayaran di cek</p>
                </div>
                <div class="card-footer text-center">
                  <a class="text-white text-decoration-none" href="">More info<i class="fas fa-caret-down ps-2"></i></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-dua mb-3">
                <div class="card-body text-white p-4">
                  <h5 class="card-title">{{ $pembayaran_2->count() }}</h5>
                  <p class="card-text fw-light">Status Pembayaran gagal</p>
                </div>
                <div class="card-footer text-center">
                  <a class="text-white text-decoration-none" href="">More info<i class="fas fa-caret-down ps-2"></i></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-tiga mb-3">
                <div class="card-body text-white p-4">
                  <h5 class="card-title">{{ $pembayaran_3->count() }}</h5>
                  <p class="card-text fw-light">Status Pembayaran Disetujui</p>
                </div>
                <div class="card-footer text-center">
                  <a class="text-white text-decoration-none" href="">More info<i class="fas fa-caret-down ps-2"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>

    
    
</main>
@endsection