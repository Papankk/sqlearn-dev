<!-- This code use for render base file -->
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

@include('admin.template.head')

<body class="">

    <!-- Switcher -->
    @include('admin.template.switcher')
    <!-- End switcher -->


    <div class="page">
        <!-- Start::main-header -->
        @include('admin.template.header')
        <!-- End::main-header -->

        <!-- Start::main-sidebar -->
        @include('admin.template.sidebar')
        <!-- End::main-sidebar -->

        <!-- Start::app-content -->
        @yield('content')
        <!-- End::app-content -->
    </div>

    @include('admin.template.scripts')

</body>


</html>
<!-- This code use for render base file -->
