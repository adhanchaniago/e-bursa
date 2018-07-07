<?php  

	// start session
	session_start();

	// include cores
	include '../../misc/connect.php';
	include '../../misc/function.php';

	var_dump($_POST);

	// form validation
	if (empty($_POST['nama'])) {
		$_SESSION['gagal'] = 'Kolom nama perusahaan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['jabatan'])) {
		$_SESSION['gagal'] = 'Kolom jabatan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['deskripsi'])) {
		$_SESSION['gagal'] = 'Kolom deskripsi jabatan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['bidang'])) {
		$_SESSION['gagal'] = 'Kolom bidang perusahaan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['masuk'])) {
		$_SESSION['gagal'] = 'Kolom tanggal masuk tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['keluar'])) {
		$_SESSION['gagal'] = 'Kolom tanggal keluar tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	}

	// set variables
	$user_id = pencakerProfID(sanitizeThis($_POST['user_id']));
	$nama = sanitizeThis($_POST['nama']);
	$jabatan = sanitizeThis($_POST['jabatan']);
	$deskripsi = sanitizeThis($_POST['deskripsi']);
	$bidang = sanitizeThis($_POST['bidang']);
	$masuk = sanitizeThis($_POST['masuk']);
	$keluar = sanitizeThis($_POST['keluar']);
	$date = date("Y-m-d");

	// set query
	$query = "INSERT INTO pengalaman_kerja (profil_pencaker_id, nama_perusahaan, jabatan, deskripsi_jabatan, bidang_perusahaan, tanggal_masuk, tanggal_keluar, dibuat_pada) VALUES ('$user_id', '$nama', '$jabatan', '$deskripsi', '$bidang', '$masuk', '$keluar', '$date')";

	//  execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Pengalaman kerja telah berhasil diperbaharui!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	}

?>