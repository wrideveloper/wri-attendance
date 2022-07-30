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
                        <th class="text-center">Keterangan / Feedback</th>
                    </tr>
                    @if ($presence->count() > 0)
                        @foreach ($presence as $presences)
                            <tr class="align-middle border-custom-none">
                                <td>{{ $presences->meeting->pertemuan }}</td>
                                <td class="text-center">{{ $presences->created_at->format('d M Y') }}</td>
                                <td class="text-center">{{ $presences->created_at->format('H:i:s') }}</td>
                                <td class="text-truncate">{{ $presences->meeting->topik }}</td>
                                <td class="text-truncate">{{ $presences->status }}</td>
                                @if ($presences->status != 'Hadir')
                                    <td class="text-center">{{ $presences->feedback }}</td>
                                @else
                                    <td class="text-center">{{ $presences->ket }}</td>
                                @endif
                                <td><a class="btn w-100 btn-warning text-light fw-bold" href="{{ route('presence.edit', $presences->nim) }}">Pilih</a></td>
                            </tr>
                        @endforeach
                    @else
                    <tr class="align-middle border-custom-none">
                        <td colspan="6" class="text-center text-danger">Tidak ada data</td>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
