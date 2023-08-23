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


    <title>Bayar Zakat | Tunaikan ZIS</title>
    <!-- Logo icon -->
    <link rel="shorcut icon" width="80px" href="{{ asset('homepage/image/A1.png') }}">
    <style>
        .badge-wajib {
            background-color: #34a034;
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 5px;
        }

        .badge-tidakWajib {
            background-color: rgb(214, 39, 39);
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
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
                TUNAIKAN ZAKAT ANDA DENGAN AMAN DAN MUDAH
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
            <form enctype="multipart/form-data" action="{{ route('TransaksiZakat.store') }}" method="POST"
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
                            {{-- <p class="mt-30 text-lg color-palette-2">Isi Data diri dengan benar
                            </p> --}}
                        </div>

                        <!-- Input  -->
                        <div class="row col-lg-12">
                            {{-- <div class="card p-4"> --}}

                            <div class="mb-4">
                                <small class="color-palette-1 fw-bold d-block">Waktu Zakat</small>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="bulan" value="option1" onclick="handleOptionChange('bulan')">
                                    <label class="form-check-label" for="">Perbulan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="tahun" value="option2" onclick="handleOptionChange('tahun')">
                                    <label class="form-check-label" for="">Pertahun</label>
                                </div>
                            </div>

                            <div class="row g-3 col-lg-12">
                                <div class="col-lg-7 col-12" id="formPerhitungan">
                                    <div class="mb-4">
                                        <label for="totalHarta" class="form-label">Total Nilai Harta</label>
                                        <input type="text" class="form-control" placeholder="Total Keseluruhan Harta"
                                            id="totalHarta" value="" autocomplete="off" name="total_harta"
                                            aria-describedby="">

                                        <label for="bonus" class="form-label">Pendapatan Lain (Bonus, THR)</label>
                                        <input type="text" class="form-control mb-3"
                                            placeholder="Pendapatan Lain (Bonus, THR)" id="bonus" value=""
                                            autocomplete="off" name="bonus" aria-describedby="">

                                        <label for="totalHutang" class="form-label">Hutang yang dimiliki</label>
                                        <input type="text" class="form-control"
                                            placeholder="Total Keseluruhan Hutang" id="totalHutang" value=""
                                            autocomplete="off" name="total_hutang" aria-describedby="">

                                    </div>
                                    <div class="input-group input-group-merge mb-5" id="input-form-nominal">


                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" name="nominal"
                                            value="{{ old('nominal') }}" placeholder="Nominal zakat yang dibayar"
                                            aria-label="Amount (to the nearest rupiah)" autocomplete="off"
                                            id="nominalInput">
                                        <input type="hidden" id="zakatAmount">
                                        @error('nominal')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-5 col-12 mb-3">
                                    <div class="card p-4">
                                        <p class=" color-palette-1 fw-bold">Note :</p>
                                        <ul>
                                            <li>Perhitungan zakat diupdate otomatis berdasarkan update harga emas</li>
                                            <li>Harga emas per gram saat ini (www.harga-emas.org) : <span
                                                    class="color-palette-1 fw-bold"> Rp1.060.000
                                                </span>
                                            </li>
                                            <li>Nishab 85 gram <span class="color-palette-1 fw-bold" id="zakatNote">
                                                </span>
                                            </li>
                                        </ul>

                                        <!-- Add the span elements with conditional display -->
                                        <span class="badge-wajib" id="zakatMessageWajib" style="display: none">Anda
                                            diwajibkan membayar
                                            zakat</span>
                                        <span class="badge-tidakWajib" id="zakatMessageTidakWajib"
                                            style="display: none">Tidak diwajibkan
                                            membayar zakat</span>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <div class="mb-4">
                                <label for="namaDonaturInput" class="form-label">Nama Lengkap</label>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="hambaAllahCheckbox">
                                    <label class="form-check-label" for="hambaAllahCheckbox">Hamba Allah</label>
                                </div>
                                <input type="text" class="form-control" id="namaDonaturInput"
                                    value="{{ old('nama_donatur') }}" name="nama_donatur"
                                    aria-describedby="nama_donatur" autocomplete="off">
                                @error('nama_donatur')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" placeholder="Harap Menggunakan 62"
                                    id="phone" value="{{ old('phone') }}" autocomplete="off" name="phone"
                                    aria-describedby="phone">
                                @error('phone')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="id_mosque" class="form-label">Masjid</label>
                                <i class="fa fa-info-circle" id="my-icon"></i>
                                <select name="id_mosque" class="form-select">
                                    <option value="" {{ old('id_mosque') === '' ? 'selected' : '' }}>Silahkan
                                        pilih daftar masjid</option>
                                    @foreach ($mosques as $mosque)
                                        <option value="{{ $mosque->id }}"
                                            {{ old('id_mosque') == $mosque->id ? 'selected' : '' }}>
                                            {{ $mosque->name_mosque }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_mosque')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                                <small id="my-tooltip" hidden>
                                    Data anda akan masuk ke data masjid yang anda pilih
                                </small>
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

    <script>
        // Opsi Zakat Bulan dan pertahun
        const formPerhitungan = document.getElementById("formPerhitungan");

        function handleOptionChange(option) {
            const zakatNote = document.getElementById("zakatNote");
            let nishabNote = "";

            if (option === "bulan") {
                nishabNote = "per bulan : Rp. 7.508.333";
            } else if (option === "tahun") {
                nishabNote = "per tahun : Rp. 90.100.000";
            }

            zakatNote.textContent = nishabNote;
            formPerhitungan.querySelectorAll("input").forEach(input => {
                input.disabled = false;
            });

            // Reset zakat messages
            const zakatMessageWajib = document.getElementById("zakatMessageWajib");
            const zakatMessageTidakWajib = document.getElementById("zakatMessageTidakWajib");
            const totalHartaInput = document.getElementById("totalHarta");
            const totalBonusInput = document.getElementById("bonus");
            const totalHutangInput = document.getElementById("totalHutang");

            zakatMessageWajib.style.display = "none";
            zakatMessageTidakWajib.style.display = "none";

            totalHartaInput.value = '';
            totalBonusInput.value = '';
            totalHutangInput.value = '';
            zakatAmountInput.value = '';
            nominalInput.value = '';
        }

        // Disable the form initially
        formPerhitungan.querySelectorAll("input").forEach(input => {
            input.disabled = true;
        });

        // Function to format number as rupiah
        function formatRupiah(angka) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                rupiah = split[0] || 0;

            return rupiah;
        }

        // Input elements
        const totalHartaInput = document.getElementById("totalHarta");
        const totalBonusInput = document.getElementById("bonus");
        const totalHutangInput = document.getElementById("totalHutang");
        const zakatAmountInput = document.getElementById("zakatAmount");
        const nominalInput = document.getElementById("nominalInput");

        // Add the event listeners to the input fields
        totalHartaInput.addEventListener("input", function() {
            this.value = formatRupiah(this.value, 'Rp. ');
            updateZakatAmount();
        });

        totalBonusInput.addEventListener("input", function() {
            this.value = formatRupiah(this.value, 'Rp. ');
            updateZakatAmount();
        });

        totalHutangInput.addEventListener("input", function() {
            this.value = formatRupiah(this.value, 'Rp. ');
            updateZakatAmount();
        });

        function removeNonNumeric(str) {
            return str.replace(/\D/g, '');
        }

        function updateZakatAmount() {
            const totalHarta = parseFloat(removeNonNumeric(totalHartaInput.value)) || 0;
            const totalBonus = parseFloat(removeNonNumeric(totalBonusInput.value)) || 0;
            const totalHutang = parseFloat(removeNonNumeric(totalHutangInput.value)) || 0;
            const zakatFormula = (totalHarta + totalBonus - totalHutang) * 0.025;

            if (!isNaN(zakatFormula) && zakatFormula >= 0) {
                zakatAmountInput.value = Math.floor(zakatFormula);
                nominalInput.value = Math.floor(zakatFormula);

                // Check if the selected option is 'bulan' and conditions met
                const selectedOption = document.querySelector('input[name="inlineRadioOptions"]:checked');
                if (selectedOption) {
                    if (selectedOption.value === 'option1' && totalHarta + totalBonus >= 7508333) {
                        zakatMessageWajib.style.display = "block";
                        zakatMessageTidakWajib.style.display = "none";
                    } else if (selectedOption.value === 'option2' && totalHarta + totalBonus >= 90100000) {
                        zakatMessageWajib.style.display = "block";
                        zakatMessageTidakWajib.style.display = "none";
                    } else {
                        zakatMessageWajib.style.display = "none";
                        zakatMessageTidakWajib.style.display = "block";
                    }
                }
            } else {
                zakatAmountInput.value = '';
                nominalInput.value = '';
                zakatMessageWajib.style.display = "none";
                zakatMessageTidakWajib.style.display = "block";
            }
        }


        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>


</body>

</html>
