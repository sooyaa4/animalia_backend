@if (session()->has('success'))
    <div class="col">
        <div class="alert alert-success alert-dismissible fade show col-lg-12 text-center" role="alert">    
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

{{-- @if (session()->has('fail'))
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show col-lg-12 text-center" role="alert">    
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif --}}

@if (session('errors'))
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show align-items-center" role="alert">
            Oopps. Terdapat Kesalahan Pada Inputan :
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif