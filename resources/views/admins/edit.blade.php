@extends('layouts.base')

@section('title', 'Edit Akun Pengelola ZIS')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('adminZIS') }}"
                style="color: unset !important"> Data Pengelola ZIS</a>/</span> Edit Data</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data</h5>
            <small class="text-muted float-end">ZIS</small>
        </div>



        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('adminZIS.update', $adminZIS->id) }}">
                @method('PUT')
                @csrf
                <!-- input -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" value="{{ $adminZIS->name }}"
                            name="name" aria-describedby="name">
                    </div>
                </div>

                <!-- input -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" value="{{ $adminZIS->email }}"
                            name="email" aria-describedby="email">
                    </div>
                </div>

                <!-- input -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" value="{{ $adminZIS->password }}"
                            name="password" aria-describedby="password">
                    </div>
                </div>

                <!-- Input  -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3 ">
                        <label for="mosque" class="form-label">Masjid</label>
                        <select name="id_mosque" class="form-select">
                            <option value="{{ $adminZIS->id_mosque }}" selected>{{ $adminZIS->mosque->name_mosque }}
                            </option>
                            @foreach ($mosques as $mosque)
                                @if ($adminZIS->id_mosque != $mosque->id)
                                    <option value="{{ $mosque->id }}">{{ $mosque->name_mosque }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-3 ">
                        <label for="roles" class="form-label">Role</label>
                        <select name="id_role" class="form-select">
                            <option value="{{ $adminZIS->id_role }}" selected>{{ $adminZIS->role->name }}
                            </option>
                            @foreach ($roles as $role)
                                @if ($adminZIS->id_role != $role->id)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- input -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                            value="{{ $adminZIS->no_telepon }}" aria-describedby="no_telepon">
                    </div>
                </div>

                <!-- input -->
                <div class="row g-3 col-lg-12">
                    <div class="col mb-3">
                        <label for="address" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="address" name="address" rows="6">{{ $adminZIS->address }}</textarea>
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
