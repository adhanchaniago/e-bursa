<?php  

	$status = sanitizeThis($_GET['id']);

	// set query
	$query = "UPDATE lowongan SET bann = '1', status = '0' WHERE id = '$status'";

	// execute query
	$process = mysqli_query($conn, $query);

	// notification feedback
	if ($process) {
		$_SESSION['sukses'] = 'Lowongan kerja berhasil di bann!';
		header('Location:?page=loker');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi keasalahan!';
		header('Location:?page=loker');
		die();
	}

?>