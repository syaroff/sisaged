        <div class="col-xl-6 col-12 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TOTAL TRANSAKSI</p>
                    <h1 class="font-weight-bolder">
                      
                      <?php
                        $select = $konek->query("SELECT * FROM transaksi");
                        $row = mysqli_num_rows($select);
                        echo $row;
                      ?>

                    </h1>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-12">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TOTAL GEDUNG</p>
                    <h1 class="font-weight-bolder">
                      <?php
                        $select = $konek->query("SELECT * FROM gedung");
                        $row = mysqli_num_rows($select);
                        echo $row;
                      ?>
                    </h1>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h4 class="mb-2">Data Transaksi</h4>
              </div>
            </div>
            <div class="table-responsive p-5">
              <table id="dataTransaksi" class="table align-items-center display text-center ">
                <thead>
                  <tr>
                    <th>Gedung</th>
                    <th>Penyewa</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php

                      $select = $konek->query("SELECT * FROM vwTransaksi ");
                      while($row=mysqli_fetch_assoc($select)) {
                    ?>

                        <tr>
                            <td><?=$row['nama_gedung']?></td>
                            <td><?=$row['nama']?></td>
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
                        </tr>

                    <?php
                      }

                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-5 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h4 class="mb-2">Data Gedung</h4>
              </div>
            </div>
            <div class="table-responsive p-5">
              <table id="dataGedung" class="table align-items-center text-center display">
                <thead>
                  <tr>
                    <th>Nama Gedung</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $select = $konek->query("SELECT * FROM gedung");
                        while ($row=mysqli_fetch_assoc($select)) {
                    ?>

                        <tr>
                            <td><?= $row['nama']?></td>
                            <td><?= $row['harga']?></td>
                            <td><img src="uploads/img/gedung/<?= $row['foto']?>" width="100px"></td>
                            <td><textarea  cols="10" rows="2" readonly><?= $row['deskripsi']?></textarea></td>
                        </tr>

                    <?php
                        }    
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>