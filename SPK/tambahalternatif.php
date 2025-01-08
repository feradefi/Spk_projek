<?php

include("konfig/koneksi.php");


$query = "SELECT max(id_alternatif) as idMaks FROM alternatif";
$hasil = mysqli_query($conn, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "al";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>
<div class="box-header">
	<h3 class="box-title">Tambah Alternatif</h3>
</div>

<div class="box-body pad">
	<form action="" method="POST">

		<input type="text" style="background-color: #d9d9d9; color:#666;" name="id_alternatif" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
		<br />
		<input type="text" name="nama_alternatif" class="form-control" placeholder="Nama Alternatif">
		<br />
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<br />
	</form>
</div>
<?php
include('konfig/koneksi.php');
if (isset($_POST['simpan'])) {
	$id_alternatif	 = $_POST['id_alternatif'];
	$nama_alternatif = $_POST['nama_alternatif'];
	$s = mysqli_query($conn, "insert into alternatif values ('$id_alternatif','$nama_alternatif')");
	if ($s) {
		echo "<script>alert('Ditambahkan'); window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
	}
}
?>