<?php  

	// get user_id from URL
	$user_id = sanitizeThis($_GET['id']);

	// set query
	$query = "UPDATE user_akun SET aktivasi = '1' WHERE id = '$user_id'";
	
	// execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Akun UID#'.$user_akun_id.' berhasil di aktivasi!';
		header('Location:?page=akun');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=akun');
		die();
	}

?>