<div class="col-12 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header mb-0">
            <h3>Tambah Gedung Baru</h3>
        </div>
        <div class="card-body">
            <?php
                $select = $konek->query("SELECT * FROM metode WHERE metode_id=$_GET[id]");
                $row = mysqli_fetch_assoc($select);
            ?>
            <form action="./metode.php?proses=edit" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <input type="hidden" name="metode_id" value="<?=$row['metode_id']?>"  class="hidden">
                        <input type="text" name="nama" value="<?=$row['nama_metode']?>" placeholder="Nama Metode" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <input type="text" name="no_rek" value="<?=$row['no_rekening']?>"  placeholder="No. Rekening" class="form-control" required>
                    </div>
                </div>
                <input type="submit" value="Tambah" class="btn btn-primary mt-2 w-25">
            </form>
        </div>
    </div>
</div>