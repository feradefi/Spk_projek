<div class="box-header">
    <h3 class="box-title">Data Kriteria</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered border-dark text-center">
        <thead>
            <tr class="info">
                <th class="text-center">Id Kriteria</th>
                <th class="text-center">Nama Kriteria</th>
                <th class="text-center">Bobot</th>
                <th class="text-center">Nilai 1</th>
                <th class="text-center">Nilai 2</th>
                <th class="text-center">Nilai 3</th>
                <th class="text-center">Nilai 4</th>
                <th class="text-center">Nilai 5</th>
                <th class="text-center">Sifat Kriteria</th>
                <th class="text-center">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");

            $s = mysqli_query($conn, "select * from kriteria order by id_kriteria ASC");
            while ($d = mysqli_fetch_assoc($s)) {
            ?>
                <tr class="warning">
                    <td><?php echo $d['id_kriteria']; ?></td>
                    <td><?php echo $d['nama_kriteria']; ?></td>
                    <td><?php echo $d['bobot']; ?></td>
                    <td><?php echo $d['nilai1']; ?></td>
                    <td><?php echo $d['nilai2']; ?></td>
                    <td><?php echo $d['nilai3']; ?></td>
                    <td><?php echo $d['nilai4']; ?></td>
                    <td><?php echo $d['nilai5']; ?></td>
                    <td><?php echo $d['sifat']; ?></td>
                    <td>
                        <a href="?a=kriteria&k=ubahk&id=<?php echo $d['id_kriteria']; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapus.php?id=<?php echo $d['id_kriteria']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>