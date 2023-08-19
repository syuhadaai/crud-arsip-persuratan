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

// // Proses logout
// if (isset($_GET['logout'])) {
//     session_unset();    // Hapus semua variabel sesi
//     session_destroy();  // Hancurkan sesi
//     header("Location: login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>
    
    <title>Home</title>

    <!-- <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script> -->

</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
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
    <div style="width: 350px; margin: 80px auto; padding: 30px 20px;">
        <form style="text-align: center;">    
                <a class="btn btn-primary btn-lg" href="smas.php" role="button">SURAT MASUK</a> 
                <br><br>
                <a class="btn btn-primary btn-lg" href="skel.php" role="button">SURAT KELUAR</a> 
        </form>    
    </div>
</body>
<!-- HALO SELAMAT DATANG
<br><br>
<a href="login.php">BACK</a> -->
</html>
