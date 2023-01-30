<?php

    require_once "../koneksi.php";

    if(isset($_POST['deal'])) {
        $date1 = new DateTime("2007-03-24");
        $date2 = new DateTime("2009-06-26");
        $lama = $date1->diff($date2);
        $hargaTotal = $_POST['harga'] * $lama->d;
        $date_created = date("Y-m-d") ;

        $insert = $konek->query("INSERT INTO transaksi (id_transaksi,id_pengguna,tanggal_mulai,gedung_id,metode_id,total,tanggal_selesai,date_created,status_transaksi) VALUES ($_POST[id_transaksi],$_POST[id_pengguna],'$_POST[tanggal_mulai]','$_POST[gedung_id]',$_POST[metode_id],$hargaTotal,'$_POST[tanggal_selesai]','$date_created',3)");


        if($insert) {
            header("Location: ../../detail/detailTransaksi.php?i=$_POST[id_transaksi]");
        }

    }

?>