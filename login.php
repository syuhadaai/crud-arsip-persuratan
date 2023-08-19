<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<title>HALAMAN FORM LOGIN</title>
</head>
<body>
	<nav class="navbar bg-body-tertiary">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="#">
      		<img src="img/logosma.jpeg" alt="Logo" width="60" height="60" class="d-inline-block align-text-middle">
      		ARSIP PERSURATAN SMA NEGERI 3 PURWAKARTA
    		</a> 
  		</div>
	</nav>
	<div class="kotak_login" style="width: 350px;
	background: #32acff;
	margin: 80px auto;
	padding: 30px 20px;">
		<p class="tulisan_login" style="text-align: center; text-transform: uppercase;">Silahkan Login</p>
		<form action="ceklogin.php" method="POST" role="form">
			<label>Username</label>
			<input type="text" name="username" class="form_login" style="box-sizing: border-box;
				width: 100%;
				padding: 10px;
				font-size: 11pt;
				margin-bottom: 20px;
				margin-top: 10px;" placeholder="Username" autocomplete="off">
			<label>Password</label>
			<input type="password" name="password" class="form_login" style="box-sizing: border-box;
				width: 100%;
				padding: 10px;
				font-size: 11pt;
				margin-bottom: 20px;
				margin-top: 10px;" placeholder="Password" autocomplete="off">
			<input type="submit" name="login" class="tombol_login" style="background: #f49320;
				color: #ffff;
				font-size: 11pt;
				width: 100%;
				border: none;
				border-radius: 3px;
				padding: 10px 20px;
				cursor: pointer;" value="login">
			<?php return; ?>
		</form>
	</div>
</body>
</html>