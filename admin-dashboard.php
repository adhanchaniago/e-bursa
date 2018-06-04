<?php

	session_start();

	require 'cores/misc/connect.php';
	require 'cores/misc/function.php'; 

	$dataProfil = getAdminProfil($_SESSION['user_id']);

	if (!isset($_SESSION['username']) || $_SESSION['hak_akses'] != 'admin') {
		session_unset();
		$_SESSION['gagal'] = 'Maaf anda tidak memiliki izin untuk mengakses halaman ini';
		header('Location:index.php?page=home');
		die();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Administrator</title>
	<link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendors/datatables/datatables.min.css">
	<link rel="stylesheet" href="assets/vendors/air-datepicker/dist/css/datepicker.min.css">
	<link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
	<?php include "views/partials/admin-navbar.php"; ?>

	<div class="container main-content">
		
		<div><br></div>

		<?php include "views/partials/notification.php" ?>
		
		<?php  

			if (ISSET($_GET['page'])) {
				$page = $_GET['page'];
				
				if ($page == 'home') {
					include "views/admin/home.php";
				} elseif ($page == 'profil') {
					include "views/admin/profil.php";
				} elseif ($page == 'akun') {
					include "views/admin/list-akun.php";
				} elseif ($page == 'banned') {
					include "views/admin/user-akun/banned.php";
				} elseif ($page == 'aktivasi') {
					include "views/admin/user-akun/aktivasi.php";
				} elseif ($page == 'event') {
					include "views/admin/event-berita/tambah-event.php";
				} elseif ($page == 'list-event') {
					include "views/admin/event-berita/list-event.php";
				} elseif ($page == 'publish') {
					include "views/admin/event-berita/publish.php";
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
	<script src="assets/vendors/datatables/datatables.min.js"></script>
	<script src="assets/vendors/air-datepicker/dist/js/datepicker.min.js"></script>
	<script src="assets/vendors/air-datepicker/dist/js/i18n/datepicker.en.js"></script>
	<script src="assets/vendors/tinymce/jquery.tinymce.min.js"></script>
	<script src="assets/vendors/tinymce/tinymce.min.js"></script>
	<script src="assets/js/app.js"></script>
</body>
</html>