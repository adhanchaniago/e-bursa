<?php 

	// start session
	session_start();

	// include core
	include '../../misc/connect.php';
	include '../../misc/function.php';

	// form validation
	if (empty($_POST["judul"])) {
		$_SESSION['gagal'] = 'Kolom judul tidak boleh kosong!';
		header('Location:../../../admin-dashboard.php?page=list-event');
		die();
	} elseif (empty($_POST["kategori"])) {
		$_SESSION['gagal'] = 'Kolom kategori tidak boleh kosong!';
		header('Location:../../../admin-dashboard.php?page=list-event');
		die();
	} elseif (empty($_POST["konten"])) {
		$_SESSION['gagal'] = 'Kolom konten tidak boleh kosong!';
		header('Location:../../../admin-dashboard.php?page=list-event');
		die();
	} elseif (is_null($_POST["status"])) {
		$_SESSION['gagal'] = 'Kolom publish tidak boleh kosong!';
		header('Location:../../../admin-dashboard.php?page=list-event');
		die();
	}

	// set variable
	$user_id = $_SESSION['user_id'];
	$eventID = sanitizeThis($_POST['info_id']);
	$judul = sanitizeThis($_POST['judul']);
	$kategori = sanitizeThis($_POST['kategori']);
	$konten = $_POST['konten'];
	$status = sanitizeThis($_POST['status']);
	$tanggal = date('Y-m-d');

	// set query
	$query = "
		UPDATE info_berita SET judul = '$judul', kategori = '$kategori', konten = '$konten', status = '$status' 
		WHERE id = '$eventID'
	";

	// execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Event/Berita baru telah berhasil diubah!';
		header('Location:../../../admin-dashboard.php?page=list-event');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:../../../admin-dashboard.php?page=list-event');
		die();
	}

?>