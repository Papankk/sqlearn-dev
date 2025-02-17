<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

@include('template.head')

<body class="">
    <!-- Switcher -->
    @include('template.switcher')
    <!-- End switcher -->

    <div class="page">
        <!-- Start::main-header -->
        @include('template.header')
        <!-- End::main-header -->

        <!-- Start::main-sidebar -->
        @include('template.sidebar')
        <!-- End::main-sidebar -->

        <!-- Start::app-content -->
        @yield('content')
        <!-- End::app-content -->

        <!-- Start::main-modal -->

        <div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0" placeholder="Search Anything ..."
                                aria-label="Search Anything ..." aria-describedby="button-addon2" />
                            <button class="btn btn-primary" type="button" id="button-addon2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::main-modal -->
    </div>

    <!-- Start::main-scripts -->
    @include('template.scripts')
    <!-- End::main-scripts -->
</body>

</html>
