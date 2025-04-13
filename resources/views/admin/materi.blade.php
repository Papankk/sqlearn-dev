@extends('admin.template.layout')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Table Bab -->
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Kelola Materi</div>
                        <div class="d-flex gap-3 align-items-center flex-wrap">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary mb-sm-0 mb-1" data-bs-toggle="modal"
                                    data-bs-target="#CreateMateri">
                                    <i class="bx bx-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul Materi</th>
                                        <th scope="col">Bab</th>
                                        <th scope="col">Materi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_materi'] as $index => $materi)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $materi->judul_materi }}</td>
                                            <td>
                                                {{ $materi->bab->nama_bab ?? '-' }}
                                            </td>
                                            <td>
                                                <a href="{{ asset($materi->path) }}" target="_blank" class="text-primary">
                                                    📄 Lihat File Materi
                                                    ({{ Str::after($materi->path, 'files/') }})
                                                </a>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-primary1 btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#UpdateMateri{{ $materi->id }}">
                                                        <i class="ti ti-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-danger btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#DeleteMateri" data-id="{{ $materi->id }}"
                                                        data-nama="{{ $materi->judul_materi }}">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End:: row-1 -->
                </div>
            </div>
            <!-- Table Bab -->

            @foreach ($data['data_materi'] as $materi)
                <div class="modal fade" id="UpdateMateri{{ $materi->id }}" tabindex="-1"
                    aria-labelledby="UpdateMateriLabel{{ $materi->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">

                        <form action="{{ route('materi.update', $materi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="UpdateMateriLabel{{ $materi->id }}">Edit Materi
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-3 text-center">Edit
                                                Detail
                                                Materi
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                {{-- Bab --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="bab{{ $materi->id }}" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Bab</label>
                                                    <div class="flex-grow-1">
                                                        <select class="form-control @error('bab') is-invalid @enderror"
                                                            name="bab" id="bab{{ $materi->id }}">
                                                            <option value="">Pilih
                                                                Bab
                                                            </option>
                                                            @php
                                                                $babList = collect($data['data_bab']);

                                                                if (!$babList->contains('id', $materi->id_bab)) {
                                                                    $babList->push($materi->bab); // add the currently assigned bab
                                                                }
                                                            @endphp
                                                            @foreach ($babList as $bab)
                                                                <option value="{{ $bab->id }}"
                                                                    {{ $materi->id_bab == $bab->id ? 'selected' : '' }}>
                                                                    {{ $bab->nama_bab }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('bab')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Judul Materi --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="judul_materi{{ $materi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Judul Materi</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('judul_materi') is-invalid @enderror"
                                                            name="judul_materi" id="judul_materi{{ $materi->id }}"
                                                            value="{{ $materi->judul_materi }}"
                                                            placeholder="Tulis judul materi">
                                                        @error('judul_materi')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- File Materi --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="path{{ $materi->id }}" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">File Materi</label>
                                                    <div class="flex-grow-1">
                                                        @if ($materi->path)
                                                            <div class="mb-2">
                                                                <a href="{{ asset($materi->path) }}" target="_blank"
                                                                    class="text-primary">
                                                                    📄 Lihat File Materi
                                                                    ({{ Str::after($materi->path, 'files/') }})
                                                                </a>
                                                            </div>
                                                        @endif

                                                        <input type="file" name="path"
                                                            class="form-control @error('path') is-invalid @enderror"
                                                            accept="application/pdf">
                                                        @error('path')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Buttons --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary-light btn-wave"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary shadow btn-wave">Perbarui</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            @endforeach

            <!-- modall create -->
            <div class="modal fade" id="CreateMateri" tabindex="-1" aria-labelledby="exampleBabLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="CreateMateriLabel">Tambah data Materi</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-3 text-center">Detail Materi</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('materi.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row gy-3">
                                                {{-- Bab --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="bab{{ $materi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Bab</label>
                                                    <div class="flex-grow-1">
                                                        <select class="form-control @error('bab') is-invalid @enderror"
                                                            name="bab" id="bab">
                                                            <option value="">Pilih Bab</option>
                                                            @foreach ($data['data_bab'] as $bab)
                                                                <option value="{{ $bab->id }}">{{ $bab->nama_bab }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('bab')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Judul Materi --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="judul_materi{{ $materi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Judul Materi</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('judul_materi') is-invalid @enderror"
                                                            name="judul_materi" id="judul_materi{{ $materi->id }}"
                                                            placeholder="Tulis judul materi">
                                                        @error('judul_materi')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- File Materi --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="path{{ $materi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">File Materi</label>
                                                    <div class="flex-grow-1">
                                                        <input type="file" name="path"
                                                            class="mb-3 form-control @error('path') is-invalid @enderror"
                                                            accept="application/pdf">
                                                        @error('path')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary-light btn-wave"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary shadow btn-wave">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal delete -->
            <div class="modal fade" id="DeleteMateri" aria-labelledby="DeleteMateriLabel" tabindex="-1"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="DeleteMateriForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h6 class="modal-title" id="DeleteMateriLabel">Hapus Data</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda yakin untuk menghapus data Materi <strong id="DeleteMateriName"></strong> ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary-light"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                const deleteModal = document.getElementById('DeleteMateri');
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const babId = button.getAttribute('data-id');
                    const namaBab = button.getAttribute('data-nama');

                    const form = document.getElementById('DeleteMateriForm');
                    form.action = `/materi/${babId}`; // or use route() logic if preferred

                    document.getElementById('DeleteMateriName').textContent = namaBab;
                });
            </script>
        </div>
    </div>

    @if (session('modal'))
        <script>
            window.addEventListener('load', function() {
                const modalId = '{{ session('modal') }}';
                const modalElement = document.getElementById(modalId);
                if (modalElement) {
                    const modal = new bootstrap.Modal(modalElement);
                    modal.show();
                }
            });
        </script>
    @endif

    @if (session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
            <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('load', () => {
                const toastEl = document.querySelector('.toast');
                const toast = new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
                toast.show();
            });
        </script>
    @endif
@endsection
