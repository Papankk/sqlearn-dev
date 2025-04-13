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
                                        </div>
                                        <a href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#collapseExample{{ $bab->slug }}" aria-expanded="false"
                                            aria-controls="collapseExample{{ $bab->slug }}">
                                            <i class="ri-arrow-up-s-line fs-18 collapse-close"></i>
                                            <i class="ri-arrow-down-s-line fs-18 collapse-open"></i>
                                        </a>
                                    </div>
                                    <div class="collapse show border-top" id="collapseExample{{ $bab->slug }}">
                                        <div class="card-body">
                                            <h6 class="card-text fw-medium">{{ $bab->header }}</h6>
                                            <p class="card-text mb-0">{{ $bab->deskripsi }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="/bermain/{{ $bab->slug }}" class="btn btn-primary">Lanjut</a>
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
