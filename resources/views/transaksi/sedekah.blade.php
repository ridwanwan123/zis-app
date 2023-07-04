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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>


    <title>Bayar Sedekah | Tunaikan ZIS</title>
    <!-- Logo icon -->
    <link rel="shorcut icon" width="80px" href="{{ asset('homepage/image/A1.png') }}">

</head>

<body>
    <!-- NAVBAR SECTION  -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                TUNAIKAN INFAK ANDA DENGAN AMAN DAN MUDAH
            </h2>
            <p class="text-support text-lg col-md-8 color-palette-2">
                Dengan mengisi formulir ini, donatur akan menerima Notifikasi Berhasil setelah melakukan pembayaran
                melalui whatsapp.
            </p>
        </div>
    </section>

    <!-- FORMULIR  -->
    <section id="formulir" class="formulir">
        <div class="container-fluid">
            <form enctype="multipart/form-data" action="{{ route('TransaksiSedekah.store') }}" method="POST"
                class="row">
                @csrf
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
                            <h1 class="header-title color-palette-1 fw-bold">Data Donatur</h1>
                            <p class="mt-30 text-lg color-palette-2">Isi Data diri dengan benar
                            </p>
                        </div>

                        <!-- Input  -->
                        <div class="row g-3 col-lg-12">
                            <div class="mb-4">
                                <label for="namaDonaturInput" class="form-label">Nama Lengkap</label>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="hambaAllahCheckbox">
                                    <label class="form-check-label" for="hambaAllahCheckbox">Hamba Allah</label>
                                </div>
                                <input type="text" class="form-control" id="namaDonaturInput"
                                    value="{{ old('nama_donatur') }}" name="nama_donatur"
                                    aria-describedby="nama_donatur" autocomplete="off">
                            </div>

                            <div class="mb-3 ">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" placeholder="Harap Menggunakan 62"
                                    id="phone" value="{{ old('phone') }}" autocomplete="off" name="phone"
                                    aria-describedby="phone">
                            </div>
                            <div class="mb-5 ">
                                <label for="id_mosque" class="form-label">Masjid</label> <i class="fa fa-info-circle"
                                    id="my-icon"></i>
                                <select name="id_mosque" class="form-select">
                                    <option value="{{ old('id_mosque') }}" selected>Silahkan pilih daftar masjid
                                    </option>
                                    @foreach ($mosques as $mosque)
                                        <option value="{{ $mosque->id }}"> {{ $mosque->name_mosque }} </option>
                                    @endforeach
                                </select>
                                <small id="my-tooltip" hidden>
                                    Data anda akan masuk ke data masjid yang anda pilih
                                </small>
                            </div>
                            <hr>

                            <div class="col-lg-12 col-12 my-auto">
                                <p class=" "></p>
                                <h1 class="header-title color-palette-1 fw-bold">Nominal Donatur</h1>
                            </div>

                            <div class="mb-3" hidden>
                                <label for="" class="form-label">Jenis Dana</label> <i
                                    class="fa fa-info-circle" id="my-icon2"></i>
                                <select name="" class="form-select" id="select-condition">
                                    <option value="" selected>Silahkan pilih jenis dana</option>
                                    <option value="zakat">Zakat</option>
                                    <option value="infaq">Infaq</option>
                                    <option value="sedekah">Sedekah</option>
                                </select>

                                <small id="my-tooltip2" hidden>
                                    Daftar Masjid hanya masjid yang sudah didaftarkan oleh pihak masjid
                                </small>
                            </div>

                            <div class="" id="input-form" style="display:none;">
                                {{-- <label for="zakat" class="form-label">Nominal Zakat</label> --}}
                                <input type="text" class="form-control"
                                    placeholder="100"aria-label="Amount (to the nearest dollar)">
                            </div>
                            <div class="input-group input-group-merge mb-5">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="nominal"
                                    value="{{ old('nominal') }}" placeholder="100"
                                    aria-label="Amount (to the nearest ruppiah)" autocomplete="off">
                            </div>


                            <div class="d-flex justify-content-md-end mt-3">
                                <button type="submit" class="btn btn-primary btn-next p-3">
                                    <span class="font-semibold text-base">Lanjutkan</span>
                                </button>
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
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <!-- Popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Tooltip.js -->
    <script src="https://unpkg.com/tippy.js@6.3.3/dist/tippy-bundle.umd.min.js"></script>

    <script>
        const hambaAllahCheckbox = document.getElementById('hambaAllahCheckbox');
        const namaDonaturInput = document.getElementById('namaDonaturInput');

        // Fungsi untuk mengatur nilai input dan checkbox
        function toggleHambaAllah() {
            if (hambaAllahCheckbox.checked) {
                namaDonaturInput.value = 'Hamba Allah';
                namaDonaturInput.setAttribute('readonly', 'readonly');
            } else {
                if (namaDonaturInput.value.toLowerCase() === 'hamba allah') {
                    namaDonaturInput.value = '';
                }
                namaDonaturInput.removeAttribute('readonly');
            }
        }

        hambaAllahCheckbox.addEventListener('change', toggleHambaAllah);

        namaDonaturInput.addEventListener('input', function() {
            if (this.value.toLowerCase() === 'hamba allah') {
                hambaAllahCheckbox.checked = true;
            } else {
                hambaAllahCheckbox.checked = false;
            }
            toggleHambaAllah(); // Panggil fungsi ini setiap kali input berubah
        });
    </script>

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

        tippy('#my-icon', {
            content: document.querySelector('#my-tooltip').innerHTML,
            placement: 'top',
            theme: 'light',
            arrow: true,
        });
    </script>
</body>

</html>
