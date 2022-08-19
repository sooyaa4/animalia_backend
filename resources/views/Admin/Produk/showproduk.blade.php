@extends('Admin.halaman')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <h3 class="bio-menu p-3"><i class="fas fa-user-cog pe-2"></i> Detail Produk</h3>
                        </a>
                    </div>
                </div>
                <!-- akhir menu peserta -->
            </div>
        </div>

        <div class="col-lg-8 mt-3 mt-lg-0">
            <div class="bg-white pb-0">
                <h1 class="p-4">Detail Produk barang</h1>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="bg-white my-3 p-4 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $produk->nama_barang) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="jeniskategori" class="form-label">Jenis kategori</label>
                            <input type="text" class="form-control" name="kategori_id" id="kategori_id" value="{{ old('kategori_id', $produk->katbarang->nama_kategori) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="merk" class="form-label">Merk Barang</label>
                            <input type="text" class="form-control" name="merk_barang" id="merk_barang" value="{{ old('merk_barang', $produk->merk_barang) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                            <input type="text" class="form-control" name="deskripsi_barang" id="deskripsi_barang" value="{{ old('deskripsi_barang', $produk->deskripsi_barang) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="berat" class="form-label">Berat Barang</label>
                            <input type="number" class="form-control" name="berat" id="berat" value="{{ old('berat', $produk->berat) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="satuan" class="form-label">Satuan Berat Barang</label>
                            <input type="text" class="form-control" name="satuan" id="satuan" value="{{ old('satuan', $produk->satuan) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="stok" class="form-label">Jumlah Stok Barang</label>
                            <input type="number" class="form-control" name="stok" id="stok" value="{{ old('stok', $produk->stok) }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="harga" class="form-label">Harga Barang</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $produk->harga) }}" disabled>
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