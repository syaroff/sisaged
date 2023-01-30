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
            <a class="navbar-brand ms-3 fw-bold fs-3" href="../index.php"><img src="../assets/img/logo/logo.png" width="200px"></a>
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
      <h3>Buat Reservasi</h3>
      <img src="../assets/img/line.png" width="180px" height="20px">
      <div class="row mt-4">
          <?php
            $hasil = $konek->query("SELECT * FROM gedung WHERE gedung_id = $_GET[i]");
            $row = mysqli_fetch_assoc($hasil);
            $hargaGedung=$row['harga'];
            $gedungID = $row['gedung_id'];
          ?>
          <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="card bg-white">
                                <img src="../admin/uploads/img/gedung/<?=$row['foto']?>" alt="">
                                <div class="card-body">
                                    <h5 class="text-primary"><?=$row['nama']?></h5>
                                    <h4 class="fw-bold">Rp. <?= number_format($row['harga'],0,',','.');?></h4>
                                    <p>Tersewa <?=$row['tersewa']?>x</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <?php
                                $no_rev = date("Ymd").rand(100,900);
                            ?>
                            <form action="../db/proses/pesan.php" method="post">
                                <input type="hidden" name="gedung_id" value="<?=$gedungID;?>">
                                <h4>No. Reservasi</h4>
                                <input type="text" name="id_transaksi" value="<?=$no_rev;?>" readonly class="form-control">
                                <h4 class="mt-3">Nama Penyewa</h4>
                                <input type="text" class="form-control" value="<?=$_SESSION['nama'];?>" disabled>
                                <input type="hidden" name="id_pengguna" value="<?=$_SESSION['user_id'];?>" class="form-control">
                                <h4 class="mt-3">Tanggal Mulai</h4>
                                <p>Sebelum memilih tanggal,pastikan di <a href="../jadwal.php">Jadwal kita</a></p>
                                <input type="date" name="tanggal_mulai" id="tanggalMulai" min="<?=date("Y-m-d");?>" class="form-control">
                                <h4 class="mt-3">Tanggal Selesai</h4>
                                <input type="date" name="tanggal_selesai" id="tanggalSelesai" min="<?=date("Y-m-d");?>" class="form-control">
                                <h4 class="mt-3">Metode Bayar</h4>
                                <select class="form-control" name="metode_id" id="metode_id">
                                    <?php 
                                        $metode=$konek->query("SELECT * FROM metode");
                                        while($row = mysqli_fetch_assoc($metode)) {
                                    ?>  
                                            <option value="<?=$row['metode_id']?>"><?=$row['nama_metode']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input type="hidden" name="harga" value="<?=$hargaGedung?>">
                                <input type="submit" name="deal" value="Buat Reservasi" class="btn btn-primary mt-4 col-10">
                                <a href="../?i=<?=$_GET['i']?>" class="btn btn-secondary mt-4">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#tanggalMulai").on("change", function () {
            let tanggal = $(this).val();
            $('#tanggalSelesai').attr('min',tanggal);

        });
    </script>
</body>
</html>