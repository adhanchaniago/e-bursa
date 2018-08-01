<?php  

	// start session
	session_start();

	// include cores
	include '../../misc/connect.php';
	include '../../misc/function.php';

	// require PHPMailer
	require '../../misc/phpmailer2.php';

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
	$query = "INSERT INTO lowongan (profil_perusahaan_id, judul, tanggal_mulai, tanggal_selesai, deskripsi_pekerjaan, deskripsi_persyaratan, gaji, status, dibuat_pada) VALUES ('$id', '$title', '$mulai', '$selesai', '$deskripsi', '$syarat', '$gaji', '1', '$date')";

	// execute query
	$process = mysqli_query($conn, $query);
	$last_id = mysqli_insert_id($conn);

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
		$sql_upload = "UPDATE lowongan SET gambar = '$new_file_name' WHERE id = '$last_id'";
		$proces_upload = mysqli_query($conn, $sql_upload);

		if (!$proces_upload) {
			$_SESSION['gagal'] = 'Telah terjadi kesalahan dalam memproses data!';
			header('Location:../../../perusahaan-dashboard.php?page=loker');
			die();
		}
	}

	// get list peencaker
	$list_data = [];
	$query2 = "SELECT nama, email FROM profil_pencaker";
	$process2 = mysqli_query($conn, $query2);
	while($row = mysqli_fetch_array($process2)) {
		$list_data[] = $row;
	}

	$data_perusahaan = getPerusahaanProfil2($id);

	foreach ($list_data as $key => $value) {
		// kirim email konfirmasi
		try {
			$mail->addAddress($value['email']);
			$mail->isHTML(true);
			$mail->Subject = 'Info Loker Terbaru';
			$mail->Body = '
				<div style="width: 700px;">
					Hello '.$value['nama'].', <br>
					Berikut adalah lowongan kerja terbaru dari '.$data_perusahaan['nama_perusahaan'].' yang mungkin sesuai dengan anda : <br><br>
					<p><strong>'.strtoupper($title).'</strong></p>
					<table style="width: 100%; border-collapse: collapse;" border="1" cellspacing="0">
						<tr>
							<td style="padding: 5px; width: 50%;"><strong>DESKRIPSI PEKERJAAN</strong></td>
							<td style="padding: 5px; width: 50%;"><strong>DESKRIPSI PERSYARATAN</strong></td>
						</tr>
						<tr>
							<td style="padding: 5px; vertical-align:top;">'.$deskripsi.'</td>
							<td style="padding: 5px; vertical-align:top;">'.$syarat.'</td>
						</tr>
					</table><br><br>
					<a href="http://localhost/e-bursa/main.php?page=detail-loker&id='.$last_id.'" style="padding: 10px; border: 1px solid #000; text-decoration: none; color: #000; display:inline-block; width: 100%; text-align: center; font-weight: bold;">LIHAT SELENGKAPNYA</a>
				</div>
			';      
			$mail->send();
		} catch (Exception $e) {
			$_SESSION['gagal'] = 'Maaf, telah terjadi sebuah kesalahan.!';
			header('Location:../../../perusahaan-dashboard.php?page=loker');
			die();
		}
	}	

	// commit mysqli transaction
	mysqli_commit($conn);

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