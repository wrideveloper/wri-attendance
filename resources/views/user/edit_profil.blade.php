@extends('layouts.master')

@section('content')
@include('components.konfirmasi', ['text' => 'Apakah Anda yakin ingin memperbarui profil?'])
<div class="container pb-5 px-4 d-flex flex-column justify-content-center">
    <h5 class="mb-4 mb-md-5">Edit Profile</h5>
    <div class="col-md-12">
        <form class="edit-profil form rounded bg-light pb-5 px-0 px-md-5 bg-white py-0 py-md-2">
            <div class="form-group mb-3">
                <label for="name" class="form-label fs-5">Nama</label>
                <input id="name" type="text" class="form-control" placeholder="Input your name">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label fs-5">Email</label>
                <input name="email" id="email" type="text" class="form-control" placeholder="Input your email">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="form-group mb-3 col-12 col-md-6">
                        <label for="angkatan" class="form-label fs-5">Angkatan</label>
                        <select name="angkatan" id="angkatan" class="form-control">
                            <option selected disabled>Pilih Angkatan</option>
                            <option value="7">WRI7</option>
                            <option value="8">WRI8</option>
                            <option value="9">WRI9</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-12 col-md-6">
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
            <div class="form-group mb-3 position-relative">
                <label for="password" class="form-label fs-5">Password</label>
                <input id="password" name="password" type="password" class="form-control"
                    placeholder="Input your password" autocomplete="">
                <button type="button" class="btn border-0 position-absolute bottom-0 end-0"
                    cs-show-password="password"><i class="fa-solid fa-eye-slash"></i></button>
            </div>
            <div class="col-12 d-flex justify-content-end mt-4">
                <button class="btn btn-teal text-light px-5">Simpan</button>
            </div>
        </form>
    </div>
</div>

@section('overrideScript')
<script>
    controlBodyBackgroundColor()
        controlPasswordVisibility()
        controlConfirmationModal()
</script>
@endsection
@endsection