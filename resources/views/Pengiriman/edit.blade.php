@extends('layouts.app')

@section('header')
<div class="container mt-3">
    <div class="d-md-flex bd-highlight align-items-center">
        <div class="me-auto p-2 mb-2 mb-md-0 bd-highlight">
            <h1>Daftar Pengiriman</h1>
            <h3 class="fw-normal">Pembayaran Pengiriman</h3>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center bg-white pb-0">
                <h1 class="p-4">Status Pengiriman</h1>
            </div>            
                <div class="bg-white input-data-mentor">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                            <form action="{{ route('pengiriman.update', ['pengiriman' => $pengiriman->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="status" class="form-label">Status Pengiriman <span class="required">*<span></label>
                                <select class="form-select" name="status" id="status" aria-label="Pilih status" required>
                                    <option value="{{ $pengiriman->status }}" selected>{{ $pengiriman->status }}</option>
                                    <option disabled selected>- Pilih -</option>
                                    <option value="Paket di kirim" selected>- Paket di kirim -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="JenisKirim_id" class="form-label">Jenis Kurir</label>
                                <input type="text" required class="form-control" name="JenisKirim_id" id="JenisKirim_id" placeholder="{{ $pengiriman->metodkirim->nama_jenis_kirim }}" value="{{ old('no_resi') }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="noresi" class="form-label">Nomer Resi</label>
                                <input type="text" required class="form-control" name="noresi" id="noresi" placeholder="Aaxxaqz" value="{{ old('noresi') }}">
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