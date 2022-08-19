<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ (Auth::check()) ? route(Auth::user()->role) : route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('image/animalia.png')}}" alt="" style="width: 100px">
        </div>
        <div class="sidebar-brand-text mx-3">Animalia <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ (Auth::check()) ? route(Auth::user()->role) : route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data master dan transaksi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data master:</h6>
                <a class="collapse-item" href="/Admin/katbarang">Kategori barang</a>
                <a class="collapse-item" href="/Admin/produkbar">Produk barang</a>
                <a class="collapse-item" href="/Admin/jasa">Jasa</a>
                <a class="collapse-item" href="/Admin/layanan">Layanan</a>
                <a class="collapse-item" href="/Admin/metode">Metode bayar</a>
                <a class="collapse-item" href="/Admin/jenis">Jenis pengiriman</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Transaksi:</h6>
                <a class="collapse-item" href="/Admin/belibarang">Transaksi Produk</a>
                <a class="collapse-item" href="/Admin/sewajasa">Transaksi Jasa</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Pengguna dan pencatat stok
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Karyawan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data karyawan :</h6>
                <a class="collapse-item" href="/Admin/karyawan">Data karyawan</a>
                <a class="collapse-item" href="/Admin/jabatan">Data jabatan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/Admin/pelanggan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data pelanggan</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/Admin/masuk">
            <i class="fas fa-fw fa-table"></i>
            <span>Pencatatan stok</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-file"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Laporan:</h6>
                <a class="collapse-item" href="/Admin/lappelanggan">Pelanggan</a>
                <a class="collapse-item" href="/Admin/laptransaksiprod">Transaksi Produk</a>
                <a class="collapse-item" href="/Admin/laptransaksiment">Transaksi Jasa</a>
                <a class="collapse-item" href="/Admin/lapbarmasuk">Barang Masuk</a>
            </div>
        </div>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>