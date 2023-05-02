@extends('layouts.base')

@section('title', 'Edit Masjid')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('mosque') }}"
                style="color: unset !important"> Data Masjid </a>/</span> Edit Data</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data</h5>
            <small class="text-muted float-end">ZIS</small>
        </div>



        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('mosque.update', $mosque->id) }}">
                @method('PUT')
                @csrf
                <!-- input -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3">
                        <label for="name_mosque" class="form-label">Nama Masjid</label>
                        <input type="text" class="form-control" id="name_mosque" value="{{ $mosque->name_mosque }}"
                            name="name_mosque" aria-describedby="name_mosque">
                    </div>
                </div>

                <!-- input -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3">
                        <label for="address_mosque" class="form-label">Alamat Masjid</label>
                        <textarea class="form-control" id="address_mosque" name="address_mosque" rows="6">{{ $mosque->address_mosque }}</textarea>
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
