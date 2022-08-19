<!doctype html>
<html lang="en">
    <head>
        @include('includes.meta')

        @stack('before-style')
        @include('includes.styles')
        @stack('after-style')

        <title>{{ $title ?? env('APP_NAME') }}</title>
    </head>
    <body>
        
        @yield('content')

        @stack('before-script')
        @include('includes.scripts')
        @stack('after-script')

        {{-- @include('includes.footer') --}}
    </body>
</html>