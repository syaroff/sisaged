<div class="col-12 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header mb-0">
            <h3>Tambah Gedung Baru</h3>
        </div>
        <div class="card-body">
                    <?php
                        if(isset($_GET['err']) == 200) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Tambah Data Berhasil.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        }
                        else if(isset($_GET['err']) == 1) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal Menambahkan Metode</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        }
                        else if(isset($_GET['err']) == 201) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil Dihapus</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        }
                    ?>
            <form action="./metode.php?proses=tambah" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="nama" placeholder="Nama Metode" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <input type="text" name="no_rek" placeholder="No. Rekening" class="form-control" required>
                    </div>
                </div>
                <input type="submit" value="Tambah" class="btn btn-primary mt-2 w-25">
            </form>
        </div>
    </div>
</div>
<div class="col-12 mb-xl-0 mt-3">
    <div class="card">
        <div class="card-body">
            <table id="dataGedung" class="display w-100">
                <thead>
                    <tr>
                        <th>Nama Metode</th>
                        <th>No. Rekening</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../db/koneksi.php";
                        $select = $konek->query("SELECT * FROM metode");
                        while ($row=mysqli_fetch_assoc($select)) {
                    ?>
                            <tr>
                                <td><?= $row['nama_metode']?></td>
                                <td><?= $row['no_rekening']?></td>
                                <td>
                                    <a href="./metode.php?proses=delete&id=<?=$row['metode_id']?>" class="btn btn-danger">Hapus</a>
                                    <a href="./?page=metodeEdit&id=<?=$row['metode_id']?>" class="btn btn-info">Edit</a>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>