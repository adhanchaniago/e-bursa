<?php  

	$user_id = sanitizeThis($_GET['id']);
	$password = md5('12345');

	$resetQ = "UPDATE user_akun SET password = '$password' WHERE id = '$user_id'";
	$resetP = mysqli_query($conn, $resetQ);

	if ($resetP) {
	 	$_SESSION['sukses'] = 'Pasword telah di reset menjadi default "12345"!';
		header('Location:?page=akun');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=akun');
		die();
	} 

?>