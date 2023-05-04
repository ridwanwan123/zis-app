@extends('layouts.base')

@section('title', 'Dashboard')


@section('content')
    <div class="row">
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title text-primary">السلام عليكم ورحمة الله وبركاته</h5>
                            <p class="mb-4">
                                Selamat Datang, <span class="fw-bold"> {{ auth()->user()->name }}</span> di website pendataan
                                dan penyaluran zakat, infaq, sedekah.
                            </p>

                            <a href="#" class="btn btn-sm btn-outline-primary">More Info</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="130"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span>Total Pemasukan</span>
                            <h3 class="card-title text-nowrap mb-1">Zakat</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-money mb-1"></i> Rp.</small>
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
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span>Total Pemasukan</span>
                            <h3 class="card-title text-nowrap mb-1">Infaq</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-money mb-1"></i> Rp.
                                @if (auth()->user()->mosque)
                                    {{ number_format($infaq->where('id_mosque', auth()->user()->mosque->id)->where('status', 'Bayar')->sum('nominalInfaq')) }}
                                @else
                                    {{ number_format($infaq->where('status', 'Bayar')->sum('nominalInfaq')) }}
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
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span>Total Pemasukan</span>
                            <h3 class="card-title text-nowrap mb-1">Sedekah</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-money mb-1"></i> Rp.
                                @if (auth()->user()->mosque)
                                    {{ number_format($sedekah->where('id_mosque', auth()->user()->mosque->id)->where('status', 'Bayar')->sum('nominalSedekah')) }}
                                @else
                                    {{ number_format($sedekah->where('status', 'Bayar')->sum('nominalSedekah')) }}
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
