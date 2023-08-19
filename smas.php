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

	$query = "SELECT * FROM surat_masuk;";
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
	
	<title>Surat Masuk</title><!-- 
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script> -->

	<!-- <style>
		@media print{
			.container{
				margin-right: 10px;
				margin-left: 10px;
			}
			.navbar, .btn, .blockquote, .blockquote-footer, .aksi, .gambar {
				display: none;
			}
		}
	</style> -->

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
	<div class="container">
		<h1 class="mt-4">SURAT MASUK</h1>
		<figure>
	  		<blockquote class="blockquote">
	    		<p>Berisi Data Arsip Surat Masuk</p>
	  		</blockquote>
	  		<figcaption class="blockquote-footer">
	  			<p>
	    		<a href="halaman.php" type="text" style="text-decoration: none;">Home / </a>
	    		<a href="smas.php" type="text" style="color: black; text-decoration: none;">Surat Masuk</a>
	    		<!-- <cite title="Source Title">Surat Masuk</cite> -->
	    		</p>
	  		</figcaption>
		</figure>
		<a href="tbhsmas.php" type="button" class="btn btn-primary mb-3">
			<i class="fa fa-plus"></i>
			Tambah Data 
		</a>
		<a href="printsmas.php" type="button" class="btn btn-info mb-3">
			<i class="fa fa-print"></i>
			Cetak Tabel 
		</a>

		<?php 
			if (isset($_SESSION['eksekusi'])):
		?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?php 
			echo $_SESSION['eksekusi'];
			 ?>
			<button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close"></button>
		</div>
		<?php 
			session_destroy();
			endif; 
		?>

		<div class="table-responsive">
  			<table id="dt" class="table align-middle table-bordered table-hover">
    			<thead class="align-middle">
		      		<tr>
		        		<th>Nomor Urut</th>
						<th class="aksi">Aksi</th>
						<th>Nama dan Alamat Pengirim</th>
						<th>Nomor Surat</th>
						<th>Tanggal</th>
						<th>Perihal</th>
						<th>Lampiran</th>
						<th>Nomor Petunjuk</th>
						<th>Disposisi Kepada</th>
						<th>Instruksi / Informasi</th>
						<th>Keterangan</th>

						<th class="gambar">Gambar</th>		      		
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
							<td class="aksi">
								<a href="tbhsmas.php?ubah=<?php echo $result['nomor_urut']; ?>" type="button" class="btn btn-success btn-sm">
									<i class="fa fa-pencil" aria-hidden="true"></i>
									ubah 
								</a>
								<a href="prosesmas.php?hapus=<?php echo $result['nomor_urut']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut???')">
									<i class="fa fa-trash"></i> 
									hapus
								</a>
							</td>
							<td><?php echo $result['nama_dan_alamat_pengirim']; ?></td>
							<td><?php echo $result['nomor_surat']; ?></td>
							<td><?php echo $result['tanggal']; ?></td>
							<td><?php echo $result['perihal']; ?></td>
							<td><?php echo $result['lampiran']; ?></td>
							<td><?php echo $result['nomor_petunjuk']; ?></td>
							<td><?php echo $result['disposisi_kepada']; ?></td>
							<td><?php echo $result['instruksi_informasi']; ?></td>
							<td><?php echo $result['keterangan']; ?></td>

							<td class="gambar">
								<a href="pedefmas.php?tampil=<?php echo $result['nomor_urut']; ?>">
								<?php echo $result['gambar']; ?>
								</a>
							</td>
						</tr>
					<?php } ?>
      			</tbody>
      		</table>
      	</div>
	</div>
	<div class="mb-5"></div>
</body>
</html>