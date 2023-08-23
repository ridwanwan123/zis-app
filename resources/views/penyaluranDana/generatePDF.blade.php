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


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="7">{{ $jenisDana }}</th>
                </tr>
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
                @forelse ($penyaluranDana as $penyaluran)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
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
        <pagebreak>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
