@extends('admin.template.layout')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Table Bab -->
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Kelola Sesi</div>
                        <div class="d-flex gap-3 align-items-center flex-wrap">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary mb-sm-0 mb-1" data-bs-toggle="modal"
                                    data-bs-target="#CreateSesi">
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
                                        <th scope="col">Nama Sesi</th>
                                        <th scope="col">Bab</th>
                                        <th scope="col">Header</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_sesi'] as $index => $sesi)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $sesi->nama_sesi }}</td>
                                            <td>
                                                {{ $sesi->bab->nama_bab ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $sesi->header }}
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-primary1 btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#UpdateSesi{{ $sesi->id }}">
                                                        <i class="ti ti-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-danger btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#DeleteSesi" data-id="{{ $sesi->id }}"
                                                        data-nama="{{ $sesi->nama_sesi }}">
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

            @foreach ($data['data_sesi'] as $sesi)
                <div class="modal fade" id="UpdateSesi{{ $sesi->id }}" tabindex="-1"
                    aria-labelledby="UpdateSesiLabel{{ $sesi->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">

                        <form action="{{ route('sesi.update', $sesi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="UpdateSesiLabel{{ $sesi->id }}">Edit Sesi
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-3 text-center">Edit
                                                Detail
                                                Sesi
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                {{-- Bab --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="bab{{ $sesi->id }}" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Bab</label>
                                                    <div class="flex-grow-1">
                                                        <select class="form-control @error('bab') is-invalid @enderror"
                                                            name="bab" id="bab{{ $sesi->id }}">
                                                            <option value="">Pilih
                                                                Bab
                                                            </option>

                                                            @foreach ($data['data_bab'] as $bab)
                                                                <option value="{{ $bab->id }}"
                                                                    {{ $sesi->id_bab == $bab->id ? 'selected' : '' }}>
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

                                                {{-- Nama Sesi --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="nama_sesi{{ $sesi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Judul Materi</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('nama_sesi') is-invalid @enderror"
                                                            name="nama_sesi" id="nama_sesi{{ $sesi->id }}"
                                                            value="{{ $sesi->nama_sesi }}" placeholder="Tulis nama sesi">
                                                        @error('nama_sesi')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Header --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="header{{ $sesi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Judul Materi</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('header') is-invalid @enderror"
                                                            name="header" id="header{{ $sesi->id }}"
                                                            value="{{ $sesi->header }}" placeholder="Tulis header">
                                                        @error('header')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
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
            <div class="modal fade" id="CreateSesi" tabindex="-1" aria-labelledby="exampleBabLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="CreateSesiLabel">Tambah data Sesi</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-3 text-center">Detail Sesi</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('sesi.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row gy-3">
                                                {{-- Bab --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="bab{{ $sesi->id }}"
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

                                                {{-- Nama Sesi --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="nama_sesi{{ $sesi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Nama Sesi</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('nama_sesi') is-invalid @enderror"
                                                            name="nama_sesi" id="nama_sesi{{ $sesi->id }}"
                                                            placeholder="Tulis Nama Sesi">
                                                        @error('nama_sesi')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Header --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="header{{ $sesi->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Header</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('header') is-invalid @enderror"
                                                            name="header" id="header{{ $sesi->id }}"
                                                            placeholder="Tulis Header Sesi">
                                                        @error('header')
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
            <div class="modal fade" id="DeleteSesi" aria-labelledby="DeleteSesiLabel" tabindex="-1" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="DeleteSesiForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h6 class="modal-title" id="DeleteSesiLabel">Hapus Data</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda yakin untuk menghapus data Sesi <strong id="DeleteSesiName"></strong> ?
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
                const deleteModal = document.getElementById('DeleteSesi');
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const babId = button.getAttribute('data-id');
                    const namaBab = button.getAttribute('data-nama');

                    const form = document.getElementById('DeleteSesiForm');
                    form.action = `/sesi/${babId}`; // or use route() logic if preferred

                    document.getElementById('DeleteSesiName').textContent = namaBab;
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
