
<div class="col-12 mb-xl-0 mt-3">
    <div class="card">
        <div class="card-body">
        <div class="col-3">
            <h4>Start Date</h4>
            <input type="text" class="form-control" id="min" placeholder="Tanggal Awal">
        </div>
        <div class="col-3">
            <h4>End Date</h4>
            <input type="text" class="form-control" id="max" placeholder="Tanggal Selesai">
        </div>
        <table id="dataLaporan" class="display table table-bordered" width="100%">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Pendapatan</th>
          </tr>
        </thead>

        <tbody>
            <?php
                $select = $konek->query("SELECT * FROM laporan");
                while($row=mysqli_fetch_assoc($select)) {
            ?>      <tr>
                        <td><?=$row['tanggal']?></td>
                        <td><?=$row['total']?></td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
                <tfoot>
            <tr>
                <th></th>
                <th style="text-align:right">Total:</th>
            </tr>
        </tfoot>
      </table>
        </div>
    </div>
</div>