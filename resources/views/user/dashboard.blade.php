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
    <h4 class="fw-normal">Prosentase Kehadiran</h4>
    <div class="col-12 mt-5">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-md-7 d-flex align-items-center flex-column flex-md-row shadow-cs">
                <div class="col-3">
                    <canvas id="pieKehadiran"></canvas>
                </div>
                <div class="col col-md-9 ms-5">
                    <canvas id="barKehadiran"></canvas>
                </div>
            </div>
            <div class="col-12 col-md-4 shadow-cs">
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
            <h4 class="p-0 fw-normal">Absensi</h4>
            <table class="table mt-3">
                <tr>
                    <th>Pertemuan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Topik</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2021-05-26</td>
                    <td>19:30</td>
                    <td>Hari ini belajar UI Design..</td>
                    <td class="text-info">Hadir</td>
                    <td><button class="btn w-100 btn-warning text-light">Pilih</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2021-05-28</td>
                    <td>19:30</td>
                    <td>UI Design..</td>
                    <td class="text-primary">Izin</td>
                    <td><button class="btn w-100 btn-warning text-light">Pilih</button></td>
                </tr>
            </table>
            <a class="mt-3 link-secondary text-decoration-none text-center" href="">Lihat Semua</a>
        </div>
    </div>
</div>

@endsection

@section('overrideScript')
<script>
    const labels = ["Hadir", "Izin", "Sakit"];
    const data = {
        labels: labels,
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
        options: { plugins: { legend: { display: false } } },
    });

    const barKehadiran = new Chart(document.getElementById("barKehadiran"), {
        type: "bar",
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            layout: {
                padding: 30,
            },
            barThickness: 12,
            borderRadius: 10,
            indexAxis: "y",
            plugins: {
                legend: { display: false },
                title: {
                    display: false,
                },
            },
            scales: {
                y: {
                    grid: {
                        display: false,
                    },
                },
                x: {
                    display: false,
                    grid: {
                        display: false,
                    },
                },
            },
        },
    });

</script>
@endsection