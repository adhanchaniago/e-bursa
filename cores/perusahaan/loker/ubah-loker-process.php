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
	// elseif ($_FILES['gambar']['name'] == NULL) {
	// 	$_SESSION['gagal'] = 'Lampiran tidak boleh kosong!';
	// 	header('Location:../../../perusahaan-dashboard.php?page=tambah-loker');
	// 	die();
	// }

	// set variables
	$id = sanitizeThis(perusahaanProfID($_POST['user_id']));
	$loker_id = sanitizeThis($_POST['loker_id']);
	$title = sanitizeThis($_POST['title']);
	$deskripsi = $_POST['deskripsi'];
	$syarat = $_POST['syarat'];
	$gaji = sanitizeThis($_POST['gaji']);
	$mulai = sanitizeThis($_POST['mulai']);
	$selesai = sanitizeThis($_POST['selesai']);
	$date = date("Y-m-d");

	// start mysqli transaction
	mysqli_autocommit($conn, false);

	// set query
	$query = "
		UPDATE lowongan SET judul = '$title', tanggal_mulai = '$mulai', tanggal_selesai = '$selesai', deskripsi_pekerjaan = '$deskripsi', deskripsi_persyaratan = '$syarat', gaji = '$gaji' WHERE id = '$loker_id'
	";

	// execute query
	$process = mysqli_query($conn, $query);

	// if user upload gambar
	if ($_FILES['gambar']['name'] != NULL) {	
		$file_type = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
		$file_name = sanitizeThis($_FILES['gambar']['name']);
		$file_size = $_FILES['gambar']['size'];
		$target_dir = '../../../assets/img/loker/';
		$check = getimagesize($_FILES['gambar']['tmp_name']);
		// check file is image file
		if ($check == false) {
			$_SESSION['gagal'] = 'File yang diinputkan bukan merupakan file gambar!';
			header('Location:../../../perusahaan-dashboard.php?page=loker');
			die();
		}
		// check mime of files
		if ($file_type != 'jpeg' && $file_type != 'jpg' && $file_type != 'png') {
			$_SESSION['gagal'] = 'Hanya file gambar dengan ekstensi jpeg, jpg, dan png yang diizinkan!';
			header('Location:../../../perusahaan-dashboard.php?page=loker');
			die();
		}
		// max file size is 2MB
		if ($file_size > 2000000) {	
			$_SESSION['gagal'] = 'Ukuran file gambar maksimal 2MB!';
			header('Location:../../../perusahaan-dashboard.php?page=loker');
			die();
		}
		// move file to upload directory
		$new_file_name = substr(sha1(time()), 0, 20).'.'.$file_type;
		$new_target_file = $target_dir.$new_file_name;
		$upload_file = move_uploaded_file($_FILES['gambar']['tmp_name'], $new_target_file);
		// notification if error while moving file
		if (!$upload_file) {	
			$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam mengupload file gambar!';
			header('Location:../../../perusahaan-dashboard.php?page=loker');
			die();
		}
		// set and execute query to save file name
		$sql_upload = "UPDATE lowongan SET gambar = '$new_file_name' WHERE id = '$loker_id'";
		$proces_upload = mysqli_query($conn, $sql_upload);

		if (!$proces_upload) {
			$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
			header('Location:../../../perusahaan-dashboard.php?page=loker');
			die();
		}
	}

	// commit mysqli transaction
	mysqli_commit($conn);

	// feedback notification
	if ($process) {
		$_SESSION['sukses'] = 'Lowongan pekerjaan telah berhasil diubah!';
		header('Location:../../../perusahaan-dashboard.php?page=loker');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
		header('Location:../../../perusahaan-dashboard.php?page=loker');
		die();
	}

?>