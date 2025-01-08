<?php
include("konfig/koneksi.php");

// Ambil jumlah kriteria
$s = mysqli_query($conn, "SELECT * FROM kriteria");
$h = mysqli_num_rows($s);

?>

<style>
    .table-wrapper {
        display: flex;
        flex-wrap: wrap;
    }

    .table-wrapper .table-container {
        width: 100%;
        overflow-x: auto;
        margin-bottom: 20px;
    }

    .box-header {
        margin-bottom: 20px;
    }
</style>

<div class="table-wrapper">
    <div class="table-container col-sm-6">
        <!-- Tabel Matriks Ideal Negatif (A-) -->
        <div class="box-header">
            <h3 class="box-title">Matriks Ideal Negatif (A<sup>-</sup>)</h3>
        </div>
        <table class="table table-bordered table-responsive text-center">
            <thead>
                <tr class="info">
                    <th class="text-center" colspan="<?php echo $h; ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    $hk = mysqli_query($conn, "SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria ASC");
                    while ($dhk = mysqli_fetch_assoc($hk)) {
                        echo "<th class='text-center success'>$dhk[nama_kriteria]</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    // Header untuk y- (matriks ideal negatif)
                    for ($n = 1; $n <= $h; $n++) {
                        echo "<th class='text-center warning'>y<sub>$n</sub><sup>-</sup></th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
                echo "<tr>";
                while ($da = mysqli_fetch_assoc($a)) {
                    $idalt = $da['id_kriteria'];

                    // Ambil nilai matriks
                    $n = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idalt' ORDER BY id_matrik ASC");

                    $c = 0;
                    $ymax = array();
                    while ($dn = mysqli_fetch_assoc($n)) {
                        $idk = $dn['id_kriteria'];

                        // Hitung nilai kuadrat
                        $nilai_kuadrat = 0;
                        $k = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                        while ($dkuadrat = mysqli_fetch_assoc($k)) {
                            $nilai_kuadrat += ($dkuadrat['nilai'] * $dkuadrat['nilai']);
                        }

                        // Hitung jumlah alternatif
                        $jml_alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
                        $jml_a = mysqli_num_rows($jml_alternatif);

                        // Hitung nilai bobot kriteria (rata-rata)
                        $bobot = 0;
                        $tnilai = 0;
                        $k2 = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                        while ($dbobot = mysqli_fetch_assoc($k2)) {
                            $tnilai += $dbobot['nilai'];
                        }
                        $bobot = $tnilai / $jml_a;

                        // Ambil nilai bobot input
                        $b2 = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria='$idk'");
                        $nbot = mysqli_fetch_assoc($b2);
                        $bot = $nbot['bobot'];

                        // Hitung nilai v
                        $v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);
                        $ymax[$c] = $v;
                        $c++;
                    }

                    // Tentukan nilai y- (matriks ideal negatif)
                    if ($nbot['sifat'] == 'benefit') {
                        echo "<td class='warning'>" . min($ymax) . "</td>";
                    } else {
                        echo "<td class='warning'>" . max($ymax) . "</td>";
                    }
                }
                echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>

    <div class="table-container col-sm-6">
        <!-- Tabel Matriks Ideal Positif (A+) -->
        <div class="box-header">
            <h3 class="box-title">Matriks Ideal Positif (A<sup>+</sup>)</h3>
        </div>
        <table class="table table-bordered table-responsive text-center">
            <thead>
                <tr class="info">
                    <th class="text-center" colspan="<?php echo $h; ?>">Kriteria</th>
                </tr>
                <tr>
                    <?php
                    // Header untuk nama kriteria
                    $hk = mysqli_query($conn, "SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria ASC");
                    while ($dhk = mysqli_fetch_assoc($hk)) {
                        echo "<th class='text-center success'>$dhk[nama_kriteria]</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    // Header untuk y+ (matriks ideal positif)
                    for ($n = 1; $n <= $h; $n++) {
                        echo "<th class='text-center warning'>y<sub>$n</sub><sup>+</sup></th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
                echo "<tr>";
                while ($da = mysqli_fetch_assoc($a)) {
                    $idalt = $da['id_kriteria'];

                    // Ambil nilai matriks
                    $n = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idalt' ORDER BY id_matrik ASC");

                    $c = 0;
                    $ymax = array();
                    while ($dn = mysqli_fetch_assoc($n)) {
                        $idk = $dn['id_kriteria'];

                        // Hitung nilai kuadrat
                        $nilai_kuadrat = 0;
                        $k = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                        while ($dkuadrat = mysqli_fetch_assoc($k)) {
                            $nilai_kuadrat += ($dkuadrat['nilai'] * $dkuadrat['nilai']);
                        }

                        // Hitung jumlah alternatif
                        $jml_alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
                        $jml_a = mysqli_num_rows($jml_alternatif);

                        // Hitung nilai bobot kriteria (rata-rata)
                        $bobot = 0;
                        $tnilai = 0;
                        $k2 = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                        while ($dbobot = mysqli_fetch_assoc($k2)) {
                            $tnilai += $dbobot['nilai'];
                        }
                        $bobot = $tnilai / $jml_a;

                        // Ambil nilai bobot input
                        $b2 = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria='$idk'");
                        $nbot = mysqli_fetch_assoc($b2);
                        $bot = $nbot['bobot'];

                        // Hitung nilai v
                        $v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);
                        $ymax[$c] = $v;
                        $c++;
                    }

                    // Tentukan nilai y+ (matriks ideal positif)
                    if ($nbot['sifat'] == 'benefit') {
                        echo "<td class='warning'>" . max($ymax) . "</td>";
                    } else {
                        echo "<td class='warning'>" . min($ymax) . "</td>";
                    }
                }
                echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>
</div>
