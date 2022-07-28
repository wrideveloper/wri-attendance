@extends('layouts.master')

@section('content')
    @include('components.konfirmasi', ['text' => 'Apakah Anda yakin ingin memperbarui jadwal?'])
    <div class="container-fluid pb-5">
        <div class="row p-4">
            <div class="col-md-12">
                <div class="title d-flex align-items-center mb-2">
                    <div class="back rounded p-2 d-flex justify-content-center align-items-center me-5"
                        style="width: 46px; height: 46px; background-color: white">
                        <i class="fas fa-chevron-left text-muted"></i>
                    </div>
                    <h5>Pertemuan ke {{ $meetings->pertemuan }} - Miniclass {{ $meetings->miniclass->miniclass_name }}</h5>
                </div>
                <form class="update-jadwal form rounded p-5" style="background-color: white">
                    <h5 class="">Pertemuan 1</h5>
                    <div class="form-group mb-5">
                        <label for="topik" class="form-label fs-6">Topik</label>
                        <input value="{{ $meetings->topik }}" type="text" class="form-control" placeholder="Input Your Text in here" name="topik">
                    </div>
                    <div class="form-group mb-5">
                        <label for="tanggal" class="form-label fs-6">Tanggal</label>
                        <input type="date" value="{{ $meetings->tanggal }}" class="form-control" placeholder="YYYY/MM/DD" name="tanggal">
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="form-group mb-5 col-4">
                                <label for="waktumulai" class="form-label fs-6">Waktu Mulai</label>
                                <input type="time" value="{{ $meetings->start_time }}" class="form-control" placeholder="Input Your Text in here"
                                    name="waktumulai">
                            </div>
                            <div class="form-group mb-5 col-4">
                                <label for="waktuberakhir" class="form-label fs-6">Waktu Berakhir</label>
                                <input type="time" value="{{ $meetings->end_time }}" class="form-control" placeholder="Input Your Text in here"
                                    name="waktuberakhir">
                            </div>
                            <div class="form-group mb-5 col-4">
                                <label for="token" class="form-label fs-6">Token</label>
                                <input type="text" value="{{ $meetings->token }}" class="form-control" placeholder="Input Your Text in here"
                                    name="token">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-md-end justify-content-between px-0">
                    <button class="btn btn-outline-secondary px-md-5 px-2 me-4"><b>Batal</b></button>
                    <button class="btn btn-warning text-light px-md-5 px-2"><b>Update</b></button>
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
