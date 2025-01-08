<?php
include ("konfig/koneksi.php");
$s=mysqli_query($conn,"delete from kriteria where id_kriteria='$_GET[id]'");

if($s){
	echo "<script>alert('Dihapus'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
}

?>