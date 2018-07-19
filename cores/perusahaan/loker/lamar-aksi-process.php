<?php  

	// require PHPMailer
	require 'cores/misc/phpmailer3.php';

	// set variabel
	$lamar_id = sanitizeThis($_GET['id']);
	$val = sanitizeThis($_GET['val']);

	// set query
	$query = "UPDATE lamar SET status = '$val' WHERE id = '$lamar_id'";
	$process = mysqli_query($conn, $query);

	// get data lamar
	$query2 = "SELECT * FROM lamar WHERE id = '$lamar_id'";
	$process2 = mysqli_query($conn, $query2);
	$data_lamar = mysqli_fetch_assoc($process2);

	// get data pencaker
	$query3 = "SELECT nama, email FROM profil_pencaker WHERE id = '".$data_lamar['profil_pencaker_id']."'";
	$process3 = mysqli_query($conn, $query3);
	$data_pencaker = mysqli_fetch_assoc($process3);

	// get data loker
	$query4 = "SELECT id, judul FROM lowongan WHERE id = '".$data_lamar['lowongan_id']."'";
	$process4 = mysqli_query($conn, $query4);
	$data_lowongan = mysqli_fetch_assoc($process4);

	// notification feedback
	if ($process) {
		if ($val == '1') {
			try {
				$mail->addAddress($data_pencaker['email']);
				$mail->isHTML(true);
				$mail->Subject = 'Lamaran Diterima';
				$mail->Body = '
					<div style="width: 700px;">
						<p>Selamat '.$data_pencaker['nama'].',</p>
						<p>Lamaran yang anda ajukan pada <a href="http://localhost/e-bursa/main.php?page=detail-loker&id='.$data_lowongan['id'].'">'.$data_lowongan['judul'].'</a> yang dibuka oleh <a href="http://localhost/e-bursa/main.php?page=profil-perusahaan&id='.$dataProfil['id'].'">'.$dataProfil['nama_perusahaan'].'</a> telah disetujui.</p>
						<p>Silahkan hubungi perusahaan yang bersangkutan untuk melanjutkan ke tahapan selanjutnya.</p>
						<div>
							<a href="http://localhost/e-bursa/main.php?page=detail-loker&id='.$data_lowongan['id'].'" style="padding: 10px; border: 1px solid #000; text-decoration: none; color: #000; display:inline-block; text-align: center; font-weight: bold;">DETAIL LOKER</a> &nbsp;
							<a href="http://localhost/e-bursa/main.php?page=profil-perusahaan&id='.$dataProfil['id'].'" style="padding: 10px; border: 1px solid #000; text-decoration: none; color: #000; display:inline-block; text-align: center; font-weight: bold;">DETAIL PERUSAHAAN</a>
						</div>
						<p>Regards E-Bursa</p>
					</div>
				';
				$mail->send();
			} catch (Exception $e) {
				
			}
			$_SESSION['sukses'] = 'Pelamar telah berhasil diterima!';
		} elseif ($val == '2') {
			$_SESSION['sukses'] = 'Pelamar telah berhasil ditolak!';
		}
		header('Location:?page=lihat-pelamar&id='.$lamar_id);
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi kesalahan!';
		header('Location:?page=lihat-pelamar&id='.$lamar_id);
		die();
	}

?>