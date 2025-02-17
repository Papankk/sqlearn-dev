@extends('template.layout')

@section('title', 'Materi - SQLearn')

@section('content')
    <style>
        #pdfContainer {
            width: 100%;
            max-width: 920px;
            margin: auto;
            border: 1px solid #ddd;
            overflow-y: auto;
            height: 80vh;
        }

        canvas {
            display: block;
            margin: 10px auto;
            border: 1px solid #ddd;
        }
    </style>

    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Start:: row-1 -->
            <div class="row">
                <div class="col-xl-12 pt-1">
                    <div class="card custom-card profile-card">
                        <div class="profile-banner-img">
                            <img src="{{ asset('assets/images/media/media-3.jpg') }}" class="card-img-top" alt="..." />
                        </div>
                        <div class="card-body pb-0 position-relative">
                            <div class="row profile-content">
                                <div class="col-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <ul class="nav nav-tabs tab-style-8 scaleX profile-settings-tab gap-2"
                                                id="myTab4" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link bg-primary-transparent px-4"
                                                        id="product-details" data-bs-toggle="tab"
                                                        data-bs-target="#product-details-pane" type="button" role="tab"
                                                        aria-controls="product-details-pane" aria-selected="true">
                                                        Keterangan
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link bg-primary-transparent px-4 active"
                                                        id="key-features-tab" data-bs-toggle="tab"
                                                        data-bs-target="#key-features-tab-pane" type="button"
                                                        role="tab" aria-controls="key-features-tab-pane"
                                                        aria-selected="false" tabindex="-1">
                                                        Materi
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body tab-content">
                                            <div class="tab-pane overflow-hidden p-0 border-0" id="product-details-pane"
                                                role="tabpanel" aria-labelledby="product-details" tabindex="0">
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row" class="fw-semibold">Bab</th>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" class="fw-semibold">
                                                                    Materi yang dipelajari
                                                                </th>
                                                                <td>lorem ipsum, dolor sit amet</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane show active overflow-hidden p-0 border-0"
                                                id="key-features-tab-pane" role="tabpanel"
                                                aria-labelledby="key-features-tab" tabindex="1">
                                                <div class="border-block-end border-1">
                                                    <div id="pdfContainer"></div>
                                                    <!-- This will hold multiple canvases -->

                                                    <script>
                                                        var url = "{{ asset($pdf->path) }}"; // Your PDF file path

                                                        pdfjsLib.getDocument(url).promise.then(pdf => {
                                                            var container = document.getElementById('pdfContainer');

                                                            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                                                                pdf.getPage(pageNum).then(page => {
                                                                    var scale = 1.5;
                                                                    var viewport = page.getViewport({
                                                                        scale
                                                                    });

                                                                    var canvas = document.createElement("canvas");
                                                                    var context = canvas.getContext('2d');
                                                                    canvas.width = viewport.width;
                                                                    canvas.height = viewport.height;

                                                                    var renderContext = {
                                                                        canvasContext: context,
                                                                        viewport: viewport
                                                                    };

                                                                    page.render(renderContext);
                                                                    container.appendChild(canvas); // Append canvas for each page
                                                                });
                                                            }
                                                        });
                                                    </script>
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
            <!-- End:: row-1 -->
        </div>
    </div>
@endsection
