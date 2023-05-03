@extends('layouts.base')

@section('title', 'Sedekah')


@section('content')
    <div class="float-end mt-4">
        <a href="{{ route('sedekah.generatePDF') }}" target="_blank" class="btn btn-warning "><i
                class='bx bxs-report bx-flashing bx-flip-horizontal'></i> Download
            Laporan</a>
        <a href="{{ route('sedekah.create') }}" class="btn btn-primary btn-add-now"><i
                class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Sedekah /</span> Sedekah</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Sedekah </h5>
        <p>Total sedekah yang terkumpul: Rp {{ number_format($totalSedekah) }}</p>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Donatur</th>
                        <th>Nomor Telepon</th>
                        <th>Jumlah Sedekah</th>
                        <th>Masjid</th>
                        <th>Status</th>
                        <th><i class='bx bx-cog'></i></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @if (auth()->user()->mosque)
                        <p>Total sedekah yang terkumpul di masjid {{ auth()->user()->mosque->name_mosque }}: Rp
                            {{ number_format($sedekah->where('id_mosque', auth()->user()->mosque->id)->where('status', 'Bayar')->sum('nominalSedekah')) }}
                        </p>
                    @else
                        <p>Total sedekah yang terkumpul: Rp
                            {{ number_format($sedekah->where('status', 'Bayar')->sum('nominalSedekah')) }}</p>
                    @endif

                    @if (auth()->user()->mosque)
                        @foreach ($sedekah as $item)
                            @if ($item->mosque->id == auth()->user()->mosque->id)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i> {{ $i++ }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->nama_donatur }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->phone }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->nominalSedekah }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->mosque->name_mosque }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->status }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('sedekah.edit', $item->id) }}"
                                                    style="color:#435971"><i class="bx bx-edit-alt me-1"></i> Update</a>
                                                <form method="post" action="{{ route('sedekah.delete', $item->id) }}">

                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        style="border: none; background-color:white; color:#435971">
                                                        <i class="bx bx-trash me-1 m-3"></i> Delete</a>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        @foreach ($sedekah as $item)
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i> {{ $i++ }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->nama_donatur }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->phone }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->nominalSedekah }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->mosque->name_mosque }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->status }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('sedekah.edit', $item->id) }}"
                                                style="color:#435971"><i class="bx bx-edit-alt me-1"></i> Update</a>
                                            <form method="post" action="{{ route('sedekah.delete', $item->id) }}">

                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    style="border: none; background-color:white; color:#435971">
                                                    <i class="bx bx-trash me-1 m-3"></i> Delete</a>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif


                </tbody>
            </table>
        </div>
    </div>


@endsection
