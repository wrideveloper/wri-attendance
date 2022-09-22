@extends('layouts.master')

@section('content')
    <div class="container-fluid px-5">
        <div class="row align-items-center mt-3 justify-content-between">
            <div class="col-auto">
                <h5 class="fw-normal ">Absensi</h5>
            </div>
            <div class="row col-auto">
                <form class="d-flex" action="{{ route('presence.index') }}">
                    <span class="row col-auto">
                        <div class="col-auto">
                            <input value="{{ request('search') }}" placeholder="Cari Miniclass Meetings" type="search" id="search" class="form-control" name="search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </span>
                </form>
            </d>
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
                        <th class="text-center">Action</th>
                    </tr>
                    @if ($presence->count() > 0)
                        @foreach ($presence as $presences)
                            @php
                                $statusColor = "";
                                if($presences->status === "Hadir") $statusColor = "text-success";
                                elseif($presences->status === "Izin") $statusColor = "text-primary";
                                elseif($presences->status === "Sakit") $statusColor = "text-info";
                                elseif($presences->status === "Alpha") $statusColor = "text-danger";
                            @endphp
                            <tr class="align-middle border-custom-none">
                                <td>{{ $presences->pertemuan }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($presences->created_at)->format('d M Y') }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($presences->created_at)->format('H:i:s') }} WIB</td>
                                <td class="text-truncate">{{ substr_replace($presences->topik, "...", 25) }}</td>
                                @if(is_null($presences->status) || $presences->status === "Alpha")
                                    <td class="text-danger text-truncate">Tidak Hadir / Alpha</td>
                                @else
                                    <td class="{{ $statusColor }} text-truncate">{{ $presences->status }}</td>
                                @endif
                                @if ($presences->status === 'Hadir')
                                    <td class="text-center text-truncate">{{ substr_replace($presences->feedback, "...", 25) }}</td>
                                @else
                                    <td class="text-center text-truncate">{{ substr_replace($presences->ket, "...", 25) }}</td>
                                @endif
                                @if(is_null($presences->nim) || is_null($presences->slug))
                                    <td><a class="btn w-100 btn-warning text-light fw-bold disabled" href="#">Pilih</a></td>
                                @else
                                    <td><a class="btn w-100 btn-warning text-light fw-bold" href="{{ route('show-details', [$presences->nim, $presences->slug]) }}">Pilih</a></td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr class="align-middle border-custom-none">
                            <td colspan="6" class="text-center text-danger">Tidak ada data</td>
                        </tr>
                    @endif
                </table>
            </div>
            <div class="d-flex justify-content-end mt-2">
                {{ $presence->links() }}
            </div>
        </div>
    </div>
@endsection
