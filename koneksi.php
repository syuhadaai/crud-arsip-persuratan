<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'arsip_persuratan';
	$conn = mysqli_connect($host, $user, $pass, $db);
	// if ($conn) {
	// 	echo "Koneksi Berhasil";
	// }

	mysqli_select_db($conn, $db);

	//}
?>

