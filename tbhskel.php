<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
	echo "<script>
			alert('Harap Untuk Login Terlebih Dahulu');
			document.location.href = 'login.php';
		  </script>";
	exit();
}


	$nomor_urutc = '';
	$tanggal = '';
	$kode_unit_pengelola = '';
	$dikirim_kepada = '';
	$nomor_surat = '';
	$sifat_surat = '';
	$perihal = '';
	$kode_maf = '';
	$tembusan = '';
	$keterangan = '';
	$gambar = '';
	if(isset($_GET['ubah'])){
		$nomor_urutc = $_GET['ubah'];

		$query = "SELECT * FROM surat_keluar WHERE nomor_urutc = '$nomor_urutc';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);



		$tanggal = $result['tanggal'];
		$kode_unit_pengelola = $result['kode_unit_pengelola'];
		$dikirim_kepada = $result['dikirim_kepada'];
		$nomor_surat = $result['nomor_surat'];
		$sifat_surat = $result['sifat_surat'];
		$perihal = $result['perihal'];
		$kode_maf = $result['kode_maf'];
		$tembusan = $result['tembusan'];
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
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

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
	    		<p>Tambahkan Data Arsip Surat Keluar</p>
	  		</blockquote>
	  		<figcaption class="blockquote-footer">
	  			<p>
	    		<a href="halaman.php" type="text" style="text-decoration: none;">Home / </a>
	    		<a href="skel.php" type="text" style="text-decoration: none;">Surat Keluar / </a>
	    		<a href="tbhskel.php" type="text" style="color: black; text-decoration: none;">Tambah Data</a>
	    		<!-- <cite title="Source Title">Surat Masuk</cite> -->
	    		</p>
	  		</figcaption>
		</figure>
		<form method="POST" action="proseskel.php" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $nomor_urutc; ?>" name="nomor_urutc">
			<div class="mb-3 row">
				<label for="tanggal" class="col-sm-2 col-form-label">
					Tanggal : 
				</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $tanggal; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="kode_unit_pengelola" class="col-sm-2 col-form-label">
					Kode Unit Pengelola : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="kode_unit_pengelola" class="form-control" id="kode_unit_pengelola" value="<?php echo $kode_unit_pengelola; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="dikirim_kepada" class="col-sm-2 col-form-label">
					Dikirim Kepada : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="dikirim_kepada" class="form-control" id="dikirim_kepada" value="<?php echo $dikirim_kepada; ?>">
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
				<label for="sifat_surat" class="col-sm-2 col-form-label">
					Sifat Surat : 
				</label>
				<div class="col-sm-10">
					<select id="sifat_surat" name="sifat_surat" class="form-select">
						<option selected></option>
						<option value="Berita Acara">Berita Acara</option>
						<option value="Disposisi">Disposisi</option>
						<option value="Laporan">Laporan</option>
						<option value="Memo">Memo</option>
						<option value="Nota Dinas">Nota Dinas</option>
						<option value="Notula Rapat">Notula Rapat</option>
						<option value="Pengumuman">Pengumuman</option>
						<option value="Peraturan">Peraturan</option>
						<option value="Perjanjian Kerjasama">Perjanjian Kerjasama</option>
						<option value="Surat Dinas">Surat Dinas</option>
						<option value="Surat Edaran">Surat Edaran</option>
						<option value="Surat Instruksi">Surat Instruksi</option>
						<option value="Surat Keputusan">Surat Keputusan</option>
						<option value="Surat Kesepakatan Bersama">Surat Kesepakatan Bersama</option>
						<option value="Surat Keterangan">Surat Keterangan</option>
						<option value="Surat Kuasa">Surat Kuasa</option>
						<option value="Surat Pelimpahan Wewenang">Surat Pelimpahan Wewenang</option>
						<option value="Surat Pengantar">Surat Pengantar</option>
						<option value="Surat Perintah">Surat Perintah</option>
						<option value="Surat Pernyataan">Surat Pernyataan</option>
						<option value="Surat Tugas">Surat Tugas</option>
						<option value="Surat Undangan">Surat Undangan</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="perihal" class="col-sm-2 col-form-label">
					Perihal : 
				</label>
				<div class="col-sm-10">
					<textarea name="perihal" class="form-control" id="perihal" rows="3"><?php echo $perihal; ?></textarea>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="kode_maf" class="col-sm-2 col-form-label">
					Kode Maf : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="kode_maf" class="form-control" id="kode_maf" value="<?php echo $kode_maf; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tembusan" class="col-sm-2 col-form-label">
					Tembusan : 
				</label>
				<div class="col-sm-10">
					<input type="text" name="tembusan" class="form-control" id="tembusan" value="<?php echo $tembusan; ?>">
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
						<a href="skel.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						batal
						</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>