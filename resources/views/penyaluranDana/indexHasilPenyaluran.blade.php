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
                        <th>Jenis Dana</th>
                        <th>Tanggal Penyaluran</th>
                        <th>Jumlah Penyaluran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mustahik as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_mustahik }}</td>
                            @php
                                $skor = $skorKriteria->where('id_mustahik', $item->id)->first();
                            @endphp
                            @if ($skor)
                                <td>{{ $skor->HA }}</td>
                            @else
                                <td>Kosong</td>
                            @endif
                            @php
                                $penyaluran = $penyaluranDana->where('id_mustahik', $item->id)->first();
                            @endphp
                            @if ($penyaluran)
                                <td>{{ $penyaluran->jenis_dana }}</td>
                                <td>{{ $penyaluran->tanggal_penyaluran }}</td>
                                <td>{{ number_format($penyaluran->jumlah_penyaluran) }}</td>
                            @else
                                <td>Belum Disalurkan</td>
                                <td>Belum Disalurkan</td>
                                <td>Belum Disalurkan</td>
                            @endif
                            <td>Action</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
