<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed"
    data-theme-mode="light" data-toggled="close">


<!-- Mirrored from php.spruko.com/xintra/xintra/pages/landing.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:47:16 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Codeigniter Bootstrap Responsive Admin Web Dashboard Template">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="php, php dashboard, php template, php admin panel, php admin, admin template, bootstrap admin template, dashboard admin template, php frameworks, php my admin, admin, best php framework, php backend, admin php, dashboard, admin panel template.">

    <!-- Title -->
    <title> SQLearn - Platform belajar SQL yang asik!</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/assets/images/brand-logos/toogle.png') }}" type="image/x-icon">

    <!-- Start::Styles -->

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('/assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- SwiperJS Css -->
    <link rel="stylesheet" href="{{ asset('/assets/libs/swiper/swiper-bundle.min.css') }}">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('/assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/libs/%40simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <script>
        if (localStorage.xintradarktheme) {
            document.querySelector("html").setAttribute("data-theme-mode", "dark")
        }
        if (localStorage.xintrartl) {
            document.querySelector("html").setAttribute("dir", "rtl")
            document.querySelector("#style")?.setAttribute("href",
                "{{ asset('/assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}");
        }
    </script>

</head>

<body class="landing-body">

    <!-- Start::main-switcher -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Switcher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="">
                <p class="switcher-style-head">Theme Color Mode:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-light-theme">
                                Light
                            </label>
                            <input class="form-check-input" type="radio" name="theme-style" id="switcher-light-theme"
                                checked>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-dark-theme">
                                Dark
                            </label>
                            <input class="form-check-input" type="radio" name="theme-style" id="switcher-dark-theme">
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <p class="switcher-style-head">Directions:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-ltr">
                                LTR
                            </label>
                            <input class="form-check-input" type="radio" name="direction" id="switcher-ltr" checked>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-rtl">
                                RTL
                            </label>
                            <input class="form-check-input" type="radio" name="direction" id="switcher-rtl">
                        </div>
                    </div>
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Theme Primary:</p>
                <div class="d-flex align-items-center switcher-style">
                    <div class="form-check switch-select me-3">
                        <input class="form-check-input color-input color-primary-1" type="radio"
                            name="theme-primary" id="switcher-primary">
                    </div>
                    <div class="form-check switch-select me-3">
                        <input class="form-check-input color-input color-primary-2" type="radio"
                            name="theme-primary" id="switcher-primary1">
                    </div>
                    <div class="form-check switch-select me-3">
                        <input class="form-check-input color-input color-primary-3" type="radio"
                            name="theme-primary" id="switcher-primary2">
                    </div>
                    <div class="form-check switch-select me-3">
                        <input class="form-check-input color-input color-primary-4" type="radio"
                            name="theme-primary" id="switcher-primary3">
                    </div>
                    <div class="form-check switch-select me-3">
                        <input class="form-check-input color-input color-primary-5" type="radio"
                            name="theme-primary" id="switcher-primary4">
                    </div>
                    <div class="form-check switch-select me-3 ps-0 mt-1 color-primary-light">
                        <div class="theme-container-primary"></div>
                        <div class="pickr-container-primary"></div>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">reset:</p>
                <div class="text-center">
                    <button id="reset-all" class="btn btn-danger mt-3">Reset</button>
                </div>
            </div>
        </div>
    </div> <!-- End::main-switcher -->

    <div class="landing-page-wrapper relative">

        <!-- Start::main-header -->

        <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="/" class="header-logo">
                                <img src="{{ asset('assets/images/brand-logos/desktop-logo.png.png') }}"
                                    alt="logo" class="toggle-logo">
                                <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                                    class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                            <span class="open-toggle">
                                <i class="ri-menu-3-line fs-20"></i>
                            </span>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right">

                    <!-- Start::header-element -->
                    <div class="header-element align-items-center">
                        <!-- Start::header-link|switcher-icon -->
                        <div class="btn-list d-lg-none d-flex">
                            <a href="/register" class="btn btn-primary1-light">
                                Sign Up
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header> <!-- End::main-header -->

        <!-- Start::main-sidebar -->

        <aside class="app-sidebar sticky" id="sidebar">

            <div class="container-xl">
                <!-- Start::main-sidebar -->
                <div class="main-sidebar shadow-none">

                    <!-- Start::nav -->
                    <nav class="main-menu-container nav nav-pills sub-open">
                        <div class="landing-logo-container">
                            <div class="horizontal-logo">
                                <a href="/" class="header-logo">
                                    <img src="{{ asset('assets/images/brand-logos/desktop-logo.png.png') }}"
                                        alt="logo" class="desktop-logo">
                                    <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}"
                                        alt="logo" class="desktop-white">
                                </a>
                            </div>
                        </div>
                        <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                            </svg></div>
                        <ul class="main-menu">
                            <!-- Start::slide -->
                            <li class="slide">
                                <a class="side-menu__item" href="#home">
                                    <span class="side-menu__label">Beranda</span>
                                </a>
                            </li>
                            <!-- End::slide -->
                            <!-- Start::slide -->
                            <li class="slide">
                                <a href="#about" class="side-menu__item">
                                    <span class="side-menu__label">Tentang Kami</span>
                                </a>
                            </li>
                            <!-- End::slide -->
                            <!-- Start::slide -->
                            <li class="slide">
                                <a href="#contact" class="side-menu__item">
                                    <span class="side-menu__label">Kontak</span>
                                </a>
                            </li>
                            <!-- End::slide -->

                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                </path>
                            </svg></div>
                        <div class="d-lg-flex d-none">
                            <div class="btn-list d-lg-flex d-none mt-lg-2 mt-xl-0 mt-0">
                                <a href="/register" class="btn btn-wave btn-primary1">
                                    Sign Up
                                </a>
                            </div>
                        </div>
                    </nav>
                    <!-- End::nav -->

                </div>
                <!-- End::main-sidebar -->
            </div>

        </aside> <!-- End::main-sidebar -->

        <!-- Start::main-content -->
        <div class="main-content landing-main px-0">

            <!-- Start:: Section-1 -->
            <div class="landing-banner" id="home">
                <section class="section">
                    <div class="container main-banner-container pb-lg-0">
                        <div class="row pt-3">
                            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-8">
                                <div class="pt-lg-5 pb-4 mt-3">
                                    <p class="landing-banner-heading mb-3 text-fixed-white">
                                        Belajar <span class="fw-semibold text-warning">SQL</span> Paling Asik <br>
                                        Hanya di SQLearn</p>
                                    <div class="fs-16 mb-5 text-fixed-white op-7">Mulai perjalanan kamu untuk belajar
                                        SQL dengan asik hanya dengan SQLearn! SQLearn akan membantumu menguasai SQL
                                        dengan mudah.
                                    </div>
                                    <a href="/register"
                                        class="m-1 btn btn-lg btn-primary1 btn-wave waves-effect waves-light">
                                        Mulai uji coba
                                        <i class="ri-arrow-right-line ms-2 align-middle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-4 my-auto mt-3">
                                <div class="text-end landing-main-image landing-heading-img">
                                    <img src="{{ asset('/assets/images/tes1/landing2.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End:: Section-1 -->

            <!-- Start:: Section-2 -->
            <section class="section" id="about">
                <div class="container position-relative">
                    <div class="text-center">
                        </p>
                        <h4 class="fw-semibold mb-1 mt-3">Kenapa harus SQLearn ?</h4>
                        <div class="row justify-content-center">
                            <div class="col-xl-7">
                                <p class="text-muted fs-14 mb-5 fw-normal">Misi kami adalah membantu untuk mencapai
                                    target pembelajaranmu dalam SQL</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card custom-card landing-card border shadow-none text-center">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span
                                            class="avatar avatar-lg bg-primary1-transparent svg-primary avatar-rounded border-3 border border-opacity-50 border-primary1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                fill="#000000" viewBox="0 0 256 256">
                                                <path
                                                    d="M208,40H48A24,24,0,0,0,24,64V176a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V64A24,24,0,0,0,208,40Zm8,136a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V64a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8Zm-48,48a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,224Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                    <h6 class="fw-semibold">Belajar Fleksibel</h6>
                                    <p class="text-muted">SQLearn memungkinkan kamu untuk belajar SQL dengan fleksibel
                                        dimana saja dan kapan saja</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card custom-card landing-card border shadow-none text-center">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span
                                            class="avatar avatar-lg bg-primary1-transparent svg-primary1 avatar-rounded border-3 border border-opacity-50 border-primary1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                fill="#000000" viewBox="0 0 256 256">
                                                <path
                                                    d="M224,48V96a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h28.69L182.06,73.37a79.56,79.56,0,0,0-56.13-23.43h-.45A79.52,79.52,0,0,0,69.59,72.71,8,8,0,0,1,58.41,61.27a96,96,0,0,1,135,.79L208,76.69V48a8,8,0,0,1,16,0ZM186.41,183.29a80,80,0,0,1-112.47-.66L59.31,168H88a8,8,0,0,0,0-16H40a8,8,0,0,0-8,8v48a8,8,0,0,0,16,0V179.31l14.63,14.63A95.43,95.43,0,0,0,130,222.06h.53a95.36,95.36,0,0,0,67.07-27.33,8,8,0,0,0-11.18-11.44Z">
                                                </path>
                                            </svg>
                                        </span>

                                    </div>
                                    <h6 class="fw-semibold">Materi Repetitif</h6>
                                    <p class="text-muted">Tersedia materi repetitif yang dapat dibaca berulang kali,
                                        disusun secara modular dan lengkap sesuai dengan tingkatannya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card custom-card landing-card border shadow-none text-center">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span
                                            class="avatar avatar-lg bg-primary1-transparent svg-primary2 avatar-rounded border-3 border border-opacity-50 border-primary1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                fill="#000000" viewBox="0 0 256 256">
                                                <path
                                                    d="M216,48H192V40a8,8,0,0,0-8-8H72a8,8,0,0,0-8,8v8H40A24,24,0,0,0,16,72v24a56.06,56.06,0,0,0,56,56h40v16H96a8,8,0,0,0-8,8v16H72a8,8,0,0,0,0,16H184a8,8,0,0,0,0-16H168V176a8,8,0,0,0-8-8H144V152h40a56.06,56.06,0,0,0,56-56V72A24,24,0,0,0,216,48ZM32,72a8,8,0,0,1,8-8H64v64H56A40,40,0,0,1,32,96Zm192,24a40,40,0,0,1-24,36h-8V64h24a8,8,0,0,1,8,8Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                    <h6 class="fw-semibold">Sistem Pemeringkatan</h6>
                                    <p class="text-muted">Terdapat pencapaian peringkat pembelajaran bagi setiap
                                        pengguna yang telah menyelesaikan kuis.</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-2 -->

            <!-- Start:: Section-3 -->
            <section class="section section-bg" id="expectations">
                <div class="container">
                    <div class="row gx-5 mx-0">
                        <div class="col-xl-5">
                            <div class="home-proving-image">
                                <img src="{{ asset('assets/images/tes1/object.png') }}" alt=""
                                    class="img-fluid about-image d-none d-xl-block">
                            </div>
                            <div class="proving-pattern-1"></div>
                        </div>
                        <div class="col-xl-7 my-auto">
                            <div class="heading-section text-start mb-4">
                                <div class="heading-description fs-15">Komitmen kami adalah menemani setiap langkah
                                    belajarmu, untuk menghadirkan pengalaman belajar SQL yang menarik dan efektif.</div>
                            </div>
                            <div class="row gy-3 mb-0">
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-top">
                                        <div class="me-2 home-prove-svg">
                                            <i class="ri-focus-2-fill align-middle text-primary1 d-inline-block"></i>
                                        </div>
                                        <div>
                                            <span class="fs-14">
                                                <strong>Belajar melalui kuis Interaktif</strong> Belajar SQL menjadi
                                                lebih menyenangkan dengan kuis interaktif yang dirancang agar tidak
                                                monoton.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-top">
                                        <div class="me-2 home-prove-svg">
                                            <i class="ri-focus-2-fill align-middle text-primary1 d-inline-block"></i>
                                        </div>
                                        <div>
                                            <span class="fs-14">
                                                <strong>Kemudahan mengakses materi</strong> Pelajari ulang kapan saja
                                                dengan materi yang bisa diunduh dan dipelajari berulang kali.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-top">
                                        <div class="me-2 home-prove-svg">
                                            <i class="ri-focus-2-fill align-middle text-primary1 d-inline-block"></i>
                                        </div>
                                        <div>
                                            <span class="fs-14">
                                                <strong>Naik Level, Kumpulkan Poin</strong> Dapatkan poin, tingkatkan
                                                level, dan buat belajar jadi lebih menantang!
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-top">
                                        <div class="me-2 home-prove-svg">
                                            <i class="ri-focus-2-fill align-middle text-primary1 d-inline-block"></i>
                                        </div>
                                        <div>
                                            <span class="fs-14">
                                                <strong>Sistem Leaderboard</strong>Tetap termotivasi dengan melihat
                                                peringkat Anda dan bersaing dengan pengguna lain.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-3 -->

            <!-- Start:: Section-10 -->
            <section class="section" id="contact">
                <div class="container text-center">
                    <h4 class="fw-semibold mt-3 mb-2">Butuh Bantuan?</h4>
                    <div class="row justify-content-center">
                        <div class="col-xl-9">
                            <p class="text-muted fs-14 mb-5 fw-normal">Hubungi kami sekarang</p>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="card custom-card contactus-form contactus-form-left overflow-hidden">
                            <div class="card-body text-start px-xl-5 px-4 py-4">
                                <div class="row pt-0">
                                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('assets/images/tes1/kontak.png') }}" alt=""
                                            class="img-fluid about-image d-none d-sm-block"
                                            style="max-width: 60%; height: auto;">
                                    </div>
                                    <!-- Kontak -->
                                    <div class="col-md-7">
                                        <div class="row gy-3">
                                            <!-- Address Card -->
                                            <div class="col-md-6">
                                                <div class="card custom-card border border-primary mb-3"
                                                    style="height: 100%; padding: 1rem;">
                                                    <div
                                                        class="card-body d-flex flex-column align-items-center justify-content-center">
                                                        <div class="mb-2">
                                                            <button class="btn btn-icon btn-primary1 btn-wave">
                                                                <i class="ti ti-map-pin"></i>
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <p class="h6 text-primary text-center mb-0">Kota Malang</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Email Card -->
                                            <div class="col-md-6">
                                                <div class="card custom-card border border-primary mb-3"
                                                    style="height: 100%; padding: 1rem;">
                                                    <div
                                                        class="card-body d-flex flex-column align-items-center justify-content-center">
                                                        <div class="mb-2">
                                                            <button class="btn btn-icon btn-primary1 btn-wave">
                                                                <i class="ti ti-mail"></i>
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <p class="h6 text-primary text-center mb-0">
                                                                papankk19@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Phone Card 1 -->
                                            <div class="col-md-6">
                                                <div class="card custom-card border border-primary mb-3"
                                                    style="height: 100%; padding: 1rem;">
                                                    <div
                                                        class="card-body d-flex flex-column align-items-center justify-content-center">
                                                        <div class="mb-2">
                                                            <button class="btn btn-icon btn-primary1 btn-wave">
                                                                <i class="ti ti-phone mb-0"></i>
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <p class="h6 text-primary text-center mb-0">+62
                                                                852-3511-1353</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Phone Card 2 -->
                                            <div class="col-md-6">
                                                <div class="card custom-card border border-primary mb-3"
                                                    style="height: 100%; padding: 1rem;">
                                                    <div
                                                        class="card-body d-flex flex-column align-items-center justify-content-center">
                                                        <div class="mb-2">
                                                            <button class="btn btn-icon btn-primary1 btn-wave">
                                                                <i class="ti ti-phone"></i>
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <p class="h6 text-primary text-center mb-0">+62
                                                                897-0537-844</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- End:: Section-10 -->


        </div>
        <!-- End::main-content -->

    </div>
    <!--app-content closed-->

    <!-- Start::main-scripts -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- Popper JS -->
    <script src="{{ asset('assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/%40simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

    <!-- Internal Landing JS -->
    <script src="{{ asset('assets/js/landing.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Landing Sticky JS -->
    <script src="{{ asset('assets/js/landing-sticky.js') }}"></script>
    <!-- End::main-scripts -->

</body>


<!-- Mirrored from php.spruko.com/xintra/xintra/pages/landing.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:47:19 GMT -->

</html>
