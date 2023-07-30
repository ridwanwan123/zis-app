@extends('layouts.base')

@section('title', 'Tambah Zakat')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('zakat') }}"
                style="color: unset !important"> Data Zakat </a>/</span> Tambah Data</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data</h5>
            <small class="text-muted float-end">ZIS</small>
        </div>



        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('zakat.store') }}">
                @csrf
                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="jenis_zakat" class="form-label">Jenis Zakat</label>
                        <select name="jenis_zakat" class="form-select" id="select-condition">
                            <option value="" {{ old('jenis_zakat') === '' ? 'selected' : '' }}>Silahkan
                                pilih jenis zakat</option>
                            <option value="Fitrah" {{ old('jenis_zakat') === 'Fitrah' ? 'selected' : '' }}>
                                Zakat Fitrah</option>
                            <option value="Maal" {{ old('jenis_zakat') === 'Maal' ? 'selected' : '' }}>Zakat
                                Ma'al</option>
                        </select>
                        @error('jenis_zakat')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="nama_donatur" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaDonaturInput" value="{{ old('nama_donatur') }}"
                            name="nama_donatur" aria-describedby="nama_donatur" autocomplete="off">
                        @error('nama_donatur')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" placeholder="Harap Menggunakan 62" id="phone"
                            value="{{ old('phone') }}" autocomplete="off" name="phone" aria-describedby="phone">
                        @error('phone')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <label for="nominal" class="form-label">Jumlah Zakat</label>
                    @error('nominal')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="g-3 mb-3 col-lg-12 input-group input-group-merge">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" placeholder="40000"
                        aria-label="Amount (to the nearest ruppiah)" id="nominal" value="{{ old('nominal') }}"
                        name="nominal" aria-describedby="nominal" autocomplete="off">

                </div>

                <div class="col mb-3 ">
                    @if (auth()->user()->id_mosque && ($mosque = \App\Models\Mosque::find(auth()->user()->id_mosque)))
                        <label for="mosque" class="form-label">Masjid</label>
                        <select name="id_mosque" id="mosque" class="form-control">
                            <option value="{{ $mosque->id }}">{{ $mosque->name_mosque }}</option>
                        </select>
                    @endif
                </div>

                <!-- input -->
                <div class="col-lg-12">
                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="" selected> </option>
                            <option value="Bayar"> Bayar </option>
                            <option value="Belum Bayar"> Belum Bayar </option>
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
