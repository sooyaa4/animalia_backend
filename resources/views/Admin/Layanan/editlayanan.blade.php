@extends('Admin.halaman')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <h3 class="bio-menu p-3"><i class="fas fa-user-cog pe-2"></i> Edit Layanan Treatment</h3>
                        </a>
                    </div>
                </div>
                <!-- akhir menu peserta -->
            </div>
        </div>

        <div class="col-lg-8 mt-3 mt-lg-0">
            <div class="bg-white pb-0">
                <h1 class="p-4">Edit Layanan Treatment</h1>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="bg-white my-3 p-4 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="POST" action="{{ route('layanan.update', ['layanan' => $layanan->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Layanan</label>
                            <input type="text" class="form-control" name="nama_layanan" id="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}">
                        </div>

                        <div class="mb-4">
                            <label for="harga" class="form-label">Biaya Layanan</label>
                            <input type="number" class="form-control" name="biaya" id="biaya" value="{{ old('biaya', $layanan->biaya) }}">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn-primary btn-edit">Edit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection