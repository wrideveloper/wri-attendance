@extends('layouts.auth_layout')

@section('login-content')
    @if (session()->has('ResetErrors'))
        <div class="alert alert-danger alert-dismissible fade show py-3 px-3 position-fixed-alert" role="alert">
            {{ session('ResetErrors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center vh-100 vw-100 position-relative">
        <div id="box" class="rounded-4" style="width: 36rem;">
            <form action="{{ route('post-reset-password') }}" method="post">
                @csrf
                <div class="container">
                    <div class="col-12">
                        <input type="hidden" id="token" name="token" value="{{ $token }}">
                        <div class="row d-flex justify-content-center mb-2">
                            <img style="width: 50%;" src="{{ asset('img/image 1.png') }}" alt="">
                        </div>
                        <div class="row">
                            <h5 class=" align-content-center d-flex justify-content-center">
                                Ganti password
                            </h5>
                        </div>
                        <div class="row">
                            <input type="password" class="input-login form-control p-2" id="password" name="password1"
                                placeholder="Masukkan password baru">
                        </div>
                        <div class="row">
                            <input type="password" class="input-login form-control p-2" id="password" name="password2"
                                placeholder="Konfirmasi password">
                        </div>

                        <div class="row mt-2">
                            <button type="submit" class="btn btn-warning btn-lg btn-block btn-login">
                                <div class="text-white fw-semibold">
                                    Ubah Password
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="garisVector" class="position-absolute">
            <img src="{{ asset('svg/line.svg') }}" alt="">
        </div>
    </div>
@endsection
