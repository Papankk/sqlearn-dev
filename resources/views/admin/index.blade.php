@extends('admin.template.layout')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card med-banner-card d-flex align-items-center justify-content-between flex-row">
                    <div class="card-body p-4">
                        <div class="row mx-0">
                            <div class="col-md-8">
                                <h3 class="fw-bold text-fixed-white">Dashboard Admin Web Gamifikasi SQLearn</h3>
                                <!-- <h6 class="fw-normal text-fixed-white">Kelola, Pantau, Optimalkan</h6> -->
                                <span class="d-block text-fixed-white op-5 mt-3 pt-1">Bantu pengguna menaklukkan
                                    tantangan SQL dengan sistem gamifikasi yang menarik! Pantau perkembangan, atur
                                    tantangan, dan buat pembelajaran lebih menyenangkan.</span>
                            </div>
                        </div>
                    </div>
                    <img src="" alt="" class="img-fluid med-banner-img">
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card custom-card position-relative rounded-md overflow-hidden px-2">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1ld">{{ $data['jumlah_bab'] }}</h5>
                                    <div class="fw-medium op-7">Total Bab</div>
                                </div>
                                <span
                                    class="avatar avatar-xl shadow-sm bg-secondary-transparent border border-secondary border-3 border-opacity-50 avatar-rounded">
                                    <i class="bx bx-notepad fs-2 lh-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card custom-card position-relative rounded-md overflow-hidden px-2">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1ld">{{ $data['jumlah_soal'] }}</h5>
                                    <div class="fw-medium op-7">Total Soal</div>
                                </div>
                                <div class="icon lh-1 mb-0">
                                    <span
                                        class="avatar avatar-xl shadow-sm bg-secondary-transparent border border-secondary border-3 border-opacity-50 avatar-rounded">
                                        <i class="bx bxs-book-content fs-2 lh-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card custom-card position-relative rounded-md overflow-hidden px-2">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1ld">{{ $data['jumlah_user'] }}</h5>
                                    <div class="fw-medium op-7">Total Pengguna</div>
                                </div>
                                <div class="icon lh-1 mb-0">
                                    <span
                                        class="avatar avatar-xl shadow-sm bg-secondary-transparent border border-secondary border-3 border-opacity-50 avatar-rounded">
                                        <i class="bx bxs-book-add fs-2 lh-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card custom-card position-relative rounded-md overflow-hidden px-2">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1ld">{{ $data['jumlah_materi'] }}</h5>
                                    <div class="fw-medium op-7">Total Materi</div>
                                </div>
                                <div class="icon lh-1 mb-0">
                                    <span
                                        class="avatar avatar-xl shadow-sm bg-secondary-transparent border border-secondary border-3 border-opacity-50 avatar-rounded">
                                        <i class="bi bi-people fs-2 lh-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Grafik Pendaftaran Pengguna</div>
                            </div>
                            <div class="card-body">
                                <div id="dynamic-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End::Row-1 -->
        </div>
    </div>

    <script src="{{ asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        fetch('/admin/chart/user-registrations')
            .then(res => res.json())
            .then(json => {
                const chartData = json.map(entry => ({
                    x: new Date(entry.date).getTime(),
                    y: entry.total
                }));

                var options = {
                    series: [{
                        data: chartData
                    }],
                    chart: {
                        id: "user-registration-chart",
                        type: "line",
                        height: 320,
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false,
                        },
                    },
                    xaxis: {
                        type: "datetime",
                        labels: {
                            format: "dd MMM",
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function(val) {
                                return parseInt(val, 10) + ' Pengguna';
                            }
                        }
                    },
                    stroke: {
                        curve: "smooth",
                        width: 3
                    },
                    colors: ["#5c67f7"],
                };

                var chart = new ApexCharts(
                    document.querySelector("#dynamic-chart"),
                    options
                );
                chart.render();
            })
            .catch(err => console.error("Error loading chart data:", err));
    </script>
@endsection
