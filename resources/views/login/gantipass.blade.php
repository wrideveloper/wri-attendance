@extends('layouts.background')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 vw-100 position-relative">
    <div id="box" class="rounded-4" style="width: 36rem;">
        <div class="container">
            <div class="col-12">
            <div class="row d-flex justify-content-center mb-2">
                <img style="width: 50%;" src="../../../public/img/image 1.png" alt="">
            </div>
            <div class="row">
                <h5 class=" align-content-center d-flex justify-content-center">
                    Ganti password
                </h5>
            </div>
            <div class="row mb-3">
                <input type="password" class="input-login form-control p-2" id="password" placeholder="Masukkan password baru">
            </div>
            <div class="row">
                <input type="password" class="input-login form-control p-2" id="password" placeholder="Konfirmasi password">
            </div>

            <div class="row mt-4">
            <button type="button" class="btn btn-warning btn-lg btn-block btn-login">
                <div class="text-white fw-semibold">
                    Ubah Password
                </div>
            </button>
            </div>
            </div>
        </div>
    </div>
    <div id="garisVector" class="position-absolute">
        <img src="../../../public/svg/line.svg" alt="">
    </div>
</div>
@endsection
