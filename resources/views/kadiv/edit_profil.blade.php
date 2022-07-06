@extends('layouts.master')

@section('content')
<div class="position-absolute h-100 d-flex align-items-center px-5">
    Sidebar
</div>
@include('components.konfirmasi', ['text' => "Apakah Anda yakin ingin memperbarui profil?"])
<div class="container p-5 d-flex justify-content-center">
    <div class="col-md-8">
        <h5 class="mb-5 ">Edit Profile</h5>
        <form class="edit-profil form ms-5">
            <div class="form-group mb-3">
                <label for="nama" class="form-label fs-5">Nama</label>
                <input id="nama" type="text" class="form-control" placeholder="Input your name">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label fs-5">Email</label>
                <input name="email" id="email" type="text" class="form-control" placeholder="Input your email">
            </div>
            <div class="form-group mb-3 position-relative">
                <label for="password" class="form-label fs-5">Password</label>
                <input id="password" name="password" type="password" class="form-control"
                    placeholder="Input your password" autocomplete="">
                <button type="button" class="btn border-0 position-absolute bottom-0 end-0"
                    cs-show-password="password"><i class="fa-solid fa-eye-slash"></i></button>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-teal text-light px-5">Simpan</button>
            </div>
        </form>
    </div>
</div>

@section('overrideScript')
<script>
    togglePasswordVisibility()
    confirmModal()
</script>
@endsection

@endsection