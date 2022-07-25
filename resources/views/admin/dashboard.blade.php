@extends('layouts.master')
@section('title')
    Dashboard Admin
@endsection

@section('content')
    <div class="dashboard container">
        <div class="container ps-3 pt-5 d-flex justify-content-between">
            <div class="col-12 row gap-3 ms-0 me-0">
                <div class="col-auto shadow-sm p-0 mb-0 bg-white rounded-3">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="col-auto d-flex justify-content-start align-items-center pe-5">
                                <div class="col-auto ms-3">
                                    <img src="img/admin/user.png" alt="">
                                </div>
                                <div class="col-auto pe-5">
                                    <div class="pe-4">
                                        <h2 class="m-0 mt-3 pe-5">121</h2>
                                        <p>Anggota</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto shadow-sm p-0 mb-0 bg-white rounded-3">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="col-auto d-flex justify-content-start align-items-center pe-5">
                                <div class="col-auto ms-3">
                                    <img src="img/admin/book.png" alt="">
                                </div>
                                <div class="col-auto pe-5">
                                    <div class="pe-4">
                                        <h2 class="m-0 mt-3 pe-5">48</h2>
                                        <p>Jadwal Absen</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto shadow-sm p-0 mb-0 bg-white rounded-3">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="col-auto d-flex justify-content-start align-items-center pe-5">
                                <div class="col-auto ms-2">
                                    <img src="img/admin/chalkboard-user.png" alt="">
                                </div>
                                <div class="col-auto pe-5">
                                    <div class="pe-4" style="margin-right:1.1rem">
                                        <h2 class="m-0 mt-3 pe-5">4</h2>
                                        <p>Miniclass</p>
                                    </div>
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
