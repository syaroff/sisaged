<?php
  session_start();
  require_once "./db/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>SISAGED - SEWA GDEUNG MUDAH & MURAH</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white ">
        <div class="container container-fluid">
            <a class="navbar-brand ms-3 fw-bold fs-3" href="./"><img src="./assets/img/logo/logo.png" width="200px"></a>
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 text-center">
                <?php
                
                  if(isset($_SESSION['level'])) {
                    if($_SESSION['level'] < 3) {    
                ?>
                    <li class="nav-item btn btn-primary rounded-pill ms-2 ">
                        <a class="nav-link fs-6 text-light " aria-current="page" href="keranjang.php">Pesanan Saya</a>
                    </li>
                    <li class="nav-item btn btn-outline-primary rounded-pill ms-2 ">
                        <a class="nav-link fs-6 " aria-current="page" href="logout.php">Log Out</a>
                    </li>
                <?php    
                    }
                  }
                  else {
                ?>
                    
                    <li class="nav-item btn btn-outline-primary rounded-pill">
                        <a class="nav-link active fs-6 " aria-current="page" href="login.php">Masuk</a>
                    </li>
                    <li class="nav-item btn btn-primary rounded-pill ms-2 ">
                        <a class="nav-link fs-6 text-light " aria-current="page" href="regis.php">Daftar</a>
                    </li>
                <?php
                  }
                
                ?>
            </ul>
        </div>
    </nav>
    <div class="container container-fluid mt-5 mb-5">
      <h3>Pilihan Gedung & Aula Kami</h3>
      <img src="./assets/img/line.png" width="180px" height="20px">
      <br>
      <a href="./jadwal.php" class="btn btn-primary rounded-pill mt-3">Lihat Jadwal</a>
      <div class="row mt-4">
          <?php
            $hasil = $konek->query("SELECT * FROM gedung");
            while($row=mysqli_fetch_assoc($hasil)) {
          ?>

            <div class="col-6 col-md-3">
              <div class="card bg-white">
                  <img src="./admin/uploads/img/gedung/<?=$row['foto']?>" alt="">
                  <div class="card-body">
                      <h5 class="text-primary"><?=$row['nama']?></h5>
                      <h4 class="fw-bold">Rp. <?= number_format($row['harga'],0,',','.');?></h4>
                      <p>Tersewa <?=$row['tersewa']?>x</p>
                      <a href="./detail/?i=<?=$row['gedung_id'] ?>" class="btn btn-primary mt-2 w-100">Lihat Detail</a>
                  </div>
              </div>
            </div>

          <?php
            }
          ?>
      </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>