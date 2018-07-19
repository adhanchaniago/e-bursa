<?php  

	// start session
	session_start();

	// include core
	include '../misc/connect.php';
	include '../misc/function.php'; 

	// require PHPMailer
	require '../misc/phpmailer.php';

	// form validation
	if (empty($_POST['username'])) {
		$_SESSION['gagal'] = 'Kolom username tidak boleh kosong!';
		header('Location:../../main.php?page=daftar');
		die();
	} elseif (empty($_POST['password'])) {
		$_SESSION['gagal'] = 'Kolom password tidak boleh kosong!';
		header('Location:../../main.php?page=daftar');
		die();
	} elseif (empty($_POST['password-ulang'])) {
		$_SESSION['gagal'] = 'Kolom konfirmasi password tidak boleh kosong!';
		header('Location:../../main.php?page=daftar');
		die();
	} elseif (empty($_POST['email'])) {
		$_SESSION['gagal'] = 'Kolom email tidak boleh kosong!';
		header('Location:../../main.php?page=daftar');
		die();
	} elseif (empty($_POST['nik'])) {
		$_SESSION['gagal'] = 'Kolom nik tidak boleh kosong!';
		header('Location:../../main.php?page=daftar');
		die();
	} elseif (empty($_POST['nama'])) {
		$_SESSION['gagal'] = 'Kolom nama tidak boleh kosong!';
		header('Location:../../main.php?page=daftar');
		die();
	} elseif (empty($_POST['jekel'])) {
		$_SESSION['gagal'] = 'Kolom jenis kelamin tidak boleh kosong!';
		header('Location:../../main.php?page=daftar');
		die();
	}

	// set variable
	$username = sanitizeThis($_POST['username']);
	$password = sanitizeThis($_POST['password']);
	$password_r = sanitizeThis($_POST['password-ulang']);
	$email = sanitizeThis($_POST['email']);
	$nik = sanitizeThis($_POST['nik']);
	$nama = sanitizeThis($_POST['nama']);
	$jekel = sanitizeThis($_POST['jekel']);
	$password_md5 = md5($password);
	$token_aktivasi = generateToken();
	$tanggal = date('Y-m-d');

	$email_v = validasiEmail($email);

	// Cek konfirmasi password
	if ($password != $password_r) {
		$_SESSION['gagal'] = 'Konfirmasi password yang masukkan tidak cocok!';
		header('Location:../../main.php?page=daftar');
		die();
	}
	
	// cek format e-mail
	if ($email_v['stat'] == '0') {
		$_SESSION['gagal'] = 'Email yang dimasukkan tidak valid!';
		header('Location:../../main.php?page=daftar');
		die();
	}

	// start mysqli transaction
	mysqli_autocommit($conn, false);

	$flag = true;

	// input data ke tabel user_Akun
	$query1 = "INSERT INTO user_akun (hak_akses_id, username, password, status, aktivasi, dibuat_pada) VALUES('2', '$username', '$password_md5', '1', '0', '$tanggal')";
	$proces1 = mysqli_query($conn, $query1);

	$last_akun_id = mysqli_insert_id($conn);

	// input data ke tabel aktivasi
	$query2 = "INSERT INTO aktivasi (user_akun_id, token, status) VALUES('$last_akun_id', '$token_aktivasi', '0')";
	$proces2 = mysqli_query($conn, $query2);

	// input data ke tabel profil_pencaker
	$query3 = "INSERT INTO profil_pencaker (user_akun_id, nik, nama, jenis_kelamin, email, dibuat_pada) VALUES('$last_akun_id', '$nik', '$nama', '$jekel', '$email', '$tanggal')";
	$proces3 = mysqli_query($conn, $query3);

	// cek apakah ada proses input ada yang gagal
	if (!$proces1 || !$proces2 || !$proces3) {
		$flag = false;
	}

	// cek flag
	if ($flag) {
		try {
			// kirim email konfirmasi
			$mail->addAddress($email_v['text']);
			$mail->isHTML(true);
			$mail->Subject = 'Aktivasi User Akun';
			$mail->Body = "
				<p>Terima Kasih telah melakukan pendaftaran di E-Bursa Pariaman, klik link berikut untuk aktivasi akun anda : </p>
				<br>
				<p>http://localhost/e-bursa/main.php?page=aktivasi&token=".$token_aktivasi."&user=".$last_akun_id."</p>
			";
			$mail->send();
			// commit mysqli transaction
			mysqli_commit($conn);
			// redirect ke halaman daftar
			$_SESSION['sukses'] = 'Terima kasih, anda telah berhasil melakukan pendaftaran. Silahkan cek e-mail anda untuk melakukan aktivasi akun.!';
			header('Location:../../main.php?page=daftar');
			die();
		} catch (Exception $e) {    	
			// redirect ke halaman daftar
			$_SESSION['gagal'] = 'Maaf, telah terjadi sebuah kesalahan.!';
			header('Location:../../main.php?page=daftar');
			die();
		}
	} else {
		// rollback mysqli transaction
		mysqli_rollback($conn);
		// redirect ke halaman daftar
		$_SESSION['gagal'] = 'Maaf, telah terjadi sebuah kesalahan.!';
		header('Location:../../main.php?page=daftar');
		die();
	}

?>