@extends('layouts.base')

@section('title', 'Zakat')


@section('content')
    <div class="float-end mt-4">
        {{-- <a href="#" class="btn btn-primary "><i class='bx bxs-report bx-flashing bx-flip-horizontal' ></i>   Download Laporan</a>  --}}
        <a href="" class="btn btn-primary btn-add-now"><i class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data ZIS /</span> Zakat</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Zakat</h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>No Zakat</th>
                        <th>Jenis Zakat</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Tanggal Pembayaraan</th>
                        <th>Total Penghasilan</th>
                        <th>Jumlah Zakat</th>
                        <th>Status</th>
                        <th><i class='bx bx-cog'></i></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>ZKT-0211</td>
                        <td>Zakat Maal</td>
                        <td>Ridwan </td>
                        <td>Aren Jaya</td>
                        <td>081381752590</td>
                        <td>2023-01-30</td>
                        <td>Rp. 4.101.304</td>
                        <td>Rp. 101.304</td>
                        <td> ?</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


@endsection
