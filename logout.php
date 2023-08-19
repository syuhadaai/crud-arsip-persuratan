<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Harap Untuk Login Terlebih Dahulu');
            document.location.href = 'login.php';
          </script>";
    exit();
}

$_SESSION = [];
// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan pengguna kembali ke halaman login atau halaman beranda
header("Location: login.php"); // Ganti dengan halaman yang sesuai
exit();
?>
