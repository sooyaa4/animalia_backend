@extends('layouts.app')

@section('header')
<div class="container mt-3">
    <div class="d-md-flex bd-highlight align-items-center">
        <div class="me-auto p-2 mb-2 mb-md-0 bd-highlight">
            <h1>Daftar Transaksi</h1>
            <h3 class="fw-normal">Transaksi Pelanggan</h3>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center bg-white pb-0">
                <h1 class="p-4">Status Transaksi</h1>
            </div>            
                <div class="bg-white input-data-mentor">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                            <form action="{{ route('transament.update', ['transament' => $transaksi->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="status" class="form-label">Status transaksi <span class="required">*<span></label>
                                <select class="form-select" name="status" id="status" aria-label="Pilih status" required>
                                    <option value="{{ $transaksi->status }}" selected>{{ $transaksi->status }}</option>
                                    <option disabled selected>- Pilih -</option>
                                    <option value="Di batalkan" selected>- Di batalkan -</option>
                                    <option value="Pesanan di proses" selected>- Pesanan di proses -</option>
                                </select>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="bd-highlight p-2"style="margin-left: 350px">
                                    <button type="submit" name="btn-simpan-personal"
                                        class="btn btn-digitaliz">Simpan</button>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
        </div>
    </div> 
</div>
@endsection