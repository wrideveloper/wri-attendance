@extends('layouts.background')

@section('login-content')
<div class="d-flex justify-content-center align-items-center vh-100 vw-100 position-relative">
    <div id="box" class="rounded-4" style="width: 36rem;">
        <div class="container">
            <div class="col-12">
            <div class="row d-flex justify-content-center ">
                <img style="width: 50%;" src="{{ asset('img/image 1.png') }}" alt="">
            </div>
            <div class="row">
                <h5 class="align-content-center mt-2 d-flex justify-content-center">
                    Anda lupa password?
                </h5>
            </div>
            <div class="row">
                <!-- center a paragraph -->
                <p class="text-monospace align-content-center text-center justify-content-center">
                    Masukkan alamat Email anda yang terhubung dengan akun Workshop Riset Informatika
                </p>
            </div>
            <div class="row">
                <input type="email" class="pt-4 pb-4 px-6 input-login form-control p-2" id="email" placeholder="Email">
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
        <img src="{{ asset('svg/line.svg') }}" alt="">
    </div>
</div>
@endsection
