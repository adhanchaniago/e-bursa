<?php  

	// start session
	session_start();

	// include cores
	include '../../misc/connect.php';
	include '../../misc/function.php';

	// form validation
	if (empty($_POST['tingkat'])) {
		$_SESSION['gagal'] = 'Kolom tingkat pendidikan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['nama_sekolah'])) {
		$_SESSION['gagal'] = 'Kolom nama sekolah tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['th_masuk'])) {
		$_SESSION['gagal'] = 'Kolom tahun masuk tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['th_lulus'])) {
		$_SESSION['gagal'] = 'Kolom tahun lulus tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	}

	// set variables
	$user_id = pencakerProfID(sanitizeThis($_POST['user_id']));
	$tingkat = sanitizeThis($_POST['tingkat']);
	$nama = sanitizeThis($_POST['nama_sekolah']);
	$alamat = sanitizeThis($_POST['alamat_sekolah']);
	$jurusan = sanitizeThis($_POST['jurusan']);
	$masuk = sanitizeThis($_POST['th_masuk']);
	$lulus = sanitizeThis($_POST['th_lulus']);
	$date = date("Y-m-d");

	// set query
	$query = "INSERT INTO pendidikan_formal (profil_pencaker_id, tingkat_pendidikan, nama_sekolah, jurusan, tahun_masuk, tahun_lulus, alamat_Sekolah, dibuat_pada) VALUES ('$user_id', '$tingkat', '$nama', '$jurusan', '$masuk', '$lulus', '$alamat', '$date')";

	// execute query
	$process = mysqli_query($conn, $query) or die(mysqli_error($conn));

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Pendidikan formal telah berhasil diperbaharui!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	}

?>