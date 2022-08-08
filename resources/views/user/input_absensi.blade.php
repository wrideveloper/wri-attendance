@extends('layouts.master')
@section('title')
    Sistem Absensi WRI
@endsection

@section('content')
    <div class="container-fluid pb-5 px-4">
        <h1 class="h5 mb-4">Presensi - Miniclass - Pertemuan ke</h1>
        <p class="h5 mb-4">Topik - </p>
        <form action="{{ route('presence.store') }}" method="POST">
            @csrf
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
