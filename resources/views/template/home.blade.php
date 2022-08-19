<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    <title>SI LAPORAN | @yield('title')</title>

    @include('includes.styles')
    @include('includes.scripts')
</head>
<style>
</style>
<body>
    <header>
        @include('template.navbar')
    </header>

    <section class="content">
        @include('template.breadcumb')
        @yield('content')
    </section>
    

    <br>
    <br>
    <br>
    <br>
    <br>
    <br> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        <footer class="stick-bottom">
            @include('template.footer')
        </footer>

    

    
</body>
</html>
