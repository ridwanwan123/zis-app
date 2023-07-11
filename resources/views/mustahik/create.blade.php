@extends('layouts.base')

@section('title', 'Tambah Mustahik')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="" style="color: unset !important"> Data
                Mustahik </a>/</span> Tambah Data</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data</h5>
            <small class="text-muted float-end">ZIS</small>
        </div>



        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('mustahik.store') }}">
                @csrf
                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="nama_mustahik" class="form-label">Nama Mustahik</label>
                        <input type="text" class="form-control" id="nama_mustahik" value="{{ old('nama_mustahik') }}"
                            name="nama_mustahik" aria-describedby="nama_mustahik" autocomplete="off">
                    </div>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki"
                                value="Laki-laki">
                            <label class="form-check-label" for="jenis_kelamin_laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan"
                                value="Perempuan">
                            <label class="form-check-label" for="jenis_kelamin_perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>


                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" placeholder="Harap Menggunakan 62" id="phone"
                            value="{{ old('phone') }}" name="phone" aria-describedby="phone">
                    </div>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" id="" cols="20" rows="5"></textarea>
                    </div>
                </div>


                <!-- BUTTON  -->
                <div class="d-flex justify-content-md-end mt-3">
                    <button type="submit" class="mt-1 btn btn-primary d-grid p-3 m-3">
                        <span class="font-semibold text-white text-base">Tambah Data</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

    </div>

@endsection
