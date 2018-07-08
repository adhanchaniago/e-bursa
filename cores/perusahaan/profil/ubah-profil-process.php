<?php  

	// start session
	session_start();

	// include cores
	include '../../misc/connect.php';
	include '../../misc/function.php';

	// set variables
	$id = sanitizeThis($_POST['id']);
	$siup = sanitizeThis($_POST['no_siup']);
	$situ = sanitizeThis($_POST['no_situ']);
	$nama = sanitizeThis($_POST['nama_perusahaan']);
	$bidang = sanitizeThis($_POST['bidang_usaha']);
	$deskripsi = sanitizeThis($_POST['deskripsi']);
	$alamat = sanitizeThis($_POST['alamat']);
	$telepon = sanitizeThis($_POST['telepon']);
	$website = sanitizeThis($_POST['website']);
	$email = sanitizeThis($_POST['email']);
	$slogan = sanitizeThis($_POST['slogan']);

	// if user upload a photo
	if ($_FILES['logo']['name'] != NULL) {
		$file_type = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
		$file_name = sanitizeThis($_FILES['logo']['name']);
		$file_size = $_FILES['logo']['size'];
		$target_dir = '../../../assets/img/profil/perusahaan/';
		$check = getimagesize($_FILES['logo']['tmp_name']);
		// check file is image file
		if ($check == false) {
			$_SESSION['gagal'] = 'File yang diinputkan bukan merupakan file gambar!';
			header('Location:../../../perusahaan-dashboard.php?page=profil');
			die();
		}
		// check mime of files
		if ($file_type != 'jpeg' && $file_type != 'jpg' && $file_type != 'png') {
			$_SESSION['gagal'] = 'Hanya file gambar dengan ekstensi jpeg, jpg, dan png yang diizinkan!';
			header('Location:../../../perusahaan-dashboard.php?page=profil');
			die();
		}
		// max file size is 2MB
		if ($file_size > 2000000) {	
			$_SESSION['gagal'] = 'Ukuran file gambar maksimal 2MB!';
			header('Location:../../../perusahaan-dashboard.php?page=profil');
			die();
		}
		// move file to upload directory
		$new_file_name = substr(sha1(time()), 0, 20).'.'.$file_type;
		$new_target_file = $target_dir.$new_file_name;
		$upload_file = move_uploaded_file($_FILES['logo']['tmp_name'], $new_target_file);
		// notification if error while moving file
		if (!$upload_file) {	
			$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam mengupload file gambar!';
			header('Location:../../../perusahaan-dashboard.php?page=profil');
			die();
		}
		// set and execute query to save file name
		$sql_upload = "UPDATE profil_perusahaan SET logo_perusahaan = '$new_file_name' WHERE id = '$id' AND user_akun_id = '".$_SESSION['user_id']."'";
		$proc_upload = mysqli_query($conn, $sql_upload);
		// notification if error while saving into database
		if (!$proc_upload) {
			$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam mengupload file gambar!';
			header('Location:../../../perusahaan-dashboard.php?page=profil');
			die();
		}
	}

	// set query
	$sql = "
		UPDATE profil_perusahaan SET nama_perusahaan = '$nama', no_siup = '$siup', no_situ = '$situ', bidang_usaha = '$bidang', alamat = '$alamat', telepon = '$telepon', deskripsi_perusahaan = '$deskripsi', website = '$website', email = '$email', slogan = '$slogan' 
		WHERE id = '$id' AND user_akun_id = '".$_SESSION['user_id']."'
	";

	// execute query
	$proc = mysqli_query($conn, $sql);

	// feedback notification
	if ($proc) {
		$_SESSION['sukses'] = 'Profil telah berhasil diperbaharui!';
		header('Location:../../../perusahaan-dashboard.php?page=profil');
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
		header('Location:../../../perusahaan-dashboard.php?page=profil');
		die();
	}

?>