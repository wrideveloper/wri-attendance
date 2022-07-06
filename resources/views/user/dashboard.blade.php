@extends('layouts.master')

@section('content')
<div class="position-absolute h-100 d-flex align-items-center px-5">
    Sidebar
</div>
<div class="dashboard container">
    <div class="col-12 d-flex justify-content-end align-items-center pt-3">
        <h6 class="mb-0 me-3 fw-bold fs-6 text-secondary">Nama Pengguna</h6>
        <i class="fa-solid fa-circle-user fs-2 text-warning"></i>
    </div>
    <h4 class="fw-normal mt-5 mb-0">Prosentase Kehadiran</h4>
    <div class="col-12 mt-4">
        <div class="row align-items-center justify-content-between flex-column flex-lg-row">
            <div class="col-12 col-md-12 col-lg-7 d-flex align-items-center flex-column flex-md-row shadow-cs p-3">
                <div class="col-sm-8 col-md-4">
                    <canvas id="pieKehadiran"></canvas>
                </div>
                <div class="mt-4 mt-lg-0 col-12  col-md-8">
                    <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                        <p class="m-0 ms-md-5 d-inline col-2">Hadir</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-teal" role="progressbar" style="width: 50%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">50%</p>
                    </div>
                    <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                        <p class="m-0 ms-md-5 d-inline col-2">Izin</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 35%"
                                aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">30%</p>
                    </div>
                    <div class="col-12 d-flex justify-content-around align-items-center">
                        <p class="m-0 ms-md-5 d-inline col-2">Sakit</p>
                        <div class="progress col-8" style="height: .8rem">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"
                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="m-0 d-inline col-2 text-end text-md-center">15%</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 shadow-cs p-3">
                <p class="text-secondary">Timeline</p>
                <div class="col-12 d-flex">
                    <div class="col-8 d-flex flex-column">
                        <p class="fw-bold">Pertemuan 4</p>
                        <p>Mengenal UI Design</p>
                    </div>
                    <div class="col-4 d-flex flex-column text-end">
                        <p class="text-secondary">2 Juni 2022</p>
                        <p class="text-secondary">19:30 - 23:00</p>
                    </div>
                </div>
                <div class="col-12 d-flex">
                    <div class="col-8 d-flex flex-column">
                        <p class="fw-bold">Pertemuan 5</p>
                        <p>Pemaparan materi laravel</p>
                    </div>
                    <div class="col-4 d-flex flex-column text-end">
                        <p class="text-secondary">12 Juni 2022</p>
                        <p class="text-secondary">19:30 - 23:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 shadow-cs">
            <h4 class="fw-normal">Absensi</h4>
            <div class="table-responsive">
                <table class="table mt-3 table-borderless">
                    <tr class="border-bottom border-dark mb-3">
                        <th class="py-3">Pertemuan</th>
                        <th class="py-3">Tanggal</th>
                        <th class="py-3">Waktu</th>
                        <th class="py-3">Topik</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Keterangan</th>
                    </tr>
                    <tr class="align-middle">
                        <td>1</td>
                        <td>2021-05-26</td>
                        <td>19:30</td>
                        <td class="col-1 text-truncate">Belajar Laravel</td>
                        <td class="text-info">Hadir</td>
                        <td><button class="btn w-100 btn-warning text-light">Pilih</button></td>
                    </tr>
                    <tr class="align-middle">
                        <td>2</td>
                        <td>2021-05-28</td>
                        <td>19:30</td>
                        <td class="col-1 text-truncate">Belajar UI Design</td>
                        <td class="text-primary">Izin</td>
                        <td><button class="btn w-100 btn-warning text-light">Pilih</button></td>
                    </tr>
                </table>
            </div>
            <a class="mt-3 link-secondary text-decoration-none text-center" href="">Lihat Semua</a>
        </div>
    </div>
</div>

@endsection

@section('overrideScript')
<script>
    subtleBodyBackground()

    const data = {
        labels: ["Hadir", "Izin", "Sakit"],
        datasets: [
            {
                backgroundColor: [
                    "rgb(32, 201, 151)",
                    "rgb(13,110,253)",
                    "rgb(255, 205, 86)",
                ],
                data: [50, 35, 15],
            },
        ],
    };

    const pieKehadiran = new Chart(document.getElementById("pieKehadiran"), {
        type: "doughnut",
        data: data,
        options: { cutout: 70, borderWidth: 0, plugins: { legend: { display: false } } },
        
    });
</script>
@endsection