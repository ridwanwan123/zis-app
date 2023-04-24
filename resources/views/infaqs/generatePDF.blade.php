<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<h3 style=”text-align:justify;” class="text-center">
    <img src="https://res.cloudinary.com/dbvrqaynl/image/upload/v1682352614/Online-shop/mosquee_ybrkz8.png" alt="Logo-ZIS"
        class="me-4" width="60px" srcset="" />
    Result Laporan Infaq
</h3><br>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jumlah Infaq</th>
                <th>Status</th>
                <th>Masjid</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($infaq as $item)
                @if (auth()->user()->id_mosque)
                    @if ($item->user->id_mosque == auth()->user()->id_mosque)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> <strong>{{ $i++ }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i>
                                <strong>{{ $item->user->name }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i>
                                <strong>{{ $item->jumlahInfaq }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->status }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i>
                                <strong>{{ $item->user->mosque->name_mosque }}</strong>
                            </td>
                        </tr>
                    @endif
                @else
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg "></i> <strong>{{ $i++ }}</strong>
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->user->name }}</strong>
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->jumlahInfaq }}</strong>
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i> <strong>{{ $item->status }}</strong>
                        </td>
                        <td>
                            <i class="fab fa-angular fa-lg "></i>
                            <strong>{{ $item->user->mosque->name_mosque }}</strong>
                        </td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
