<?php
  session_start();
  require_once "../db/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>SISAGED - SEWA GDEUNG MUDAH & MURAH</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white ">
        <div class="container container-fluid">
            <a class="navbar-brand ms-3 fw-bold fs-3" href="../"><img src="../assets/img/logo/logo.png" width="200px"></a>
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 text-center">
                <?php
                
                  if(isset($_SESSION['level'])) {
                    if($_SESSION['level'] < 3) {    
                ?>
                    <li class="nav-item btn btn-primary rounded-pill ms-2 ">
                        <a class="nav-link fs-6 text-light " aria-current="page" href="comingsoon.php">Pesanan Saya</a>
                    </li>
                    <li class="nav-item btn btn-outline-primary rounded-pill ms-2 ">
                        <a class="nav-link fs-6 " aria-current="page" href="../logout.php">Log Out</a>
                    </li>
                <?php    
                    }
                  }
                  else {
                ?>
                    
                    <li class="nav-item btn btn-outline-primary rounded-pill">
                        <a class="nav-link active fs-6 " aria-current="page" href="../login.php">Masuk</a>
                    </li>
                    <li class="nav-item btn btn-primary rounded-pill ms-2 ">
                        <a class="nav-link fs-6 text-light " aria-current="page" href="../regis.php">Daftar</a>
                    </li>
                <?php
                  }
                
                ?>
            </ul>
        </div>
    </nav>
    <div class="container container-fluid mt-5 mb-5">
      <h3>Detail Gedung</h3>
      <img src="../assets/img/line.png" width="180px" height="20px">
      <div class="row mt-4">
          <?php
            $hasil = $konek->query("SELECT * FROM gedung WHERE gedung_id = $_GET[i]");
            $row = mysqli_fetch_assoc($hasil);
          ?>
          <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-xs-12">
                            <img src="../admin/uploads/img/gedung/<?=$row['foto']?>" alt="">
                        </div>
                        <div class="col-6 col-xs-12 mt-5 text-start">
                            <h5>Nama Gedung</h5>
                            <p><?=$row['nama']?></p>
                            <h5>Harga</h5>
                            <p>Rp. <?=number_format($row['harga'],0,',','.');?></p>
                            <h3>Deskripsi</h3>
                            <textarea name="" id="" cols="10" disabled rows="10" class="form-control"><?=$row['deskripsi']?></textarea>
                            <?php
                                if(isset($_SESSION['level'])) {
                                    if($_SESSION['level'] < 3) {
                            ?>
                                        <a href="./pesan.php?i=<?= $row['gedung_id'];?>" class="btn btn-primary mt-2">Buat Reservasi</a>
                            <?php
                                    }
                                    else if($_SESSION['level'] >=3) {
                            ?>
                                        <button class="btn btn-primary" disabled></button>
                            <?php
                                    }
                                }
                                else  {
                            ?>
                                    <a href="../login.php?i=<?= $row['gedung_id'];?>" class="btn btn-primary mt-2">Buat Reservasi</a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>