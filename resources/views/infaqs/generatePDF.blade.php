<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- <title>{{ $title }}</title> --}}
</head>

<body>
    <div class="container-fluid">
        <div class="container-xxl mt-5">
            {{-- <div class="row">
                <div class="col">
                    <img src="{{ asset('admin/assets/img/avatars/A1.png') }}" alt="Logo-APES" class="" srcset=""> 
                    <h3>Result Laporan Pelecehan Seksual</h3>
                </div>
            </div> --}}
            <h3 style=”text-align:justify;” class="text-center">
                <img src="https://res.cloudinary.com/dbvrqaynl/image/upload/v1682352614/Online-shop/mosquee_ybrkz8.png"
                    alt="Logo-ZIS" class="me-4" width="60px" srcset="" />
                Result Laporan Infaq
            </h3><br>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jumlah Infaq</th>
                            <th>Status</th>
                            <th>Masjid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp

                        @foreach ($infaq as $item)
                            @if (auth()->user()->id_mosque)
                                @if ($item->user->id_mosque == auth()->user()->id_mosque)
                                    <tr>
                                        <td>
                                            <i class="fab fa-angular fa-lg "></i> <strong>{{ $i++ }}</strong>
                                        </td>
                                        <td>
                                            <i class="fab fa-angular fa-lg "></i>
                                            <strong>{{ $item->user->name }}</strong>
                                        </td>
                                        <td>
                                            <i class="fab fa-angular fa-lg "></i>
                                            <strong>{{ $item->jumlahInfaq }}</strong>
                                        </td>
                                        <td>
                                            <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->status }}</strong>
                                        </td>
                                        <td>
                                            <i class="fab fa-angular fa-lg "></i>
                                            <strong>{{ $item->user->mosque->name_mosque }}</strong>
                                        </td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i> <strong>{{ $i++ }}</strong>
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->user->name }}</strong>
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->jumlahInfaq }}</strong>
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->status }}</strong>
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>
                                        <strong>{{ $item->user->mosque->name_mosque }}</strong>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>






        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
