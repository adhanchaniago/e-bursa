<?php  

	// set variabel
	$lamar_id = sanitizeThis($_GET['id']);
	$val = sanitizeThis($_GET['val']);

	// set query
	$query = "UPDATE lamar SET status = '$val' WHERE id = '$lamar_id'";
	$process = mysqli_query($conn, $query);

	// notification feedback
	if ($process) {
		if ($val == '1') {
			$_SESSION['sukses'] = 'Pelamar telah berhasil diterima!';
		} elseif ($val == '2') {
			$_SESSION['sukses'] = 'Pelamar telah berhasil ditolak!';
		}
		header('Location:?page=lihat-pelamar&id='.$lamar_id);
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=lihat-pelamar&id='.$lamar_id);
		die();
	}

?>