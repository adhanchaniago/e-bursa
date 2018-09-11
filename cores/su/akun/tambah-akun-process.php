<?php  

	// start session
	session_start();

	// include cores
	include '../../misc/connect.php';
	include '../../misc/function.php';

	$nip = sanitizeThis($_POST['nip']);
	$nama = sanitizeThis($_POST['nama']);
	$username = sanitizeThis($_POST['username']);
	$password = md5(sanitizeThis($_POST['password']));
	$tanggal = date('Y-d-m');

	mysqli_autocommit($conn, false);

	$userQ = "INSERT INTO user_akun (hak_akses_id, username, password, status, aktivasi, dibuat_pada) VALUES('1', '$username', '$password', '1', '1', '$tanggal')";
	$userP = mysqli_query($conn, $userQ);

	$last_id = mysqli_insert_id($conn);

	if ($userP) {
		$profilQ = "INSERT INTO profil_Admin (user_akun_id, nip, nama, dibuat_pada) VALUES('$last_id', '$nip', '$nama', '$tanggal')";
		$profilP = mysqli_query($conn, $profilQ);

		if ($profilP) {
			mysqli_commit($conn);
			$_SESSION['sukses'] = 'Akun Admin baru telah berhasil ditambahkan!';
			header('Location:../../../su-dashboard.php?page=akun');
			die();
		} else {
			mysqli_rollback($conn);
			$_SESSION['gagal'] = 'Telah terjadi sebuah kesalahan!';
			header('Location:../../../su-dashboard.php?page=tambah-akun');
			die();
		}
	} else {
		mysqli_rollback($conn);
		$_SESSION['gagal'] = 'Telah terjadi sebuah kesalahan!';
		header('Location:../../../su-dashboard.php?page=tambah-akun');
		die();
	}

?>