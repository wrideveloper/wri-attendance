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
                            <div class="progress-bar bg-teal" role="progressbar" style="width: 50%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">50%</p>
                    </div>
                    <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                        <p class="m-0 ms-md-5 d-inline col-2 p-0 ps-lg-5">Izin</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 35%"
                                aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">30%</p>
                    </div>
                    <div class="col-12 d-flex justify-content-around align-items-center">
                        <p class="m-0 ms-md-5 d-inline col-2 p-0 ps-lg-5">Sakit</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"
                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">15%</p>
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
                    @foreach($presences->take(3) as $presence)
                    <tr class="align-middle">
                        <td>{{$presence->meetings->pertemuan}}</td>
                        <td>{{$presence->meetings->tanggal}}</td>
                        <td class="col-1 text-truncate">{{$presence->meetings->topik}}</td>
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
    const dataSource = {!! json_encode($presences, JSON_HEX_TAG) !!};
    let totalPresensi = hadir = izin = alpha = 0;
    for (const data in dataSource) {
        if (Object.hasOwnProperty.call(dataSource, data)) {
            const {status} = dataSource[data];
            totalPresensi++;
            if (status === "Hadir") hadir++;
            else if(status === "Izin") izin++;
            else if(status === "Alpha") alpha++;
        }
    }
    const data = {
        labels: ["Hadir", "Izin", "Sakit"],
        datasets: [{
            backgroundColor: [ "rgb(32, 201, 151)", "rgb(13,110,253)", "rgb(255, 205, 86)" ],
            data: [hadir, izin, alpha],
        }, ],
    };
    const progressBarHadir = $('.progress-bar')[0]
    const progressBarIzin = $('.progress-bar')[1]
    const progressBarAlpha = $('.progress-bar')[2]
    const persentaseHadir = controlProgressBarPercentage(totalPresensi,hadir) + "%"
    const persentaseIzin = controlProgressBarPercentage(totalPresensi,izin) + "%"
    const persentaseAlpha = controlProgressBarPercentage(totalPresensi,alpha) + "%"
    $(progressBarHadir).attr({ valuenow: hadir,style: `width: ${persentaseHadir}` })
    $(progressBarIzin).attr({ valuenow: izin, style: `width: ${persentaseIzin}` })
    $(progressBarAlpha).attr({ valuenow: alpha, style: `width: ${persentaseAlpha}` })
    $('div.progress + p')[0].innerText = persentaseHadir
    $('div.progress + p')[1].innerText = persentaseIzin
    $('div.progress + p')[2].innerText = persentaseAlpha
    const pieKehadiran = new Chart(document.getElementById("pieKehadiran"), {
        type: "doughnut",
        data: data,
        options: { cutout: 70, borderWidth: 0, plugins: { legend: { display: false } } },
    });
</script>
@endsection