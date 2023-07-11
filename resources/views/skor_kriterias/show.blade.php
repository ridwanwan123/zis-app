@extends('layouts.base')

@section('title', 'Detail Skor')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="" style="color: unset !important"> Data
                Skor Kriteria </a>/</span> Detail Data</h4>

    <!-- Tampilkan data Mustahik di luar loop foreach -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Mustahik</h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Nama Mustahik</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->nama_mustahik }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->jenis_kelamin }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Nomor Telepon</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->phone }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Alamat</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->address }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0"> <u>Kriteria</u> </h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Status Rumah</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $kriteria->A1 }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Kondisi Rumah</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $kriteria->A2 }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Pendapatan Keluarga</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $kriteria->A3 }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Kendaraan</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $kriteria->A4 }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Status Pernikahan</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $kriteria->A5 }}" readonly
                                style="cursor: default">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Anak</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $kriteria->A6 }}" readonly
                                style="cursor: default">
                        </div>
                    </div>

                </div>

            </div>
        </div> --}}

    </div>

    <div class="row">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Hasil Perhitungan </h5>
                <small class="text-muted float-end">ZIS</small>
            </div>
            <hr class="mt-n2 m-4">

            <div class="card-body mt-n4">
                <div class="table-responsive">
                    <table class="table table-striped mb-4">
                        <thead>
                            <tr class="text-nowrap">
                                <th>A-1</th>
                                <th>A-2</th>
                                <th>A-3</th>
                                <th>A-4</th>
                                <th>A-5</th>
                                <th>A-6</th>
                                <th>NR</th>
                                <th>NH</th>
                                <th>NK</th>
                                <th>HA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $kriteria->A1 }}</td>
                                <td>{{ $kriteria->A2 }}</td>
                                <td>{{ $kriteria->A3 }}</td>
                                <td>{{ $kriteria->A4 }}</td>
                                <td>{{ $kriteria->A5 }}</td>
                                <td>{{ $kriteria->A6 }}</td>
                                <td>{{ $skorKriteria->NR }}</td>
                                <td>{{ $skorKriteria->NH }}</td>
                                <td>{{ $skorKriteria->NK }}</td>
                                <td>{{ $skorKriteria->HA }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
