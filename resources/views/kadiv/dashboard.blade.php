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
    <div class="col-12">
        <h4 class="fw-normal mt-5 mb-5 mb-lg-0  d-none d-md-block">Prosentase Kehadiran</h4>
        <div class="container">
            <div class="row justify-content-between align-items-center flex-xs-column flex-md-row d-none d-md-flex">
                <div class="col-sm-8 col-md-4 col-lg-2 "><canvas id="pieKehadiran"></canvas></div>
                <div class="col-sm-12 col-md-8 col-lg-8"><canvas id="barKehadiran"></canvas></div>
            </div>
        </div>


        <div class="row">
            <h4 class="p-0 fw-normal mt-4">List Absensi Pertemuan</h4>
            <table class="table mt-3">
                <tr>
                    <th>Pertemuan</th>
                    <th>Tanggal</th>
                    <th>Topik</th>
                    <th class="text-center">Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2021-05-26</td>
                    <td>UI Design</td>
                    <td class="d-flex">
                        <button class="btn btn-warning text-light me-3">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn w-100 btn-primary text-light">Detail</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2021-05-28</td>
                    <td>UI Design</td>
                    <td class="d-flex">
                        <button class="btn btn-warning text-light me-3">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn w-100 btn-primary text-light">Detail</button>
                    </td>
                </tr>
            </table>
            <a class="my-3 link-secondary text-decoration-none text-center" href="">Lihat Semua</a>
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
        options: { responsive: true,maintainAspectRatio: true, cutout: 60, layout: { padding: {} },plugins: { legend: { display: false } } },
    });

    const barKehadiran = new Chart(document.getElementById("barKehadiran"), {
        type: "bar",
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            layout: {
                padding: {
                    top: 80,
                    bottom: 80,
                },
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