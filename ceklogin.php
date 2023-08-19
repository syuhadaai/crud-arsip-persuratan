<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password';");

if (mysqli_num_rows($sql) == 0) {
    echo "<script>
    alert('Username / Password Salah! Silahkan Login Kembali'); 
    document.location='login.php';
    </script>";
}else{
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username; // Simpan username dalam sesi
    header("location: halaman.php");
    exit();
}
?>
