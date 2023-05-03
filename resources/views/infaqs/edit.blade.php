@extends('layouts.base')

@section('title', 'Edit Infaq')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('infaq') }}"
                style="color: unset !important"> Data Infaq </a>/</span> Update Data</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Update Data</h5>
            <small class="text-muted float-end">ZIS</small>
        </div>



        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('infaq.update', $infaq->id) }}">
                @method('PUT')
                @csrf
                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="nama_donatur" class="form-label">Nama Donatur</label>
                        <input type="text" class="form-control" id="nama_donatur" value="{{ $infaq->nama_donatur }}"
                            name="nama_donatur" aria-describedby="nama_donatur" autocomplete="off">
                    </div>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" placeholder="Harap Menggunakan 62" id="phone"
                            value="{{ $infaq->phone }}" name="phone" aria-describedby="phone">
                    </div>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <label for="nominalInfaq" class="form-label">Jumlah Infaq</label>
                </div>
                <div class="g-3 mb-3 col-lg-12 input-group input-group-merge">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" placeholder="40000"
                        aria-label="Amount (to the nearest ruppiah)" id="nominalInfaq" value="{{ $infaq->nominalInfaq }}"
                        name="nominalInfaq" aria-describedby="nominalInfaq" autocomplete="off">
                </div>

                <div class="col mb-3 ">
                    <label for="mosque" class="form-label">Masjid</label>
                    <select name="id_mosque" class="form-select">
                        <option value="{{ $infaq->id_mosque }}" selected>{{ $infaq->mosque->name_mosque }}
                        </option>
                        @foreach ($mosques as $mosque)
                            @if ($infaq->id_mosque != $mosque->id)
                                <option value="{{ $mosque->id }}">{{ $mosque->name_mosque }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="{{ $infaq->status }}" selected> {{ $infaq->status }} </option>
                            <option value="Bayar"> Bayar </option>
                            <option value="Belum Bayar"> Belum Bayar </option>
                        </select>
                    </div>
                </div>

                <!-- BUTTON  -->
                <div class="d-flex justify-content-md-end mt-3">
                    <button type="submit" class="mt-1 btn btn-primary d-grid p-3 m-3">
                        <span class="font-semibold text-white text-base">Update Data</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

    </div>

@endsection
