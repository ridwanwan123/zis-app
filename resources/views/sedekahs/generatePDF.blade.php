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

<h3 style=”text-align:justify;” class="text-center">
    Result Laporan Sedekah
</h3><br>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Donatur</th>
                <th>Nomor Telepon</th>
                <th>Jumlah Sedekah</th>
                <th>Masjid</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($sedekah as $item)
                @if ($item->mosque->id == auth()->user()->mosque->id)
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg "></i> {{ $i++ }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>{{ $item->nama_donatur }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>{{ $item->phone }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>Rp. {{ number_format($item->nominal) }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>{{ $item->mosque->name_mosque }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>{{ $item->status }}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
