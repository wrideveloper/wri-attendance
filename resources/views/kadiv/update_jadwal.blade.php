@extends('layouts.master')

@section('content')
<div class="position-absolute h-100 d-flex align-items-center px-5">
    Sidebar
</div>
@include('components.konfirmasi', ['text' => "Apakah Anda yakin ingin memperbarui jadwal?"])
<div class="container-fluid" style="min-height: 1vh; padding-left:149px; padding-top:20px">
    <div class="row p-3">
        <div class="col-md-12">
            <div class="title d-flex align-items-center mb-2">
                <div class="back rounded p-2 d-flex justify-content-center align-items-center me-5" style="width: 46px; height: 46px; background-color: white">
                    <i class="fas fa-chevron-left text-muted"></i>
                </div>
                <h5>Pertemuan 1</h5>
            </div>
            <form class="update-jadwal form rounded p-5" style="background-color: white">
                <h5 class="">Pertemuan 1</h5>
                <div class="form-group mb-5">
                    <label for="topik" class="form-label fs-6">Topik</label>
                    <input type="text" class="form-control" placeholder="Input Your Text in here" name="topik">
                </div>
                <div class="form-group mb-5">
                    <label for="tanggal" class="form-label fs-6">Tanggal</label>
                    <input type="date" class="form-control" placeholder="YYYY/MM/DD" name="tanggal">
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="form-group mb-5 col-4">
                            <label for="waktumulai" class="form-label fs-6">Waktu Mulai</label>
                            <input type="text" class="form-control" placeholder="Input Your Text in here" name="waktumulai">
                        </div>
                        <div class="form-group mb-5 col-4">
                            <label for="waktuberakhir" class="form-label fs-6">Waktu Berakhir</label>
                            <input type="text" class="form-control" placeholder="Input Your Text in here" name="waktuberakhir">
                        </div>
                        <div class="form-group mb-5 col-4">
                            <label for="token" class="form-label fs-6">Token</label>
                            <input type="text" class="form-control" placeholder="Input Your Text in here" name="token">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-outline-secondary px-5 me-4">Batal</button>
                    <button class="btn btn-warning text-light px-5">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('overrideScript')
<script>
    controlBodyBackgroundColor()
    controlPasswordVisibility()
    controlConfirmationModal()
</script>
@endsection

@endsection