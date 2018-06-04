<?php  

	// set variabel from URL
	$id = sanitizeThis($_GET['id']);
	$status = sanitizeThis($_GET['val']);

	// checking status
	if ($status == '1') {
		$query = "UPDATE info_berita SET status = '0' WHERE id = '$id'";
	} else {
		$query = "UPDATE info_berita SET status = '1' WHERE id = '$id'";
	}

	// execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		if ($status == 1) {
			$_SESSION['sukses'] = 'Postingan berhasil di hiden!';
			header('Location:?page=list-event');
			die();
		} else {
			$_SESSION['sukses'] = 'Postingan berhasil di publish!';
			header('Location:?page=list-event');
			die();
		}
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=list-event');
		die();
	}

?>