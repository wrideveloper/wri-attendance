@extends('layouts.master')
@section('title')
    Sistem Absensi WRI
@endsection

@section('content')
    <div class="container-fluid pb-5 px-4">
        @if(session()->has('PresenceError'))
            <div class="alert alert-danger alert-dismissible col-lg-12 fade show" role="alert">
                {{ session('PresenceError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @php
            $dates = Carbon\Carbon::now()->format('d M Y');
        @endphp
        <h1 class="h3 mb-4">Presensi Miniclass {{ $meetings->miniclass->miniclass_name }} - Pertemuan {{ $meetings->pertemuan }}</h1>
        <p class="mb-2"><strong>Tanggal</strong> : {{ $dates }}</p>
        <p class="mb-3"><strong>Topik</strong> : {{ $meetings->topik }}</p>
        <form method="POST" action="{{ route('presence.store') }}">
            @csrf
            <input type="hidden" id="topik" name="topik" value="{{ $meetings->topik }}">
            <input type="hidden" id="nim" name="nim" value="">
            <input type="hidden" id="meetings_id" name="meetings_id" value="">
            <input type="hidden" id="presence_date" name="presence_date" value="">
            <div class="card card-rounded">
                <h1 class="h5">Status</h1>
                <div class="row justify-content-between text-md-center align-items-center">
                    <div class="col-md-4 py-3">
                        <input type="radio" name="status" id="hadir" value="Hadir" onclick="showPresent();">
                        <label for="hadir" class="color-success-bold"> <i class="fa-solid fa-user-check mx-3"></i>
                            <span>Hadir</span></label>
                    </div>
                    <div class="col-md-4 py-3">
                        <input type="radio" name="status" id="izin" value="Izin" onclick="showPermit();">
                        <label for="izin" class="color-info-bold"><i class="fa-solid fa-envelope-open-text mx-3"></i>
                            <span>Izin</span></label>
                    </div>
                    <div class="col-md-4 py-3">
                        <input type="radio" name="status" id="sakit" value="Sakit" onclick="showSick();">
                        <label for="sakit" class="color-warning-bold"><i class="fa-solid fa-briefcase-medical mx-3"></i>
                            <span>Sakit</span></label>
                    </div>
                </div>
            </div>
            <div id="present"></div>
            <div id="permit"></div>
            <div id="sick"></div>
        </form>
    </div>
@endsection

@section('overrideScript')
    <script src="{{ asset('js/showing-input.js') }}"></script>
@endsection
