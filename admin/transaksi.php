<?php

    require_once "../db/koneksi.php";

    if(isset($_POST['edit'])) {
        $update = $konek->query("UPDATE transaksi SET status_transaksi = $_POST[status] WHERE id_transaksi = $_POST[id_transaksi]");

        $now = date("Y-m-d");

        if($_POST['status'] ==1) {
            $insert = $konek->query("INSERT INTO laporan (tanggal,total) VALUES ('$now',$_POST[total])");
        }
        if($update) {
            
            header("Location: ./?page=transaksi&err=200");
        }
    }
?>