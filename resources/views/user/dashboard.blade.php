@extends('layouts.master')

@section('content')

<div class="container-fluid pb-5 px-4">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible col-lg-12 fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- <h4 class="fw-normal mb-0"></h4> --}}
    <div class="col-12 mt-4">
        <div class="row align-items-center justify-content-between flex-column flex-lg-row">
            <div class="col-12 col-md-12 col-lg-7 d-flex flex-column shadow-cs bg-white rounded-cs p-5">
                <h4 class="m-0">Prosentase Kehadiran</h4>
                <div class="row align-items-center justify-content-center justify-sm-content-start">
                    <div class="mt-5 col-sm-8 col-md-4">
                        <canvas id="pieKehadiran"></canvas>
                    </div>
                    <div class="mt-3 mt-lg-0 col-12 col-md-8">
                        <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                            <p class="m-0 ms-md-5 d-inline col-2">Hadir</p>
                            <div class="progress col-8 ms-2 p-0" style="height: .8rem">
                                <div class="progress-bar bg-teal rounded" role="progressbar"
                                    style="width: {{ $prosentase_hadir }}%" aria-valuenow="{{ $prosentase_hadir }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_hadir }}%</p>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                            <p class="m-0 ms-md-5 d-inline col-2">Izin</p>
                            <div class="progress col-8 ms-2 p-0" style="height: .8rem">
                                <div class="progress-bar bg-primary rounded" role="progressbar"
                                    style="width: {{ $prosentase_izin }}%" aria-valuenow="{{ $prosentase_izin }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_izin }}%</p>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                            <p class="m-0 ms-md-5 d-inline col-2">Sakit</p>
                            <div class="progress col-8 ms-2 p-0" style="height: .8rem">
                                <div class="progress-bar bg-warning rounded" role="progressbar"
                                    style="width: {{ $prosentase_sakit }}%" aria-valuenow="{{ $prosentase_sakit }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_sakit }}%</p>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center">
                            <p class="m-0 ms-md-5 d-inline col-2">Alpha</p>
                            <div class="progress col-8 ms-2 p-0" style="height: .8rem">
                                <div class="progress-bar bg-danger rounded" role="progressbar"
                                    style="width: {{ $prosentase_alpha }}%" aria-valuenow="{{ $prosentase_alpha }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_alpha }}%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 shadow-cs bg-white rounded-cs p-4 mt-4 mt-md-0">
                <p class="text-secondary fw-bold">Timeline</p>
                @if ($timeline->count() > 0)
                    @foreach ($timeline as $item)
                        <div class="col-12 d-flex p-0">
                            <div class="col-8 d-flex flex-column p-0">
                                <a href="{{ route('input.presence', [$item->miniclass->miniclass_name, $item->pertemuan, $item->topik]) }}" class="fw-bold text-dark text-decoration-none mb-3">
                                    Pertemuan {{$item->pertemuan}}
                                </a>
                                <p class="text-truncate">{{$item->topik}}</p>
                            </div>
                            <div class="col-4 d-flex flex-column p-0 text-end">
                                <p class="text-secondary">{{date('d F Y', strtotime($item->tanggal)) }}</p>
                                <p class="text-secondary">{{date('H:i', strtotime($item->start_time))}} -
                                    {{date('H:i', strtotime($item->end_time))}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 d-flex p-0 justify-content-center">
                        <p class="text-center text-danger">Belum ada presensi terbuka</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-4 md-mt-5">
            <h4 class="fw-normal mb-4">Riwayat Presensi</h4>
            <div class="table-responsive shadow-cs rounded-cs bg-white px-5 py-3">
                <table class="table mt-3 table-borderless">
                    <tr class="border-bottom border-dark mb-3">
                        <th class="py-3 border-top-0">Pertemuan</th>
                        <th class="py-3 border-top-0">Tanggal</th>
                        <th class="py-3 border-top-0">Waktu</th>
                        <th class="py-3 border-top-0">Topik</th>
                        <th class="py-3 border-top-0">Status</th>
                        <th class="py-3 border-top-0">Keterangan</th>
                    </tr>
                    @if($presensi->count() > 0)
                        @foreach ($presensi as $item)
                            @php
                                $statusColor = "";
                                if($item->status === "Hadir") $statusColor = "text-teal";
                                elseif($item->status === "Izin") $statusColor = "text-primary";
                                elseif($item->status === "Sakit") $statusColor = "text-warning";
                                elseif($item->status === "Alpha") $statusColor = "text-danger";
                            @endphp
                            <tr class="align-middle">
                                <td>{{$item->meetings->pertemuan}}</td>
                                <td>{{\Carbon\Carbon::parse($item->meetings->tanggal)->format('d M Y')}}</td>
                                <td>{{date('H:i:s', strtotime($item->meetings->start_time))}} WIB</td>
                                <td class="col-1 text-truncate">{{$item->meetings->topik}}</td>
                                <td class="{{ $statusColor }}">{{$item->status}}</td>
                                <td><a class="btn w-100 btn-warning text-light" href="{{ route('show-details', [$item->nim, $item->meetings->topik]) }}">Pilih</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="align-middle">
                            <td colspan="6" class="text-center text-danger">Tidak ada data</td>
                        </tr>
                    @endif
                </table>
                <a class="mt-3 mb-3 link-secondary text-decoration-none text-center d-block" href="{{ route('presence.index') }}">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('overrideScript')
<script>
    controlBodyBackgroundColor()
    const zeros = {
        datasets: [{
            data: [100],
            backgroundColor: ['#C8C8C8']
        }]
    }

    const data = {

        labels: ["Hadir", "Izin", "Sakit", "Alpha"],
        datasets: [{
            backgroundColor: ["rgb(32, 201, 151)", "rgb(13,110,253)", "rgb(255, 205, 86)", "rgb(220, 53, 69)"],
            data: @json($data_pie_kehadiran),
        }, ],
    };

    if(data.datasets[0].data.every((v) => v === 0 )) {
        data.datasets[0].data = [0.1,0,0]
        data.datasets[0].backgroundColor = ["rgb(192,192,192)","rgb(192,192,192)","rgb(192,192,192)","rgb(192,192,192)"]
    }

    const pieKehadiran = new Chart(document.getElementById("pieKehadiran"), {
        type: "doughnut",
        data: data,
        options: {
            cutout: 60,
            borderWidth: 0,
            plugins: {
                legend: {
                    display: false
                },
            }
        },
    });
</script>
@endsection
