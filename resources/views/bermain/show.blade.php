@extends('template.layout')

@section('title, Bermain - SQLearn')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">

            <div class="row">
                <!-- Sesi -->
                <div class="col-md-9">
                    <div class="row">

                        @foreach ($data_sesi as $sesi)
                            @php
                                // Generate a unique random slug
                                $slug = Str::random(12);

                                // Store the slug with the corresponding session ID in Laravel session
                                session(["slug_map.$slug" => $sesi->id]);
                            @endphp
                            <div class="col-md-12">
                                <a href="{{ route('quiz.show', $slug) }}" class="text-decoration-none">
                                    <div
                                        class="card custom-card {{ $sesi->id % 2 == 0 ? 'card-bg-secondary' : 'card-bg-primary1' }}">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="me-2">
                                                    <i class="bx bx-lock-open" style="font-size: 32px;"></i>
                                                </div>
                                                <div>
                                                    <div class="fs-15 fw-medium">{{ $sesi->nama_sesi }}</div>
                                                    <p class="mb-0 text-fixed-white op-7 fs-12">{{ $sesi->header }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <!-- Session isn't registered -->
                        {{-- <div class="col-md-12">
                            <a href="#exampleModalToggle" class="text-decoration-none " data-bs-toggle="modal">
                                <div class="card custom-card card-bg-primary1">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center w-100">
                                            <div class="me-2">
                                                <i class="bx bx-lock" style="font-size: 32px;"></i>
                                            </div>
                                            <div>
                                                <div class="fs-15 fw-medium">Sesi 2</div>
                                                <p class="mb-0 text-fixed-white op-7 fs-12">Lorem ipsum dolor sit
                                                    amet</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> --}}

                        @include('bermain.modal-show')
                    </div>
                </div>

                <!-- Side content -->
                <div class="col-md-3">
                    <div class="col-xl-12">
                        <!-- <div class="card border border-primary custom-card"> -->
                        <div class="card-body">
                            <p class="h6 fw-medium mb-3 text-primary">Perolehan
                            </p>
                            <!-- rank -->
                            <div class="col-12">
                                <div class="card custom-card border border-primary">
                                    <div class="d-flex align-items-center p-2">
                                        <div class="me-2 ms-2">
                                            <span class="avatar avatar-md">
                                                <img src="../assets/images/medal/medal bow 3.svg" alt="Rank"
                                                    class="img-fluid">
                                            </span>
                                        </div>
                                        <div>
                                            <p class="card-text text-primary mb-1 fs-6 fw-medium">Peringkat 3
                                                Besar </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- XP -->
                            <div class="col-12">
                                <div class="card custom-card border border-primary">
                                    <div class="d-flex align-items-center p-2">
                                        <div class="me-2 ms-2">
                                            <span class="avatar avatar-md">
                                                <img src="../assets/images/medal/star.svg" alt="Rank" class="img-fluid">
                                            </span>
                                        </div>
                                        <div>
                                            <p class="card-text text-primary mb-1 fs-6 fw-medium ms-2">
                                                {{ Auth::user()->exp }} XP
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- diamond  -->
                            <div class="col-12">
                                <div class="card custom-card border border-primary">
                                    <div class="d-flex align-items-center p-2">
                                        <div class="me-2 ms-2">
                                            <span class="avatar avatar-md">
                                                <img src="../assets/images/medal/diamond.svg" alt="Rank"
                                                    class="img-fluid">
                                            </span>
                                        </div>
                                        <div>
                                            <p class="card-text text-primary mb-1 fs-6 fw-medium ms-2">
                                                {{ Auth::user()->diamond }}
                                                Diamond</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- heart -->
                            <div class="col-12">
                                <div class="card custom-card border border-primary">
                                    <div class="d-flex align-items-center p-2">
                                        <div class="me-2 ms-2">
                                            <span class="avatar avatar-md">
                                                <img src="../assets/images/medal/heart.svg" alt="Rank"
                                                    class="img-fluid">
                                            </span>
                                        </div>
                                        <div>
                                            <p class="card-text text-primary mb-1 fs-6 fw-medium ms-2">
                                                {{ Auth::user()->heart }}/5
                                                Tersisa</p>
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
    <!-- End::app-content -->

    @if (session('error') === 'out_of_hearts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let modal = new bootstrap.Modal(document.getElementById("outOfHeartsModal"));
                modal.show();
            });
        </script>
    @endif

    <!-- Out of Hearts Modal -->
    <div class="modal fade" id="outOfHeartsModal" tabindex="-1" aria-labelledby="outOfHeartsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="outOfHeartsLabel">💔 Out of Hearts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>You have run out of hearts! Please wait for them to refill or purchase more.</p>
                    <button class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection
