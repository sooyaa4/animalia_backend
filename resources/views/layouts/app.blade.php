<!doctype html>
<html lang="en">
    <head>
        @include('includes.meta')
        @include('includes.metaAdmin')

        @stack('before-style')
        @include('includes.stylesAdmin')
        @stack('after-style')

        <title>{{ $title ?? env('APP_NAME') }}</title>
    </head>
    <body>
        <div class="w-80">
            <header>
                @include('template.navbar')
                @include('template.breadcumb')
            </header>
            
            @yield('header')

            @include('partials.alert')

            @yield('content')
        </div>

        {{-- @include('includes.modal_changePassword')
        @include('includes.modal_change_password') --}}
        
        @include('template.footer')


        @stack('before-script')
        @include('includes.scriptAdmin')
        @stack('after-script')

    </body>
</html>