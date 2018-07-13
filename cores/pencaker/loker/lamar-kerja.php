<?php  

	$lowongan_id = sanitizeThis($_GET['id']);
	$pencaker_id = pencakerProfID($_SESSION['user_id']);
	$tanggal = date("Y-m-d");

	// set query
	$query = "INSERT INTO lamar (lowongan_id, profil_pencaker_id, tanggal_lamar, status) VALUES ('$lowongan_id', '$pencaker_id', '$tanggal', '0')";

	// execute query
	$proces = mysqli_query($conn, $query);

	// feedback notification
	if ($proces) {
		$_SESSION['sukses'] = 'Lamaran anda telah berhasil ditambahkan!';
		header('Location:?page=detail-loker&id='.$lowongan_id);
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=detail-loker&id='.$lowongan_id);
		die();
	}

?>