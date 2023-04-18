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
    <link rel="stylesheet" href="{{ asset('homepage/css/formulir.css') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <title>ZIS | Tunaikan ZIS</title>
    <!-- Logo icon -->
    <link rel="shorcut icon" width="80px" href="{{ asset('homepage/image/A1.png') }}">

</head>

<body>
    <!-- NAVBAR SECTION  -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand" href="index.html">
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
                TUNAIKAN ZAKAT, INFAK, DAN SEDEKAH ANDA DENGAN AMAN DAN MUDAH
            </h2>
            <p class="text-support text-lg col-md-8 color-palette-2">
                Dengan mengisi formulir ini, muzaki akan menerima Bukti Setor Zakat (BSZ),
                laporan penyaluran, info layanan ZIS melalui email & whatsapp.
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
                        <li class="active text-center" id="tahap1"><strong>Tahap 1</strong></li>
                        <li class="text-center" id="tahap2"><strong>Tahap 2</strong></li>
                    </ul>
                    <hr>

                    <!-- Input  -->
                    <div class="row gap-lg-0 gap-5">
                        <div class="col-lg-12 col-12 my-auto">
                            <p class=" "></p>
                            <h1 class="header-title color-palette-1 fw-bold">Data Muzaki</h1>
                            <p class="mt-30 text-lg color-palette-2">Data Otomatis terisi jika anda sudah login
                            </p>
                        </div>

                        <!-- Input  -->
                        <div class="row g-3 col-lg-12">
                            <div class="col mb-3 ">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                    id="name">
                            </div>
                            <div class="col mb-3 ">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{ auth()->user()->email }}" aria-describedby="emailHelp">
                            </div>
                            <div class="col mb-5 ">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="email" class="form-control" id="no_telepon"
                                    value="{{ auth()->user()->no_telepon }}" aria-describedby="emailHelp">
                            </div>
                            <hr>

                            <div class="col-lg-12 col-12 my-auto">
                                <p class=" "></p>
                                <h1 class="header-title color-palette-1 fw-bold">Pilih Jenis Dana</h1>

                            </div>

                            <div class="mb-3">
                                <label for="mosque" class="form-label">Jenis Dana</label> <i class="fa fa-info-circle"
                                    id="my-icon2"></i>
                                <select name="id_mosque" class="form-select" id="select-condition">
                                    <option value="" selected>Silahkan pilih jenis dana</option>
                                    <option value="zakat">Zakat</option>
                                    <option value="infaq">Infaq</option>
                                    <option value="sedekah">Sedekah</option>
                                </select>

                                <small id="my-tooltip2" hidden>
                                    Daftar Masjid hanya masjid yang sudah didaftarkan oleh pihak masjid
                                </small>
                            </div>

                            <div class="mb-3" id="input-form" style="display:none;">
                                {{-- <label for="zakat" class="form-label">Nominal Zakat</label> --}}
                                <input type="text" class="form-control"
                                    placeholder="100"aria-label="Amount (to the nearest dollar)">
                            </div>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest ruppiah)">
                            </div>
                            <!-- SEBAGAI KORBAN MAKA AKAN KELUAR FORM LAGI  -->


                            <!-- BUTTON  -->
                            <div class="d-md-flex justify-content-md-end">
                                <!-- <button class="btn btn-primary me-md-2" type="button">Button</button> -->
                                <!-- <button class="btn btn-primary" type="button">Button</button> -->
                                <input type="button" value="Selanjutnya" class="btn btn-primary btn-next p-3">
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/admin/vendor/js/bootstrap.js') }}"></script>
    <!-- Popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Tooltip.js -->
    <script src="https://unpkg.com/tippy.js@6.3.3/dist/tippy-bundle.umd.min.js"></script>

    <script>
        // Get the select element and input form
        const selectCondition = document.getElementById('select-condition');
        const inputForm = document.getElementById('input-form');

        // Add event listener to select element
        selectCondition.addEventListener('change', function() {
            // Get the selected option value
            const selectedOption = selectCondition.value;

            // Show or hide the input form based on the selected option value
            if (selectedOption === 'zakat') {
                inputForm.style.display = 'block';
            } else {
                inputForm.style.display = 'none';
            }
        });
    </script>
</body>

</html>
