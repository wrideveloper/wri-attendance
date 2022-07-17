@extends('layouts.master')

@section('content')

<div class="container mt-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3">
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
                <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="modal" data-bs-target="#confirmdelete">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>

</div>
        

    {{-- modal add user --}}
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