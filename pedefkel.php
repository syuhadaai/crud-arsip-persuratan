<?php 
include 'koneksi.php';
include 'fungsimas.php';
session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>
			alert('Harap Untuk Login Terlebih Dahulu');
			document.location.href = 'login.php';
		  </script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<title>PENAMPIL DOKUMEN</title>
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</head>
<body>
	<nav class="navbar bg-body-tertiary">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="halaman.php">
      		<img src="img/logosma.jpeg" alt="Logo" width="60" height="60" class="d-inline-block align-text-middle">
      		ARSIP PERSURATAN SMA NEGERI 3 PURWAKARTA
    		</a>
    		<p style="font-size: 1.2rem;"> 
    			<?php echo $_SESSION['username']; ?>

            	<a href="logout.php" type="button" class="btn btn-danger btn-md center align-middle" >
                <i class="fa fa-power-off"></i> Logout
            	</a>
            </p>
  		</div>
	</nav>
	<div class="container">
		<h1 class="mt-4">PENAMPIL DOKUMEN</h1>
		<figure>
	  		<blockquote class="blockquote">
	    		<p>Menampilkan Dokumen Dari Data Arsip Surat Keluar</p>
	  		</blockquote>
	  		<figcaption class="blockquote-footer">
	    		<p>
	    			<a href="halaman.php" type="text" style="text-decoration: none;">Home / </a>
	    			<a href="skel.php" type="text" style="text-decoration: none;">Surat Keluar / </a>
	    			<a href="#" type="text" style="color: black; text-decoration: none;">Penampil Dokumen</a>
	    			<!-- <cite title="Source Title">Surat Masuk</cite> -->
	    		</p>
	  		</figcaption>
		</figure>
<?php

$nomor_urutc= $_GET['tampil'];
$query = "SELECT gambar FROM surat_keluar WHERE nomor_urutc = '$nomor_urutc';";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($sql);
$gambar = $row['gambar'];
?>
 <embed type="application/pdf" src="img/<?php echo $gambar; ?>" style="width: 1300px; height: 1000px">
 	<?php echo "$gambar"; ?>

</body>
</html>