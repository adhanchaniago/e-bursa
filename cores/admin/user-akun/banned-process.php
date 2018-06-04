<?php 

	// set variable data from URL
	$user_akun_id =sanitizeThis($_GET['id']);
	$user_status = sanitizeThis($_GET['val']);

	// checking user status then set query
	if ($user_status == 1) {
		$query = "UPDATE user_akun SET status = '0' WHERE id = '$user_akun_id'";
	} else {
		$query = "UPDATE user_akun SET status = '1' WHERE id = '$user_akun_id'";
	}

	// execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		if ($user_status == 1) {
			$_SESSION['sukses'] = 'Akun UID#'.$user_akun_id.' berhasil di banned!';
			header('Location:?page=akun');
			die();
		} else {
			$_SESSION['sukses'] = 'Akun UID#'.$user_akun_id.' berhasil di unbanned!';
			header('Location:?page=akun');
			die();
		}
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=akun');
		die();
	}

?>