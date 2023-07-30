@extends('layouts.base')

@section('title', 'Input Penyaluran Dana')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="" style="color: unset !important"> Data
                Penyaluran Dana </a>/</span> Tambah Data</h4>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Dana ZIS Belum Disalurkan</h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Zakat</th>
                                <td class="text-end">Rp. {{ number_format($totalZakatBelumDisalurkan) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Infaq</th>
                                <td class="text-end">Rp. {{ number_format($totalInfaqBelumDisalurkan) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Sedekah</th>
                                <td class="text-end">Rp. {{ number_format($totalSedekahBelumDisalurkan) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Mustahik Masjid <i>{{ $mustahik->mosque->name_mosque }}</i></h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body ">
                    <div class="mb-2 row">
                        <label for="" class="col-md-4 col-form-label">Nama Mustahik</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->nama_mustahik }}" readonly>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="" class="col-md-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->jenis_kelamin }}" readonly>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="" class="col-md-4 col-form-label">Nomor Telepon</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->phone }}" readonly>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="" class="col-md-4 col-form-label">Alamat</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $mustahik->address }}" readonly>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Dana yang ingin disalurkan ke {{ $mustahik->nama_mustahik }}</h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('penyaluranDana.store') }}">
                        @csrf

                        <input type="hidden" name="id_mustahik" value="{{ $mustahik->id }}">

                        <div class="col-lg-12">
                            <div class="col mb-3">
                                <label for="jenis_dana" class="form-label">Jenis Dana</label>
                                <select name="jenis_dana" class="form-select" id="select-condition">
                                    <option value="" selected=""></option>
                                    <option value="zakat">Zakat</option>
                                    <option value="infaq">Infaq</option>
                                    <option value="sedekah">Sedekah</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-3">
                                <label for="tanggal_penyaluran">Tanggal Penyaluran</label>
                                <input type="date" name="tanggal_penyaluran" id="tanggal_penyaluran" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-3">
                                <label for="jumlah_penyaluran">Jumlah Penyaluran</label>
                                <input type="number" name="jumlah_penyaluran" id="jumlah_penyaluran" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="mt-1 btn btn-primary d-grid p-3 m-3">
                                <span class="font-semibold text-white text-base">Simpan Data</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
