@extends('layouts.base')

@section('title', 'Input Skor')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="" style="color: unset !important"> Data
                Kriteria </a>/</span> Tambah Data</h4>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Mustahik</h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body ">
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Nama Masjid</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->id_mosque->name_mosque }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Nama Mustahik</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->nama_mustahik }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->jenis_kelamin }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Nomor Telepon</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->phone }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-md-4 col-form-label">Alamat</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->address }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Keterangan</h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body ">

                    <h1>Skor Kriterias</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Skor Mustahik</th>
                                <th>Kriteria</th>
                                <!-- Tambahkan kolom-kolom lain yang ingin ditampilkan -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skorKriteria as $skor)
                                <tr>
                                    <td>{{ $skor->skor_mustahik }}</td>
                                    <td>{{ $skor->nama_kriteria }}</td>
                                    <!-- Tambahkan kolom-kolom lain yang ingin ditampilkan -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
@endsection
