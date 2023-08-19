<?php 
include 'koneksi.php';
session_start();
if (!isset($_SESSION['login'])) {
	echo "<script>
			alert('Harap Untuk Login Terlebih Dahulu');
			document.location.href = 'login.php';
		  </script>";
	exit();
}
	$query = "SELECT * FROM surat_keluar;";
	$sql = mysqli_query($conn, $query);
	$no = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="datatables/datatables.css">
	<script type="text/javascript" src="datatables/datatables.js"></script>
	
	<title>Surat Keluar</title>
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    
</head>
	
<script type="text/javascript">
	$(document).ready(function() {
		$('#dt').DataTable();
	} );
</script>

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
	<div class="container-fluid">
		<h1 class="mt-4">SURAT MASUK</h1>
		<figure>
	  		<blockquote class="blockquote">
	    		<p>Mencetak Tabel Data Arsip Surat Keluar</p>
	  		</blockquote>
	  		<figcaption class="blockquote-footer">
	  			<p>
	    		<a href="halaman.php" type="text" style="text-decoration: none;">Home / </a>
	    		<a href="smas.php" type="text" style="text-decoration: none;">Surat Keluar / </a>
	    		<a href="printsmas.php" type="text" style="color: black; text-decoration: none;">Cetak Tabel</a>

	    		<!-- <cite title="Source Title">Surat Masuk</cite> -->
	    		</p>
	  		</figcaption>
		</figure>

		<div class="table-responsive">
  			<table id="dt" class="table
  			 align-middle table-bordered table-hover table-stripe">
    			<thead class="align-middle">
		      		<tr>
		        		<th>Nomor Urut</th>
						<th>Tanggal</th>
						<th>Kode Unit / Pengelola</th>
						<th>Dikirim Kepada</th>
						<th>Nomor Surat</th>
						<th>Sifat Surat</th>
						<th>Perihal</th>
						<th>Kode Maf</th>
						<th>Tembusan</th>
						<th>Keterangan</th>  		
					</tr>
    			</thead>
    			<tbody>
    				<?php 
    				while ($result = mysqli_fetch_assoc($sql)) {
    				 ?>
						<tr>
							<td><center>
								<?php echo ++$no; ?>.
							</center></td>
							<td><?php echo $result['tanggal']; ?></td>
							<td><?php echo $result['kode_unit_pengelola']; ?></td>
							<td><?php echo $result['dikirim_kepada']; ?></td>
							<td><?php echo $result['nomor_surat']; ?></td>
							<td><?php echo $result['sifat_surat']; ?></td>
							<td><?php echo $result['perihal']; ?></td>
							<td><?php echo $result['kode_maf']; ?></td>
							<td><?php echo $result['tembusan']; ?></td>
							<td><?php echo $result['keterangan']; ?></td>
						</tr>
					<?php } ?>
      			</tbody>
      		</table>
      	</div>
	</div>
	<div class="mb-5"></div>
</body>
</html>