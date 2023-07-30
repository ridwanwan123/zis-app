<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        thead th {
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            padding: 8px;
        }

        tbody td {
            font-size: 12px;
            font-weight: medium;
            text-align: left;
            padding: 2px;
        }
    </style>
</head>

<body>
    <h3 style=”text-align:justify;” class="text-center">
        Result Laporan Penyaluran Dana
    </h3><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mustahik</th>
                    <th>Hasil Akhir</th>
                    <th>Jenis Dana</th>
                    <th>Tanggal Penyaluran</th>
                    <th>Jumlah Penyaluran</th>
                    <th>Masjid</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
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
                            <td>Rp. {{ number_format($penyaluran->jumlah_penyaluran) }}</td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
