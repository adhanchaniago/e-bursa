<?php
	
	// start session
	session_start();

	// include core
	include '../misc/connect.php';
	include '../misc/function.php'; 

	// set variable
	$username = sanitizeThis($_POST['username']);
	$password = md5(sanitizeThis($_POST['password']));

	// set query
	$sql = "SELECT * FROM user_akun WHERE username = '$username' AND password = '$password'";

	// execute query
	$proc = mysqli_query($conn, $sql);

	// fetch data
	$data = mysqli_fetch_assoc($proc);
	$resnum = mysqli_num_rows($proc);

	// account validation
	if ($data && $resnum == 1) {
		$status = $data['status'];
		$aktivasi = $data['aktivasi'];
		$hakakses_id = $data['hak_akses_id'];
		$hakakses = getSlugHakAkses($hakakses_id);
		if ($aktivasi == 0) {
			session_unset();
			$_SESSION['gagal'] = 'Akun belum di aktivasi. Silahkan cek kembali e-mail anda untuk melakukan aktivasi akun.';
			header('Location:../../main.php?page=login');
			die();
		} elseif ($status == 0) {
			session_unset();
			$_SESSION['gagal'] = 'Akun anda diblokir. Silahkan hubungi administrator untuk informasi lanjut.';
			header('Location:../../main.php?page=login');
			die();
		}
		if ($hakakses == 'admin') {
			$_SESSION['user_id'] = $data['id'];		
			$_SESSION['username'] = $data['username'];
			$_SESSION['hak_akses'] = $hakakses;
			$_SESSION['sukses'] = 'Selamat Datang.';
			header('Location:../../admin-dashboard.php?page=home');
			die();
		} elseif ($hakakses == 'pencaker') {
			$_SESSION['user_id'] = $data['id'];		
			$_SESSION['username'] = $data['username'];
			$_SESSION['hak_akses'] = $hakakses;
			$_SESSION['sukses'] = 'Selamat Datang.';
			header('Location:../../pencaker-dashboard.php?page=home');
			die();
		} elseif ($hakakses == 'perusahaan') {
			$_SESSION['user_id'] = $data['id'];		
			$_SESSION['username'] = $data['username'];
			$_SESSION['hak_akses'] = $hakakses;
			$_SESSION['sukses'] = 'Selamat Datang.';
			header('Location:../../perusahaan-dashboard.php?page=home');
			die();
		}
	} else {
		$_SESSION['gagal'] = 'Username dan Password yang anda inputkan tidak terdaftar.';
		header('Location:../../main.php?page=login');
		die();
	}

?>