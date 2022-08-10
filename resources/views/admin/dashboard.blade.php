@extends('layouts.master')
@section('content')
    @if(session()->has('success'))
        <div class="container-fluid alert alert-success alert-dismissible col-lg-11 fade show mb-2 pe-0 d-flex justify-content-start" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid pe-0">
        <div class="container-fluid pt-3 d-flex justify-content-start pe-0">
            <div class="col-12 row clearfix gy-3 pe-0">
                <div class="col-lg-4 col-md-6 col-sm-12 ps-0">
                    <div class="widget shadow-sm p-0 mb-0 bg-white rounded-3 pe-5 ms-0">
                        <div class="widget-body">
                            <div class="col-12 ms-3 d-flex justify-content-start align-items-center">
                                <div class="col-3">
                                    <span style="color: #3366FF">
                                        <i class="fa-solid fa-user fa-3x"></i>
                                    </span>
                                </div>
                                <div class="col-9">
                                    <h4 class="m-0 mt-3">121</h4>
                                    <p>Anggota</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 ps-0">
                    <div class="widget shadow-sm p-0 mb-0 bg-white rounded-3 pe-5 ms-0">
                        <div class="widget-body">
                            <div class="col-12 ms-3 d-flex justify-content-start align-items-center">
                                <div class="col-3">
                                    <span style="color: #3366FF">
                                        <i class="fa-solid fa-book fa-3x" style=""></i>
                                    </span>
                                </div>
                                <div class="col-9">
                                    <h4 class="m-0 mt-3">48</h4>
                                    <p>Jadwal Absen</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 ps-0">
                    <div class="widget shadow-sm p-0 mb-0 bg-white rounded-3">
                        <div class="widget-body">
                            <div class="col-12 ms-3 d-flex justify-content-start align-items-center">
                                <div class="col-3">
                                    <span style="color: #3366FF">
                                        <i class="fa-solid fa-chalkboard-user fa-3x"></i>
                                    </span>
                                </div>
                                <div class="col-9">
                                    <h4 class="m-0 mt-3">4</h4>
                                    <p>Miniclass</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('overrideScript')
    <script>
        controlBodyBackgroundColor()
    </script>
@endsection
@endsection
