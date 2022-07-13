@extends('layouts.master')

@section('content')
<div id="loginBackground" class="position-fixed vh-100 vw-100 d-flex flex-column justify-content-between">
        <div>
            <div class="d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="position-fixed"  style="width: 50%;">
                            <img src="../../../public/svg/Circle 6.svg">
                        </div>
                         <div class="position-fixed">
                            <img src="../../../public/svg/Line 10 (Stroke).svg" alt="">
                        </div>
                    </div>
                    <div>
                        <img src="../../../public/svg/Circle 7.svg">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <div>

                </div>
                <div>
                    <img src="../../../public/svg/Circle 8.svg" alt="">
                </div>
            </div>
        </div>
        <div class="mb-5 d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div id="desainBawah" class="position-fixed" style="width: 10px;">
                                <img id="ml_left"  src="../../../public/svg/titik estetik.svg">
                            </div>
                            <div class="position-fixed">
                                <img id="circle3" src="../../../public/svg/Circle 3.svg" alt="">
                            </div>
                        </div>
                        <div>
                            <img id="circle1" style="margin-bottom: -50px;" src="../../../public/svg/Circle 1.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@yield('content')
@endsection
