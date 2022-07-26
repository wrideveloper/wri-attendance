@extends('layouts.auth_layout')

@section('login-content')
    <div id="loginBackground" class="position-fixed vh-100 vw-100 d-flex flex-column justify-content-between">
        <div>
            <div class="d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="position-fixed" style="width: 50%;">
                            <img src="{{ asset('svg/Circle 6.svg') }}">
                        </div>
                        <div class="position-fixed">
                            <img src="{{ asset('svg/Line 10 (Stroke).svg') }}" alt="">
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('svg/Circle 7.svg') }}">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <div>

                </div>
                <div>
                    <img src="{{ asset('svg/Circle 8.svg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="mb-5 d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div id="desainBawah" class="position-fixed" style="width: 10px;">
                                <img id="ml_left" src="{{ asset('svg/titik estetik.svg') }}">
                            </div>
                            <div class="position-fixed">
                                <img id="circle3" src="{{ asset('svg/Circle 3.svg') }}" alt="">
                            </div>
                        </div>
                        <div>
                            <img id="circle1" style="margin-bottom: -50px;" src="{{ asset('svg/Circle 1.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center vh-100 vw-100 position-relative">
        <div id="box" class="rounded-4">
            <div class="container">
                <div class="col-12">
                    <div class="row d-flex justify-content-center ">
                        <img style="width: 50%;" src="{{ asset('img/image 1.png') }}" alt="">
                    </div>
                    <div class="row">
                        <h5 style="font-size: 24px; margin-top: 27px;"
                            class=" align-content-center d-flex justify-content-center">
                            Sistem Absensi WRI
                        </h5>
                    </div>
                    <div class="row">
                        <input type="text" class="input-login form-control p-2 is-invalid" id="username"
                            placeholder="Username">
                        {{-- @error('email') --}}
                        <span class="invalid-feedback" role="alert">
                            <strong>salah</strong>
                        </span>
                        {{-- @enderror --}}
                    </div>
                    <div class="row">
                        <input type="password" class="input-login form-control p-2 is-invalid" id="password"
                            placeholder="Password">
                        {{-- @error('email') --}}
                        <span class="invalid-feedback" role="alert">
                            <strong>salah</strong>
                        </span>
                        {{-- @enderror --}}
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="fw-semibold my-2">
                            <a href="{{ route('forgot-password') }}" class="text-black">
                                Lupa Password
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-warning btn-lg btn-block">
                            <div class="text-white fw-semibold">
                                Masuk
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
