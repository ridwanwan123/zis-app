@extends('layouts.base')

@section('title', 'Ganti Password')


@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Change Password</h5>
            <small class="text-muted float-end">ZIS</small>
        </div>

        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('login.changePasswordd') }}">
                @csrf

                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" name="current_password" for="current_password">Password Lama</label>

                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="current_password" class="form-control" name="current_password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="current_password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('current_password')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" name="new_password" for="new_password">Password Baru</label>

                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="new_password" class="form-control" name="new_password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="new_password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('new_password')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>


                <!-- BUTTON  -->
                <div class="d-flex justify-content-md-end mt-3">
                    <button type="submit" class="mt-1 btn btn-primary d-grid p-3 m-3">
                        <span class="font-semibold text-white text-base">Ganti Password</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
