@extends('layouts.master')

@section('content')
    <div class="container-fluid pb-5 form-jadwal-absensi">
        <div class="row p-md-4 p-1">
            <div class="col-md-12">
                <div class="title d-flex align-items-center mb-2">
                    <a href="{{ route('meetings.index') }}" type="button"
                        class="text-muted text-decoration-none back rounded p-2 d-flex justify-content-center align-items-center me-3">
                        <span class=" fas fa-chevron-left "></span>
                    </a>
                    <h5>Post Meetings</h5>
                </div>
                <form class="update-jadwal form rounded p-5" action="{{ route('meetings.store') }}" method="POST">
                    @csrf
                    {{-- <h5 class="">Pertemuan {{ $meetings->pertemuan }}</h5> --}}
                    <div class="form-group mb-md-5 mb-4">
                        <label for="topik" class="form-label fs-6">Topik</label>
                        <input value="{{ old('topik') }}" type="text"
                            class="form-control @error('topik') is-invalid @enderror" placeholder="Input Your Text in here"
                            name="topik">
                        @error('topik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input value="{{ Auth::user()->miniclass_id }}" type="hidden" class="form-control"
                            name="miniclass_id">
                    </div>
                    <div class="form-group mb-md-5">
                        <div class="col-12 px-0">
                            <div class="row">
                                <div class="form-group mb-md-2 mb-1 col-lg-9 col-md-6 col-12">
                                    <label for="tanggal" class="form-label fs-6">Tanggal</label>
                                    <input value="{{ old('tanggal') }}" type="date" class="form-control"
                                        placeholder="YYYY/MM/DD" name="tanggal">
                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-md-2 mb-1 col-lg-3 col-md-6 col-12">
                                    <label for="pertemuan" class="form-label fs-6">Pertemuan</label>
                                    <input value="{{ old('pertemuan') }}" type="number" class="form-control"
                                        placeholder="Ke" name="pertemuan">
                                    @error('pertemuan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0">
                        <div class="row">
                            <div class="form-group mb-md-5 mb-4 col-lg-4 col-md-6 col-12">
                                <label for="start_time" class="form-label fs-6">Waktu Mulai</label>
                                <input value="{{ old('start_time') }}" type="time"
                                    class="@error('start_time') is-invalid @enderror form-control"
                                    placeholder="Input Your Text in here" name="start_time">
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-md-5 mb-4 col-lg-4 col-md-6 col-12">
                                <label for="end_time" class="form-label fs-6">Waktu Berakhir</label>
                                <input value="{{ old('end_time') }}" type="time"
                                    class="@error('end_time') is-invalid @enderror form-control"
                                    placeholder="Input Your Text in here" name="end_time">
                                @error('end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-md-5 mb-4 col-lg-4 col-md-12 col-12">
                                <label for="token" class="form-label fs-6">Token</label>
                                <input value="{{ old('token') }}" type="text"
                                    class="@error('token') is-invalid @enderror form-control"
                                    placeholder="Input Your Text in here" name="token">
                                <button type="button" class="btn btn-outline-secondary mt-2" id="generateToken"> <i
                                        class="fas fa-sync-alt"></i> Generate Token</button>
                                @error('token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end px-0">
                        <a href="{{ route('meetings.index') }}"
                            class="btn btn-outline-secondary px-md-5 px-2 me-4"><b>Batal</b></a>
                        <button type="submit" class="btn btn-warning text-light px-md-5 px-2"><b>Simpan</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('components.konfirmasi', ['text' => 'Apakah Anda yakin ingin memposting pertemuan?'])


@section('overrideScript')
    <script>
        const generateToken = document.getElementById('generateToken')
        generateToken.addEventListener('click', () => {
            const topik = document.querySelector('input[name="topik"]').value || 'topik'
            const token = Math.random().toString(36).substring(2, 8) + topik.substring(0, 3) + Math.random().toString(36).substring(2, 6);
            document.querySelector('input[name="token"]').value = token
        })
        controlBodyBackgroundColor()
        controlPasswordVisibility()
        controlConfirmationModal()

    </script>
@endsection
@endsection
