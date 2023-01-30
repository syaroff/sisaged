<?php 

        include "../db/koneksi.php";
        $select = $konek->query("SELECT * FROM gedung WHERE gedung_id = '$_GET[id]'");
        $row = mysqli_fetch_assoc($select);

?>
<div class="col-12 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header mb-0">
            <h3>Tambah Gedung Baru</h3>
        </div>
        <div class="card-body">
            <form action="./gedung.php?proses=edit" method="POST">
                <div class="row">
                    <div class="col-4">
                        <input type="hidden" value="<?=$row['gedung_id']?>" name="id_gedung">
                        <input type="text" name="nama" value="<?=$row['nama']?>" placeholder="Nama Gedung" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <input type="tel" name="harga" value="<?=$row['harga']?>" placeholder="Harga Gedung" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <input type="text" name="foto" value="<?=$row['foto']?>" placeholder="URL Foto" class="form-control" required>
                    </div>
                    <div class="col-12 mt-2">
                        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" cols="30" rows="10" class="form-control"><?=$row['deskripsi']?></textarea>
                    </div>
                </div>
                <input type="submit" value="Update" class="btn btn-primary mt-2 w-25">
            </form>
        </div>
    </div>
</div>