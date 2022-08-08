@extends('layouts.master')
@section('content')
    <div class="container-fluid pb-5 px-4">
    <div class="container-fluid text-center" style="padding-right: 0px;padding-left: 0px;">
            <div class="row align-items-center" id="atas">
                <div class="col-1" >
                    <div class="container" id="bgback" style="padding-right: 18px;">
                    <a href="{{ (Route::currentRouteName() == 'meetings.show') ? route('meetings.index', $presence->meetings->token) : route('presence.index') }}" id="back"><i class="fa-solid fa-angle-left"></i></a>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3" style="width: auto;">
                    <p id="pertemuan">Pertemuan {{ $presence->meetings->pertemuan }}</p>
                </div>
                <div class="col-1" style="width: auto;">
                    <img src="{{ asset('img/Ellipse 30.png') }}" />
                </div>
                <div class="col-5 col-sm-5 col-md-5 col-lg-4 col-xl-4" style="padding-left: 0px;padding-right: 0px;padding-top:10px;">
                    <p id="nama">{{ $presence->user->name }}</p>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5" id="content">
            <h1 id="nama">{{ $presence->user->name }}</h1>
            <img src="{{ asset('img/Line 28.png') }}" id="line" />
            <div class="row justify-content-between">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h5>DATA ANGGOTA</h5>
                    <div class="row justify-content-start" style="margin-bottom: 47px;">
                        <div class="col-6 col-sm-6 col-md-5">
                            <p>Miniclass</p>
                            <p>Angkatan</p>
                            <p>Email</p>
                            <p>Nomor HP</p>
                            <p>NIM</p>
                        </div>
                        <div class="col-6 col-sm-6 col-md-7" id="isidataanggota">
                            <p id="Miniclass">{{ $presence->user->miniclass->miniclass_name }}</p>
                            <p id="Angkatan">{{ $presence->user->generations->crew_name }}</p>
                            <p id="Email">{{ $presence->user->email }}</p>
                            <p id="NomorHP">{{ $presence->user->phone }}</p>
                            <p id="NIM">{{ $presence->user->nim }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h5>DATA ABSEN</h5>
                    <form method="POST" action="{{ route('presence.update', $presence->nim) }}">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-start">
                            <div class="col-6 col-sm-6 col-md-5">
                                <p>Waktu Absen</p>
                                <p>Status</p>
                                @if ($presence->status != 'Hadir')
                                    <p>Keterangan</p>
                                @else
                                    <p>Feedback</p>
                                @endif
                                <p>Topik</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-7" id="isiabsen">
                                <p id="WaktuAbsen">{{ $presence->created_at->format('H:i:s') }} WIB</p>
                                <select {{ (Route::currentRouteName() == 'detail-presence') ? '' : 'disabled' }} class="form-select" aria-label="Default select example" id="status">
                                    <option value="Hadir" id="hadir">Hadir</option>
                                    <option value="Izin" id="izin">Izin</option>
                                    <option value="Sakit" id="sakit">Sakit</option>
                                    <option value="Alpha" id="alpha">Alpha</option>
                                </select>
                                @if ($presence->status != 'Hadir')
                                    <p id="Keterangan">{{ $presence->ket }}</p>
                                @else
                                    <p id="Feedback">{{ $presence->feedback }}</p>
                                @endif
                                <p>{{ $presence->meetings->topik }}</p>
                            </div>
                            <div class="row justify-content-end">
                                <a href="{{ (Route::currentRouteName() == 'meetings.show') ? route('meetings.index', $presence->meetings->token) : route('presence.index') }}" type="button" class="btn btn-light" id="backbutton">Back</a>
                                @if (Route::currentRouteName() == 'detail-presence')
                                    <button type="submit" class="btn btn-warning" id="updatebutton">Update</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
