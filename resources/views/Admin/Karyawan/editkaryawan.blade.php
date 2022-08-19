@extends('Admin.halaman')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <h3 class="bio-menu p-3"><i class="fas fa-user-cog pe-2"></i> Edit Karyawan</h3>
                        </a>
                    </div>
                </div>
                <!-- akhir menu peserta -->
            </div>
        </div>

        <div class="col-lg-8 mt-3 mt-lg-0">
            <div class="bg-white pb-0">
                <h1 class="p-4">Data Karyawan</h1>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="bg-white my-3 p-4 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{ route('karyawan.update', ['karyawan' => $karyawan->id]) }}" method="POST">
                        @method('put')
                        @csrf
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}">
                            </div>

                            <div class="mb-4">
                                <label for="jeniskategori" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $karyawan->user->email) }}" >
                            </div>

                            <div class="mb-4">
                                <label for="merk" class="form-label">No Hp</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}">
                            </div>

                            <div class="mb-4">
                                <label for="jabatan" class="form-label">Jabatan <span class="required">*<span></label>
                                <select class="form-select" name="jabatan_id" id="jabatan_id" aria-label="Pilih jabatan" required>
                                    @foreach ($jabatan as $d)
                                        <option value="{{ $d->id }}"
                                            {{ old('jabatan') == null ? ($d->id == $karyawan->jabatan_id ? 'selected' : '') : '' }}>
                                            {{ $d->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Invalid input.
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="role" class="form-label">Role <span class="required">*<span></label>
                                <select class="form-select" name="role" id="role" aria-label="Pilih Role" required>
                                    <option value="---" selected>- Pilih -</option>
                                    <option value="karyawan_transaksi" selected>- Karyawan transaksi -</option>
                                    <option value="karyawan_keuangan" selected>- Karyawan pembayaran -</option>
                                    <option value="karyawan_pengiriman" selected>- Karyawan pengiriman -</option>
                                    <option value="karyawan_gudang" selected>- Karyawan Gudang -</option>
                                    <option value="{{ old('role', $user->role) }}" selected>{{ old('role', $user->role) }}</option>
                                </select>
                            </div>
                        
                            <div class="d-flex bd-highlight">
                                <div class="bd-highlight p-2"style="margin-left: 300px">
                                    <button type="submit" name="btn-simpan-personal"
                                        class="btn btn-simpan">Edit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection