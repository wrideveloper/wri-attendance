@extends('layouts.background')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 vw-100 position-relative">
    <div id="box" class="rounded-4">
        <div class="container">
            <div class="col-12">
            <div class="row d-flex justify-content-center ">
                <img style="width: 50%;" src="../../../public/img/image 1.png" alt="">
            </div>
            <div class="row">
                <p class="text-monospace align-content-center text-center justify-content-center">
                    Masukkan token verifikasi yang telah kami berikan pada alamat email anda
                </p>
            </div>
            <div class="row align-items-center justify-content-center d-flex    ">
                <input maxlength="1" type="text" class="verif_input col-md-3 m-1 py-2" style="margin: 1px;">
                <input maxlength="1" type="text" class="verif_input col-md-3 m-1 py-2" style="margin: 1px;">
                <input maxlength="1" type="text" class="verif_input col-md-3 m-1 py-2" style="margin: 1px;">
                <input maxlength="1" type="text" class="verif_input col-md-3 m-1 py-2" style="margin: 1px;">
                <input maxlength="1" type="text" class="verif_input col-md-3 m-1 py-2" style="margin: 1px;">
                <input maxlength="1" type="text" class="verif_input col-md-3 m-1 py-2" style="margin: 1px;">
            </div>
            <div class="row">
                <p class="text-monospace align-content-center text-center justify-content-center">
                    anda tidak menerima kode verifikasi? <a href="#" class="text-danger">
                        Kirim ulang
                    </a>
                </p>
            </div>

            <div class="row">
            <button type="button" class="btn btn-warning btn-lg btn-block btn-login">
                <div class="text-white fw-semibold">
                    Kirim
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
