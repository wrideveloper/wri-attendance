@extends('layouts.master')
@section('content')
    <div class="container-fluid px-5">
        <div class="row align-items-center mt-3 justify-content-between gap-5">
            <div class="col-auto row gap-3">
                <div class="col-auto">
                    <h5 class="fw-normal ">List Absensi Pertemuan</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-teal text-light w-sm-100" href="{{ route('meetings.create') }}">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="row col-auto gap-1">
                <div class="col-auto">
                    <input type="search" id="search" class="form-control" name="search" placeholder="Search">
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
                        <th>Tanggal</th>
                        <th>Topik</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    @if ($meeting->count() > 0)
                        @foreach($meeting as $meetings)
                        <tr class="align-middle border-custom-none">
                            <td>class="align-middle">{{ $meeting->pertemuan }}</td>
                            <td>class="align-middle">{{ $meeting->tanggal }}</td>
                            <td>class="align-middle">{{ $meeting->topik }}</td>

                            <td class="d-flex gap-3 justify-content-center">
                                <a class="btn btn-warning text-white" href="{{ route('config-presensi', $meetings->pertemuan) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a class="btn btn-primary text-light fw-bold rounded w-50" href="{{ route('detail-meetings', $meetings->pertemuan) }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-danger">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
