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
                    {{-- <div class="col-sm-2">
                        <div class="card-body pb-0 px-0 py-0">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="130"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div> --}}
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
                                        {{ number_format($zakat->where('id_mosque', auth()->user()->mosque->id)->where('status', 'Bayar')->sum('nominal')) }}
                                    @else
                                        {{ number_format($zakat->where('status', 'Bayar')->sum('nominal')) }}
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
                                        {{ number_format($infaq->where('id_mosque', auth()->user()->mosque->id)->where('status', 'Bayar')->sum('nominal')) }}
                                    @else
                                        {{ number_format($infaq->where('status', 'Bayar')->sum('nominal')) }}
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
                                        {{ number_format($sedekah->where('id_mosque', auth()->user()->mosque->id)->where('status', 'Bayar')->sum('nominal')) }}
                                    @else
                                        {{ number_format($sedekah->where('status', 'Bayar')->sum('nominal')) }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    {{-- <div>
        @foreach ($tglZakat as $tgl)
            <p>{{ $tgl }}</p>
        @endforeach
    </div> --}}
    <div class="row">
        @if (auth()->user()->role->name === 'DKM')
            <div class="col-lg-10 order-0">
                <div class="card">
                    <div class="card-header header-elements p-3 my-n1">
                        <h5 class="card-title mb-0 pl-0 pl-sm-2 p-2">Laporan Dana Zakat Infaq dan Sedekah</h5>
                        <div class="d-flex card-action-element  ms-auto py-0 ">
                            <select name="" id="" class="form-control" style="margin-right: 10px;">
                                <option value="">{{ auth()->user()->mosque->name_mosque }}</option>
                            </select>
                            <div class="dropdown" style="margin-left: 10px;">
                                <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="bx bx-calendar"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('01')">Januari</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('02')">Februari</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('03')">Maret</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('04')">April</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('05')">Mei</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('06')">Juni</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('07')">Juli</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('08')">Agustus</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('09')">September</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('10')">Oktober</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('11')">November</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="setMonth('12')">Desember</a>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" id="searchMonth" name="searchMonth">
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="barChart" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-header">S</div>
                    <div class="card-body">
                        <select name="" id="" class="form-control" style="margin-right: 10px;">
                            <option value="">{{ auth()->user()->mosque->name_mosque }}</option>
                        </select>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <script>
        function setMonth(month) {
            document.getElementById('searchMonth').value = month;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var totalNominal = @json($totalNominal);

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
                    categories: ['Zakat', 'Infaq', 'Sedekah'],
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
