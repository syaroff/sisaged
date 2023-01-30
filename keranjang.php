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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
      <div class="row mt-4">
          <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="tableJadwal" class="table table-bordered table-striped display text-center">
                            <thead>
                                <th>Gedung</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    $select = $konek->query("SELECT * FROM vwTransaksi WHERE id_pengguna = $_SESSION[user_id]");

                                    while ($row = mysqli_fetch_assoc($select)) {
                                ?>
                                        <tr>
                                            <td><?=$row['nama_gedung']?></td>
                                            <td><?=$row['tanggal_mulai']?></td>
                                            <td><?=$row['tanggal_selesai']?></td>
                                            <td>
                                                <?php
                                                    if($row['status_transaksi'] ==2) {
                                                ?>  
                                                        <span class="badge bg-danger">DP</span>
                                                <?php
                                                    } 
                                                    else if($row['status_transaksi']==1) {
                                                ?>
                                                        <span class="badge bg-success">Lunas</span>
                                                <?php
                                                    }   
                                                ?>
                                            </td>
                                            <td>
                                                <a href="detail/detailTransaksi.php?i=<?=$row['id_transaksi']?>" class="btn btn-primary">Detail Transaksi</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
      <script>
        $(document).ready( function () {
            $('#tableJadwal').DataTable( {
            'autowidth' : true,
            'lengthChange' : true,
            });
        } );
      </script>
</body>
</html>