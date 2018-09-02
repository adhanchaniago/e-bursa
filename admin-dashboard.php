<?php

	session_start();

	require 'cores/misc/connect.php';
	require 'cores/misc/function.php'; 

	$dataProfil = getAdminProfil($_SESSION['user_id']);

	if (!isset($_SESSION['username']) || $_SESSION['hak_akses'] != 'admin') {
		session_unset();
		$_SESSION['gagal'] = 'Maaf anda tidak memiliki izin untuk mengakses halaman ini';
		header('Location:main.php?page=home');
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
	<script src="assets/vendors/jquery/js/jquery.min.js"></script>
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
				} elseif ($page == 'ubah-event') {
					include "views/admin/event-berita/ubah-event.php";
				} elseif ($page == 'list-event') {
					include "views/admin/event-berita/list-event.php";
				} elseif ($page == 'publish') {
					include "views/admin/event-berita/publish.php";
				} elseif ($page == 'loker') {
					include "views/admin/loker.php";
				} elseif ($page == 'banned-loker') {
					include "views/admin/loker/banned.php";
				} elseif ($page == 'statik-loker') {
					include "views/admin/loker/get-statik-loker.php";
				} elseif ($page == 'print-user-akun') {
					include "views/admin/laporan/print-user-akun.php";
				} elseif ($page == 'print-loker') {
					include "views/admin/laporan/print-loker.php";
				}

			}
				
		?>
		
	</div>

	<footer class="footer">
		<div class="container">
			<?php echo date('Y') ?> @ <a href="https://stmikindonesia.ac.id" target="_blank">STMIK INDONESIA PADANG</a>
		</div>
	</footer>

	<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendors/datatables/datatables.min.js"></script>
	<script src="assets/vendors/air-datepicker/dist/js/datepicker.min.js"></script>
	<script src="assets/vendors/air-datepicker/dist/js/i18n/datepicker.en.js"></script>
	<script src="assets/vendors/tinymce/jquery.tinymce.min.js"></script>
	<script src="assets/vendors/tinymce/tinymce.min.js"></script>
	<script src="assets/vendors/chart/dist/Chart.bundle.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script>
		$(function() {
			$.ajax({
				url: 'http://localhost/e-bursa/cores/admin/loker/get-statik-loker.php', 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					var ctx = document.getElementById("chart-loker").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: data.bulan,
							datasets: [{
								label: 'Lowongan Kerja',
								data: data.total,
								backgroundColor: [
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
								],
								borderColor: [
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
								],
								borderWidth: 1
							}]
						},
						options: {
							animation: {
								duration: 0
							}
						}
					});
				}
			});
			$.ajax({
				url: 'http://localhost/e-bursa/cores/admin/user-akun/get-statik-akun.php', 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					var ctx = document.getElementById("chart-akun").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: data.bulan,
							datasets: [{
								label: 'Pencaker',
								data: data.pencaker,
								backgroundColor: [
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(54, 162, 235, 0.2)',
								],
								borderColor: [
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(54, 162, 235, 1)',
								],
								borderWidth: 1
							},{
								label: 'Perusahaan',
								data: data.perusahaan,
								backgroundColor: [
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 99, 132, 0.2)',
								],
								borderColor: [
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
									'rgba(255,99,132,1)',
								],
								borderWidth: 1
							}]
						},
						options: {
							animation: {
								duration: 0
							}
						}
					});
				}
			});
		});
	</script>
</body>
</html>