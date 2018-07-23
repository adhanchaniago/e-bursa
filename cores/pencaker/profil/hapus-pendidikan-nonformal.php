<?php  

	$id = sanitizeThis($_GET['id']);

	// set query
	$query = "DELETE FROM pendidikan_nonformal WHERE id = '$id'";

	// executw query
	$process = mysqli_query($conn, $query);

	// notification feedback
	if ($process) {
		$_SESSION['sukses'] = 'Pendidikan non formal berhasil dihapus!';
		header('Location:?page=profil');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi keasalahan!';
		header('Location:?page=profil');
		die();
	}

?>