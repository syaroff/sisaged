<?php

    require_once "./koneksi.php";

    if(isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $password = md5($_POST['password']);

        $insert = $konek->query("INSERT INTO pengguna (nama,no_hp,email,alamat,sandi,level) VALUE ('$nama','$no_hp','$email','$alamat','$password',1)");
        
        if($insert) {
            header("Location: ../login.php?err=200");
        }
    }


?>