@extends('Admin.halaman')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center bg-white pb-0">
                <h1 class="p-4">Tambah Data Barang Masuk</h1>
            </div>            
                <div class="bg-white input-data-mentor">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                            <form action="{{ route('masuk.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="jabatan_id" class="form-control">Nama Barang</label>
                                <select class="form-control form-control-user" required name="produk_id" id="produk_id">
                                    <option value="">- Pilih -</option>
                                    @foreach ($barang as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal masuk</label>
                                <input type="date" required class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="19-06-2022" value="{{ old('tanggal_masuk') }}">
                            </div>
                            <div class="mb-3">
                                <label for="stok_masuk" class="form-label">Jumlah Stok Masuk</label>
                                <input type="number" required class="form-control" name="stok_masuk" id="stok_masuk" placeholder="20" value="{{ old('stok_masuk') }}">
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="bd-highlight p-2"style="margin-left: 300px">
                                    <button type="submit" name="btn-simpan-personal"
                                        class="btn btn-simpan">Simpan</button>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
        </div>
    </div> 
</div>


@endsection
