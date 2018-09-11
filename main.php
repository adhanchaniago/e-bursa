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
	<title>E-Bursa</title>
	<link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendors/datatables/datatables.min.css">
	<link rel="stylesheet" href="assets/vendors/air-datepicker/dist/css/datepicker.min.css">
	<link rel="stylesheet" href="assets/vendors/zabuto/zabuto_calendar.min.css">
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
				} elseif ($page == 'lupa-password') {
					include "views/auth/lupa.php";
				} elseif ($page == 'aktivasi') {
					include "views/auth/aktivasi.php";
				} elseif ($page == 'reset-password') {
					include "views/auth/reset.php";
				} elseif ($page == 'info') {
					include "views/info.php";
				} elseif ($page == 'loker') {
					include "views/loker.php";
				} elseif ($page == 'loker-adv') {
					include "views/loker-adv.php";
				} elseif ($page == 'detail-loker') {
					include "views/detail-loker.php";
				} elseif ($page == 'detail-info') {
					include "views/detail-info.php";
				} elseif ($page == 'tambah-komentar-loker') {
					include "views/tambah-komentar-loker.php";
				} elseif ($page == 'tambah-komentar-info') {
					include "views/tambah-komentar-info.php";
				} elseif ($page == 'lamar-kerja') {
					include "views/lamar-kerja.php";
				} elseif ($page == 'profil-pencaker') {
					include "views/profil-pencaker.php";
				} elseif ($page == 'profil-perusahaan') {
					include "views/profil-perusahaan.php";
				} elseif ($page == 'kontak') {
					include "views/kontak.php";
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
	<script src="assets/vendors/zabuto/zabuto_calendar.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script>
		$(function(){
			$("#my-calendar").zabuto_calendar({
		    	language: "en",
		    	today: true,
		    	show_previous: true,
		     	show_next: true
		    });
		});
	</script>
</body>
</html>