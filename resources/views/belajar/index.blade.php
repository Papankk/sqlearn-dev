@extends('template.layout')

@section('title', 'Belajar - SQLearn')

@section('content')

    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Materi -->
            <div class="card custom-card social-cards">
                <div class="card-header pb-0 justify-content-between">
                    <div class="card-title">
                        Ayo belajar SQL
                    </div>
                </div>
                <div class="card-body mb-3">
                    <ol class="list-group">
                        @foreach ($data_materi as $materi)
                            <li class="list-group-item d-sm-flex justify-content-between align-items-start">
                                <a href="{{ route('belajar.show', ['slug' => $materi->slug]) }}"
                                    class="stretched-link text-decoration-none"></a>
                                <div class="ms-2 me-auto text-muted">
                                    <div class="fw-medium fs-14 text-default">Bab {{ $materi->id_bab }}</div>
                                    {{ $materi->judul_materi }}
                                </div>
                                <span class="badge bg-primary-transparent">View</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <!-- Materi -->

        </div>
    </div>

@endsection
