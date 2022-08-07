<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ini judul kan?</title>
</head>
<body>
    <h2>Halo, {{ $name }} 👋</h2>
    <p>Ini email pertama yang diberikan dari wri-attendance</p><br>
    <p>Token = {{ $token }}</p>
    <a href={{ "http://wri-absensi.com/forgot-password/".$token }}>Klik ini untuk reset password Anda</a>
</body>
</html>