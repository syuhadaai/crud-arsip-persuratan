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
	$nomor_urut = '';
	$nama_dan_alamat_pengirim = '';
	$nomor_surat = '';
	$tanggal = '';
	$perihal = '';
	$lampiran = '';
	$perihal = '';
	$nomor_petunjuk = '';
	$disposisi_kepada = '';
	$instruksi_informasi = '';
	$keterangan = '';
	$gambar = '';
	if(isset($_GET['ubah'])){
		$nomor_urut = $_GET['ubah'];

		$query = "SELECT * FROM surat_masuk WHERE nomor_urut = '$nomor_urut';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);

		$nama_dan_alamat_pengirim = $result['nama_dan_alamat_pengirim'];
		$nomor_surat = $result['nomor_surat'];
		$tanggal = $result['tanggal'];
		$perihal = $result['perihal'];
		$lampiran = $result['lampiran'];
		$perihal = $result['perihal'];
		$nomor_petunjuk = $result['nomor_petunjuk'];
		$disposisi_kepada = $result['disposisi_kepada'];
		$instruksi_informasi = $result['instruksi_informasi'];
		$keterangan = $result['keterangan'];

		$gambar = $result['gambar'];

		// var_dump($result);

		// die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

	
	<title>Tambah Data</title>
<!-- 
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
 -->
</head>
<body>
	<nav class="navbar bg-body-tertiary mb-4">
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
		<h1 class="mt-4">TAMBAH DATA</h1>
		<figure>
	  		<blockquote class="blockquote">
	    		<p>Tambahkan Data Arsip Surat Masuk</p>
	  		</blockquote>
	  		<figcaption class="blockquote-footer">
	  			<p>
	    		<a href="halaman.php" type="text" style="text-decoration: none;">Home / </a>
	    		<a href="smas.php" type="text" style="text-decoration: none;">Surat Masuk / </a>
	    		<a href="tbhsmas.php" type="text" style="color: black; text-decoration: none;">Tambah Data</a>
	    		<!-- <cite title="Source Title">Surat Masuk</cite> -->
	    		</p>
	  		</figcaption>
		</figure>
		<form method="POST" action="prosesmas.php" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $nomor_urut; ?>" name="nomor_urut">
			<div class="mb-3 row">
				<label for="nama_dan_alamat_pengirim" class="col-sm-2 col-form-label">
					Nama dan Alamat Pengirim : 
				</label>
				<div class="col-sm-10">
					<textarea name="nama_dan_alamat_pengirim" class="form-control" id="nama_dan_alamat_pengirim" rows="3"><?php echo $nama_dan_alamat_pengirim; ?></textarea>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="nomor_surat" class="col-sm-2 col-form-label">
					Nomor Surat : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="<?php echo $nomor_surat; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tanggal" class="col-sm-2 col-form-label">
					Tanggal : 
				</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $tanggal; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="perihal" class="col-sm-2 col-form-label">
					Perihal : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="perihal" class="form-control" id="perihal" value="<?php echo $perihal; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="lampiran" class="col-sm-2 col-form-label">
					Lampiran : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="lampiran" class="form-control" id="lampiran" value="<?php echo $lampiran; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="nomor_petunjuk" class="col-sm-2 col-form-label">
					Nomor Petunjuk : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="nomor_petunjuk" class="form-control" id="nomor_petunjuk" value="<?php echo $nomor_petunjuk; ?>">
				</div>
			</div>
			
			<div class="mb-3 row">
				<label for="disposisi_kepada" class="col-sm-2 col-form-label">
					Disposisi Kepada : 
				</label>
				<div class="col-sm-10">
					<select id="disposisi_kepada" name="disposisi_kepada" class="form-select">
						<option selected></option>
						<option value="Waka Sarpras">Waka Sarpras</option>
						<option value="Waka Kesiswaan">Waka Kesiswaan</option>
						<option value="Waka Humas">Waka Humas</option>
						<option value="Waka Kurikulum">Waka Kurikulum</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="instruksi_informasi" class="col-sm-2 col-form-label">
					Instruksi / Informasi : 
				</label>
				<div class="col-sm-10">
					<select id="instruksi_informasi" name="instruksi_informasi" class="form-select">
						<option selected></option>
						<option value="Difasilitasi">Difasilitasi</option>
						<option value="Diperintahkan">Diperintahkan</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="keterangan" class="col-sm-2 col-form-label">
					Keterangan : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $keterangan; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="gambar" class="col-sm-2 col-form-label">
					Gambar (.pdf) : 
				</label>
				<div class="col-sm-10">
					<input class="form-control" type="file" name="gambar"  id="gambar" accept="application/pdf">
				</div>
			</div>
			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
						if(isset($_GET['ubah'])){
					?>
						<button type="submit" name="aksi" value="edit" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
					<?php 
						} else{
					?>
						<button type="submit" name="aksi" value="add" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
					<?php } ?>
						<a href="smas.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						batal
						</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>