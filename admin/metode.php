<?php

    require_once "../db/koneksi.php";

    if($_GET['proses'] == 'tambah') {
            $insert = $konek->query("INSERT INTO metode (nama_metode,no_rekening) VALUES ('$_POST[nama]','$_POST[no_rek]')");
            if($insert) {
                header("Location: ./?page=metode&err=200");
            }
            else {
                header("Location: ./?page=metode&err=1");
            }
    }
    else if ($_GET['proses'] == 'delete') {
        $hapus = $konek->query("DELETE FROM metode WHERE metode_id = '$_GET[id]'");
        $alter = $konek->query("ALTER TABLE metode AUTO_INCREMENT =1");
        
        if($hapus) {
            header("Location: ./?page=metode&err=201");
        }
    }
    else if ($_GET['proses'] == 'edit') {
        $update = $konek->query("UPDATE metode SET nama_metode='$_POST[nama]',no_rekening='$_POST[no_rek]' WHERE metode_id=$_POST[metode_id]");
        if($update) {
            header("Location: ./?page=metode&err=200");
        }
    }
?>