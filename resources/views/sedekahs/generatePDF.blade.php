<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<h3 style=”text-align:justify;” class="text-center">
    <img src="https://res.cloudinary.com/dbvrqaynl/image/upload/v1682352614/Online-shop/mosquee_ybrkz8.png" alt="Logo-ZIS"
        class="me-4" width="60px" srcset="" />
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

            @if (auth()->user()->mosque)
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
                                <i class="fab fa-angular fa-lg "></i>{{ $item->nominal }}
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
            @else
                @foreach ($sedekah as $item)
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
                            <i class="fab fa-angular fa-lg "></i>{{ $item->nominal }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>{{ $item->mosque->name_mosque }}
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>{{ $item->status }}
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
