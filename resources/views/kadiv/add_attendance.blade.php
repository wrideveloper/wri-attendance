@extends('layouts.master')
@section('title')
    Sistem Absensi WRI
@endsection

@section('content')
    <div class="container-fluid pb-5 px-4">
        <div class="d-flex gap-3 align-items-center mb-4">
            <a href="" class="btn btn-cs-back px-3 text-secondary fw-bold"><i class="fa-solid fa-angle-left"></i></a>
            <h1 class="h5 mb-0">Input absen</h1>
        </div>
        <form action="" method="POST">
            @csrf
            <div class="card card-rounded">
                <h1 class="h5">Status</h1>
                <div class="form-group mt-3 mb-3">
                    <label class="form-label">Topik</label>
                    <input type="text" class="form-control" placeholder="Input your name">
                </div>
                <div class="form-group mb-3 position-relative">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" name="tanggal" type="date" class="form-control placeholder-cs"
                        placeholder="Input your password">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3 position-relative">
                            <label for="tanggal" class="form-label">waktu mulai</label>
                            <input id="tanggal" name="tanggal" type="time" class="form-control placeholder-cs"
                                placeholder="Input your password">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 position-relative">
                            <label for="tanggal" class="form-label">waktu berakhir</label>
                            <input id="tanggal" name="tanggal" type="time" class="form-control placeholder-cs"
                                placeholder="Input your password">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 position-relative">
                            <label for="token" class="form-label">Token</label>
                            <input id="token" name="token" type="text" class="form-control placeholder-cs"
                                placeholder="Input token">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-end gap-3">
                        <button class="btn bg-white border-cs-dark px-5 fw-semibold">Batal</button>
                        <button class="btn btn-teal text-light px-5">Simpan</button>
                    </div>
                </div>
        </form>
    </div>
@endsection
