<?php  
	// var_dump($_SERVER); 
	// die();
	// set variabel form url
	$token = $_GET['token'];
	$user_id = $_GET['user'];

	// cek apabila sebelumnya sudah di aktivasi
	$status = cekToken($token, $user_id);
	if ($status == '1') {
		$_SESSION['gagal'] = 'Anda telah melakukan aktivasi sebelumnya, silahkan hubungi admin untuk informasi lanjutan!';
		header('Location:?page=login');
		die();
	}

	// start mysqli transaction
	mysqli_autocommit($conn, false);

	$flag = true;

	// ubah status aktivasi pada tabel aktivasi
	$query1 = "UPDATE aktivasi SET status = '1' WHERE user_akun_id = '$user_id' AND token = '$token'";
	$proces1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));

	// ubah status aktivasi pada tabel user_akun
	$query2 = "UPDATE user_akun SET aktivasi = '1' WHERE id = '$user_id'";
	$proces2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

	// cek kalau ada proses ubah ada yang gagal
	if (!$proces1 || !$proces2) {
		$flag = false;
	}

	// cek flag
	if ($flag) {
		// commit mysqli transaction
		mysqli_commit($conn);
		// redirect ke halaman daftar
		$_SESSION['sukses'] = 'Selamat akun anda telah aktif, silahkan login terlebih dahulu.!';
		header('Location:?page=login');
		die();
	} else {
		// rollback mysqli transaction
		mysqli_rollback($conn);
		// redirect ke halaman daftar
		$_SESSION['gagal'] = 'Maaf, telah terjadi sebuah kesalahan.!';
		header('Location:?page=login');
		die();
	}

?>