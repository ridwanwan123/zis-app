@extends('layouts.base')

@section('title', 'Dashboard')


@section('content')

    <div class="row">
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary d-flex justify-content-end">السلام عليكم ورحمة الله
                                وبركاته
                            </h5>
                            <p class="mb-4">
                                Selamat datang, <span class="fw-bold"> {{ auth()->user()->name }}</span>
                                {{ \App\Models\Role::find(auth()->user()->id_role)->name }} <span class="fw-bold">
                                    {{ auth()->user()->id_mosque ? \App\Models\Mosque::find(auth()->user()->id_mosque)->name_mosque : '' }}</span>!
                                Disini Anda dapat mengelola data ZIS dengan mudah dan efisien, serta memastikan
                                dana
                                yang terkumpul
                                tersalurkan ke penerima yang tepat.
                            </p>

                            <a href="#" class="btn btn-sm btn-outline-primary">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role->name === 'DKM')
            <div class="col-lg-6 col-md-3 order-1">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('assets/img/unicons/wallet-info.png') }}" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Total Pemasukan</span>
                                <h3 class="card-title text-nowrap mb-1">Zakat</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-money mb-1"></i> Rp.
                                    @if (auth()->user()->mosque)
                                        {{ number_format($totalZakat) }}
                                    @else
                                        {{ number_format($totalZakat) }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('assets/img/unicons/wallet.png') }}" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="{{ route('infaq') }}">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Total Pemasukan</span>
                                <h3 class="card-title text-nowrap mb-1">Infaq</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-money mb-1"></i> Rp.
                                    @if (auth()->user()->mosque)
                                        {{ number_format($totalInfaq) }}
                                    @else
                                        {{ number_format($totalInfaq) }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('assets/img/unicons/cc-warning.png') }}" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="{{ route('sedekah') }}">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Total Pemasukan</span>
                                <h3 class="card-title text-nowrap mb-1">Sedekah</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-money mb-1"></i> Rp.
                                    @if (auth()->user()->mosque)
                                        {{ number_format($totalSedekah) }}
                                    @else
                                        {{ number_format($totalSedekah) }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        @if (auth()->user()->role->name === 'DKM')
            <div class="col-lg-8 order-0 mb-4">
                <div class="card">
                    <div class="card-header header-elements p-3 my-n1">
                        <h5 class="card-title mb-0 pl-0 pl-sm-2 p-2">Laporan Dana Zakat Infaq dan Sedekah</h5>
                        <div class="d-flex card-action-element align-items-center ms-auto py-0">
                            <div class="me-3">
                                <select name="" id="" class="form-control">
                                    <option value="">{{ $masjid->name_mosque }}</option>
                                </select>
                            </div>
                            <div>
                                <form id="formSearch" action="{{ route('dashboard') }}" method="GET">
                                    <select name="searchMonth" id="searchMonth" class="form-control"
                                        onchange="setMonth(this.value)">
                                        <option value="">Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="barChart" style="height: 400px;"></div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Pendistribusian Dana ZIS</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="p-0 m-0">

                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/img/unicons/wallet-info.png') }}" alt="User"
                                        class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Total Belum Disalurkan</small>
                                        <h6 class="mb-0">Zakat</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0"> Rp.
                                            {{ number_format($totalZakatBelumDisalurkan) }}</h6>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/img/unicons/wallet-info.png') }}" alt="User"
                                        class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Total Sudah Disalurkan (-)</small>
                                        <h6 class="mb-0">Zakat</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0"> Rp.
                                            {{ number_format($totalPengeluaranZakat) }}</h6>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/img/unicons/wallet.png') }}" alt="User"
                                        class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Total Belum Disalurkan</small>
                                        <h6 class="mb-0">Infaq</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0"> Rp.
                                            {{ number_format($totalInfaqBelumDisalurkan) }}</h6>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/img/unicons/wallet.png') }}" alt="User"
                                        class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Total Sudah Disalurkan (-)</small>
                                        <h6 class="mb-0">Infaq</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0"> Rp.
                                            {{ number_format($totalPengeluaranInfaq) }}</h6>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/img/unicons/cc-warning.png') }}" alt="User"
                                        class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Total Belum Disalurkan</small>
                                        <h6 class="mb-0">Sedekah</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0"> Rp.
                                            {{ number_format($totalSedekahBelumDisalurkan) }}</h6>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/img/unicons/cc-warning.png') }}" alt="User"
                                        class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Total Sudah Disalurkan (-)</small>
                                        <h6 class="mb-0">Sedekah</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0"> Rp.
                                            {{ number_format($totalPengeluaranSedekah) }}</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        @endif
    </div>


    <script>
        function setMonth(month) {
            document.getElementById('searchMonth').value = month;
            document.getElementById('formSearch').submit();
        }

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
                    colors: ['#ffbb44'],
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
                colors: ['#ffbb44'],
                fill: {
                    colors: ['#ffbb44'],
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




@endsection
