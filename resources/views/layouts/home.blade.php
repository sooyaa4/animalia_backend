<!doctype html>
<html lang="en">
    <head>
        @include('includes.meta')

        @stack('before-style')
        @include('includes.styles')
        @stack('after-style')
        
        <!-- libary slick css -->
        <link rel="stylesheet" type="text/css" href="/lib/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="/lib/slick/slick-theme.css" />

        <!-- style home -->
        <link rel="stylesheet" href="/css/home_style.css">

        <title>{{ $title ?? env('APP_NAME') }}</title>

    </head>
    <body>
        <div class="w-80">
            {{-- @include('template.navbar') --}}
            
            @yield('header')
            {{-- @yield('content') --}}
            {{-- content --}}
            <!-- header -->
            <header>
                <div class="container">
                    <div
                        class="row row-cols-lg-2 row-cols-md-1 row-cols-sm-1 align-items-center justify-content-center text-center text-lg-start">
                        <div class="col-lg-5 pe-0">
                            <h1 class="mb-3 mt-3 fw-bold">
                                Gapai Mimpimu
                                <br>
                                Raihlah Masa Depanmu
                            </h1>
                            <p class="text-muted fw-bold">
                                Magang Digitaliz merupakan platform untuk pelaporan peserta 
                                <br>
                                magang Digitaliz
                            </p>
                            <a href="" class="btn btn-masuk fw-bold px-5 py-2 mt-1">Masuk Sekarang</a>
                        </div>
                        <div class="col-lg-4">
                            <img src="image/home-image.png" alt="home-image" class="img-fluid" width="500px">
                        </div>
                    </div>
                </div>
            </header>
            <!-- akhir header -->

            <main>
                <!-- Stats -->
                <div class="container">
                    <section class="section-stats row justify-content-center" id="stats">
                        <div class="col-4 text-center col-md-3 stats-detail stats-detail-left">
                            <p>Peserta Aktif</p>
                            <h2></h2>
                        </div>
                        <div class="col-4 text-center col-md-3 stats-detail">
                            <p>Total Peserta</p>
                            <h2></h2>
                        </div>
                        <div class="col-4 text-center col-md-3 stats-detail stats-detail-right">
                            <p>Total Mentor</p>
                            <h2></h2>
                        </div>
                    </section>
                </div>
                <!-- Akhir Stats -->

                <!-- Berita -->
                <section class="section-berita" id="berita">
                    <section class="section-berita-heading" id="beritaHeading">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <h1>Terbaru</h1>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section-berita-content">
                        <div class="container">
                            <div class="row row-cols-lg-5 row-cols-md-4 justify-content-center">
                                <div class="col">
                                    <div class="card card-berita p-2 my-2">
                                        <p class="fw-bold tgl-berita mb-2">15 Juli 2021</p>
                                        <img src="{{ asset('image/animalia.png') }}" alt="" class="img-fluid mb-2">
                                        <p class="fw-bold mb-1 judul-berita">
                                            Pengumuman
                                            <br>
                                            Magang Kampus Merdeka
                                        </p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card card-berita p-2 my-2">
                                        <p class="fw-bold tgl-berita mb-2">15 Juli 2021</p>
                                        <img src="{{ asset('image/animalia.png') }}" alt="" class="img-fluid mb-2">
                                        <p class="fw-bold mb-1 judul-berita">
                                            Pengumuman
                                            <br>
                                            Magang Kampus Merdeka
                                        </p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card card-berita p-2 my-2">
                                        <p class="fw-bold tgl-berita mb-2">15 Juli 2021</p>
                                        <img src="{{ asset('image/berita_home.png') }}" alt="" class="img-fluid mb-2">
                                        <p class="fw-bold mb-1 judul-berita">
                                            Pengumuman
                                            <br>
                                            Magang Kampus Merdeka
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <!-- Akhir Berita -->

                <!-- Tentang -->
                <section class="section-tentang" id="tentang">
                    <div class="container">
                        <section class="section-tentang-heading" id="tentangHeading">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <h1>Tentang Kami</h3>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="section-tentang-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7">
                                    <h4>Magang Digitaliz</h4>
                                    <p class="fw-bold">
                                        Magang Merupakan platform untuk pelaporan
                                        <br>
                                        Peserta Magang Digitaliz
                                    </p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, id.
                                        Officiis, veritatis praesentium expedita, necessitatibus eligendi obcaecati provident
                                        pariatur cum itaque corrupti fugit deserunt. Suscipit necessitatibus, rerum quam eum
                                        veritatis in atque dolore velit modi excepturi error praesentium odio temporibus
                                        accusamus
                                        voluptates odit commodi quis voluptatum laborum culpa exercitationem. Incidunt.</p>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('image/about_home.png') }}" alt="foto_home" class="img-fluid">
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
                <!-- Akhir Tentang -->

                <!-- Mentor -->
                <section class="section-mentor">
                    <section class="section-mentor-heading" id="mentorHeading">
                        <div class="container ">
                            <div class="row">
                                <div class="col text-center">
                                    <h1>Mentor Kami</h1>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section-mentor-content" id="mentorContent">
                        <div class="container">
                            <div class="row justify-content-center slider">
                
                                <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                                    <div class="card card-mentor text-center p-2">

                                        <h5></h5>
                                        <p>
                       
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </section>
                <!-- Akhir Mentor -->

                <!-- Alumni -->
                <section class="section-alumni">
                    <section class="section-alumni-heading" id="alumniHeading">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <h1>Alumni Magang</h1>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section-alumni-content" id="alumniContent">
                        <div class="container">
                            <div class="row justify-content-center slider">

                            </div>
                        </div>
                    </section>
                </section>
                <!-- Akhir Alumni -->
            </main>
            {{-- akhir content --}}
        </div>

        @include('template.footer')

        @stack('before-script')
        @include('includes.scripts')
        @stack('after-script')

        <!-- libary slick  -->
        <script src="lib/slick/slick.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.slider').slick({
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    autoplay: true,
                    arrows: true,
                    dots: true,
                    autoplaySpeed: 2000,
                });
            });
        </script>

    </body>
</html>