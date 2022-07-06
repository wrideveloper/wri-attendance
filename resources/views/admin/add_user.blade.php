@extends('layouts.master')

@section('content')
<div class="position-absolute h-100 d-flex align-items-center px-5">
    Sidebar
</div>
<div class="container p-5 d-flex justify-content-center">
    <div class="col-md-8">
        <h5 class="mb-5 ">Data Anggota User</h5>
        <button type="button" class="btn btn-teal text-light" data-bs-toggle="modal" data-bs-target="#addUser">
            <i class="fa-regular fa-plus"></i> Tambah Data
        </button>
        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header p-5 py-3">
                        <h5 class="modal-title" id="addUserLabel">Tambah Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 pt-4">
                        <form>
                            <div class="form-group mb-3">
                                <label for="nama" class="form-label fs-5">Nama</label>
                                <input id="nama" type="text" class="form-control" placeholder="Input your name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label fs-5">Email</label>
                                <input name="email" id="email" type="text" class="form-control"
                                    placeholder="Input your email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="telp" class="form-label fs-5">Telepon</label>
                                <input name="telp" id="telp" type="number" class="form-control" placeholder="No. Telp">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nim" class="form-label fs-5">NIM</label>
                                <input name="nim" id="nim" type="number" class="form-control"
                                    placeholder="Input your NIM">
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label for="angkatan" class="form-label fs-5">Angkatan</label>
                                        <select name="angkatan" id="angkatan" class="form-control">
                                            <option selected disabled>Pilih Angkatan</option>
                                            <option value="7">WRI7</option>
                                            <option value="8">WRI8</option>
                                            <option value="9">WRI9</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label for="miniclass" class="form-label fs-5">Miniclass</label>
                                        <select name="miniclass" id="miniclass" class="form-control">
                                            <option selected disabled>Pilih Miniclass</option>
                                            <option value="1">Web</option>
                                            <option value="2">Mobile</option>
                                            <option value="3">UI|UX</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label fs-5">Password</label>
                                <input id="password" name="password" type="password" class="form-control"
                                    placeholder="Input your password">
                            </div>
                            <div class="col-12 px-2">
                                <div class="row justify-content-between">
                                    <button class="col-5 btn btn-danger text-light px-5">Batal</button>
                                    <button class="col-5 btn btn-teal text-light px-5">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection