@extends('layouts.master')
@section('content')
    @if (session()->has('UpdateSuccess'))
        <div class="alert alert-success alert-dismissible fade show py-3 px-3 position-fixed-alert mx-3" role="alert">
            {{ session('UpdateSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid px-5">
        <div class="row align-items-center mt-3 justify-content-between gap-5">
            <div class="col-auto row gap-3">
                <div class="col-auto">
                    <h5 class="fw-normal ">List Pertemuan Miniclass</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-teal text-light w-sm-100" href="{{ route('meetings.create') }}">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="row col-auto">
                <form class="d-flex" action="{{ route('meetings.index') }}">
                    <span class="row col-auto">
                        <div class="col-auto">
                            <input value="{{ request('search') }}" type="search" id="search" class="form-control"
                                name="search" placeholder="Cari Pertemuan Miniclass">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </span>
                </form>
            </div>
        </div>
        <div class="my-4 bg-white rounded-3 px-4 py-4">
            <div class="table-responsive">
                <table class="table mt-3 table-borderless">
                    <tr class="border-custom-bottom">
                        <th>Pertemuan</th>
                        <th>Tanggal</th>
                        @if(Auth::user()->roles_id == 1)
                            <th>Miniclass</th>
                        @endif
                        <th>Topik</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    @if ($datas->count() > 0)
                        @foreach ($datas as $meetings)
                            <tr class="align-middle border-custom-none">
                                <td class="align-middle">{{ $meetings->pertemuan }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($meetings->tanggal)->format('d M Y') }}
                                </td>
                                @if(Auth::user()->roles_id == 1)
                                    <td class="align-middle">{{ $meetings->miniclass->miniclass_name }}</td>
                                @endif
                                <td class="align-middle">{{ $meetings->topik }}</td>

                                <td class="d-flex gap-3 justify-content-center">
                                    <a class="btn btn-warning text-white"
                                        href="{{ route('meetings.edit', $meetings->token) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a class="btn btn-primary text-light fw-bold rounded w-100"
                                        href="{{ route('list-presence', $meetings->token) }}">Detail</a>
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

        {{ $datas->links('vendor.pagination.custom') }}

    </div>
@endsection
