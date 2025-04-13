@extends('admin.template.layout')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Table Bab -->
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Kelola Soal</div>
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
                                        <th scope="col">Soal</th>
                                        <th scope="col">Sesi</th>
                                        <th scope="col">Tipe Soal</th>
                                        <th scope="col">Jawaban</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_soal'] as $index => $soal)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $soal->soal }}</td>
                                            <td>
                                                {{ $soal->sesi->nama_sesi ?? '-' }}
                                                -
                                                ({{ $soal->sesi->bab->nama_bab ?? '-' }})
                                            </td>
                                            <td>
                                                {{ $soal->tipe }}
                                            </td>
                                            <td>
                                                {{ implode(', ', json_decode($soal->jawaban)) }}
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <button class="btn btn-icon btn-primary1 btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#UpdateSoal{{ $soal->id }}">
                                                        <i class="ti ti-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-danger btn-wave btn-sm"
                                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                        href="#DeleteBab" data-id="{{ $soal->id }}"
                                                        data-nama="{{ $soal->soal }}">
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

            @foreach ($data['data_soal'] as $soal)
                <div class="modal fade" id="UpdateSoal{{ $soal->id }}" tabindex="-1"
                    aria-labelledby="UpdateSoalLabel{{ $soal->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">

                        <form action="{{ route('soal.update', $soal->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="UpdateSoalLabel{{ $soal->id }}">Edit Soal
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-3 text-center">Edit
                                                Detail
                                                Soal
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                {{-- Sesi --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="sesi{{ $soal->id }}" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Sesi</label>
                                                    <div class="flex-grow-1">
                                                        <select class="form-control" name="sesi"
                                                            id="sesi{{ $soal->id }}">
                                                            <option value="">Pilih
                                                                sesi
                                                            </option>
                                                            @foreach ($data['data_sesi'] as $sesi)
                                                                <option value="{{ $sesi->id }}"
                                                                    {{ $soal->id_sesi == $sesi->id ? 'selected' : '' }}>
                                                                    {{ $sesi->nama_sesi }}
                                                                    -
                                                                    ({{ $sesi->bab->nama_bab }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Soal --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="soal{{ $soal->id }}" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Soal</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text" class="form-control" name="soal"
                                                            id="soal{{ $soal->id }}" value="{{ $soal->soal }}"
                                                            placeholder="Tulis judul soal">
                                                    </div>
                                                </div>

                                                {{-- Tipe --}}
                                                <div class="d-flex align-items-center">
                                                    <label for="tipe{{ $soal->id }}" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Tipe
                                                        Soal</label>
                                                    <div class="flex-grow-1">
                                                        <select class="form-control tipe-select" name="tipe"
                                                            id="tipe{{ $soal->id }}">
                                                            <option value="">Pilih
                                                                tipe
                                                                jawaban</option>
                                                            <option value="mcq"
                                                                {{ $soal->tipe == 'mcq' ? 'selected' : '' }}>
                                                                mcq</option>
                                                            <option value="text"
                                                                {{ $soal->tipe == 'text' ? 'selected' : '' }}>
                                                                text</option>
                                                            <option value="multiple"
                                                                {{ $soal->tipe == 'multiple' ? 'selected' : '' }}>
                                                                multiple</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                @php
                                                    $opsi = json_decode($soal->opsi ?? '[]');
                                                    $jawaban = json_decode($soal->jawaban ?? '""');
                                                @endphp

                                                {{-- Opsi --}}
                                                <div
                                                    class="d-flex align-items-center opsi-wrapper {{ in_array($soal->tipe, ['mcq', 'multiple']) ? '' : 'd-none' }}">
                                                    <label class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Opsi
                                                        Jawaban</label>
                                                    <div class="flex-grow-1">
                                                        <div id="opsi-container{{ $soal->id }}">
                                                            @if (!empty($opsi))
                                                                @foreach ($opsi as $index => $val)
                                                                    <div class="input-group mb-2">
                                                                        <input type="text" name="opsi[]"
                                                                            class="form-control"
                                                                            value="{{ $val }}">
                                                                        @if ($loop->first)
                                                                            <button type="button"
                                                                                class="btn btn-outline-primary add-opsi-btn">+</button>
                                                                        @else
                                                                            <button type="button"
                                                                                class="btn btn-outline-danger remove-opsi-btn">−</button>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="input-group mb-2">
                                                                    <input type="text" name="opsi[]"
                                                                        class="form-control"
                                                                        placeholder="Tulis opsi jawaban">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary add-opsi-btn">+</button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Jawaban --}}
                                                <div class="d-flex align-items-center">
                                                    <label class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Jawaban</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text" name="jawaban"
                                                            id="jawaban_text{{ $soal->id }}"
                                                            class="form-control mb-3 {{ $soal->tipe == 'text' ? '' : 'd-none' }}"
                                                            value="{{ $soal->tipe === 'text' ? implode(', ', json_decode($soal->jawaban)) : '' }}"
                                                            placeholder="Tulis jawaban">

                                                        <select id="jawaban_mcq{{ $soal->id }}" name="jawaban[]"
                                                            class="form-select mb-3 {{ $soal->tipe == 'mcq' ? '' : 'd-none' }}">
                                                            @foreach ($opsi as $opt)
                                                                <option value="{{ $opt }}"
                                                                    {{ is_array($jawaban) && $jawaban[0] == $opt ? 'selected' : '' }}>
                                                                    {{ $opt }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <select id="jawaban_multiple{{ $soal->id }}" name="jawaban[]"
                                                            class="form-select mb-3 {{ $soal->tipe == 'multiple' ? '' : 'd-none' }}"
                                                            multiple>
                                                            @foreach ($opsi as $opt)
                                                                <option value="{{ $opt }}"
                                                                    {{ is_array($jawaban) && in_array($opt, $jawaban) ? 'selected' : '' }}>
                                                                    {{ $opt }}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
                                        <form action="{{ route('soal.store') }}" method="POST">
                                            @csrf

                                            <div class="row gy-3">
                                                <div class="d-flex align-items-center">
                                                    <label for="id_sesi" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Sesi</label>
                                                    <div class="flex-grow-1">
                                                        <select class="form-control @error('sesi') is-invalid @enderror"
                                                            data-trigger name="sesi" id="sesi">
                                                            <option value="">Pilih sesi</option>
                                                            @foreach ($data['data_sesi'] as $sesi)
                                                                <option value="{{ $sesi->id }}"
                                                                    {{ old('sesi') == $sesi['id'] ? 'selected' : '' }}>
                                                                    {{ $sesi->nama_sesi }} - ({{ $sesi->bab->nama_bab }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('sesi')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="soal" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Soal</label>
                                                    <div class="flex-grow-1">
                                                        <input type="text"
                                                            class="form-control @error('soal') is-invalid @enderror"
                                                            name="soal" id="soal" placeholder="Tulis judul soal"
                                                            value="{{ old('soal') }}">
                                                        @error('soal')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="tipe" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Tipe Soal</label>
                                                    <div class="flex-grow-1">
                                                        <select
                                                            class="form-control tipe-select @error('tipe') is-invalid @enderror"
                                                            name="tipe">
                                                            <option value="">Pilih tipe jawaban</option>
                                                            <option value="mcq"
                                                                {{ old('tipe') == 'mcq' ? 'selected' : '' }}>mcq</option>
                                                            <option value="text"
                                                                {{ old('tipe') == 'text' ? 'selected' : '' }}>text</option>
                                                            <option value="multiple"
                                                                {{ old('tipe') == 'multiple' ? 'selected' : '' }}>multiple
                                                            </option>
                                                        </select>
                                                        @error('tipe')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div
                                                    class="d-flex align-items-center create-opsi-wrapper {{ in_array(old('tipe'), ['mcq', 'multiple']) ? 'd-flex' : 'd-none' }}">
                                                    <label for="opsi" class="form-label me-3 text-start"
                                                        style="min-width: 150px; text-align: right;">Opsi Jawaban</label>
                                                    <div class="flex-grow-1">
                                                        <div id="create-opsi-container">
                                                            @if (old('opsi'))
                                                                @foreach (old('opsi') as $index => $value)
                                                                    <div class="input-group mb-2">
                                                                        <input type="text" name="opsi[]"
                                                                            class="form-control"
                                                                            placeholder="Tulis opsi jawaban"
                                                                            value="{{ $value }}">
                                                                        @if ($loop->first)
                                                                            <button type="button"
                                                                                class="btn btn-outline-primary add-opsi-btn">+</button>
                                                                        @else
                                                                            <button type="button"
                                                                                class="btn btn-outline-danger remove-opsi-btn">−</button>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="input-group mb-2">
                                                                    <input type="text" name="opsi[]"
                                                                        class="form-control @error('opsi') is-invalid @enderror"
                                                                        placeholder="Tulis opsi jawaban">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary add-opsi-btn">+</button>
                                                                </div>
                                                            @endif

                                                            @error('opsi')
                                                                <div class="invalid-feedback d-block">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="jawaban" class="form-label me-3 text-start label-jawaban"
                                                        style="min-width: 150px; text-align: right;">Jawaban</label>
                                                    <div class="flex-grow-1">
                                                        {{-- Text Input --}}
                                                        <input type="text"
                                                            class="form-control mb-3 jawaban-text @error('jawaban') is-invalid @enderror"
                                                            name="jawaban" placeholder="Tulis jawaban"
                                                            value="{{ old('jawaban') }}">

                                                        {{-- Single Select --}}
                                                        <select class="form-select mb-3 jawaban-mcq d-none"
                                                            name="jawaban[]" disabled></select>

                                                        {{-- Multi Select --}}
                                                        <select class="form-select mb-3 jawaban-multiple d-none"
                                                            name="jawaban[]" multiple disabled></select>

                                                        @error('jawaban')
                                                            <div class="invalid-feedback">{{ $message }}</div>
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
                                Anda yakin untuk menghapus data Soal <strong id="deleteBabName"></strong> ?
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
                    form.action = `/soal/${babId}`; // or use route() logic if preferred

                    document.getElementById('deleteBabName').textContent = namaBab;
                });
            </script>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createModal = document.querySelector('#CreateBab');
            if (!createModal) return;

            const tipeSelect = createModal.querySelector('.tipe-select');
            const opsiContainer = createModal.querySelector('#create-opsi-container');

            function updateJawabanFields() {
                const tipe = tipeSelect?.value || '';
                const opsiInputs = opsiContainer.querySelectorAll('input[name="opsi[]"]');
                const opsiValues = Array.from(opsiInputs)
                    .map(i => i.value.trim())
                    .filter(v => v !== '');

                const jawabanText = createModal.querySelector('.jawaban-text');
                const jawabanMcq = createModal.querySelector('.jawaban-mcq');
                const jawabanMultiple = createModal.querySelector('.jawaban-multiple');
                const labelJawaban = createModal.querySelector('.label-jawaban');

                // Hide all
                [jawabanText, jawabanMcq, jawabanMultiple, labelJawaban].forEach(el => {
                    if (el) {
                        el.classList.add('d-none');
                        el.disabled = true;
                    }
                });

                if (tipe === 'text' && jawabanText) {
                    jawabanText.classList.remove('d-none');
                    labelJawaban.classList.remove('d-none');
                    jawabanText.disabled = false;
                }

                if (tipe === 'mcq' && jawabanMcq) {
                    jawabanMcq.innerHTML = '';
                    if (opsiValues.length > 0) {
                        opsiValues.forEach(val => {
                            jawabanMcq.innerHTML += `<option value="${val}">${val}</option>`;
                        });
                        jawabanMcq.classList.remove('d-none');
                        labelJawaban.classList.remove('d-none');
                        jawabanMcq.disabled = false;
                    }
                }

                if (tipe === 'multiple' && jawabanMultiple) {
                    jawabanMultiple.innerHTML = '';
                    if (opsiValues.length > 0) {
                        opsiValues.forEach(val => {
                            jawabanMultiple.innerHTML += `<option value="${val}">${val}</option>`;
                        });
                        jawabanMultiple.classList.remove('d-none');
                        labelJawaban.classList.remove('d-none');
                        jawabanMultiple.disabled = false;
                    }
                }
            }

            // On modal show, reset fields properly
            createModal.addEventListener('shown.bs.modal', () => {
                updateJawabanFields();
            });

            // Change event on tipe
            tipeSelect.addEventListener('change', () => {
                const wrapper = createModal.querySelector('.create-opsi-wrapper');
                if (['mcq', 'multiple'].includes(tipeSelect.value)) {
                    wrapper.classList.remove('d-none');
                } else {
                    wrapper.classList.add('d-none');
                }
                updateJawabanFields();
            });

            // Opsi dynamic add/remove
            opsiContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('add-opsi-btn')) {
                    const newInput = document.createElement('div');
                    newInput.classList.add('input-group', 'mb-2');
                    newInput.innerHTML = `
                <input type="text" name="opsi[]" class="form-control" placeholder="Tulis opsi jawaban">
                <button type="button" class="btn btn-outline-danger remove-opsi-btn">−</button>`;
                    opsiContainer.appendChild(newInput);
                    updateJawabanFields();
                }

                if (e.target.classList.contains('remove-opsi-btn')) {
                    e.target.closest('.input-group').remove();
                    updateJawabanFields();
                }
            });

            // Real-time update when typing opsi
            opsiContainer.addEventListener('input', () => {
                updateJawabanFields();
            });
        });
    </script>

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
