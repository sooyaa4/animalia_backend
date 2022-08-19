<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.metaAdmin')

    <title>{{ $title ?? env('APP_NAME') }}</title>

    @stack('before-style')
    @include('includes.stylesAdmin')
    @stack('after-style')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.navAdmin')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('header')

                <div class="container-fluid">
    
                @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <!-- Footer -->
            <footer class="stick-bottom">
                @include('template.footerAdmin')
            </footer>
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('template.modalLogout')


    @stack('before-script')
    @include('includes.scriptAdmin')
    @stack('after-script')

</body>

</html>