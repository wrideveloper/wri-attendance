@extends('layouts.master')

@section('content')
<div class="dashboard container">
    <div class="row g-3 align-items-center mt-5 justify-content-between">
        <span class="row col-auto">
            <div class="col-auto">
                <button class="badge border-0 bg-white px-2"><i class="fa-solid fa-2x fa-angle-left text-muted"></i></button>
            </div>
            <div class="col-auto">
                <h5 class="fw-normal mx-3">List Kehadiran Anggota • Pertemuan 1</h5>
            </div>
        </span>
        <span class="row col-auto">
            <div class="col-auto">
                <input type="search" id="search" class="form-control" name="search">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary px-4">Cari</button>
            </div>
        </span>
    </div>
    <div class="row shadow-cs rounded-4">
        <div class="table-responsive">
            <table class="table my-3 table-borderless">
                <tr class="border-bottom border-dark">
                    <th class="py-3 col-4">Nama</th>
                    <th class="py-3">Waktu</th>
                    <th class="py-3">Status</th>
                    <th class="py-3 text-center">Aksi</th>
                </tr>
                <tr class="align-middle">
                    <td>Muhamad Alif Rizki</td>
                    <td>19.30</td>
                    <td class="text-truncate">Hadir</td>
                    <td class="d-flex justify-content-center">
                        <button class="ms-3 col-md-8 btn btn-primary text-light my-2">Detail</button>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td>Muhamad Alif Rizki</td>
                    <td>19.30</td>
                    <td class="text-truncate">Izin</td>
                    <td class="d-flex justify-content-center">
                        <button class="ms-3 col-md-8 btn btn-primary text-light my-2">Detail</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
