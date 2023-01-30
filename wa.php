<?php

    $no_hp_toko = "6285852477355";
    $nama_penyewa = $row['nama'];
    $no_reservasi = $row['id_transaksi'];
    $gedung = $row['nama_gedung'];
    $total = $row['total'];
    $pesan = "
        Saya%20".$nama_penyewa." memberitahukan bahwa saya sudah membayar 50% Uang Muka Reservasi".$gedung." yang saya pesan seharga $total dengan Nomor Reservasi $no_reservasi  berikutnya akan saya kirimkan bukti transfernya.
    ";
?>
    <a href="http://wa.me/<?=$no_hp_toko?>/?text=<?=$pesan;?>" class="btn btn-success col-10 mt-4">Hubungi Whatsapp</a>