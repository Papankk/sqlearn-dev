@extends('template.layout')

@section('title', 'Welcome - SQLearn')

@section('content')

    <!-- Start::app-content -->
    <div class="main-content app-content p-4">
        <div class="container-fluid ">
            <!-- Start::row-12 -->
            <div class="row">
                <div class="col-xl-12  pt-4">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($data_bab as $bab)
                            <div class="col">
                                <div class="card custom-card">
                                    <img src="{{ asset($bab->gambar_bab) }}" class="card-img-top" alt="...">
                                    <div
                                        class="card-header justify-content-between border-bottom-0 d-flex align-items-center">
                                        <div class="card-title d-flex align-items-center">
                                            {{ $bab->nama_bab }}
                                            <i class="bx bx-lock-open ms-2 fs-5 align-text-bottom"></i>
                                        </div>
                                        <a href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            <i class="ri-arrow-down-s-line fs-18 collapse-open"></i>
                                            <i class="ri-arrow-up-s-line fs-18 collapse-close"></i>
                                        </a>
                                    </div>


                                    <div class="collapse show border-top" id="collapseExample">
                                        <div class="card-body">
                                            <h6 class="card-text fw-medium">{{ $bab->header }}</h6>
                                            <p class="card-text mb-0">{{ $bab->deskripsi }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="/bermain/{{ $bab->slug }}" class="btn btn-primary">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End::row-12 -->

        </div>
    </div>
    <!-- End::app-content -->

@endsection
