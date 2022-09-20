@extends('layouts.master')
@section('content')
    <div class="container-fluid px-5">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible col-lg-12 fade show mb-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row align-items-center mt-3 justify-content-between gap-5">
            <div class="col-auto row gap-3">
                <div class="col-auto">
                    <h5 class="fw-normal ">Daftar Anggota WRI</h5>
                </div>
                <div class="col-auto">
                    <button class="btn btn-teal text-light w-sm-100" data-bs-toggle="modal" data-bs-target="#addUser" type="button">
                        <i class="fa-regular fa-plus"></i> Tambah Data
                    </button>
                </div>
            </div>
            <div class="row col-auto">
                <form class="d-flex" action="{{ route('user.index') }}">
                    <span class="row col-auto">
                        <div class="col-auto">
                            <input value="{{ request('search') }}" type="search" id="search" class="form-control"
                                name="search" placeholder="Cari Anggota">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </span>
                </form>
            </div>
        </div>
        <div class="my-4 bg-white rounded-3 px-4 py-4">
            <div class="table-responsive">
                <table class="table mt-3 table-borderless">
                    <tr class="border-custom-bottom">
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Miniclass</th>
                        <th>Angkatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    @if ($user->count() > 0)
                        @foreach ($user as $users)
                            <tr class="align-middle border-custom-none">
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $users->nim }}</td>
                                <td class="align-middle">{{ $users->name }}</td>
                                <td class="align-middle">{{ $users->miniclass->miniclass_name }}</td>
                                <td class="align-middle">{{ $users->generations->crew_name }}</td>

                                <td class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-primary text-light fw-bold rounded w-50"
                                        href="{{ route('user.edit', $users->nim) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $users->nim) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Apakah anda yakin untuk menghapus user ini?')"
                                            class="btn btn-danger text-light fw-bold rounded">
                                            Hapus
                                        </button>
                                    </form>
                                        {{-- <a class="btn btn-teal bg-teal text-white"
                                        href="{{ route('list-presence', $meetings->token) }}">
                                        Rekapitulasi
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-danger">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
        {{ $user->links('vendor.pagination.custom') }}
    </div>


    {{-- modal add user --}}
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-4 px-5">
                    <h5 class="modal-title" id="addUserLabel">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 pt-3">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <input type="hidden" name="roles_id" value="3">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fs-5">Nama</label>
                            <input name="name" id="name" type="text" class="form-control" placeholder="Input your name">
                            @error('name')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label fs-5">Email</label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="Input your email">
                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label fs-5">Telepon</label>
                            <input name="phone" id="phone" type="tel" class="form-control" placeholder="No. Telp">
                            @error('phone')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nim" class="form-label fs-5">NIM</label>
                            <input name="nim" id="nim" type="text" class="form-control" placeholder="Input your NIM">
                            @error('nim')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="row justify-content-between">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="generations_id" class="form-label fs-5">Angkatan</label>
                                    <select name="generations_id" id="generations_id" class="form-control" required>
                                        <option selected disabled>Pilih Angkatan</option>
                                        @foreach ($generations as $item)
                                            <option value="{{$item->id}}">{{$item->crew_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="miniclass_id" class="form-label fs-5">Miniclass</label>
                                    <select name="miniclass_id" id="miniclass_id" class="form-control" required>
                                        <option selected disabled>Pilih Miniclass</option>
                                        @foreach ($miniclass as $item)
                                            <option value="{{$item->id}}">{{$item->miniclass_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label fs-5">Password</label>
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Input your password" required>
                        </div>
                        <div class="col-12 w-100 p-0 mt-4">
                            <div class="row w-100 justify-content-between m-0">
                                <button class="col-12 col-sm-5 btn btn-danger text-light">Batal</button>
                                <button type="submit"
                                    class="col-12 col-sm-5 mt-3 mt-sm-0 btn btn-teal text-light">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
