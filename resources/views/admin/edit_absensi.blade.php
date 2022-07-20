@extends('layouts.master')
@section('content')
    <div class="container-fluid pb-5 px-4">
        <div class="container-fluid">
            <div class="row align-items-center" id="atas">
                <div class="col-1" id="bgback">
                    <a href="" id="back"><i class="fa-solid fa-angle-left"></i></a>
                </div>
                <div class="col-2 col-sm-3" style="width: auto;">
                    <p id="pertemuan">Pertemuan 1</p>
                </div>
                <div class="col-1" style="width: auto;">
                    <img src="{{ asset('img/Ellipse 30.png') }}" />
                </div>
                <div class="col" style="width: auto;">
                    <p id="nama">Muhamad Alif Rizki</p>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5" id="content">
            <h1 id="nama">Muhamad Alif Rizki</h1>
            <img src="{{ asset('img/Line 28.png') }}" id="line" />
            <div class="row justify-content-between">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h5>DATA ANGGOTA</h5>
                    <div class="row justify-content-start">
                        <div class="col-6 col-sm-6 col-md-5">
                            <p>Miniclass</p>
                            <p>Angkatan</p>
                            <p>Email</p>
                            <p>Nomor HP</p>
                            <p>NIM</p>
                        </div>
                        <div class="col-6 col-sm-6 col-md-7" id="isidataanggota">
                            <p id="Miniclass">UI UX</p>
                            <p id="Angkatan">9</p>
                            <p id="Email">fantasiavsr@gmail.com</p>
                            <p id="NomorHP">+62 813-5799-5175</p>
                            <p id="NIM">2041720196</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h5>DATA ABSEN</h5>
                    <form>
                        <div class="row justify-content-start">
                            <div class="col-6 col-sm-6 col-md-5">
                                <p>Waktu Absen</p>
                                <p>Status</p>
                                <p>Keterangan</p>
                                <p>Feedback</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-7" id="isiabsen">
                                <p id="WaktuAbsen">UI UX</p>
                                <select class="form-select" aria-label="Default select example" id="status">
                                    <option selected disabled id="pilih">Pilih</option>
                                    <option value="1" id="hadir">Hadir</option>
                                    <option value="2" id="izin">Izin</option>
                                    <option value="3" id="sakit">Sakit</option>
                                </select>
                                <p id="Keterangan">-</p>
                                <p id="Feedback">Miniclass hari ini cukup menyenangkan dan sangat membantu saya dalam
                                    belajar</p>
                            </div>
                            <div class="row justify-content-end">
                                <a href="" type="button" class="btn btn-light" id="backbutton">Back</a>
                                <button type="button" class="btn btn-warning" id="updatebutton">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
