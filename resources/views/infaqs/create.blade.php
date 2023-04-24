@extends('layouts.base')

@section('title', 'Tambah Infaq')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('infaq') }}"
                style="color: unset !important"> Data Infaq </a>/</span> Tambah Data</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data</h5>
            <small class="text-muted float-end">ZIS</small>
        </div>



        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('infaq.store') }}">
                @csrf
                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="id_user" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="id_user" value="{{ old('id_user') }}"
                            name="name" aria-describedby="name">
                    </div>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <label for="jumlahInfaq" class="form-label">Jumlah Infaq</label>
                </div>
                <div class="g-3 mb-3 col-lg-12 input-group input-group-merge">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" placeholder="40000"
                        aria-label="Amount (to the nearest ruppiah)" id="jumlahInfaq" value="{{ old('jumlahInfaq') }}"
                        name="jumlahInfaq" aria-describedby="jumlahInfaq">
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="{{ old('status') }}" selected> </option>
                            <option value="paid"> Bayar </option>
                            <option value="unpaid"> Belum Bayar </option>
                        </select>
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
