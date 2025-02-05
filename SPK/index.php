<!DOCTYPE html>
<html lang="en">

<head>
  <title>TOPSIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style>
    body {
      background-color: #F0FFF0;
    }

    .navbar-header {
      height: 150px;
    }

    /* set Navbar-brand in the middle of page */
    .navbar-brand {
      position: absolute;
      left: 50%;
      top: 25%;
      transform: translate(-50%, -50%);
      font-size: 50px;
      text-align: center;
      line-height: 50px;
    }

    /* set background a in li to white when hover */
    .nav-pills li a:hover {
      background-color: #fff;
    }


    /* set background a in li to white when active */
    .nav-pills li.active a {
      background-color: #333;
    }

    .nav-pills li.active a:hover {
      background-color: #333;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">SPK PEMILIHAN KARYAWAN TETAP</a>

      </div>

      <!--
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
	-->


      <!--
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  -->
    </div>
  </nav>
  <?php
  if (@$_GET['a'] == 'kriteria') {
    $active1 = 'class="active"';
    $active2 = '';
    $active3 = '';
    $active4 = '';
  } else if (@$_GET['a'] == 'alternatif') {
    $active1 = '';
    $active2 = 'class="active"';
    $active3 = '';
    $active4 = '';
  } else if (@$_GET['a'] == 'nilaimatrik') {
    $active1 = '';
    $active2 = '';
    $active3 = 'class="active"';
    $active4 = '';
  } else if (@$_GET['a'] == 'hasiltopsis') {
    $active1 = '';
    $active2 = '';
    $active3 = '';
    $active4 = 'class="active"';
  } else {
    $active1 = '';
    $active2 = '';
    $active3 = '';
    $active4 = '';
  }

  ?>

  <!-- TAB KIRI -->
  <div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked">
      <li <?php echo $active1 ?>><a href="?a=kriteria&k=kriteria">Kriteria</a></li>
      <li <?php echo $active2 ?>><a href="?a=alternatif&k=alternatif">Alternatif</a></li>
      <li <?php echo $active3 ?>><a href="?a=nilaimatrik">Nilai Matriks</a></li>
      <li <?php echo $active4 ?>><a href="?a=hasiltopsis&k=nilai_matriks">Hasil Topsis</a></li>
      <li> <a href="../logout.php">Logout</a> </li>
    </ul>
  </div>
  <!-- /TAB KIRI -->

  <div class="col-sm-10">
    <?php

    if (@$_GET['a'] == 'kriteria') {
      include("kriteria.php");
    } else if (@$_GET['a'] == 'alternatif') {
      include("alternatif.php");
    } else if (@$_GET['a'] == 'nilaimatrik') {
      include("nilaimatrik.php");
    } else if (@$_GET['a'] == 'hasiltopsis') {
      include("hasiltopsis.php");
    }








    ?>



  </div>


</body>

</html>