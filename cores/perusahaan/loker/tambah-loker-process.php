<?php  

	// start session
	session_start();

	// include cores
	include '../../misc/connect.php';
	include '../../misc/function.php';

	// form-validation
	if (empty($_POST['title'])) {
		$_SESSION['gagal'] = 'Kolom title lowongan pekerjaan tidak boleh kosong!';
		header('Location:../../../perusahaan-dashboard.php?page=tambah-loker');
		die();
	} elseif (empty($_POST['deskripsi'])) {
		$_SESSION['gagal'] = 'Kolom deskripsi job tidak boleh kosong!';
		header('Location:../../../perusahaan-dashboard.php?page=tambah-loker');
		die();
	} elseif (empty($_POST['syarat'])) {
		$_SESSION['gagal'] = 'Kolom deskripsi persyaratan tidak boleh kosong!';
		header('Location:../../../perusahaan-dashboard.php?page=tambah-loker');
		die();
	} elseif (empty($_POST['gaji'])) {
		$_SESSION['gagal'] = 'Kolom sallary tidak boleh kosong!';
		header('Location:../../../perusahaan-dashboard.php?page=tambah-loker');
		die();
	} elseif (empty($_POST['mulai'])) {
		$_SESSION['gagal'] = 'Kolom tanggal mulai tidak boleh kosong!';
		header('Location:../../../perusahaan-dashboard.php?page=tambah-loker');
		die();
	} elseif (empty($_POST['selesai'])) {
		$_SESSION['gagal'] = 'Kolom tanggal selesai kegiatan tidak boleh kosong!';
		header('Location:../../../perusahaan-dashboard.php?page=tambah-loker');
		die();
	}

	// set variables
	$id = sanitizeThis(perusahaanProfID($_POST['user_id']));
	$title = sanitizeThis($_POST['title']);
	$deskripsi = $_POST['deskripsi'];
	$syarat = $_POST['syarat'];
	$gaji = sanitizeThis($_POST['gaji']);
	$mulai = sanitizeThis($_POST['mulai']);
	$selesai = sanitizeThis($_POST['selesai']);
	$date = date("Y-m-d");

	// set query
	$query = "INSERT INTO lowongan (profil_perusahaan_id, judul, tanggal_mulai, tanggal_selesai, deskripsi_pekerjaan, deskripsi_persyaratan, gaji, status, dibuat_pada) VALUES ('$id', '$title', '$mulai', '$selesai', '$deskripsi', '$syarat', '$gaji', '1', '$date')";

	// execute query
	$process = mysqli_query($conn, $query);

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Lowongan pekerjaan telah berhasil ditambahkan!';
		header('Location:../../../perusahaan-dashboard.php?page=loker');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
		header('Location:../../../perusahaan-dashboard.php?page=loker');
		die();
	}

?>