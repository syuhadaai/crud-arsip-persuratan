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
		$nama_dan_alamat_pengirim = $data['nama_dan_alamat_pengirim'];
		$nomor_surat = $data['nomor_surat'];
		$tanggal = $data['tanggal'];
		$perihal = $data['perihal'];
		$lampiran = $data['lampiran'];
		$nomor_petunjuk = $data['nomor_petunjuk'];
		$disposisi_kepada = $data['disposisi_kepada'];
		$instruksi_informasi = $data['instruksi_informasi'];
		$keterangan = $data['keterangan'];

		$queryNomorUrut = "SELECT MAX(nomor_urut) as max_nomor_urut FROM surat_masuk";
    	$resultNomorUrut = mysqli_query($GLOBALS['conn'], $queryNomorUrut);
    	$rowNomorUrut = mysqli_fetch_assoc($resultNomorUrut);

    	$nomor_urut = $rowNomorUrut['max_nomor_urut'] + 1;

		$split = explode('.', $files['gambar']['name']);
		$ekstensi = $split[count($split)-1];

		$gambar = $nomor_urut.'a.'.$ekstensi;

		$dir = "img/";
		$tmpFile = $files['gambar']['tmp_name'];

		move_uploaded_file($tmpFile, $dir.$gambar);

		$query = "INSERT INTO surat_masuk VALUES(null, '$nama_dan_alamat_pengirim', '$nomor_surat', '$tanggal', '$perihal', '$lampiran', '$nomor_petunjuk', '$disposisi_kepada', '$instruksi_informasi', '$keterangan', '$gambar');";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function ubah_data($data, $files){
		$nomor_urut = $data['nomor_urut'];
		$nama_dan_alamat_pengirim = $data['nama_dan_alamat_pengirim'];
		$nomor_surat = $data['nomor_surat'];
		$tanggal = $data['tanggal'];
		$perihal = $data['perihal'];
		$lampiran = $data['lampiran'];
		$nomor_petunjuk = $data['nomor_petunjuk'];
		$disposisi_kepada = $data['disposisi_kepada'];
		$instruksi_informasi = $data['instruksi_informasi'];
		$keterangan = $data['keterangan'];

		$queryShow = "SELECT * FROM surat_masuk WHERE nomor_urut = '$nomor_urut';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		if ($files['gambar']['name'] == '') {
			$gambar = $result['gambar'];
		} else{

			$split = explode('.', $files['gambar']['name']);
			$ekstensi = $split[count($split)-1];

			$gambar = $result['nomor_urut'].'a.'.$ekstensi;
			unlink("img/".$result['gambar']);
			move_uploaded_file($files['gambar']['tmp_name'], 'img/'.$gambar);
		}

		$query = "UPDATE surat_masuk SET nama_dan_alamat_pengirim='$nama_dan_alamat_pengirim', nomor_surat='$nomor_surat', tanggal='$tanggal', perihal='$perihal', lampiran='$lampiran', nomor_petunjuk='$nomor_petunjuk', disposisi_kepada='$disposisi_kepada', instruksi_informasi='$instruksi_informasi', keterangan='$keterangan', gambar='$gambar' WHERE nomor_urut='$nomor_urut';";
		$sql = mysqli_query($GLOBALS['conn'], $query);
		return true;
	}
	
	function hapus_data($data){
		$nomor_urut = $data['hapus'];

		$queryShow = "SELECT * FROM surat_masuk WHERE nomor_urut = $nomor_urut";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		// var_dump($result);

		unlink("img/".$result['gambar']);

		$query = "DELETE FROM surat_masuk WHERE nomor_urut = '$nomor_urut';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
 ?>