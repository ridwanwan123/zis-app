@extends('layouts.base')

@section('title', 'Hasil Sistem Pendukung Keputusan')


@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Sistem Pendukung Keputusan /</span> Penyaluran Dana
    </h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Penyaluran Dana</h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped mb-4">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Mustahik</th>
                        <th>Hasil Akhir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skorKriteria as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mustahik->nama_mustahik }}</td>
                            <td>{{ $item->HA }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('penyaluranDana.create', $item->id) }}"
                                    style="color:#e5e5e5">
                                    <i class="bx bx-detail me-1"></i> Show
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
