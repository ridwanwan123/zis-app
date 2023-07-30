@extends('layouts.base')

@section('title', 'Mustahik')


@section('content')
    <div class="float-end mt-4">
        <a href="{{ route('mustahik.create') }}" class="btn btn-primary btn-add-now"><i
                class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Mustahik /</span> Mustahik</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Mustahik </h5>

        <div class="table-responsive text-nowrap p-4">
            <table class="table table-striped mb-4" id="myTable">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Mustahik</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th><i class='bx bx-cog'></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mustahik as $item)
                        @if ($item->mosque->id == auth()->user()->mosque->id)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_mustahik }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('skor_kriteria.show', $item->id) }}"
                                                style="color:#435971"><i class="bx bx-detail me-1"></i> Show</a>
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
