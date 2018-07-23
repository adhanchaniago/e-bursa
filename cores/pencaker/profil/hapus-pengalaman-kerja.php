<?php  

	$id = sanitizeThis($_GET['id']);

	// set query
	$query = "DELETE FROM pengalaman_kerja WHERE id = '$id'";

	// execute query
	$process = mysqli_query($conn, $query);

	// notification feedback
	if ($process) {
		$_SESSION['sukses'] = 'Pengalaman kerja berhasil dihapus!';
		header('Location:?page=profil');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi keasalahan!';
		header('Location:?page=profil');
		die();
	}

?>