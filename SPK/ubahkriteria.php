<?php

include ("konfig/koneksi.php");

$hasil = mysqli_query($conn,"SELECT max(id_kriteria) as idMaks FROM kriteria");
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

//ambil data \
$s=mysqli_query($conn,"select * from kriteria where id_kriteria='$_GET[id]'");
$d=mysqli_fetch_assoc($s);


?>
<div class="box-header">
    <h3 class="box-title">Ubah Kriteria</h3>
</div>

<div class="box-body pad">
 <form action="" method="POST">
 
 <input type="text" name="id_kriteria" class="form-control" value="<?php echo $d['id_kriteria']; ?>" readonly>
 <br />
 <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control"  placeholder="Nama Kriteria" value="<?php echo $d['nama_kriteria']; ?>" >
 <br />
 <input type="text" id="bobot" name="bobot" class="form-control" placeholder="Bobot" value="<?php echo $d['bobot']; ?>">
 <br />
 <input type="text" name="nilai1" class="form-control" placeholder="Nilai 1" value="<?php echo $d['nilai1']; ?>">
 <br />
 <input type="text" name="nilai2" class="form-control" placeholder="Nilai 2" value="<?php echo $d['nilai2']; ?>">
 <br />
 <input type="text" name="nilai3" class="form-control" placeholder="Nilai 3" value="<?php echo $d['nilai3']; ?>">
 <br />
 <input type="text" name="nilai4" class="form-control" placeholder="Nilai 4" value="<?php echo $d['nilai4']; ?>">
 <br />
 <input type="text" name="nilai5" class="form-control" placeholder="Nilai 5" value="<?php echo $d['nilai5']; ?>">
 <br />
 <select name="sifat" class="form-control">
	<option value="<?php echo $d['sifat']; ?>"><?php echo $d['sifat']; ?></option>
	<option value="benefit">Benefit</option>
	<option value="cost">Cost</option>
 </select>
 <br />
 <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
 <br />
 </form>
</div>
<?php
include ('konfig/koneksi.php');
if (isset($_POST['ubah'])){
	$id_kriteria	= $_POST['id_kriteria'];
	$nama_kriteria	= $_POST['nama_kriteria'];
	$bobot 			= $_POST['bobot'];
	$nilai1			= $_POST['nilai1'];
	$nilai2			= $_POST['nilai2'];
	$nilai3			= $_POST['nilai3'];
	$nilai4			= $_POST['nilai4'];
	$nilai5			= $_POST['nilai5'];
	$sifat			= $_POST['sifat'];
	$s=mysqli_query($conn,"update kriteria set nama_kriteria='$nama_kriteria', bobot='$bobot', nilai1='$nilai1',nilai2='$nilai2', nilai3='$nilai3',nilai4='$nilai4', nilai5='$nilai5', sifat='$sifat' where id_kriteria='$id_kriteria'");
	if($s){
		echo "<script>alert('Diubah'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}
?>