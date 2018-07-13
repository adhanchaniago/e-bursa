<?php  

	// set variable
	$id = sanitizeThis($_GET['id']);

	// set query
	$query = "UPDATE lowongan SET status = '0' WHERE id = '$id'";

	// execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Lowongan pekerjaan telah berhasil ditutup!';
		header('Location:?page=loker');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=loker');
		die();
	}

?>