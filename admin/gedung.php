<?php

    require_once "../db/koneksi.php";

    if($_GET['proses'] == 'tambah') {
            $file_foto = $_FILES['foto_gedung'];
            $tempName = explode(".", $_FILES["name"]);
            $new_file_foto_name = round(microtime(true)) . '.jpg';
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $upOk = 1;

            if(!isset($file_foto)) {
                header("Location: ./?page=gedung&err=30");
            }
            else {
                move_uploaded_file(

                    $file_foto["tmp_name"],
                
                    __DIR__ . "/uploads/img/gedung/" . $new_file_foto_name
                );
                $insert = $konek->query("INSERT INTO gedung (nama,harga,foto,deskripsi) VALUES ('$nama','$harga','$new_file_foto_name','$deskripsi')");
                
                if($insert) {
                    header("Location: ./?page=gedung&err=200");
                }
            }
            
    }
    else if ($_GET['proses'] == 'delete') {
        $hapus = $konek->query("DELETE FROM gedung WHERE gedung_id = '$_GET[id]'");
        $alter = $konek->query("ALTER TABLE gedung AUTO_INCREMENT =1");
        
        if($hapus) {
            header("Location: ./?page=gedung&err=201");
        }
    }
    else if ($_GET['proses'] == 'edit') {
        $id_gedung = $_POST['id_gedung'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $foto = $_POST['foto'];
        $deskripsi = $_POST['deskripsi'];

        $update = $konek->query("UPDATE gedung SET nama='$nama',foto='$foto',harga='$harga',deskripsi='$deskripsi' WHERE gedung_id='$id_gedung'");

        if($update) {
            header("Location: ./?page=gedung&err=200");
        }
    }
?>