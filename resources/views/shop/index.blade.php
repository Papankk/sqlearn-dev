@extends('template.layout')

@section('title', 'Shop - SQLearn')

@section('content')

    <div class="main-content app-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-6 col-xxl">
                    <div class="card custom-card school-card">
                        <div class="card-body d-flex gap-2 justify-content-between">
                            <div class="">
                                <p class="h6 fw-medium text-primary">Harga Diamond
                                </p>
                                <h5 class="mb-0 fw-semibold">Rp 500,00</h5>
                            </div>
                            <div class="me-2 lh-1">
                                <span class="avatar avatar-lg">
                                    <img src="../assets/images/medal/diamond.svg" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl">
                    <div class="card custom-card school-card">
                        <div class="card-body d-flex gap-2 justify-content-between">
                            <div class="">
                                <p class="h6 fw-medium text-primary">Total Diamond Kamu
                                </p>
                                <h5 class="mb-0 fw-semibold" id="diamond-count">{{ Auth::user()->diamond }}</h5>
                            </div>
                            <div class="me-2 lh-1">
                                <span class="avatar avatar-lg">
                                    <img src="../assets/images/medal/diamond.svg" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Top-Up Diamond</div>
                    </div>
                    <div class="col-xl-12 p-4">
                        <div class="row gy-3">
                            <div class="col-xl-4">
                                <a href="javascript:void(0);" class="btn-topup" data-diamond="20">
                                    <div class="card custom-card card-bg-outline-primary border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="me-2">
                                                    <span class="avatar">
                                                        <img src="../assets/images/medal/diamond.svg" alt="img">
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <div class="fs-15 fw-medium">20 Diamond</div>
                                                    <p class="mb-0 op-7 fs-12">Rp. 10.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4">
                                <a href="javascript:void(0);" class="btn-topup" data-diamond="50">
                                    <div class="card custom-card card-bg-outline-primary border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="me-2">
                                                    <span class="avatar">
                                                        <img src="../assets/images/medal/diamond.svg" alt="img">
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <div class="fs-15 fw-medium">50 Diamond</div>
                                                    <p class="mb-0 op-7 fs-12">Rp. 25.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4">
                                <a href="javascript:void(0);" class="btn-topup" data-diamond="100">
                                    <div class="card custom-card card-bg-outline-primary border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="me-2">
                                                    <span class="avatar">
                                                        <img src="../assets/images/medal/diamond.svg" alt="img">
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <div class="fs-15 fw-medium">100 Diamond</div>
                                                    <p class="mb-0 op-7 fs-12">Rp. 50.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row gy-3">
                            <div class="col-xl-4">
                                <a href="javascript:void(0);" class="btn-topup" data-diamond="150">
                                    <div class="card custom-card card-bg-outline-primary border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="me-2">
                                                    <span class="avatar">
                                                        <img src="../assets/images/medal/diamond.svg" alt="img">
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <div class="fs-15 fw-medium">150 Diamond</div>
                                                    <p class="mb-0 op-7 fs-12">Rp. 75.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4">
                                <a href="javascript:void(0);" class="btn-topup" data-diamond="200">
                                    <div class="card custom-card card-bg-outline-primary border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="me-2">
                                                    <span class="avatar">
                                                        <img src="../assets/images/medal/diamond.svg" alt="img">
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <div class="fs-15 fw-medium">200 Diamond</div>
                                                    <p class="mb-0 op-7 fs-12">Rp. 100.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4">
                                <a href="javascript:void(0);" class="btn-topup" data-diamond="500">
                                    <div class="card custom-card card-bg-outline-primary border border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="me-2">
                                                    <span class="avatar">
                                                        <img src="../assets/images/medal/diamond.svg" alt="img">
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <div class="fs-15 fw-medium">500 Diamond</div>
                                                    <p class="mb-0 op-7 fs-12">Rp. 250.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Beli Item</div>
                    </div>
                    <div class="col-xl-12 p-4">
                        <div class="row gy-3">
                            <div class="col-xl-4">
                                <a href="javascript:void(0);" class="btn-refill-heart" id="btn-refill-heart">
                                    <div class="card custom-card card-bg-outline-primary border border-primary">
                                        <div class="card-body">
                                            <div class="align-items-center w-100 h-100">
                                                <div class="text-center me-2">
                                                    <span class="avatar">
                                                        <img src="../assets/images/medal/heart.svg" alt="img">
                                                    </span>
                                                </div>
                                                <div class="text-center">
                                                    <div class="fs-15 fw-medium">Isi Ulang Hatimu</div>
                                                    <p class="mb-0 op-7 fs-12">50 Diamond</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::app-content -->
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
        <!-- Toast will be dynamically added here -->
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.querySelectorAll('.btn-topup').forEach(el => {
            el.addEventListener('click', function(e) {
                let diamond = this.dataset.diamond;

                fetch('/topup', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            diamond: diamond
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        snap.pay(res.snap_token, {
                            onSuccess: function(result) {
                                alert('Pembayaran berhasil!');
                            },
                            onPending: function(result) {
                                alert('Menunggu pembayaran...');
                            },
                            onError: function(result) {
                                alert('Pembayaran gagal!');
                            }
                        });
                    });
            });
        });
    </script>
    <script>
        document.getElementById('btn-refill-heart').addEventListener('click', function() {
            const csrfToken = '{{ csrf_token() }}';

            fetch('/refill-heart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Pass the CSRF token
                    },
                    body: JSON.stringify({}) // No data needs to be sent
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Show success toast
                        showToast('success', data.message);

                        // Optionally update the UI
                        document.getElementById('diamond-count').innerText = data.diamonds_left;
                    } else {
                        // Show error toast
                        showToast('error', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // Function to show the toast message
        function showToast(type, message) {
            const toastMessage = type === 'success' ? 'bg-success' : 'bg-danger';
            const toast = `
        <div class="toast align-items-center text-white ${toastMessage} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;
            // Add toast to the fixed position container
            document.querySelector('.position-fixed').insertAdjacentHTML('beforeend', toast);

            // Show the toast
            const toastElement = document.querySelector('.toast');
            const bootstrapToast = new bootstrap.Toast(toastElement);
            bootstrapToast.show();
        }
    </script>
@endsection
