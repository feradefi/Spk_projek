<h1>Nilai Matriks</h1>
<ul class="nav nav-tabs">

	<li class="active"><a href="index.php?a=kriteria&k=kriteria">Isi Nilai Matriks</a></li>



</ul>
<div class="box-header">
	<h3 class="box-title">Tambah Nilai Matriks</h3>
</div>

<form method="POST" action="">
	<div class="form-group" class="text-center">
		<label class="control-label col-lg-2">Id Alternatif</label>
		<div class="col-lg-4">
			<select name="id_alt" class="form-control">
				<?php
				include("konfig/koneksi.php");
				$s = mysqli_query($conn, "select * from alternatif");
				while ($d = mysqli_fetch_assoc($s)) {
				?>

					<option value="<?php echo $d['id_alternatif'] ?>"><?php echo $d['id_alternatif'] . " | " . $d['nm_alternatif'] ?></option>
				<?php
				}
				?>
			</select>
		</div>
	</div>
	<br />
	<hr />

	<div class="form-group">
		<?php
		$i = 1;
		$alt = mysqli_query($conn, "select * from kriteria order by id_kriteria");
		//hitung jml kriteria		
		$jml_krit = mysqli_num_rows($alt);

		while ($dalt = mysqli_fetch_assoc($alt)) {
		?>

			<table align="left">
				<tr>
					<td width="200">
						<label><?php echo $dalt['nama_kriteria']; ?></label>
						<input type="hidden" name="id_krite<?php echo $i; ?>" value="<?php echo $dalt['id_kriteria']; ?>" />
					</td>
					<div class="col-md-7">
						<td width="80" class="col-md-1">
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['nilai1']; ?>" /><?php echo $dalt['nilai1']; ?>
						</td>
						<td width="80" class="col-md-1">
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['nilai2']; ?>" /><?php echo $dalt['nilai2']; ?>
						</td>
						<td width="80" class="col-md-1">
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['nilai3']; ?>" /><?php echo $dalt['nilai3']; ?>
						</td>
						<td width="80" class="col-md-1">
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['nilai4']; ?>" /><?php echo $dalt['nilai4']; ?>
						</td>
						<td width="80" class="col-md-1">
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['nilai5']; ?>" /><?php echo $dalt['nilai5']; ?>
						</td>
						
				</tr>

			<?php
			$i++;
		}
			?>
			<tr>
				<td colspan=5 align="center" style="position: absolute; left: 550px;bottom: -50px;">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
				</td>
			</tr>
			</table>

	</div>

	</div>
</form>

<?php
if (isset($_POST['simpan'])) {
    $o = 1;

    //cek id alternatif
    $id_alt = $_POST['id_alt'];
    $cek = mysqli_query($conn, "select * from alternatif where id_alternatif='$id_alt'");
    $cek_l = mysqli_num_rows($cek);
    if ($cek_l > 0) {
        $del = mysqli_query($conn, "delete from nilai_matrik where id_alternatif='$id_alt'");
    }

    for ($n = 1; $n <= $jml_krit; $n++) {
        $id_k = $_POST['id_krite' . $o];
        $nilai_k = $_POST['nilai' . $o];

        // Ambil sifat kriteria
        $kriteria = mysqli_query($conn, "SELECT sifat FROM kriteria WHERE id_kriteria='$id_k'");
        $sifat_kriteria = mysqli_fetch_assoc($kriteria)['sifat'];

        // Jika sifatnya "cost", buat nilai menjadi negatif
        if ($sifat_kriteria == 'cost') {
            $nilai_k = -$nilai_k;
        }

        $m = mysqli_query($conn, "INSERT INTO nilai_matrik (id_alternatif, id_kriteria, nilai) VALUES('$_POST[id_alt]', '$id_k', '$nilai_k')");

        if ($m) {
            echo "<script>alert('Ditambahkan'); window.open('index.php?a=kriteria&k=kriteria', '_self');</script>";
        }

        $o++;
    }
}
?>
