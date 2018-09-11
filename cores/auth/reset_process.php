<?php  
	
	// start session
	session_start();

	// include core
	include '../misc/connect.php';
	include '../misc/function.php'; 

	$user_id = sanitizeThis($_POST['user_id']);
	$token = sanitizeThis($_POST['token']);
	$password = md5(sanitizeThis($_POST['password']));
	$password_konfirmasi = md5(sanitizeThis($_POST['password_konfirmasi']));

	if ($password != $password_konfirmasi) {
		$_SESSION['gagal'] = 'Konfirmasi password yang diinputkan tidak cocok.';
		header('Location:../../main.php?page=reset-password&token='.$token.'&user='.$user_id);
		die();
	}

	mysqli_autocommit($conn, false);

	$resetQ = "UPDATE user_akun SET password = '$password' WHERE id = '$user_id'";
	$resetP = mysqli_query($conn, $resetQ);

	if ($resetP) {
		$tokenQ = "UPDATE remember SET status = '1' WHERE user_akun_id = '$user_id' AND token = '$token'";
		$tokenP = mysqli_query($conn, $tokenQ);

		if ($tokenP) {
			mysqli_commit($conn);
			$_SESSION['sukses'] = 'Password anda berhasil dirubah. Silahkan Login';
			header('Location:../../main.php?page=login');
			die();
		} else {
			mysqli_rollback($conn);
			$_SESSION['gagal'] = 'Telah terjadi sebuah kesalahan.';
			header('Location:../../main.php?page=reset-password&token='.$token.'&user='.$user_id);
			die();
		}
	} else {
		mysqli_rollback($conn);
		$_SESSION['gagal'] = 'Telah terjadi sebuah kesalahan.';
		header('Location:../../main.php?page=reset-password&token='.$token.'&user='.$user_id);
		die();
	}

?>