<?php

	// set variable
	$user_id = sanitizeThis($_POST['user_id']);
	$info_id = sanitizeThis($_POST['info_id']);
	$konten = $_POST['komentar'];
	$date = date("Y-m-d");

	// set query
	$query = "INSERT INTO info_komentar (info_id, user_akun_id, konten, tanggal) VALUES ('$info_id', '$user_id', '$konten', '$date')";

	// execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Komentar telah berhasil ditambahkan!';
		header('Location:?page=detail-info&id='.$info_id);
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=detail-info&id='.$info_id);
		die();
	}

?>