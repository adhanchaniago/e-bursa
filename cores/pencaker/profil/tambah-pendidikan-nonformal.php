<?php  

	// start session
	session_start();

	// include cores
	include '../../misc/connect.php';
	include '../../misc/function.php';

	// form-validation
	if (empty($_POST['nama_kegiatan'])) {
		$_SESSION['gagal'] = 'Kolom nama kegiatan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['penyelenggara'])) {
		$_SESSION['gagal'] = 'Kolom penyelenggara kegiatan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['tgl_mulai'])) {
		$_SESSION['gagal'] = 'Kolom tanggal mulai kegiatan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['tgl_selesai'])) {
		$_SESSION['gagal'] = 'Kolom tanggal selesai tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} elseif (empty($_POST['tempat'])) {
		$_SESSION['gagal'] = 'Kolom tempat penyelenggara kegiatan tidak boleh kosong!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	}

	// set variable
	$user_id = pencakerProfID(sanitizeThis($_POST['user_id']));
	$nama = sanitizeThis($_POST['nama_kegiatan']);
	$penyelenggara = sanitizeThis($_POST['penyelenggara']);
	$tgl_mulai = sanitizeThis($_POST['tgl_mulai']);
	$tgl_selesai = sanitizeThis($_POST['tgl_selesai']);
	$tmpt_kegiatan = sanitizeThis($_POST['tempat']);
	$date = date("Y-m-d");

	// set query
	$query = "INSERT INTO pendidikan_nonformal (profil_pencaker_id, nama_kegiatan, penyelenggara, tanggal_mulai, tanggal_selesai, tempat_kegiatan, dibuat_pada) VALUES ('$user_id', '$nama', '$penyelenggara', '$tgl_mulai', '$tgl_selesai', '$tmpt_kegiatan', '$date')";

	// execute query
	$process = mysqli_query($conn, $query) or die(mysqli_error($conn));

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Pendidikan non formal telah berhasil diperbaharui!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	}

?>