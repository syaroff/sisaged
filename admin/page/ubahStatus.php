<?php 

        $select = $konek->query("SELECT * FROM vwTransaksi WHERE id_transaksi = '$_GET[i]'");
        $row = mysqli_fetch_assoc($select);

?>
<div class="col-12 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header mb-0">
            <h3>Tambah Gedung Baru</h3>
        </div>
        <div class="card-body">
            <form action="./transaksi.php" method="POST">
                <div class="row">
                    <div class="col-2">
                        <h4>Gedung</h4>
                        <input type="hidden" value="<?=$row['id_transaksi']?>" name="id_transaksi">
                        <input type="text"  value="<?=$row['nama_gedung']?>"  class="form-control" readonly required>
                    </div>
                    <div class="col-2">
                        <h4>Penyewa</h4>
                        <input type="tel" name="harga" value="<?=$row['nama']?>" placeholder="Harga Gedung" class="form-control" readonly required>
                    </div>
                    <div class="col-2">
                        <h4>No. HP</h4>
                        <input type="text"  value="<?=$row['no_hp']?>" class="form-control" readonly required>
                    </div>
                    <div class="col-2">
                        <h4>Tanggal Mulai</h4>
                        <input type="text"  value="<?=$row['tanggal_mulai']?>" class="form-control" readonly required>
                    </div>
                    <div class="col-2">
                        <h4>Tanggal Selesai</h4>
                        <input type="text"  value="<?=$row['tanggal_selesai']?>" class="form-control" readonly required>
                    </div>
                    <div class="col-2">
                        <h4>Tanggal Pesan</h4>
                        <input type="text" value="<?=$row['date_created']?>" class="form-control" readonly required>
                    </div>
                    <div class="col-4">
                        <h4>Total Harga</h4>
                        <input type="text" name="total"  value="<?=$row['total']?>" class="form-control" readonly required>
                    </div>
                    <div class="col-4">
                        <h4>Metode Bayar</h4>
                        <input type="text"  value="<?=$row['nama_metode']?>" class="form-control" readonly required>
                    </div>
                    <div class="col-4">
                        <h4>Status</h4>
                        <select name="status" id="status" class="form-control">
                            <option value="3">Belum Bayar</option>
                            <option value="2">DP</option>
                            <option value="1">Lunas</option>
                        </select>
                    </div>
            
                </div>
                <input type="submit" name="edit" value="Update" class="btn btn-primary mt-2 w-25">
            </form>
        </div>
    </div>
</div>