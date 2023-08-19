<?php 
session_start();
include 'koneksi.php';

// Pengecekan status login
if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Harap Untuk Login Terlebih Dahulu');
            document.location.href = 'login.php';
          </script>";
    exit();
}
	function tambah_data($data, $files){
		$tanggal = $data['tanggal'];
		$kode_unit_pengelola = $data['kode_unit_pengelola'];
		$dikirim_kepada = $data['dikirim_kepada'];
		$nomor_surat = $data['nomor_surat'];
		$sifat_surat = $data['sifat_surat'];
		$perihal = $data['perihal'];
		$kode_maf = $data['kode_maf'];
		$tembusan = $data['tembusan'];
		$keterangan = $data['keterangan'];

		$queryNomorUrutc = "SELECT MAX(nomor_urutc) as max_nomor_urutc FROM surat_keluar";
    	$resultNomorUrutc = mysqli_query($GLOBALS['conn'], $queryNomorUrutc);
    	$rowNomorUrutc = mysqli_fetch_assoc($resultNomorUrutc);

    	$nomor_urutc = $rowNomorUrutc['max_nomor_urutc'] + 1;

		$split = explode('.', $files['gambar']['name']);
		$ekstensi = $split[count($split)-1];

		$gambar = $nomor_urutc.'.'.$ekstensi;

		$dir = "img/";
		$tmpFile = $files['gambar']['tmp_name'];

		move_uploaded_file($tmpFile, $dir.$gambar);

		$query = "INSERT INTO surat_keluar VALUES(null, '$tanggal', '$kode_unit_pengelola', '$dikirim_kepada', '$nomor_surat', '$sifat_surat', '$perihal', '$kode_maf', '$tembusan', '$keterangan', '$gambar');";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function ubah_data($data, $files){
		$nomor_urutc = $data['nomor_urutc'];
		$tanggal = $data['tanggal'];
		$kode_unit_pengelola = $data['kode_unit_pengelola'];
		$dikirim_kepada = $data['dikirim_kepada'];
		$nomor_surat = $data['nomor_surat'];
		$sifat_surat = $data['sifat_surat'];
		$perihal = $data['perihal'];
		$kode_maf = $data['kode_maf'];
		$tembusan = $data['tembusan'];
		$keterangan = $data['keterangan'];

		$queryShow = "SELECT * FROM surat_keluar WHERE nomor_urutc = '$nomor_urutc';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		if ($files['gambar']['name'] == '') {
			$gambar = $result['gambar'];
		} else{

			$split = explode('.', $files['gambar']['name']);
			$ekstensi = $split[count($split)-1];

			$gambar = $result['nomor_urutc'].'.'.$ekstensi;
			unlink("img/".$result['gambar']);
			move_uploaded_file($files['gambar']['tmp_name'], 'img/'.$gambar);
		}

		$query = "UPDATE surat_keluar SET tanggal='$tanggal', kode_unit_pengelola='$kode_unit_pengelola', dikirim_kepada='$dikirim_kepada', nomor_surat='$nomor_surat', perihal='$perihal', kode_maf='$kode_maf', tembusan='$tembusan', keterangan='$keterangan', gambar='$gambar' WHERE nomor_urutc='$nomor_urutc';";
		$sql = mysqli_query($GLOBALS['conn'], $query);
		return true;
	}
	
	function hapus_data($data){
		$nomor_urutc = $data['hapus'];

		$queryShow = "SELECT * FROM surat_keluar WHERE nomor_urutc = '$nomor_urutc';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		// var_dump($result);

		unlink("img/".$result['gambar']);

		$query = "DELETE FROM surat_keluar WHERE nomor_urutc = '$nomor_urutc';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
 ?>