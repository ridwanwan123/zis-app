@extends('layouts.base')

@section('title', 'Infaq')


@section('content')
    <div class="float-end mt-4">
        <a href="#" class="btn btn-warning "><i class='bx bxs-report bx-flashing bx-flip-horizontal'></i> Download
            Laporan</a>
        <a href="" class="btn btn-primary btn-add-now"><i class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Infaq /</span> Infaq</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Infaq</h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Jumlah Infaq</th>
                        <th>Status</th>
                        <th>Masjid</th>
                        <th><i class='bx bx-cog'></i></th>
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


@endsection
