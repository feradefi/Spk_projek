<?php
include("konfig/koneksi.php");
$s = mysqli_query($conn, "select * from kriteria");
$h = mysqli_num_rows($s);
?>

<div class="box-header">
	<h3 class="box-title ">Nilai Matriks</h3>
</div>
<div class="table table-bordered table-responsive ">
	<table class="table table-bordered table-responsive text-center">
		<thead>
			<tr class="info">
				<th class="text-center" rowspan="2">No</th>
				<th class="text-center" rowspan="2">Nama</th>
				<th class="text-center" colspan="<?php echo $h; ?>">Kriteria</th>
			</tr>
			<tr>
				<?php
				for ($n = 1; $n <= $h; $n++) {
					echo "<th class='text-center success'>C{$n}</th>";
				}
				?>
			</tr>
		</thead>
		<tbody>
		<?php
            $i = 0;
            $a = mysqli_query($conn, "SELECT * FROM alternatif ORDER BY id_alternatif ASC;");

            while ($da = mysqli_fetch_assoc($a)) {
                echo "<tr class='warning'>
                    <td>" . (++$i) . "</td>
                    <td>" . $da['nm_alternatif'] . "</td>";
                $idalt = $da['id_alternatif'];
                //ambil nilai
                $n = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_alternatif='$idalt' ORDER BY id_matrik ASC");
                while ($dn = mysqli_fetch_assoc($n)) {
                    $idk = $dn['id_kriteria'];
                    $nilai = $dn['nilai'];
                    if (isset($kriteria_sifat[$idk]) && $kriteria_sifat[$idk] == 'cost') {
                        $nilai = -$nilai;
                    }
                    echo "<td align='center'>$nilai</td>";
                }
                echo "</tr>\n";
            }
            ?>
        </tbody>
    </table>
</div>