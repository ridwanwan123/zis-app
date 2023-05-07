@extends('layouts.base')

@section('title', 'Masjid')


@section('content')
    <div class="float-end mt-4">
        {{-- <a href="{{ route('masjid.generatePDF') }}" target="_blank" class="btn btn-warning "><i
                class='bx bxs-report bx-flashing bx-flip-horizontal'></i> Download
            Laporan</a> --}}
        <a href="{{ route('mosque.create') }}" class="btn btn-primary btn-add-now"><i
                class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Masjid /</span> Masjid</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Masjid</h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Masjid</th>
                        <th>Alamat Masjid</th>
                        <th><i class='bx bx-cog'></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mosque as $item)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> {{ $loop->iteration }}
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> {{ $item->name_mosque }}
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> {{ $item->address_mosque }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('mosque.edit', $item->id) }}"
                                            style="color:#435971"><i class="bx bx-edit-alt me-1"></i> Update</a>
                                        <form method="post" action="{{ route('mosque.delete', $item->id) }}" hidden>

                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                onclick="event.preventDefault();
                                                        confirmDelete()"
                                                style="border: none; background-color:white; color:#435971">
                                                <i class="bx bx-trash me-1 m-3"></i> Delete</a>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
