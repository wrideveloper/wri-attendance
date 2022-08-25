<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        .shadow-cs {
            box-shadow: 0rem 0.6rem 1rem 0.1rem rgba(0, 0, 0, 0.04);
        }

        .mt-min-30 {
            margin-top: -30px !important;
        }

        .bg-cs-navy {
            background-color: #201e3d;
        }

        .bg-cs-gray {
            background-color: #f9f9f9;
        }

        .bg-cs-white {
            background-color: white;
        }

        .btn-cs-navy {
            background-color: #201e3d;
            color: white !important;
            padding: 10px 25px;
            border-radius: 30px;
            border: 0;
        }

        .btn-cs-navy:hover {
            background-color: #f7b217 !important;
            color: #201e3d !important;
        }

        .btn {
            transition: 0.2s;
        }

        .py-5 {
            padding: 50px 0;
        }

        .text-center {
            text-align: center;
        }

        .card>.text-white {
            color: white;
        }

        .footer>.text-white {
            color: white;
        }

        .card {
            width: 70%;
        }

        .row {
            display: flex;
            flex-direction: column;
        }

        .col-md-8 {
            width: 80%;
        }

        .justify-content-center {
            justify-content: center;
            margin-right: auto;
            margin-left: auto;
        }

        .p-4 {
            padding: 40px;
        }

        .radius-1 {
            border-radius: 10px;
        }

        .mt-5 {
            margin-top: 50px;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .pt-3 {
            padding-top: 30px;
        }

        .py-3 {
            padding: 30px 0;
        }

        .py-4 {
            padding: 40px 0;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .text-decoration-none {
            text-decoration: none !important;
        }

        .pb-2 {
            padding-bottom: 20px;
        }

        .text-link {
            color: #f7b217 !important;
            font-weight: 600;
        }

        .text-link:hover {
            transition: 0.2s;
            color: #f9f9f9 !important;
        }

        p {
            font-size: 14px;
        }

        .box {
            padding-bottom: 80px;
        }

        .h3 {
            font-size: 24px;
        }

        .header {
            width: 70%;
        }

        .footer {
            width: 70%;
        }

        @media (max-width: 600px) {
            .card {
                width: 95%;
            }

            .header {
                width: 100%;
            }

            .footer {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-cs-gray">
        <div class="d-flex justify-content-center ">
            <div class="header py-5 text-center bg-cs-navy mx-auto">
                {{-- <a href='http://wri.polinema.ac.id/' target='_blank'><img
                        src='https://i.postimg.cc/9D3T0GfF/wri-logo-white.png' border='0' alt='wri-logo-white'
                        class="" /></a> --}}
                <a class="text-decoration-none text-link mt-min-30 h3" href='http://wri.polinema.ac.id/'
                    target='_blank'>Workshop Riset Informatika</a>
            </div>
            <div class="card border-0 mt-5 bg-cs-white radius-1 mx-auto shadow-cs">
                <div class="p-4 p-md-5 text-center">
                    <h1 class="h3">Hai {{ $name }} 👋</h1>
                    <p class="pt-3">Kata sandi kamu dapat diatur ulang dengan mengklik tombol atau memasukkan
                        token di bawah ini ya... Jika kamu tidak meminta kata sandi baru, kamu bisa abaikan saja
                        email ini.
                    </p>
                    <p class="fw-semibold py-3">
                        token: <br> {{ $token }}
                    </p>

                    <a href="{{ 'http://wri-attendance.test/reset-password/' . $token }}"
                        class="btn btn-cs-navy fw-semibold text-decoration-none">Reset Password</a>
                </div>
            </div>
            <div class="footer border-0 bg-cs-navy mt-5 mx-auto">
                <div class="py-4 text-center text-white">
                    <h2 class="pb-2">Butuh Bantuan?</h2>
                    <p>hubungi email kami di <a href="mailto:attendance.wri@gmail.com"
                            class="text-decoration-none text-link">attendance.wri@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
