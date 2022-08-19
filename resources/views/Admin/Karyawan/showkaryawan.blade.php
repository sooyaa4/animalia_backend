@extends('Admin.halaman')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <h3 class="bio-menu p-3"><i class="fas fa-user-cog pe-2"></i> Detail Karyawan</h3>
                        </a>
                    </div>
                </div>
                <!-- akhir menu peserta -->
            </div>
        </div>

        <div class="col-lg-8 mt-3 mt-lg-0">
            <div class="bg-white pb-0">
                <h1 class="p-4">Detail Karyawan</h1>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="bg-white my-3 p-4 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="jeniskategori" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $karyawan->user->email) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="merk" class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan_id" id="jabatan_id" value="{{ old('jabatan_id', $karyawan->jabatan->nama_jabatan) }}" disabled>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <a href="" class="btn-primary btn-edit">Edit Data</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection