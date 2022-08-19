@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi Treatment</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Treatment</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><i class="far fa-flag"></i></th>
                            <th>Nama pelanggan</th>
                            <th>Tanggal booking</th>
                            <th>Jasa</th>
                            <th>Layanan</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $d)   
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{ $d->user->pelanggan->nama}}</td>
                            <td>{{ $d->tanggal_booking}}</td>
                            <td>{{ $d->detailjasa[0]->jasa->nama_jasa }}</td>
                            <td>{{ $d->detailjasa[0]->layanan->nama_layanan }}</td>
                            <td>{{ $d->status }}</td>
                            <td class="text-center">
                                @if ($d->status == "Selesai")
                                <a href="/karyawan_treatment/kartrans/{{ $d->id }}" class="btn btn-digitaliz"><i class="fas fa-external-link-alt"></i></a>
                                @else
                                    @if ($d->tanggal_booking == $date)
                                    <a href="/karyawan_treatment/kartrans/{{ $d->id }}" class="btn btn-digitaliz"><i class="fas fa-external-link-alt"></i></a>
                                    <a href="{{ route('kartrans.edit', ['kartran' => $d->id])}}" class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></a>
                                    @else
                                    <a href="/karyawan_treatment/kartrans/{{ $d->id }}" class="btn btn-digitaliz"><i class="fas fa-external-link-alt"></i></a>
                                    <a href="{{ route('kartrans.edit', ['kartran' => $d->id])}}" class="btn btn-primary btn-edit disabled"><i class="fas fa-edit" disabled></i></a>
                                    @endif
                                @endif   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="addMentor">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                <h3 class="modal-title">Status Transaksi</h4>
            </div>
            <div class="modal-body px-5 mb-4">
                <form action="{{ route('kartrans.update', ['kartran' => $d->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" id="status">
                    <div class="mb-4">
                        <label for="status" class="form-label">Pilih Status</label>
                        <select class="form-select text-muted" name="status" id="status">
                            <option disabled selected>- Pilih -</option>
                            <option value="Di batalkan" selected>- Di batalkan -</option>
                            <option value="Pesanan di proses" selected>- Pesanan di proses -</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-digitaliz btn-right"><i class="far fa-plus-square me-2"></i>Add Data</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

{{-- @push('after-script')
<script>
        
    function getPesertaId(id){
        $('#peserta-id').val(id);
        let html = '';
        $.ajax({
            url: `{{ url('admin/peserta-mentor/json') }}`,
            type: "GET",
            data: {
                
                'id': id,
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('#mentor').empty();
                html += `<option value="" selected>-Pilih-</option>`;
                $.each(data, function(index) {
                    html += `<option value="${data[index].id}">${data[index].nama}</option>`;
                });
                $('#mentor').append(html);
            },
        });
    }
    </script>
@endpush  --}}
@endsection