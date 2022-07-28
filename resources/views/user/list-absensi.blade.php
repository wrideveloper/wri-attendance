@extends('layouts.master')

@section('content')
    <div class="container-fluid px-5">
        <div class="row align-items-center mt-3 justify-content-between">
            <div class="col-auto">
                <h5 class="fw-normal ">Absensi</h5>
            </div>
            <div class="row col-auto">
                <div class="col-auto">
                    <input type="search" id="search" class="form-control" name="search">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary px-4">Cari</button>
                </div>
            </div>
        </div>
        <div class="my-4 bg-white rounded-3 px-4 py-4">
            <div class="table-responsive">
                <table class="table mt-3 table-borderless">
                    <tr class="border-custom-bottom">
                        <th>Pertemuan</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Waktu</th>
                        <th>Topik</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                    <tr class="align-middle border-custom-none">
                        <td>1</td>
                        <td class="text-center">asddasd</td>
                        <td class="text-center">asdasdasd</td>
                        <td class="text-truncate">sadasd</td>
                        <td class="text-center">asdasd</td>
                        <td><a class="btn w-100 btn-warning text-light fw-bold" href="">Pilih</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
