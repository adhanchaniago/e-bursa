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

	// start mysqli transaction
	mysqli_autocommit($conn, false);

	// set query
	$query = "INSERT INTO pengalaman_kerja (profil_pencaker_id, nama_perusahaan, jabatan, deskripsi_jabatan, bidang_perusahaan, tanggal_masuk, tanggal_keluar, dibuat_pada) VALUES ('$user_id', '$nama', '$jabatan', '$deskripsi', '$bidang', '$masuk', '$keluar', '$date')";

	//  execute query
	$process = mysqli_query($conn, $query);
	$last_id = mysqli_insert_id($conn);

	// if user upload lampiran
	if ($process) {
		if ($_FILES['lampiran']['name'] != NULL) {	
			$file_type = strtolower(pathinfo($_FILES['lampiran']['name'], PATHINFO_EXTENSION));
			$file_name = sanitizeThis($_FILES['lampiran']['name']);
			$file_size = $_FILES['lampiran']['size'];
			$target_dir = '../../../assets/img/lampiran/pengalaman_kerja/';
			$check = getimagesize($_FILES['lampiran']['tmp_name']);
			// check file is image file
			if ($check == false) {
				$_SESSION['gagal'] = 'File yang diinputkan bukan merupakan file gambar!';
				header('Location:../../../pencaker-dashboard.php?page=profil');
				die();
			}
			// check mime of files
			if ($file_type != 'jpeg' && $file_type != 'jpg' && $file_type != 'png') {
				$_SESSION['gagal'] = 'Hanya file gambar dengan ekstensi jpeg, jpg, dan png yang diizinkan!';
				header('Location:../../../pencaker-dashboard.php?page=profil');
				die();
			}
			// max file size is 2MB
			if ($file_size > 2000000) {	
				$_SESSION['gagal'] = 'Ukuran file gambar maksimal 2MB!';
				header('Location:../../../pencaker-dashboard.php?page=profil');
				die();
			}
			// move file to upload directory
			$new_file_name = substr(sha1(time()), 0, 20).'.'.$file_type;
			$new_target_file = $target_dir.$new_file_name;
			$upload_file = move_uploaded_file($_FILES['lampiran']['tmp_name'], $new_target_file);
			// notification if error while moving file
			if (!$upload_file) {	
				$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam mengupload file gambar!';
				header('Location:../../../pencaker-dashboard.php?page=profil');
				die();
			}
			// set and execute query to save file name
			$sql_upload = "UPDATE pengalaman_kerja SET lampiran = '$new_file_name' WHERE id = '$last_id'";
			$proces_upload = mysqli_query($conn, $sql_upload);

			if (!$proces_upload) {
				$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
				header('Location:../../../pencaker-dashboard.php?page=profil');
				die();
			}
		}
	}

	// commit mysqli transaction
	mysqli_commit($conn);

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