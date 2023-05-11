<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vender Css  -->
    <link rel="stylesheet" href="{{ asset('homepage/css/swiper-bundle.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('homepage/css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/utilites.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/formulir.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/success.css') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <title>Success | Tunaikan ZIS</title>
    <!-- Logo icon -->
    <link rel="shorcut icon" width="80px" href="{{ asset('homepage/image/A1.png') }}">
</head>

<body>
    <!-- NAVBAR SECTION  -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('homepage/image/logo.png') }}" alt="" srcset="">
                </a>
            </div>
        </nav>
    </section>
    <!-- END NAVBAR  -->

    <!-- MULAI CONTENT  -->

    <section id="header" class="header">
        <div class="container-fluid">
            <h2 class="text-4xl fw-bold color-palette-1 mt-30">
                PEMBAYARAN ZIS TELAH BERHASIL
            </h2>
            <p class="text-support text-lg col-md-8 color-palette-2">
                Anda dapat melihat bukti transaksi pembayaran ZIS melalui notifikasi WhatsApp yang kami kirimkan.
            </p>
        </div>
    </section>

    <!-- FORMULIR  -->
    <section id="formulir" class="formulir">
        <div class="container-fluid">
            <form action="" id="msForm" class="row">
                <div class="card formulir-card mt-5">


                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="text-center" id="tahap1"><strong>Formulir</strong></li>
                        <li class="active text-center" id="tahap2"><strong>Success</strong></li>
                    </ul>
                    <!-- Complete Success Content -->
                    <section class="complete-success mx-auto">
                        <div class="container-fluid">
                            <div class="text-center">
                                <img src="{{ asset('homepage/image/success.png') }}" alt="" srcset="">
                            </div>
                            <div class="pt-70 pb-50">
                                <h2 class="text-4xl fw-bold text-center color-palette-1 mb-10">PEMBAYARAN BERHASIL
                                </h2>
                                <div class="payment pt-md-50 pb-md-50 pt-50 pb-10">
                                    <h2 class="fw-bold text-2xl color-palette-1 mb-20">Informasi Pembayaran</h2>
                                    <p class="text-lg color-palette-1 mb-20">Nama Lengkap :
                                        <span class="purchase-details">
                                            {{ $infaq->nama_donatur }}
                                        </span>
                                    </p>
                                    <p class="text-lg color-palette-1 mb-20">Nomor Telepon :
                                        <span class="purchase-details">
                                            {{ $infaq->phone }} dsds
                                        </span>
                                    </p>
                                    <p class="text-lg color-palette-1 mb-20">Nominal Pembayaran :
                                        <span class="purchase-details color-palette-4"> Rp.
                                            {{ number_format($infaq->nominalInfaq) }}
                                        </span>
                                    </p>
                                </div>
                                <p class="text-lg text-center color-palette-1 m-0">Semoga Allah membalas kebaikan kamu
                                </p>
                            </div>
                            <div class="button-group d-flex flex-column mx-auto">
                                <a class="btn btn-primary btn-next p-3" href="{{ url('/') }}"
                                    role="button">Home</a>
                            </div>
                        </div>
                    </section>

                </div>
            </form>
        </div>
    </section>

    <!-- SELESAI CONTENT  -->
</body>

</html>
