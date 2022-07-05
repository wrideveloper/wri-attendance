<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="position-fixed vh-100 vw-100 d-flex flex-column justify-content-between" style="background-color: #F7B217; z-index: -1;">
        <div>
            <div class="d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="position-fixed"  style="width: 50%;">
                            <img src="{{ asset('svg/Circle 6.svg') }}">
                        </div>
                        <div class="position-fixed">
                            <img src="{{ asset('svg/Line 10 (Stroke).svg') }}" alt="">
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('svg/Circle 7.svg') }}">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <div>

                </div>
                <div>
                    <img src="{{ asset('svg/Circle 8.svg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="mb-5 d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div id="desainBawah" class="position-fixed" style="width: 10px;">
                                <img id="ml_left"  src="{{ asset('svg/titik estetik.svg') }}">
                            </div>
                            <div class="position-fixed">
                                <img id="circle3" src="{{ asset('svg/Circle 3.svg') }}" alt="">
                            </div>
                        </div>
                        <div>
                            <img id="circle1" style="margin-bottom: -50px;" src="{{ asset('svg/Circle 1.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center vh-100 vw-100">
        <div class="rounded-4" style="padding: 6rem; background-color: #FFFFFF;">
            <div class="container">
                <div class="row d-flex justify-content-center ">
                    <img style="width: 50%;" src="{{ asset('img/image 1.png') }}" alt="">
                </div>
                <div class="row mt-3">
                    <h5>
                        Sistem Absensi WRI
                    </h5>
                </div>
                <div class="row mt-3">
                    <input type="text" class="form-control p-2" id="username" placeholder="Username" style="border-color: #F7B217; border-width: 2px; ">
                </div>
                <div class="row mt-3">
                    <input type="password" class="form-control p-2" id="password" placeholder="Password" style="border-color: #F7B217; border-width: 2px;">
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
