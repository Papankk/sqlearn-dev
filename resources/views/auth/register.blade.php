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
                    <div class="card custom-card my-5 border">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="card-body px-5 py-5 pt-4 pb-4">
                                <p class="h5 mb-2 text-center">Sign Up</p>
                                <div class="row gy-3">

                                    <!-- Name Field -->
                                    <div class="col-xl-12">
                                        <label for="name" class="form-label text-default">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" autofocus
                                            autocomplete="name" placeholder="Masukkan nama">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email Field -->
                                    <div class="col-xl-12">
                                        <label for="email" class="form-label text-default">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            autocomplete="username" placeholder="Masukkan email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Username Field -->
                                    <div class="col-xl-12">
                                        <label for="username" class="fw-medium">Username</label>
                                        <input type="text" id="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" autocomplete="username"
                                            placeholder="Masukkan username">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password Field -->
                                    <div class="col-xl-12">
                                        <label for="password" class="form-label">Kata Sandi</label>
                                        <div class="position-relative">
                                            <input type="password"
                                                class="form-control create-password-input @error('password') is-invalid @enderror"
                                                id="password" placeholder="Masukkan kata sandi" name="password"
                                                autocomplete="new-password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted"
                                                onclick="createpassword('password',this)" id="button-addon21">
                                                <i class="ri-eye-off-line align-middle"></i>
                                            </a>
                                            <div id="passwordHelpBlock" class="form-text">
                                                Kata sandi Anda harus terdiri dari 8-20 karakter, terdiri dari huruf dan
                                                angka.
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Confirm Password Field -->
                                    <div class="col-xl-12">
                                        <label for="password_confirmation" class="form-label text-default">Ulangi Kata
                                            Sandi</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control create-password-input"
                                                id="password_confirmation" placeholder="Masukkan kata sandi"
                                                name="password_confirmation" autocomplete="new-password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted"
                                                onclick="createpassword('password_confirmation',this)"
                                                id="button-addon21">
                                                <i class="ri-eye-off-line align-middle"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-grid mt-4 mb-2">
                                    <button type="submit" class="btn btn-primary">Buat Akun</button>
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}"
                                            class="text-primary">Masuk</a></p>
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
                        <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" alt=""
                            class="authentication-brand desktop-white">
                    </a>
                </div>
                <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                    <div>
                        <h3 class="text-fixed-white mb-1 fw-medium">Selamat Datang!</h3>
                        <p class="text-fixed-white mb-1 op-6">Dengan SQLearn, kamu bisa belajar SQL dari nol sampai
                            jago
                            lewat materi seru dan latihan interaktif.
                            Daftar sekarang dan mulai eksplorasi dunia database dengan cara yang asik dan gampang
                            dipahami!
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
