<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.metaAdmin')

    <title>{{ $title ?? env('APP_NAME') }}</title>

    <!-- Custom fonts for this template-->
    @stack('before-style')
    @include('includes.stylesAdmin')
    @stack('after-style')

</head>

<body class="bg-gradient-primary">
<div class="container">
        <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                    <div class="row">
                    <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('image/animalia11.png') }}" alt=""></div>
                         <div class="col-lg-6">
                            <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Karyawan</h1>
                                    </div>
                                    @include('partials.alertModal')
                                <form action="{{ route('auth.post.login') }}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                                <div class="invalid-feedback">
                                                    Email wajib diisi.
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit"> Login </button>                                 
                                </form>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @stack('before-script')
    @include('includes.scriptAdmin')
    @stack('after-script')

</body>
@push('after-script')
    <script>
        $(".form-control").on("input", function() {
            if ($("#" + this.id).hasClass('is-invalid') ){
                $("#" + this.id).removeClass('is-invalid');
            }
        });
    </script>
@endpush
</html>