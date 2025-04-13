@extends('admin.template.layout')

@section('content')
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Table Bab -->
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Kelola Bab</div>
                        <div class="d-flex gap-3 align-items-center flex-wrap">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary mb-sm-0 mb-1" data-bs-toggle="modal"
                                    data-bs-target="#CreateBab">
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
                                        <th scope="col">Bab</th>
                                        <th scope="col">Header</th>
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_mapel'] as $index => $bab)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $bab->nama_bab }}</td>
                                            <td>
                                                {{ $bab->header }}
                                            </td>
                                            <td>
                                                <a href="{{ asset($bab->gambar_bab) }}" target="_blank"
                                                    class="btn btn-outline-primary btn-sm mt-2">View</a>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-primary1 btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#EditBab{{ $bab->id }}">
                                                        <i class="ti ti-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-danger btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#DeleteBab" data-id="{{ $bab->id }}"
                                                        data-nama="{{ $bab->nama_bab }}">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="EditBab{{ $bab->id }}" tabindex="-1"
                                            aria-labelledby="EditBabLabel{{ $bab->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="EditBabLabel{{ $bab->id }}">Edit
                                                            Bab {{ $bab->nama_bab }}</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="{{ route('bab.update', $bab->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="row gy-3">
                                                                <!-- Judul Bab -->
                                                                <div class="d-flex align-items-center">
                                                                    <label for="nama_bab" class="form-label me-3"
                                                                        style="min-width: 150px;">Judul
                                                                        Bab</label>
                                                                    <div class="flex-grow-1">
                                                                        <input type="text" name="nama_bab" id="nama_bab"
                                                                            class="form-control @error('nama_bab') is-invalid @enderror"
                                                                            value="{{ old('nama_bab', $bab->nama_bab) }}"
                                                                            placeholder="Tulis judul bab">
                                                                        @error('nama_bab')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <!-- Header -->
                                                                <div class="d-flex align-items-center">
                                                                    <label for="header" class="form-label me-3"
                                                                        style="min-width: 150px;">Header
                                                                        Bab</label>
                                                                    <div class="flex-grow-1">
                                                                        <input type="text" name="header" id="header"
                                                                            class="form-control @error('header') is-invalid @enderror"
                                                                            value="{{ old('header', $bab->header) }}"
                                                                            placeholder="Tulis header bab">
                                                                        @error('header')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <!-- Deskripsi -->
                                                                <div class="d-flex align-items-center">
                                                                    <label for="deskripsi" class="form-label me-3"
                                                                        style="min-width: 150px;">Deskripsi Bab</label>
                                                                    <div class="flex-grow-1">
                                                                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"
                                                                            placeholder="Tulis deskripsi bab">{{ old('deskripsi', $bab->deskripsi) }}</textarea>
                                                                        @error('deskripsi')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <label for="thumbnail"
                                                                        class="form-label me-3 text-start"
                                                                        style="min-width: 150px; text-align: right;">Thumbnail
                                                                        Bab</label>
                                                                    <div class="flex-grow-1">
                                                                        @if ($bab->gambar_bab)
                                                                            <img src="{{ asset($bab->gambar_bab) }}"
                                                                                class="img-thumbnail mb-2"
                                                                                style="max-height: 150px;"
                                                                                alt="Current Thumbnail">
                                                                        @endif
                                                                        <input type="file" name="thumbnail"
                                                                            class="mb-3 form-control @error('thumbnail') is-invalid @enderror"
                                                                            accept="image/png,image/jpeg">
                                                                        @error('thumbnail')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary-light"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary shadow">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End:: row-1 -->
                </div>
            </div>
            <!-- Table Bab -->

            <!-- modall create -->
            <div class="modal fade" id="CreateBab" tabindex="-1" aria-labelledby="exampleBabLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="CreateBabLabel">Tambah data Bab</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-3 text-center">Detail Bab</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('bab.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row gy-3">
                                                <div class="d-flex align-items-center">
                                                    <label for="nama_bab" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Judul Bab</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('nama_bab') is-invalid @enderror"
                                                            name="nama_bab" id="nama_bab" placeholder="Tulis judul bab"
                                                            value="{{ old('nama_bab') }}">
                                                        @error('nama_bab')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="header" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Header Bab</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('header') is-invalid @enderror"
                                                            name="header" id="header" placeholder="Tulis header bab"
                                                            value="{{ old('header') }}">
                                                        @error('header')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="deskripsi" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Deskripsi Bab</label>
                                                    <div class="flex-grow-1">
                                                        <textarea name="deskripsi" id="deskripsi" rows="5"
                                                            class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Tulis deskripsi bab">{{ old('deskripsi') }}</textarea>
                                                        @error('deskripsi')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <input type="hidden" name="thumbnail" id="uploadedThumbnail">

                                                <div class="d-flex align-items-center">
                                                    <label for="formFile" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Thumbnail Bab</label>
                                                    <div class="form-control p-0 border-0">
                                                        <div id="formFile" class="dropzone"></div>
                                                        @error('thumbnail')
                                                            <div class="text-danger small ms-2 mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary-light btn-wave"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit"
                                                    class="btn btn-primary shadow btn-wave">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- modal delete -->
            <div class="modal fade" id="DeleteBab" aria-labelledby="DeleteBabLabel" tabindex="-1" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="deleteBabForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h6 class="modal-title" id="DeleteBabLabel">Hapus Data</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda yakin untuk menghapus data bab <strong id="deleteBabName"></strong> ?
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
                const deleteModal = document.getElementById('DeleteBab');
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const babId = button.getAttribute('data-id');
                    const namaBab = button.getAttribute('data-nama');

                    const form = document.getElementById('deleteBabForm');
                    form.action = `/bab/${babId}`; // or use route() logic if preferred

                    document.getElementById('deleteBabName').textContent = namaBab;
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
