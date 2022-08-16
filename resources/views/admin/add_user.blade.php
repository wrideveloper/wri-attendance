@extends('layouts.master', ['title' => 'Add User'])
@section('content')

<div class="container py-5 px-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3 flex-column flex-md-row">
            <div class="p-2">
                <h5 class="">Data Anggota User</h5>
            </div>
            <div class="p-2">
                <button type="button" class="btn btn-teal text-light" data-bs-toggle="modal" data-bs-target="#addUser">
                    <i class="fa-regular fa-plus"></i> Tambah Data
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Miniclass</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1.</th>
                    <td>Muhammad Eren Yeager</td>
                    <td>8</td>
                    <td>Web</td>
                    <td>
                        <a type="button" href="/admin/edit-profil" class="btn btn-primary btn-sm px-3 me-2">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="modal"
                            data-bs-target="#confirmdelete">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

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
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label fs-5">Email</label>
                        <input name="email" id="email" type="text" class="form-control" placeholder="Input your email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label fs-5">Telepon</label>
                        <input name="phone" id="phone" type="number" class="form-control" placeholder="No. Telp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nim" class="form-label fs-5">NIM</label>
                        <input name="nim" id="nim" type="number" class="form-control" placeholder="Input your NIM">
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-between">
                            <div class="form-group mb-3 col-12 col-md-6 ps-0 pe-2">
                                <label for="generations_id" class="form-label fs-5">Angkatan</label>
                                <select name="generations_id" id="generations_id" class="form-control">
                                    <option selected disabled>Pilih Angkatan</option>
                                    @foreach ($generations as $item)
                                    <option value="{{$item->id}}">{{$item->crew_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 col-12 col-md-6 p-0">
                                <label for="miniclass_id" class="form-label fs-5">Miniclass</label>
                                <select name="miniclass_id" id="miniclass_id" class="form-control">
                                    <option selected disabled>Pilih Miniclass</option>
                                    @foreach ($miniclasses as $item)
                                    <option value="{{$item->id}}">{{$item->miniclass_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label fs-5">Password</label>
                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="Input your password">
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

{{-- Modal confirm delete --}}
<div class="modal fade" id="confirmdelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid d-flex justify-content-center">
                    <i class="fa fa-exclamation-circle" style="font-size: 5rem; color:red;"></i>
                </div><br>
                <div class="container-fluid d-flex justify-content-center">
                    <h5>Yakin hapus deck?</h5>
                </div><br>
                <div class="container-fluid d-flex justify-content-center">
                    <button type="button" class="btn btn-primary me-3">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
