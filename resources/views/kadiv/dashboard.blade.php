@extends('layouts.master')

@section('content')

<div class="container pb-5 px-4">
    <h4 class="fw-normal mb-0">Prosentase Kehadiran</h4>
    <div class="col-12 mt-4">
        <div class="row align-items-center justify-content-between flex-column flex-lg-row">
            <div class="col-12 d-flex align-items-center flex-column flex-md-row shadow-cs p-3">
                <div class="col-8 col-md-3 col-lg-2">
                    <canvas id="pieKehadiran"></canvas>
                </div>
                <div class="mt-4 mt-lg-0 col-12 col-md-9 col-lg-10">
                    <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                        <p class="m-0 ms-md-5 d-inline col-2 p-0 ps-lg-5">Hadir</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-teal rounded" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_hadir }}%</p>
                    </div>
                    <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                        <p class="m-0 ms-md-5 d-inline col-2 p-0 ps-lg-5">Izin</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_izin }}%</p>
                    </div>
                    <div class="col-12 d-flex justify-content-around align-items-center">
                        <p class="m-0 ms-md-5 d-inline col-2 p-0 ps-lg-5">Sakit</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_sakit }}%</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 shadow-cs">
            <h4 class="fw-normal">List Absensi Pertemuan</h4>
            <div class="table-responsive">
                <table class="table mt-3 table-borderless">
                    <tr class="border-bottom border-dark mb-3">
                        <th class="py-3">Pertemuan</th>
                        <th class="py-3">Tanggal</th>
                        <th class="py-3">Topik</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                    @foreach($daftar_kehadiran as $p)
                    <tr class="align-middle">
                        <td>{{$p->pertemuan}}</td>
                        <td>{{$p->tanggal}}</td>
                        <td class="col-1 text-truncate">{{$p->topik}}</td>
                        <td class="d-flex justify-content-center">
                            <button class="btn btn-warning text-light">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="ms-3 col-md-7 btn btn-primary text-light">Detail</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <a class="mt-3 link-secondary text-decoration-none text-center" href="">Lihat Semua</a>
        </div>
    </div>
</div>
@endsection

@section('overrideScript')
<script>
    controlBodyBackgroundColor()

    const data = {
        labels: ["Hadir", "Izin", "Sakit"],
        datasets: [{
            backgroundColor: ["rgb(32, 201, 151)", "rgb(13,110,253)", "rgb(255, 205, 86)"],
            data: @json($data_pie_kehadiran),
        }, ],
    };

    const pieKehadiran = new Chart(document.getElementById("pieKehadiran"), {
        type: "doughnut",
        data: data,
        options: {
            cutout: 60,
            borderWidth: 0,
            plugins: {
                legend: {
                    display: false
                }
            }
        },
    });
</script>
@endsection