<?php  

	// start session
	session_start();

	// include core
	include '../misc/connect.php';
	include '../misc/function.php'; 

	// require PHPMailer
	require '../misc/phpmailer.php';

	// set variable
	$username = sanitizeThis($_POST['username']);
	$email = sanitizeThis($_POST['email']);

	// cek user
	$userQ = "SELECT * FROM user_akun WHERE username = '$username'";
	$userP = mysqli_query($conn, $userQ);

	if (mysqli_num_rows($userP) == 0) {
		$_SESSION['gagal'] = 'Maaf, username yang di inputkan tidak terdaftar.!';
		header('Location:../../main.php?page=lupa-password');
		die();
	}

	$userDt = mysqli_fetch_assoc($userP);

	$hak_akses = $userDt['hak_akses_id'];
	$user_id = $userDt['id'];
	$profilQ = '';

	if ($hak_akses == '2') {
		$profilQ = "SELECT * FROM profil_pencaker WHERE user_akun_id = '$user_id'";
	} elseif ($hak_akses == '3') {
		$profilQ = "SELECT * FROM profil_perusahaan WHERE user_akun_id = '$user_id'";
	}

	$profilP = mysqli_query($conn, $profilQ);
	$profilDt = mysqli_fetch_assoc($profilP);

	$dtEmail = $profilDt['email'];

	if ($email != $dtEmail) {
		$_SESSION['gagal'] = 'Maaf, email yang di inputkan tidak tidak cocok dengan data yang terdaftar.!';
		header('Location:../../main.php?page=lupa-password');
		die();
	}

	$token_reset = generateToken();

	$resetQ = "INSERT INTO remember (user_akun_id, token, status) VALUES ('$user_id', '$token_reset', '0')";
	$resetP = mysqli_query($conn, $resetQ);

	if ($resetP) {
		try {
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject = 'Reset Password Akun';
			$mail->Body = "
			<p>Anda telah memrequest link untuk melakukan peresetan password, klik link berikut untuk mereset password anda : </p>
			<br>
			<p>http://localhost/e-bursa/main.php?page=reset-password&token=".$token_reset."&user=".$user_id."</p>
			";
			$mail->send();

			$_SESSION['sukses'] = 'Kami telah mengirimkan link untuk mereset password akun. Silahkan cek e-mail anda untuk mereset password anda.!';
			header('Location:../../main.php?page=login');
			die();
		} catch (Exception $e) {
			$_SESSION['gagal'] = 'Maaf, telah terjadi sebuah kesalahan.!';
			header('Location:../../main.php?page=lupa-password');
			die();
		}
	} else {
		$_SESSION['gagal'] = 'Maaf, telah terjadi sebuah kesalahan.!';
		header('Location:../../main.php?page=lupa-password');
		die();
	}		

?>