@extends('layouts.base')

@section('title', 'Zakat')


@section('content')
    <div class="float-end mt-4">
        <a href="{{ route('zakat.generatePDF') }}" target="_blank" class="btn btn-warning "><i
                class='bx bxs-report bx-flashing bx-flip-horizontal'></i> Download
            Laporan</a>
        <a href="{{ route('zakat.create') }}" class="btn btn-primary btn-add-now"><i
                class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data ZIS /</span> Zakat</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Zakat</h5>

        <div class="table-responsive text-nowrap p-4">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Jenis Zakat</th>
                        <th>Nama Lengkap</th>
                        <th>No Telepon</th>
                        <th>Jumlah Zakat</th>
                        <th>Masjid</th>
                        <th>Status</th>
                        <th><i class='bx bx-cog'></i></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp



                    @foreach ($zakat as $item)
                        @if ($item->mosque->id == auth()->user()->mosque->id)
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i> {{ $i++ }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>Zakat {{ $item->jenis_zakat }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->nama_donatur }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->phone }}
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg "></i>{{ $item->nominal }}
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
                                            <a class="dropdown-item" href="{{ route('zakat.edit', $item->id) }}"
                                                style="color:#435971"><i class="bx bx-edit-alt me-1"></i> Update</a>
                                            <form id="delete-form-{{ $item->id }}" method="post"
                                                action="{{ route('zakat.delete', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="event.preventDefault(); confirmDelete('{{ $item->id }}')"
                                                    style="border: none; background-color:white; color:#435971 swal2-container">
                                                    <i class="bx bx-trash me-1 m-3"></i> Delete
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
