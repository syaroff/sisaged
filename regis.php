<?php
  session_start();
  if(isset($_SESSION['level']) != 0) {
    header("./");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">    <link rel="stylesheet" href="./assets/css/main.css">
    <title>SISAGED - SEWA GDEUNG MUDAH & MURAH</title>
</head>
<body class="bg-primary">

    <div class="container container-fluid">
        <div class="col-4 text-center mx-auto mt-5">
            <div class="card rounded-3">
                <div class="card-body p-5">
                    <img src="./assets/img/logo/logo.png" width="250px">
                    <h3 class="mt-4">Daftar</h3>
                    <form action="./db/regis.php" method="post">
                    <div class="input-group mt-4">
                        <span class="input-group-text"><i class="las la-user"></i></span>
                        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required class="form-control" style="box-shadow: none;">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="las la-phone"></i></span>
                        <input type="tel" name="no_hp" id="no_hp" placeholder="No. Telepon (WA)" class="form-control" style="box-shadow: none;">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="las la-envelope"></i></span>
                        <input type="text" name="email" id="email" placeholder="Email" required class="form-control" style="box-shadow: none;">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="las la-street-view"></i></span>
                       <textarea name="alamat" id="alamat" cols="10" rows="1" placeholder="Alamat" class="form-control" style="box-shadow: none;"></textarea>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="las la-lock"></i></span>
                        <input type="password" name="password" id="password" placeholder="Password" required class="form-control" style="box-shadow: none;">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="las la-lock"></i></span>
                        <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required class="form-control" style="box-shadow: none;">
                    </div>
                    <div class="mt-5">
                        <input type="submit" value="Daftar" name="daftar" class="btn btn-primary w-100">
                        <a href="login.php" class="btn btn-outline-primary w-100 mt-2">Sudah Punya Akun</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>