<div class="box-header">
    <h3 class="box-title">Data Alternatif</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered border-dark text-center">
        <thead>
            <tr class="info">
                <th class="text-center">Id Alternatif</th>
                <th class="text-center">Nama Alternatif</th>
                <th class="text-center">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");

            $s = mysqli_query($conn, "select * from alternatif order by id_alternatif ASC");
            while ($d = mysqli_fetch_assoc($s)) {
            ?>
                <tr class="warning">
                    <td><?php echo $d['id_alternatif']; ?></td>
                    <td><?php echo $d['nm_alternatif']; ?></td>
                    <td>
                        <a href="?a=alternatif&k=ubaha&id=<?php echo $d['id_alternatif']; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapusalternatif.php?id=<?php echo $d['id_alternatif']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>