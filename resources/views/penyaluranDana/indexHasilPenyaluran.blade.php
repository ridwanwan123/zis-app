@extends('layouts.base')

@section('title', 'Hasil Sistem Pendukung Keputusan')


@section('content')
    <div class="float-end mt-4">
        <a href="{{ route('penyaluranDana.generatePDF') }}" target="_blank" class="btn btn-warning "><i
                class='bx bxs-report bx-flashing bx-flip-horizontal'></i> Download
            Laporan</a>
    </div>
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
                        <th>Masjid</th>
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
                                <td>{{ $item->mosque->name_mosque }}</td>
                            @else
                                <td>Belum Disalurkan</td>
                                <td>Belum Disalurkan</td>
                                <td>Belum Disalurkan</td>
                                <td>{{ $item->mosque->name_mosque }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
