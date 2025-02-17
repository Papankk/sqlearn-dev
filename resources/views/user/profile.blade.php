@extends('template.layout')

@section('title', 'Profil - SQLearn')

@section('content')

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Start:: row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card profile-card">
                        <div class="profile-banner-img">
                            <img src="{{ asset('/assets/images/Banner/Profil-banner4.jpg') }}" class="card-img-top"
                                alt="...">
                        </div>
                        <div class="card-body pb-0 position-relative">
                            <div class="row profile-content">
                                <div class="col-xl-3">
                                    <div class="card custom-card overflow-hidden border">
                                        <div class="card-body border-bottom border-block-end-dashed p-4">
                                            <div class="text-center">
                                                <span class="avatar avatar-xxl avatar-rounded mb-2">
                                                    <img src="{{ asset('/assets/images/faces/' . Auth::user()->foto_profile) }}"
                                                        alt="foto profil">
                                                </span>
                                                <h5 class="fw-semibold mb-1">{{ Auth::user()->name }}</h5>
                                                <span
                                                    class="d-block fw-medium text-muted mb-2">{{ '@' . Auth::user()->username }}</span>
                                                <div class="border-block-end">
                                                    <span class="d-block fw-normal text-muted">Lorem ipsum, dolor
                                                        sit amet consectetur adipisicing elit. Laborum modi dicta,
                                                        impedit corrupti pariatur distinctio? Asperiores cupiditate
                                                        quas exercitationem repellat?</span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-9">
                                    <div class="card custom-card overflow-hidden border">
                                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3 p-3">
                                            <!-- rank -->
                                            <div class="col">
                                                <div class="card custom-card border border-primary h-100">
                                                    <div class="card-body d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span class="avatar avatar-xl">
                                                                <img src="{{ asset('/assets/images/medal/medal bow 3.svg') }}"
                                                                    alt="rank">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="card-text text-primary mb-1 fs-5 fw-semibold">
                                                                3</p>
                                                            <div class="card-title text-muted fs-11 mb-0">Peringkat
                                                                3 besar</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- XP -->
                                            <div class="col">
                                                <div class="card custom-card border border-primary h-100">
                                                    <div class="card-body d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span class="avatar avatar-xl">
                                                                <img src="{{ asset('/assets/images/medal/star.svg') }}"
                                                                    alt="XP">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="card-text text-primary mb-1 fs-5 fw-semibold">
                                                                {{ Auth::user()->exp }}</p>
                                                            <div class="card-title text-muted fs-11 mb-0">Total XP
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- heart -->
                                            <div class="col">
                                                <div class="card custom-card border border-primary h-100">
                                                    <div class="card-body d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span class="avatar avatar-xl">
                                                                <img src="{{ asset('/assets/images/medal/heart.svg') }}"
                                                                    alt="hati">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="card-text text-primary mb-1 fs-5 fw-semibold">
                                                                {{ Auth::user()->heart }}/5</p>
                                                            <div class="card-title text-muted fs-11 mb-0">
                                                                {{ Auth::user()->heart }} dari 5
                                                                tersisa</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- diamond -->
                                            <div class="col">
                                                <div class="card custom-card border border-primary h-100">
                                                    <div class="card-body d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span class="avatar avatar-xl">
                                                                <img src="{{ asset('/assets/images/medal/diamond.svg') }}"
                                                                    alt="diamond">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="card-text text-primary mb-1 fs-5 fw-semibold">
                                                                {{ Auth::user()->diamond }}</p>
                                                            <div class="card-title text-muted fs-11 mb-0">Total
                                                                diamond</div>
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
            </div>
            <!-- End:: row-1 -->
        </div>
    </div>
    <!-- End::app-content -->

@endsection
