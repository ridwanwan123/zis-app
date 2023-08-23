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

    <!-- TABLE ZAKAT -->
    <div class="card mb-5">
        <h5 class="card-header">Penyaluran Dana (Zakat)</h5>
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
                    @forelse ($zakatDana as $penyaluran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penyaluran->nama_mustahik }}</td>
                            <td>{{ $penyaluran->HA }}</td>
                            <td>{{ $penyaluran->jenis_dana }}</td>
                            <td>{{ $penyaluran->tanggal_penyaluran }}</td>
                            <td>Rp. {{ number_format($penyaluran->jumlah_penyaluran) }}</td>
                            <td>{{ $penyaluran->name_mosque }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center;">Data penyaluran kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-5">
        <h5 class="card-header">
            <span class="combined-header">Penyaluran Infaq</span>
            <small class="text-muted float-end">ZIS</small>
        </h5>

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
                    @forelse ($infaqDana as $penyaluran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penyaluran->nama_mustahik }}</td>
                            <td>{{ $penyaluran->HA }}</td>
                            <td>{{ $penyaluran->jenis_dana }}</td>
                            <td>{{ $penyaluran->tanggal_penyaluran }}</td>
                            <td>Rp. {{ number_format($penyaluran->jumlah_penyaluran) }}</td>
                            <td>{{ $penyaluran->name_mosque }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center;">Data penyaluran kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    {{-- TABLE SEDEKAH  --}}
    <div class="card mb-5">
        <h5 class="card-header">Penyaluran Dana (Sedekah)</h5>
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
                    @forelse ($sedekahDana as $penyaluran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penyaluran->nama_mustahik }}</td>
                            <td>{{ $penyaluran->HA }}</td>
                            <td>{{ $penyaluran->jenis_dana }}</td>
                            <td>{{ $penyaluran->tanggal_penyaluran }}</td>
                            <td>Rp. {{ number_format($penyaluran->jumlah_penyaluran) }}</td>
                            <td>{{ $penyaluran->name_mosque }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center;">Data penyaluran kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
