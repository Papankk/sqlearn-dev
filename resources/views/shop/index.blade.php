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
                                <h5 class="mb-0 fw-semibold">{{ Auth::user()->diamond }}</h5>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modall -->
        <div class="modal fade" id="CreatePromo" tabindex="-1" aria-labelledby="examplePromoLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="p-3 border-bottom border-block-end-dashed">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="text-muted">Jumlah Diamond</div>
                                            <div class="fw-semibold fs-14">50</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="text-muted">Harga</div>
                                            <div class="fw-semibold fs-14 text-danger">$29</div>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-15">Sub Total :</div>
                                                <div class="fw-semibold fs-16 text-dark"> $1,387</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- metode pembayaran -->
                                    <div
                                        class="h6 fw-semibold d-sm-flex d-block align-items-center justify-content-between mt-3 mb-3">
                                        <div>Metode Pembayaran :</div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col-xl-6">
                                            <div class="form-check payment-card-container mb-0">
                                                <input id="payment-card1" name="payment-cards" type="radio"
                                                    class="form-check-input" checked="">
                                                <div class="form-check-label">
                                                    <div
                                                        class="d-sm-flex d-block align-items-center justify-content-between">
                                                        <div class="me-2 lh-1">
                                                            <span class="avatar avatar-md">
                                                                <img src="../assets/images/ecommerce/png/26.png"
                                                                    alt="">
                                                            </span>
                                                        </div>
                                                        <div class="saved-card-details">
                                                            <p class="mb-0 fw-semibold">XXXX - XXXX -
                                                                XXXX - 7646</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-check payment-card-container mb-0">
                                                <input id="payment-card2" name="payment-cards" type="radio"
                                                    class="form-check-input">
                                                <div class="form-check-label">
                                                    <div
                                                        class="d-sm-flex d-block align-items-center justify-content-between">
                                                        <div class="me-2 lh-1">
                                                            <span class="avatar avatar-md">
                                                                <img src="../assets/images/ecommerce/png/27.png"
                                                                    alt="">
                                                            </span>
                                                        </div>
                                                        <div class="saved-card-details">
                                                            <p class="mb-0 fw-semibold">XXXX - XXXX -
                                                                XXXX - 9556</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-check payment-card-container mb-0">
                                                <input id="payment-card1" name="payment-cards" type="radio"
                                                    class="form-check-input" checked="">
                                                <div class="form-check-label">
                                                    <div
                                                        class="d-sm-flex d-block align-items-center justify-content-between">
                                                        <div class="me-2 lh-1">
                                                            <span class="avatar avatar-md">
                                                                <img src="../assets/images/ecommerce/png/26.png"
                                                                    alt="">
                                                            </span>
                                                        </div>
                                                        <div class="saved-card-details">
                                                            <p class="mb-0 fw-semibold">XXXX - XXXX -
                                                                XXXX - 7646</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-check payment-card-container mb-0">
                                                <input id="payment-card2" name="payment-cards" type="radio"
                                                    class="form-check-input">
                                                <div class="form-check-label">
                                                    <div
                                                        class="d-sm-flex d-block align-items-center justify-content-between">
                                                        <div class="me-2 lh-1">
                                                            <span class="avatar avatar-md">
                                                                <img src="../assets/images/ecommerce/png/27.png"
                                                                    alt="">
                                                            </span>
                                                        </div>
                                                        <div class="saved-card-details">
                                                            <p class="mb-0 fw-semibold">XXXX - XXXX -
                                                                XXXX - 9556</p>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary-light btn-wave">Batal</button>
                        <button type="button" class="btn btn-primary shadow btn-wave"
                            data-bs-dismiss="modal">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End::app-content -->
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
@endsection
