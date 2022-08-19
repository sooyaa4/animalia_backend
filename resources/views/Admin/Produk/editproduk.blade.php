@extends('Admin.halaman')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <h3 class="bio-menu p-3"><i class="fas fa-user-cog pe-2"></i> Edit Produk</h3>
                        </a>
                    </div>
                </div>
                <!-- akhir menu peserta -->
            </div>
        </div>

        <div class="col-lg-8 mt-3 mt-lg-0">
            <div class="bg-white pb-0">
                <h1 class="p-4">Edit Produk barang</h1>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="bg-white my-3 p-4 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="POST" action="{{ route('produkbar.update', ['produkbar' => $produk->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $produk->nama_barang) }}">
                        </div>

                        <div class="mb-4">
                            <label for="kategori_id" class="form-label">Jenis kategori<span class="required">*<span></label>
                            <select class="form-select @error('katbarang') is-invalid @enderror" name="kategori_id" id="kategori_id" aria-label="Select Jenis Kategori">
                                @foreach ($kategori as $d)
                                    <option value="{{ $d->kategori_id }}"
                                        {{ old('kategori') == null ? ($d->id == $produk->kategori_id ? 'selected' : '') : '' }}>
                                        {{ $d->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Invalid input.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="merk" class="form-label">Merk Barang</label>
                            <input type="text" class="form-control" name="merk_barang" id="merk_barang" value="{{ old('merk_barang', $produk->merk_barang) }}">
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                            <input type="text" class="form-control" name="deskripsi_barang" id="deskripsi_barang" value="{{ old('deskripsi_barang', $produk->deskripsi_barang) }}">
                        </div>

                        <div class="mb-4">
                            <label for="berat" class="form-label">Berat Barang</label>
                            <input type="number" class="form-control" name="berat" id="berat" value="{{ old('berat', $produk->berat) }}">
                        </div>

                        <div class="mb-4">
                            <label for="satuan" class="form-label">Satuan <span class="required">*<span></label>
                            <select class="form-select" name="satuan" id="satuan" aria-label="Pilih Satuan berat" required>
                                <option value="---" selected>- Pilih -</option>
                                <option value="Gram" selected>- Gram -</option>
                                <option value="Kilo" selected>- Kilo -</option>>
                                <option value="{{ old('satuan', $produk->satuan) }}" selected>{{ old('satuan', $produk->satuan) }}</option>                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="stok" class="form-label">Jumlah Stok Barang</label>
                            <input type="number" class="form-control" name="stok" id="stok" value="{{ old('stok', $produk->stok) }}">
                        </div>

                        <div class="mb-4">
                            <label for="harga" class="form-label">Harga Barang</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $produk->harga) }}">
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