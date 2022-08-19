@extends('Admin.halaman')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <h3 class="bio-menu p-3"><i class="fas fa-user-cog pe-2"></i> Detail Pelanggan</h3>
                        </a>
                    </div>
                </div>
                <!-- akhir menu peserta -->
            </div>
        </div>

        <div class="col-lg-8 mt-3 mt-lg-0">
            <div class="bg-white pb-0">
                <h1 class="p-4">Detail Pelanggan</h1>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="bg-white my-3 p-4 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $pelanggan->nama) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $pelanggan->username) }}" disabled>
                        </div>


                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $pelanggan->user->email) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="no_telp" class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ old('no_telp', $pelanggan->no_telp) }}" disabled>
                        </div>
                        
                        <div class="mb-4">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', $pelanggan->alamat) }}" disabled>
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