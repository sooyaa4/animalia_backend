<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
      <a class="navbar-brand" href="#">
          <img src="{{ asset('image/animalia.png') }}" height="60">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
            <li class="nav-item px-2">
                <a class="nav-link {{ (Auth::check()) ? (Request::is('*/dashboard') ? 'active' : '') : (Request::is('/') ? 'active' : '') }}" href="{{ (Auth::check()) ? route(Auth::user()->role) : route('home') }}">Home</a>
            </li>
            @auth
            
          @if(Auth::user()->role == "karyawan_transaksi")
            <li class="nav-item px-2">
              <a class="nav-link {{ Request::is('*/Karyawan_transaksi*') ? 'active' : '' }}" href="{{ url(Auth::user()->role . '/transaprod' ) }}">Transaksi Barang</a>
            </li>  
            <li class="nav-item px-2">
              <a class="nav-link {{ Request::is('*/Karyawan_transaksi*') ? 'active' : '' }}" href="{{ url(Auth::user()->role . '/transament' ) }}">Transaksi Treatment</a>
            </li>
          @endif

          @if(Auth::user()->role == "karyawan_keuangan")
            <li class="nav-item px-2">
              <a class="nav-link {{ Request::is('*/Karyawan_keuangan*') ? 'active' : '' }}" href="{{ url(Auth::user()->role . '/pembayaran' ) }}">Pembayaran</a>
            </li>
          @endif

          @if (Auth::user()->role == "karyawan_pengiriman")
            <li class="nav-item px-2">
              <a class="nav-link {{ Request::is('*/Karyawan_pengiriman*') ? 'active' : '' }}" href="{{ url(Auth::user()->role . '/pengiriman' ) }}">Pengiriman</a>
            </li>   
          @endif

          @if (Auth::user()->role == "karyawan_treatment")
            <li class="nav-item px-2">
              <a class="nav-link {{ Request::is('*/Karyawan_treatment*') ? 'active' : '' }}" href="{{ url(Auth::user()->role . '/kartrans' ) }}">Transaksi Treatment</a>
            </li>
          @endif
              <li class="nav-item pe-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://ui-avatars.com/api/Auth::user()->email" alt="mdo" class="rounded-circle" width="32" height="32">
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown" style="width: 230px" style="height: 273px" style="border-radius: 10px">
                  @if (Auth::user()->role == "peserta")
                    <li><a class="dropdown-item " href="{{ url(Auth::user()->role . '/profil' ) }}"> Profile  </a></li>
                  @endif
                  <li><a class="dropdown-item text-capitalize">{{ Auth::user()->role }}</a></li>
                  <li><a class="dropdown-item " >{{ Auth::user()->karyawan->nama_karyawan }}</a></li>
                  <li><a class="dropdown-item ">{{ Auth::user()->email }}</a></li>
                  <li><a class="dropdown-item " href="{{ route('auth.post.logout') }}"> <b> Logout </b></a></li>
                </ul>
              </li>
            @endauth
          </ul>
    </div>
  </div>
</nav>
