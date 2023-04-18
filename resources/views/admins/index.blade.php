@extends('layouts.base')

@section('title', 'Pengelola')


@section('content')
    <div class="float-end mt-4">
        {{-- <a href="#" class="btn btn-primary "><i class='bx bxs-report bx-flashing bx-flip-horizontal' ></i>   Download Laporan</a>  --}}
        <a href="" class="btn btn-primary btn-add-now"><i class='bx bxs-add-to-queue bx-flashing'></i> Tambah Data</a>
    </div>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Pengelola ZIS /</span> Pengelola ZIS</h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Data Zakat</h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mosque</th>
                        <th>Role</th>
                        <th><i class='bx bx-cog'></i></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($adminZIS->slice(1) as $admin)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> <strong>
                                    {{ $loop->iteration }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> <strong> {{ $admin->name }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> <strong> {{ $admin->email }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg "></i> <strong>
                                    {{ $admin->mosque ? $admin->mosque->name_mosque : 'Tidak Terikat' }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-label-primary me-1"> {{ $admin->role->name }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" {{-- href="{{ route('admin.pelaporan-seksual-edit', $admin->id) }}" --}} style="color:#435971"><i
                                                class="bx bx-edit-alt me-1"></i> Update</a>
                                        <form method="post" action="">

                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                style="border: none; background-color:white; color:#435971">
                                                <i class="bx bx-trash me-1 m-3"></i> Delete</a>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection
