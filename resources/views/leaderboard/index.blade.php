@extends('template.layout')

@section('title', 'Leaderboard - SQLearn')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- leaderboard -->
            <div class="row pt-3">
                <!-- tabel -->
                <div class="col-lg-9 col-md-12">
                    <div class="card custom-card">
                        <div class="table-responsive p-3">
                            <table class="table text-nowrap table-hover">
                                <tbody>
                                    @foreach ($data_user as $index => $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!-- Medal Image for First, Second, Third Place -->
                                                    <div class="avatar avatar-md me-3 avatar-rounded">
                                                        @if ($index == 0)
                                                            <img src="../assets/images/medal/medal bow 1.svg" alt="img">
                                                        @elseif ($index == 1)
                                                            <img src="../assets/images/medal/medal bow 2.svg"
                                                                alt="img">
                                                        @elseif ($index == 2)
                                                            <img src="../assets/images/medal/medal bow 3.svg"
                                                                alt="img">
                                                        @else
                                                            <div class="avatar avatar-md me-3 text-primary fw-bold fs-5">
                                                                {{ $index + 1 }}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- User Profile Picture -->
                                                    <div class="avatar avatar-md me-3 avatar-rounded">
                                                        <img src="../assets/images/faces/{{ $user->foto_profile }}"
                                                            alt="img">
                                                    </div>
                                                    <div>
                                                        <p class="h6 mb-0">{{ $user->name }}</p>
                                                        <p class="text-muted small mb-0">{{ '@' . $user->username }}</p>
                                                        <!-- Smaller username -->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-primary fw-bold">{{ $user->exp }} XP</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

                    <div class="col-xl-12">
                        <p class="h6 fw-medium mb-3 text-primary">Peringkat Saya
                        </p>
                        <div class="card custom-card border border-primary text-center p-5">
                            <div class="card-body ">
                                <span class="avatar avatar-xxl avatar-rounded justify-content-between mb-3">
                                    <img src="{{ asset('assets/images/faces') . '/' . Auth::user()->foto_profile }}"
                                        alt="img">
                                </span>
                                <div class="fw-medium fs-16 mb-3">
                                    {{ Auth::user()->name }}
                                    <p class="text-muted small mb-0">{{ '@' . Auth::user()->username }}</p>
                                </div>
                                <div
                                    class="card custom-card border border-primary d-flex align-items-center justify-content-center p-2">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-md me-2 avatar-rounded">
                                            @if ($userRank == 1)
                                                <img src="{{ asset('assets/images/medal/medal bow 1.svg') }}"
                                                    alt="img">
                                            @elseif ($userRank == 2)
                                                <img src="{{ asset('assets/images/medal/medal bow 2.svg') }}"
                                                    alt="img">
                                            @elseif ($userRank == 3)
                                                <img src="{{ asset('assets/images/medal/medal bow 3.svg') }}"
                                                    alt="img">
                                            @else
                                            @endif
                                        </div>
                                        <p class="h6 mb-0">Peringkat ke - <span
                                                class="text-primary fw-bold">{{ $userRank }}</span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- leaderboard -->
    </div>
    <!-- End::app-content -->

@endsection
