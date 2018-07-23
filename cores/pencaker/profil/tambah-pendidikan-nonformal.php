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
	} elseif ($_FILES['lampiran']['name'] == NULL) {
		$_SESSION['gagal'] = 'Lampiran tidak boleh kosong!';
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

	// start mysqli transaction
	mysqli_autocommit($conn, false);

	// set query
	$query = "INSERT INTO pendidikan_nonformal (profil_pencaker_id, nama_kegiatan, penyelenggara, tanggal_mulai, tanggal_selesai, tempat_kegiatan, dibuat_pada) VALUES ('$user_id', '$nama', '$penyelenggara', '$tgl_mulai', '$tgl_selesai', '$tmpt_kegiatan', '$date')";

	// execute query
	$process = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$last_id = mysqli_insert_id($conn);

	// if user upload lampiran
	if ($process) {
		if ($_FILES['lampiran']['name'] != NULL) {	
			$file_type = strtolower(pathinfo($_FILES['lampiran']['name'], PATHINFO_EXTENSION));
			$file_name = sanitizeThis($_FILES['lampiran']['name']);
			$file_size = $_FILES['lampiran']['size'];
			$target_dir = '../../../assets/img/lampiran/pendidikan_nonformal/';
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
			$sql_upload = "UPDATE pendidikan_nonformal SET lampiran = '$new_file_name' WHERE id = '$last_id'";
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
		$_SESSION['sukses'] = 'Pendidikan non formal telah berhasil diperbaharui!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
		header('Location:../../../pencaker-dashboard.php?page=profil');
		die();
	}

?>