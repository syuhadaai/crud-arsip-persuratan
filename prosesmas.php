<?php 
	include 'fungsimas.php';
	if (isset($_POST['aksi'])) {
		if ($_POST['aksi'] == "add") {
	    $berhasil = tambah_data($_POST, $_FILES);
		    if ($berhasil) {
		        $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";

		        header("location: smas.php");
		    } else {
		        echo $berhasil;
		    }
	    }
	} elseif ($_POST['aksi'] == "edit") {
	    $berhasil = ubah_data($_POST, $_FILES);
	    if ($berhasil) {
	        $_SESSION['eksekusi'] = "Data Berhasil Diperbarui";

	        header("location: smas.php");
	    } else {
	        echo $berhasil;
	    }
	}

	if (isset($_GET['hapus'])) {
		
		$berhasil = hapus_data($_GET);

		if ($berhasil) {
			$_SESSION['eksekusi'] = "Data Berhasil Dihapus";
			header("location: smas.php");
		}else {
				echo $berhasil;
		}
	}

?>