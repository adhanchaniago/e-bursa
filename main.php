<?php 

	session_start(); 
	require 'cores/misc/connect.php';
	require 'cores/misc/function.php'; 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Selamat Datang E-Bursa</title>
	<link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
	<?php include "views/partials/navbar.php"; ?>

	<div class="container main-content">
		
		<div><br></div>

		<?php include "views/partials/notification.php" ?>
		
		<?php  

			if (ISSET($_GET['page'])) {
				$page = $_GET['page'];
				
				if ($page == 'home') {
					include "views/home.php";
				} elseif ($page == 'login') {
					include "views/auth/login.php";
				} elseif ($page == 'daftar') {
					include "views/auth/daftar.php";
				} elseif ($page == 'aktivasi') {
					include "views/auth/aktivasi.php";
				}

			}
				
		?>
		
	</div>

	<footer class="footer">
		<div class="container">
			<?php echo date('Y') ?> @ <a href="https://stmikindonesia.ac.id" target="_blank">STMIK INDONESIA PADANG</a>
		</div>
	</footer>

	<script src="assets/vendors/jquery/js/jquery.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>