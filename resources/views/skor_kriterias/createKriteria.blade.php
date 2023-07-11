@extends('layouts.base')

@section('title', 'Input Skor')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="" style="color: unset !important"> Data
                Kriteria </a>/</span> Tambah Data</h4>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header mb-4 d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Data Mustahik</h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body ">
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
                    <h5 class="mb-0">Input Skor Kriteria {{ $mustahik->nama_mustahik }}</h5>
                    <small class="text-muted float-end">ZIS</small>
                </div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('kriteria.store') }}">
                        @csrf

                        <input type="hidden" name="id_mustahik" value="{{ $mustahik->id }}">

                        <div class="col-lg-12">
                            <div class="col mb-3">
                                <label for="A1" class="form-label">Status Rumah</label>
                                <select name="A1" class="form-select" id="select-condition">
                                    <option value="" selected=""></option>
                                    <option value="1">Milik Sendiri</option>
                                    <option value="2">Menumpang</option>
                                    <option value="3">Kontrak/Sewa</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="col mb-3">
                                <label for="A2" class="form-label">kondisi rumah</label>
                                <select name="A2" class="form-select" id="select-condition">
                                    <option value="" selected=""></option>
                                    <option value="1">75%</option>
                                    <option value="2">50%</option>
                                    <option value="3">25%</option>
                                </select>

                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="col mb-3">
                                <label for="A3" class="form-label">Pendapatan Keluarga</label>
                                <select name="A3" class="form-select" id="select-condition">
                                    <option value="" selected=""></option>
                                    <option value="1"> > 2 Juta </option>
                                    <option value="2"> 1 - 1.9 Juta</option>
                                    <option value="3">500 ribu - 1 juta</option>
                                    <option value="4">
                                        < 500 ribu</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="col mb-3">
                                <label for="A4" class="form-label">Kendaraan</label>
                                <select name="A4" class="form-select" id="select-condition">
                                    <option value="" selected=""></option>
                                    <option value="1">Motor</option>
                                    <option value="2">Sepeda</option>
                                    <option value="3">Tidak Punya</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="col mb-3">
                                <label for="A5" class="form-label">Status Pernikahan</label>
                                <select name="A5" class="form-select" id="select-condition">
                                    <option value="" selected=""></option>
                                    <option value="1">Lajang</option>
                                    <option value="2">Nikah</option>
                                    <option value="3">Duda</option>
                                    <option value="4">Janda</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="col mb-3">
                                <label for="A6" class="form-label">Anak</label>
                                <select name="A6" class="form-select" id="select-condition">
                                    <option value="" selected=""></option>
                                    <option value="1">Tidak Ada</option>
                                    <option value="2">1 - 2 Anak</option>
                                    <option value="3">3 - 4 Anak</option>
                                    <option value="4"> > 4 Anak</option>
                                </select>

                            </div>
                        </div>

                        {{-- @foreach ($kriteria as $kriteria)
                            <div class="mb-3">
                                <label for="" class="form-label">A- </label>
                                <input type="number" class="form-control" id="skor_kriteria_{{ $kriteria->id }}"
                                    value="" name="skor_kriterias[]"
                                    aria-describedby="skor_kriteria_{{ $kriteria->id }}" autocomplete="off">
                                <label for="skor_kriteria_{{ $kriteria->id }}" class="form-label">A-{{ $loop->iteration }}
                                    {{ $kriteria->nama_aspek }}</label>
                                <input type="number" class="form-control" id="skor_kriteria_{{ $kriteria->id }}"
                                    value="" name="skor_kriterias[]"
                                    aria-describedby="skor_kriteria_{{ $kriteria->id }}" autocomplete="off">
                            </div>
                        @endforeach --}}

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
