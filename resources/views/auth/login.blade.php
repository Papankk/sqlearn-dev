<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

</html>

@include('template.head')

<body class="bg-white">

    @include('template.switcher')

    <div class="row authentication authentication-cover-main mx-0">
        <div class="col-xxl-6 col-xl-7">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-7 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card my-auto border">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card-body p-5">
                                <p class="h5 mb-2 text-center">Sign In</p>
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="input_type" class="form-label text-default">Email atau
                                            Username</label>
                                        <input type="text"
                                            class="form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror"
                                            id="input_type" placeholder="Masukkan email / username" name="input_type"
                                            value="{{ old('input_type') }}" autofocus autocomplete="username" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <label for="signin-password" class="form-label text-default d-block">Kata
                                            Sandi</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control create-password-input"
                                                id="password" placeholder="Masukkan kata sandi" name="password"
                                                autocomplete="current-password" />
                                            <a href="javascript:void(0);" class="show-password-button text-muted"
                                                onclick="createpassword('password',this)" id="button-addon21"></a>
                                        </div>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="remember_me" name="remember" />
                                                <label class="form-check-label text-muted fw-normal"
                                                    for="defaultCheck1">
                                                    Ingat Kata Sandi ?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4 mb-2">
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                                </div>
                                <div class="d-flex mb-3 justify-content-between gap-2 flex-wrap flex-lg-nowrap">
                                    <button
                                        class="btn btn-lg btn-light-ghost border d-flex align-items-center justify-content-center flex-fill bg-light">
                                        <span class="avatar avatar-xs flex-shrink-0">
                                            <img src="{{ asset('assets/images/media/apps/google.png') }}"
                                                alt="" />
                                        </span>
                                        <span class="lh-1 ms-2 fs-13 text-default">Daftar menggunakan Google</span>
                                    </button>
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mt-3 mb-0">
                                        Belum punya akun?
                                        <a href="{{ route('register') }}" class="text-primary">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-5 col-lg-12 d-xl-block d-none px-0">
            <div class="authentication-cover overflow-hidden">
                <div class="authentication-cover-logo">
                    <a href="/">
                        <img src="{{ asset('/assets/images/brand-logos/desktop-white.png') }}" alt=""
                            class="authentication-brand desktop-white" />
                    </a>
                </div>
                <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                    <div>
                        <h3 class="text-fixed-white mb-1 fw-medium">
                            Selamat Datang Kembali!
                        </h3>
                        <p class="text-fixed-white mb-1 op-6">
                            Senang melihatmu lagi. Yuk, lanjutkan perjalanan belajarmu dan
                            asah skill SQL-mu. Jangan ragu buat eksplorasi materi baru atau
                            coba tantangan seru yang sudah disiapkan untukmu. Selamat
                            belajar!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start::custom-scripts -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- End::custom-scripts -->

    <!-- Show Password JS -->
    <script src="{{ asset('assets/js/show-password.js') }}"></script>
</body>
