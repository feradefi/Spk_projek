<?php

include("konfig/koneksi.php");


$query = "SELECT max(id_kriteria) as idMaks FROM kriteria";
$hasil = mysqli_query($conn, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "kr";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>
<div class="box-header">
	<h3 class="box-title">Tambah Kriteria</h3>
</div>


<form action="" method="POST">

	<input type="text" style="background-color: #d9d9d9; color:#666;" name="id_kriteria" class="form-control " value="<?php echo $IDbaru; ?>" readonly>
	<br />
	<input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria">
	<br />
	<input type="text" name="bobot" class="form-control" placeholder="Bobot">
	<br />
	<input type="text" name="nilai1" class="form-control" placeholder="Nilai 1">
	<br />
	<input type="text" name="nilai2" class="form-control" placeholder="Nilai 2">
	<br />
	<input type="text" name="nilai3" class="form-control" placeholder="Nilai 3">
	<br />
	<input type="text" name="nilai4" class="form-control" placeholder="Nilai 4">
	<br />
	<input type="text" name="nilai5" class="form-control" placeholder="Nilai 5">
	<br />
	<select name="sifat" class="form-control">
		<option value="benefit">Benefit</option>
		<option value="cost">Cost</option>
	</select>
	<br />
	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	<br />
</form>

<?php
include('konfig/koneksi.php');
if (isset($_POST['simpan'])) {
	$id_kriteria	= $_POST['id_kriteria'];
	$nama_kriteria	= $_POST['nama_kriteria'];
	$bobot 			= $_POST['bobot'];
	$nilai1			= $_POST['nilai1'];
	$nilai2			= $_POST['nilai2'];
	$nilai3			= $_POST['nilai3'];
	$nilai4			= $_POST['nilai4'];
	$nilai5			= $_POST['nilai5'];
	$sifat			= $_POST['sifat'];
	$s = mysqli_query($conn, "insert into kriteria values ('$id_kriteria','$nama_kriteria','$bobot','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$sifat')");
	if ($s) {
		echo "<script>alert('Ditambahkan'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}
?>