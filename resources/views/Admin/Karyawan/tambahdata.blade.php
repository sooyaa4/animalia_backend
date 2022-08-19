@extends('Admin.halaman')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center bg-white pb-0">
                <h1 class="p-4">Tambah Data Karyawan</h1>
            </div>            
                <div class="bg-white input-data-mentor">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                            <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_karyawan" class="form-label">Nama Lengkap</label>
                                <input type="text" required name="nama_karyawan" id="nama_karyawan" class="form-control" value="{{ old('nama_karyawan') }}" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. Telp</label>
                                <input type="number"  required name="no_hp" id="no_hp" class="form-control"  placeholder="Masukkan No. Telp">
                            </div>
                            <div class="mb-3">
                                <label for="jabatan_id" class="form-label">Jabatan/Posisi</label>
                                <select class="form-select text-muted" required name="jabatan_id" id="jabatan_id">
                                    <option value="">- Pilih -</option>
                                    @foreach ($jabatan as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" required class="form-control" name="email" id="email" placeholder="nama@example.com" value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" required class="form-control" name="password" id="password"
                                        placeholder="*****************">
                                </div>
                            </div>
                            {{-- <div class="mb-4">
                                <label for="role" class="form-label">Role <span class="required">*<span></label>
                                <select class="form-select" name="role" id="role" aria-label="Pilih Role" required>
                                    <option value="" selected>- Pilih -</option>
                                    <option value="karyawan_transaksi" selected>- Karyawan transaksi -</option>
                                    <option value="karyawan_keuangan" selected>- Karyawan pembayaran -</option>
                                    <option value="karyawan_pengiriman" selected>- Karyawan pengiriman -</option>
                                    <option value="karyawan_gudang" selected>- Karyawan Gudang -</option>
                                    <option value="karyawan_treatment" selected>- Karyawan treatment -</option>
                                </select>
                            </div> --}}
                            <div class="d-flex bd-highlight">
                                <div class="bd-highlight p-2"style="margin-left: 300px">
                                    <button type="submit" name="btn-simpan-personal"
                                        class="btn btn-simpan">Simpan</button>
                                </div>
                            </div>
                            </form>
                        </div>    
                    </div>
                </div>
        </div>
    </div> 
</div>


@endsection
