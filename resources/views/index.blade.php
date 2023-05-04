<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('homepage/css/navbar-log-in.css') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <title>ZIS | Home</title>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto text-lg gap-lg-0 gap-2">
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="">Home</a>
                        </li>
                        <li class="nav-item my-auto dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ZIS
                            </a>
                            <ul class="dropdown-menu border-0" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item text-lg color-palette-2" href="#">Zakat</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-lg color-palette-2"
                                        href="{{ route('TransaksiInfaq') }}">Infaq</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-lg color-palette-2" href="#">Sedekah</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href=""></a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="btn btn-lapor d-flex justify-content-center ms-lg-2" href="{{ route('login') }}"
                                role="button">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- END NAVBAR  -->

    <!-- HEADER -->
    <section class="header pt-lg-60 pb-50">
        <div class="container-fluid">
            <div class="row gap-lg-0 gap-5">
                <div class="col-lg-6 col-12 my-auto">
                    <p class=" ">

                    </p>
                    <h1 class="header-title color-palette-1 fw-bold">
                        السلام عليكم ورحمة الله وبركاته <br>
                        <span class="d-sm-inline d-none tx-hero"> Zakat, Infaq, Sedekah </span>
                    </h1>
                    <p class="mt-30 mb-40 text-lg color-palette-1">Sebuah situs web yang dibangun dengan tujuan mengajak
                        umat Muslim untuk saling membantu dengan cara bersedekah dan juga mempererat hubungan antar
                        sesama Muslim.
                    </p>
                    <div class="d-flex flex-lg-row flex-colcontainer-fluidumn gap-4">
                        <a class="btn btn-get text-lg text-white rounded-pill" href="#" role="button">Yuk
                            Beramal!</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 d-lg-block d-none">
                    <div class="d-flex justify-content-lg-end justify-content-center me-lg-5">
                        <div class="position-relative" data-aos="zoom-in">
                            <img src="{{ asset('homepage/image/Pray-bro.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HEADER  -->

    <!-- MULAI CONTENT  -->

    <!-- PROSES PELAPORAN -->
    <section id="pelaporan" class="pelaporan pt-50 pb-50 ">
        <div class="container-fluid">
            <h2 class="text-4xl fw-bold color-palette-1 text-center mb-30">Mudah <br>Proses Pembayaran
            </h2>
            <div class="row gap-lg-0 gap-4" data-aos="fade-up">
                <div class="col-lg-4">
                    <div class="card pelaporan-card border-0">
                        <img src="{{ asset('homepage/image/icon1.png') }}" width="80px" alt=""
                            srcset="">
                        <p class="fw-semibold text-2xl mb-2 mt-3 color-palette-1">1. Pilih Menu</p>
                        <p class="text-lg color-palette-1 mb-0">Anda dapat memilih menu zakat, infaq, atau sedekah pada
                            navbar.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card pelaporan-card border-0">
                        <img src="{{ asset('homepage/image/icon2.png') }}" width="80px" alt=""
                            srcset="">
                        <p class="fw-semibold text-2xl mb-2 mt-3 color-palette-1">2. Isi Formulir</p>
                        <p class="text-lg color-palette-1 mb-0">Melakukan pengisian formulir dan memilih masjid yang
                            menjadi tujuan.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card pelaporan-card border-0">
                        <img src="{{ asset('homepage/image/icon3.png') }}" width="80px" alt=""
                            srcset="">
                        <p class="fw-semibold text-2xl mb-2 mt-3 color-palette-1">3. Notifikasi</p>
                        <p class="text-lg color-palette-1 mb-0">Setelah melakukan pembayaran, Anda akan mendapatkan
                            notifikasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PROSES PELAPORAN  -->



    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq mt-5">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row gy-4">
                <div
                    class="col-md-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                    <div class="content">
                        <h3>Pertanyaan yang sering <strong class="q">Ditanyakan!</strong></h3>
                        <p>
                            Beberapa Pertanyaan yang kami ringkas dan yang paling sering ditanyakan
                        </p>
                    </div>

                    <div class="accordion accordion-flush" id="faqlist">
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    1. Bagaimana cara membayar zis
                                </button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">

                                    Anda bisa langsung mengklik menu zakat, infaq, atau sedekah sesuai dengan yang ingin
                                    dibayar. Kemudian, lengkapi semua data yang terdapat pada formulir dengan lengkap.
                                    Setelah itu, Anda akan diminta untuk melakukan pembayaran.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-2">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    2. Bagaimana cara mengetahui apakah transaksi telah berhasil?
                                </button>
                            </h3>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Setelah Muzaki melakukan pembayaran, akan ada notifikasi WhatsApp masuk bahwa status
                                    pembayaran berhasil.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        {{-- <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-3">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    3. Melihat proses penyaluran dana zis
                                </button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Hasil Penyaluran dana akan kami hubungi diwebsite ini
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>

                <div class="col-lg-5 col-md-7 col-12 d-lg-block d-none">
                    <div class="d-flex justify-content-lg-end justify-content-center me-lg-5">
                        <div class="position-relative" data-aos="zoom-in">
                            <img src="{{ asset('homepage/image/FAQ.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End F.A.Q Section -->

    <!-- AKHIR CONTENT  -->

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

</body>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

<!-- vendor js -->
<script src="{{ asset('homepage/js/swiper-bundle.min.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('homepage/js/main.js') }}"></script>

<!-- AOS Animation -->
<script>
    AOS.init();
</script>

</html>
