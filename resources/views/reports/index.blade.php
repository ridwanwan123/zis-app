<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vender Css  -->
    <link rel="stylesheet" href="{{ asset('homepage/css/swiper-bundle.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('homepage/css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/utilites.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/navbar-log-in.css') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <title>ZIS | Laporan ZIS</title>
    <!-- Logo icon -->
    <link rel="shorcut icon" width="80px" href="{{ asset('homepage/image/A1.png') }}">

</head>

<body>
    {{-- START CONTENT  --}}
    <!-- NAVBAR SECTION  -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('homepage/image/logo.png') }}" alt="" srcset="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto text-lg gap-lg-0 gap-2">
                        <li class="nav-item my-auto">
                            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="{{ route('Reporting') }}">Pelaporan
                                ZIS</a>
                        </li>
                        <li class="nav-item my-auto dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Bayar ZIS
                            </a>
                            <ul class="dropdown-menu border-0" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-lg color-palette-2"
                                        href="{{ route('TransaksiZakat') }}">Zakat</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-lg color-palette-2"
                                        href="{{ route('TransaksiInfaq') }}">Infaq</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-lg color-palette-2"
                                        href="{{ route('TransaksiSedekah') }}">Sedekah</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- END NAVBAR  -->

    <!-- MULAI CONTENT  -->
    <section class="reached pt-50 pb-50">
        <div class="container-fluid">
            <div class="pb-50">
                <h2 class="text-4xl fw-bold color-palette-1 text-start mb-10">Laporan keseluruhan ZIS</h2>
                <p class="text-lg color-palette-1 mb-0">Anda dapat melihat laporan dari zakat infaq dan sedekah</p>
            </div>
            <hr>
            <div class="d-flex flex-lg-row flex-column align-items-center justify-content-center gap-lg-0 gap-4">
                <div class="me-lg-35">
                    <p class=" text-3xl text-lg-start text-center color-palette-1 fw-bold m-0">
                        {{ $totalAllMosque }}
                        <span class="text-3xl text-center color-palette-1 fw-bold m-0">Masjid</span>
                    </p>

                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Data Masjid yang menggunakan
                        website ini</p>
                </div>
                <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                <div class="me-lg-35 ms-lg-35">
                    <p class="text-3xl text-lg-start text-center color-palette-1 fw-bold m-0">
                        Rp. {{ number_format($totalZakat) }}</p>
                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Data Zakat yang terkumpul</p>
                </div>
                <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                <div class="me-lg-35 ms-lg-35">
                    <p class="text-3xl text-lg-start text-center color-palette-1 fw-bold m-0">Rp.
                        {{ number_format($totalInfaq) }}</p>
                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Data Infaq yang terkumpul</p>
                </div>
                <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                <div class="me-lg-35 ms-lg-35">
                    <p class="text-3xl text-lg-start text-center color-palette-1 fw-bold m-0">Rp.
                        {{ number_format($totalSedekah) }}
                    </p>
                    <p class="text-lg text-lg-start text-center color-palette-2 m-0">Data Sedekah yang terkumpul</p>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <section class="reached pt-0 pb-50">
        <div class="container-fluid">
            <div class="order-0">
                <div class="card">
                    <div
                        class="card-header header-elements p-3 my-n1 d-flex justify-content-between flex-column flex-sm-row">
                        <h5 class="card-title mb-0 pl-0 pl-sm-2 p-2">Laporan Dana Zakat Infaq dan Sedekah</h5>
                        <div class="card-action-element d-flex align-items-center">
                            <form id="formSearch" action="{{ route('Reporting') }}" method="GET"
                                class="d-flex flex-wrap align-items-center">
                                <div class="form-group me-2 mb-2 mb-md-0">
                                    <select name="id_mosque" class="form-select">
                                        <option value="{{ old('id_mosque') }}" selected>Silahkan pilih daftar masjid
                                        </option>
                                        @foreach ($mosques as $id => $name)
                                            <option value="{{ $id }}"
                                                {{ $id == $searchMosque ? 'selected' : '' }}>{{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group me-2 mb-2 mb-md-0">
                                    <select name="searchMonth" id="searchMonth" class="form-select">
                                        <option value="">Pilih Bulan</option>
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}"
                                                {{ $month == $searchMonth ? 'selected' : '' }}>
                                                {{ \Carbon\Carbon::createFromFormat('m', $month)->format('F') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-2 mb-md-0">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="barChart" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Footer -->
    <section class="footer pt-50">
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 text-lg-start text-center">
                        <a href="" class="mb-30">
                            <img src="{{ asset('homepage/image/logo.png') }}" alt="" srcset="">
                        </a>
                        <p class="mt-30 text-lg color-palette-1 mb-30">Sebuah situs web yang dibangun dengan tujuan
                            mengajak umat Muslim untuk saling membantu dengan cara bersedekah dan juga mempererat
                            hubungan antar sesama Muslim.</p>
                        <!-- <p class="mt-30 text-lg color-palette-1 mb-30">Copyright 2021. All Rights Reserved.</p> -->
                    </div>
                    <div class="col-lg-8 mt-lg-0 mt-20">
                        <div class="row gap-sm-0">
                            <div class="col-md-4 col-6 mb-lg-0 mb-25">
                                <p class="text-lg fw-semibold color-palette-1 mb-12">ZIS</p>
                                <ul class="list-unstyled">
                                    <li class="mb-6">
                                        <a href="{{ route('login') }}"
                                            class="text-lg color-palette-1 text-decoration-none">Admin</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="" class="text-lg color-palette-1 text-decoration-none">About
                                            Us</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="" class="text-lg color-palette-1 text-decoration-none">Terms
                                            of Use</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="" class="text-lg color-palette-1 text-decoration-none">Privacy
                                            & Policy</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-6 mb-lg-0 mb-25">
                                <p class="text-lg fw-semibold color-palette-1 mb-12">Contact Us</p>
                                <ul class="list-unstyled">
                                    <li class="mb-6">
                                        <a href="" class="text-lg color-palette-1 text-decoration-none">+62813
                                            8175 3391</a>
                                    </li>
                                    <li class="mb-6">
                                        <a href=""
                                            class="text-lg color-palette-1 text-decoration-none">zis.id@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-12 mt-lg-0 mt-md-0 mt-25">
                                <p class="text-lg fw-semibold color-palette-1 mb-12">Connect</p>
                                <ul class="list-unstyled">
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">
                                            Politeknik Negeri Jakarta
                                        </a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">
                                            Masjid Darul Ilmi
                                        </a>
                                    </li>
                                    <li class="mb-6">
                                        <a href="#" class="text-lg color-palette-1 text-decoration-none">
                                            Teknik Informatika dan komputer PNJ
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    {{-- END CONTENT  --}}

</body>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

<!-- vendor js -->
<script src="{{ asset('homepage/js/swiper-bundle.min.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('homepage/js/main.js') }}"></script>

{{-- Chart Js  --}}
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

<!-- AOS Animation -->
<script>
    AOS.init();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var totalNominal = [
            {{ $totalZakat ?? 0 }},
            {{ $totalInfaq ?? 0 }},
            {{ $totalSedekah ?? 0 }},
            {{ $totalZakatBelumDisalurkan ?? 0 }},
            {{ $totalInfaqBelumDisalurkan ?? 0 }},
            {{ $totalSedekahBelumDisalurkan ?? 0 }},
            {{ $totalPengeluaranZakat ?? 0 }},
            {{ $totalPengeluaranInfaq ?? 0 }},
            {{ $totalPengeluaranSedekah ?? 0 }}
        ];

        var options = {
            series: [{
                name: 'Total Nominal',
                data: totalNominal,
                colors: ['#34a034'],
            }],
            chart: {
                height: 400,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '30%',
                    borderRadius: 10,
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Zakat', 'Infaq', 'Sedekah', 'Zakat Belum Disalurkan',
                    'Infaq Belum Disalurkan', 'Sedekah Belum Disalurkan', 'Pengeluaran Zakat',
                    'Pengeluaran Infaq', 'Pengeluaran Sedekah'
                ],
                labels: {
                    style: {
                        fontSize: '13px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '13px'
                    }
                }
            },
            colors: ['#34a034'],
            fill: {
                colors: ['#34a034'],
                opacity: 10
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Rp " + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#barChart"), options);
        chart.render();
    });
</script>


</html>
