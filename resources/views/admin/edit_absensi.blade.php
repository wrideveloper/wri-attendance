<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absensi User</title>
    <!--css-->
    <link rel="stylesheet" href="../../../public/css/edit_absensi.css">
    <!--ccs bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--js bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!--font roboto-->
    <link rel="stylesheet" href="https://https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&display=swap">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body style="background-color:#F8F8F8;">
    <div class="position-absolute h-100 d-flex align-items-center px-5">
        sidebar
    </div>
    <div class="container p-5">
        <div class="row align-items-center" id="atas">
          <div class="col-1" id="bgback">
            <a href="" id="back"><i class="fa-solid fa-angle-left"></i></a>
          </div>
          <div class="col-2 col-sm-3" style="width: auto;">
            <p id="pertemuan">Pertemuan 1</p>
          </div>
          <div class="col-1" style="width: auto;">
            <img src="../../../public/img/Ellipse 30.png"/>
          </div>
          <div class="col" style="width: auto;">
            <p id="nama">Muhamad Alif Rizki</p>
          </div>
        </div>
    <div class="container p-5" id="content">
      <h1 id="nama">Muhamad Alif Rizki</h1>
      <img src="../../../public/img/Line 28.png" id="line"/>
        <div class="row justify-content-between">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <h5>DATA ANGGOTA</h5>
            <div class="row justify-content-start">
              <div class="col-6 col-sm-6 col-md-5">
                <p>Miniclass</p>
                <p>Angkatan</p>
                <p>Email</p>
                <p>Nomor HP</p>
                <p>NIM</p>
              </div>
              <div class="col-6 col-sm-6 col-md-7" id="isidataanggota">
                <p id="Miniclass">UI UX</p>
                <p id="Angkatan">9</p>
                <p id="Email">fantasiavsr@gmail.com</p>
                <p id="NomorHP">+62 813-5799-5175</p>
                <p id="NIM">2041720196</p>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6">
            <h5>DATA ABSEN</h5>
            <form>
            <div class="row justify-content-start">
              <div class="col-6 col-sm-6 col-md-5">
                <p>Waktu Absen</p>
                <p>Status</p>
                <p>Keterangan</p>
                <p>Feedback</p>
              </div>
              <div class="col-6 col-sm-6 col-md-7" id="isiabsen">
                <p id="WaktuAbsen">UI UX</p>
                <select class="form-select" aria-label="Default select example" id="status">
                  <option selected disabled id="pilih">Pilih</option>
                  <option value="1" id="hadir">Hadir</option>
                  <option value="2" id="izin">Izin</option>
                  <option value="3" id="sakit">Sakit</option>
                </select>
                <p id="Keterangan">-</p>
                <p id="Feedback">Miniclass hari ini cukup menyenangkan dan sangat membantu saya dalam belajar</p>
              </div>
              <div class="row justify-content-end">
                <a href="" type="button" class="btn btn-light" id="backbutton">Back</a>
                <button type="button" class="btn btn-warning" id="updatebutton">Update</button>
              </div>
            </div>
          </form>
          </div>
        </div>
    </div>
</body>
</html>