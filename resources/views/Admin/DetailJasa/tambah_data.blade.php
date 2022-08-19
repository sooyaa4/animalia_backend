@extends('layouts.app')

@section('header')
<div class="container mt-3">
    <div class="d-md-flex bd-highlight align-items-center">
        <div class="me-auto p-2 mb-2 mb-md-0 bd-highlight">
            <h1>Daftar Karyawan Treatment</h1>
            <h3 class="fw-normal">Karyawan Treatment</h3>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center bg-white pb-0">
                <h1 class="p-4">Pilih karyawan</h1>
            </div>            
                <div class="bg-white input-data-mentor">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                            <form action="{{ route('sewajasa.update', ['sewajasa' => $transaksi->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="jabatan_id" class="form-label">Jabatan/Posisi</label>
                                <select class="form-select text-muted" required name="karyawan_id" id="karyawan_id">
                                    <option value="">- Pilih -</option>
                                    @foreach ($karyawan as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_karyawan }}</option>
                                    @endforeach
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