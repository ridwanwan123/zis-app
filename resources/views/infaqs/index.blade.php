@extends('layouts.base')

@section('title', 'Infaq')


@section('content')
    <div class="float-end mt-4">
        <a href="{{ route('infaq.generatePDF') }}" target="_blank" class="btn btn-warning "><i
                class='bx bxs-report bx-flashing bx-flip-horizontal'></i> Download
            Laporan</a>
        <a href="{{ route('infaq.create') }}" class="btn btn-primary btn-add-now"><i
                class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Infaq /</span> Infaq</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Infaq = </h5>
        <p>Total infaq yang terkumpul: Rp {{ number_format($totalInfaq) }}</p>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped mb-4">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Donatur</th>
                        <th>Nomor Telepon</th>
                        <th>Jumlah Infaq</th>
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
                        <p>Total infaq yang terkumpul di masjid {{ auth()->user()->mosque->name_mosque }}: Rp
                            {{ number_format($infaq->where('id_mosque', auth()->user()->mosque->id)->where('status', 'Bayar')->sum('nominalInfaq')) }}
                        </p>
                    @else
                        <p>Total infaq yang terkumpul: Rp
                            {{ number_format($infaq->where('status', 'Bayar')->sum('nominalInfaq')) }}</p>
                    @endif

                    @if (auth()->user()->mosque)
                        @foreach ($infaq as $item)
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
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->nominalInfaq }}
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
                                                <a class="dropdown-item" href="{{ route('infaq.edit', $item->id) }}"
                                                    style="color:#435971"><i class="bx bx-edit-alt me-1"></i> Update</a>
                                                <form method="post" action="{{ route('infaq.delete', $item->id) }}">

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
                        @foreach ($infaq as $item)
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
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->nominalInfaq }}
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
                                            <a class="dropdown-item" href="{{ route('infaq.edit', $item->id) }}"
                                                style="color:#435971"><i class="bx bx-edit-alt me-1"></i> Update</a>
                                            <form method="post" action="{{ route('infaq.delete', $item->id) }}">

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
        <div class="container d-flex justify-content-end">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item {{ $infaq->currentPage() == 1 ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $infaq->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                    <li class="page-item {{ $infaq->currentPage() == 1 ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $infaq->previousPageUrl() }}"><i
                                class="tf-icon bx bx-chevron-left"></i></a>
                    </li>
                    @for ($i = 1; $i <= $infaq->lastPage(); $i++)
                        <li class="page-item {{ $infaq->currentPage() == $i ? ' active' : '' }}">
                            <a class="page-link" href="{{ $infaq->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $infaq->currentPage() == $infaq->lastPage() ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $infaq->nextPageUrl() }}"><i
                                class="tf-icon bx bx-chevron-right"></i></a>
                    </li>
                    <li class="page-item {{ $infaq->currentPage() == $infaq->lastPage() ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $infaq->url($infaq->lastPage()) }}"><i
                                class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@endsection
