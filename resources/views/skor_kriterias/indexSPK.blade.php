@extends('layouts.base')

@section('title', 'Hasil Sistem Pendukung Keputusan')


@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Sistem Pendukung Keputusan /</span> Hasil Keseluruhan
    </h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Hasil Keseluruhan</h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped mb-4">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Mustahik</th>
                        <th>Nilai Rumah</th>
                        <th>Nilai Harta</th>
                        <th>Nilai Keluarga</th>
                        <th>Hasil Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skorKriteria as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mustahik->nama_mustahik }}</td>
                            <td>{{ $item->NR }}</td>
                            <td>{{ $item->NH }}</td>
                            <td>{{ $item->NK }}</td>
                            <td>{{ $item->HA }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
