@extends('admin.template.layout')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Table Bab -->
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Kelola User</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Heart</th>
                                        <th scope="col">Diamond</th>
                                        <th scope="col">Exp</th>
                                        <th scope="col">Adalah Admin?</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_user'] as $index => $user)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <span class="avatar avatar-sm">
                                                            <img src="{{ asset('assets/images/faces/' . $user->foto_profile) }}"
                                                                alt="img">
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="d-block fw-semibold lh-1 mb-1">{{ $user->name }}</span>
                                                        <span class="fs-13 text-muted">{{ '@' . $user->username }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->heart }}
                                            </td>
                                            <td>
                                                {{ $user->diamond }}
                                            </td>
                                            <td>
                                                {{ $user->exp }}
                                            </td>
                                            <td>
                                                @if ($user->is_admin == 1)
                                                    <span class="badge bg-success">Ya</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-primary1 btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#UpdateUser{{ $user->id }}">
                                                        <i class="ti ti-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-danger btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#DeleteUser" data-id="{{ $user->id }}"
                                                        data-nama="{{ $user->name }}">
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

            @foreach ($data['data_user'] as $user)
                <div class="modal fade" id="UpdateUser{{ $user->id }}" tabindex="-1"
                    aria-labelledby="UpdateUserLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">

                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="UpdateUserLabel{{ $user->id }}">Edit User
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-3 text-center">Edit
                                                Detail
                                                User
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                {{-- Nama User --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="name{{ $user->id }}" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Nama User</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" id="name{{ $user->id }}"
                                                            value="{{ $user->name }}" placeholder="Tulis nama User"
                                                            readonly disabled>
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Username --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="username{{ $user->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Username</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            username="username" id="username{{ $user->id }}"
                                                            value="{{ '@' . $user->username }}"
                                                            placeholder="Tulis username" disabled readonly>
                                                        @error('username')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Email --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="email{{ $user->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Email</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            email="email" id="email{{ $user->id }}"
                                                            value="{{ $user->email }}" placeholder="Tulis email" disabled
                                                            readonly>
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Stats --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="email{{ $user->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Statistik</label>
                                                    <div class="flex-grow-1">
                                                        <div class="row">
                                                            <div class="col-md mb-2">
                                                                <label class="form-label">Heart</label>
                                                                <input type="text" name="heart"
                                                                    class="form-control @error('heart') is-invalid @enderror"
                                                                    placeholder="Heart" aria-label="First name"
                                                                    value="{{ $user->heart }}">
                                                                @error('heart')
                                                                    <div class="invalid-feedback">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md mb-2">
                                                                <label class="form-label">Diamond</label>
                                                                <input type="text" name="diamond"
                                                                    class="form-control @error('diamond') is-invalid @enderror"
                                                                    placeholder="Diamond" aria-label="Heart"
                                                                    value="{{ $user->diamond }}">
                                                                @error('diamond')
                                                                    <div class="invalid-feedback">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md mb-2">
                                                                <label class="form-label">Exp</label>
                                                                <input type="text" name="exp"
                                                                    class="form-control @error('exp') is-invalid @enderror"
                                                                    placeholder="Exp" aria-label="Last name"
                                                                    value="{{ $user->exp }}" disabled readonly>
                                                                @error('exp')
                                                                    <div class="invalid-feedback">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <label for="Admin{{ $user->id }}"
                                                        class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Admin</label>
                                                    <div class="flex-grow-1">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault"
                                                                name="is_admin"
                                                                @if ($user->is_admin == 1) checked @endif)>
                                                        </div>
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

            <!-- modal delete -->
            <div class="modal fade" id="DeleteUser" aria-labelledby="DeleteUserLabel" tabindex="-1" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="DeleteUserForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h6 class="modal-title" id="DeleteUserLabel">Hapus Data</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda yakin untuk menghapus data User <strong id="DeleteUserName"></strong> ?
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
                const deleteModal = document.getElementById('DeleteUser');
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const babId = button.getAttribute('data-id');
                    const namaBab = button.getAttribute('data-nama');

                    const form = document.getElementById('DeleteUserForm');
                    form.action = `/user/${babId}`; // or use route() logic if preferred

                    document.getElementById('DeleteUserName').textContent = namaBab;
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
    @elseif (session('error'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
            <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
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
