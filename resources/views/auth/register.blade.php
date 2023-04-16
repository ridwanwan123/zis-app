<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZIS | Register</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/mosquee.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center -">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/img/favicon/mosquee.png') }}" alt="Logo-ZIS"
                                        height="40px">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder"> ZIS</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Daftar Akun ZIS</h4>
                        <p class="mb-4">Website Pengelolaan Zakat, Infaq dan Sedekah</p>

                        <form class="mb-3" action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control"
                                    id="name"name="name"placeholder="Masukan Name" autofocus />
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Masukan Email" />
                                @error('email')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" name="password" for="password">Password</label>

                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="roles" class="form-label">Roles</label> <i class="fa fa-info-circle"
                                    id="my-icon"></i>
                                <input type="text" value="Muzaki" disabled class="form-control">

                                <select name="id_role" class="form-select" hidden>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if ($role->name == 'Muzaki') selected @endif>{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <small id="my-tooltip" hidden>
                                    jika anda seorang pengelola masjid anda bisa menghubungi admin zis untuk dibuatkan
                                    akun pengelola masjid
                                </small>
                            </div>

                            <div class="mb-3">
                                <label for="mosque" class="form-label">Masjid</label> <i class="fa fa-info-circle"
                                    id="my-icon2"></i>
                                <select name="id_mosque" class="form-select">
                                    <option value="" selected>Silahkan pilih daftar masjid</option>
                                    @foreach ($mosques as $mosque)
                                        <option value="{{ $mosque->id }}"> {{ $mosque->name_mosque }} </option>
                                    @endforeach
                                </select>

                                <small id="my-tooltip2" hidden>
                                    Daftar Masjid hanya masjid yang sudah didaftarkan oleh pihak masjid
                                </small>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                            </div>

                        </form>

                        <p class="text-center">
                            <span>Sudah punya akun?</span>
                            <a href="{{ route('login') }}">
                                <span>Masuk</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/admin/vendor/js/bootstrap.js') }}"></script>
    <!-- Popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Tooltip.js -->
    <script src="https://unpkg.com/tippy.js@6.3.3/dist/tippy-bundle.umd.min.js"></script>

    <script>
        tippy('#my-icon', {
            content: document.querySelector('#my-tooltip').innerHTML,
            placement: 'top',
            theme: 'light',
            arrow: true,
        });

        tippy('#my-icon2', {
            content: document.querySelector('#my-tooltip2').innerHTML,
            placement: 'top',
        });
    </script>

</body>

</html>
