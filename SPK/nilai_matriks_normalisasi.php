<?php
include("konfig/koneksi.php");

// Retrieve number of criteria
$s = mysqli_query($conn, "select * from kriteria");
$h = mysqli_num_rows($s);

?>

<div class="box-header">
    <h3 class="box-title">Nilai Matriks Ternormalisasi</h3>
</div>

<table class="table table-bordered table-responsive text-center">
    <thead>
        <tr class="info">
            <th class="text-center" rowspan="2">No</th>
            <th class="text-center" rowspan="2">Nama</th>
            <th class="text-center" colspan="<?php echo $h; ?>">Kriteria</th>
        </tr>
        <tr>
            <?php
            // Display criteria headers
            for ($n = 1; $n <= $h; $n++) {
                echo "<th class='text-center success'>C{$n}</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        // Retrieve alternatives data
        $a = mysqli_query($conn, "select * from alternatif order by id_alternatif asc");

        while ($da = mysqli_fetch_assoc($a)) {
            echo "<tr class='warning'>
                <td>" . (++$i) . "</td>
                <td>{$da['nm_alternatif']}</td>";
            $idalt = $da['id_alternatif'];

            // Retrieve matrix values for each alternative
            $n = mysqli_query($conn, "select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik asc");

            while ($dn = mysqli_fetch_assoc($n)) {
                $idk = $dn['id_kriteria'];

                // Calculate squared values
                $nilai_kuadrat = 0;
                $k = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idk'");
                while ($dkuadrat = mysqli_fetch_assoc($k)) {
                    $nilai_kuadrat += ($dkuadrat['nilai'] * $dkuadrat['nilai']);
                }

                // Calculate normalized values
                $nilai_ternormalisasi = ($dn['nilai'] / sqrt($nilai_kuadrat));
                echo "<td align='center'>" . number_format($nilai_ternormalisasi, 4) . "</td>";
            }
            echo "</tr>\n";
        }
        ?>
    </tbody>
</table>
