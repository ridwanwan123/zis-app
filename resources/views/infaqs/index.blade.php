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
                                        <i class="fab fa-angular fa-lg "></i> {{ $i++ }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->user->name }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->jumlahInfaq }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>{{ $item->status }}
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg "></i>
                                        {{ $item->user->mosque->name_mosque }}
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
                        @else
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i> {{ $i++ }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i> {{ $item->user->name }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i> {{ $item->jumlahInfaq }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i> {{ $item->status }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>
                                    {{ $item->user->mosque->name_mosque }}
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

                </tbody>
            </table>
        </div>
    </div>


@endsection
