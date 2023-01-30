<div class="col-12 mb-xl-0 mt-3">
<?php
                        if(isset($_GET['err']) == 200) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="text-white">Berhasil Mengubah Status.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        }
                        else if(isset($_GET['err']) == 1) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white">Gagal Mengubah Status</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        }
                    ?>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="dataTrans" class="display w-100 table table-bordered">
                <thead>
                    <tr>
                        <th>No. Reservasi</th>
                        <th>Gedung</th>
                        <th>Pemesan</th>
                        <th>No. Hp</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tanggal Pesan</th>
                        <th>Total Bayar</th>
                        <th>Metode Bayar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $select = $konek->query("SELECT * FROM vwTransaksi");
                        while ($row=mysqli_fetch_assoc($select)) {
                    ?>
                            <tr>
                                <td><?= $row['id_transaksi']?></td>
                                <td><?= $row['nama_gedung']?></td>
                                <td><?= $row['nama']?></td>
                                <td><?= $row['no_hp']?></td>
                                <td><?= $row['tanggal_mulai']?></td>
                                <td><?= $row['tanggal_selesai']?></td>
                                <td><?= $row['date_created']?></td>
                                <td><?= $row['total']?></td>
                                <td><?= $row['nama_metode']?></td>
                                <td>
                                <?php
                                    if($row['status_transaksi'] ==2) {
                                ?>  
                                        <span class="badge bg-danger">DP</span>
                                <?php
                                    } 
                                    else if($row['status_transaksi']==1) {
                                ?>
                                        <span class="badge bg-success">Lunas</span>
                                <?php
                                    }   
                                ?>
                                </td>
                                <td>
                                    <a href="./?page=ubahStatus&i=<?=$row['id_transaksi']?>" class="btn btn-primary">Ubah Status</a>
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
</div>