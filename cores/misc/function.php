<?php 
	
	// set default timezone
	date_default_timezone_set("Asia/Jakarta");

	// declare all needed function

	function getSlugHakAkses($id) {
		$conn = koneksi();
		$sql = "SELECT slug FROM hak_akses WHERE id = '$id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data['slug'];
	}

	function getAdminProfil($id) {
		$conn = koneksi();
		$sql = "SELECT * FROM profil_admin WHERE user_akun_id = '$id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data;
	}

	function getPencakerProfil($id) {
		$conn = koneksi();
		$sql = "SELECT * FROM profil_pencaker WHERE user_akun_id = '$id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data;
	}

	function getPencakerProfil2($pencaker_id) {
		$conn = koneksi();
		$sql = "SELECT * FROM profil_pencaker WHERE id = '$pencaker_id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data;
	}

	function getPerusahaanProfil($id) {
		$conn = koneksi();
		$sql = "SELECT * FROM profil_perusahaan WHERE user_akun_id = '$id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data;
	}

	function getPerusahaanProfil2($perusahaan_id) {
		$conn = koneksi();
		$sql = "SELECT * FROM profil_perusahaan WHERE id = '$perusahaan_id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data;
	}

	function sanitizeThis($string) {
		$conn = koneksi();
		$output1 = mysqli_real_escape_string($conn, $string);
		$output2 = strip_tags($output1);
		return htmlspecialchars($output2); 
	}

	function koneksi() {
		$conn = mysqli_connect('localhost', 'root', '', 'dbbursa');
		return $conn;
	}

	function validasiEmail($string) {
		$filter = filter_var($string, FILTER_SANITIZE_EMAIL);
		$hasil = filter_var($filter, FILTER_VALIDATE_EMAIL);
		return array('stat' => $hasil?'1':'0', 'text' => $filter);
	}

	function generateToken() {
		$token = substr(sha1(time()), 0, 30);
		return $token;
	}

	function cekToken($token, $id) {
		$conn = koneksi();
		$sql = "SELECT status FROM aktivasi WHERE user_akun_id = '$id' AND token = '$token'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data['status'];
	}

	function pencakerProfID($user_id) {
		$conn = koneksi();
		$sql = "SELECT id FROM profil_pencaker WHERE user_akun_id = '$user_id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data['id'];
	}

	function perusahaanProfID($user_id) {
		$conn = koneksi();
		$sql = "SELECT id FROM profil_perusahaan WHERE user_akun_id = '$user_id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data['id'];
	}

	function perusahaanGetNama($user_id) {
		$conn = koneksi();
		$sql = "SELECT nama_perusahaan FROM profil_perusahaan WHERE id = '$user_id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		return $data['nama_perusahaan'];
	}

	function getKomentarDetailUser($user_id) {
		$conn = koneksi();
		
		$sql = "SELECT hak_akses_id FROM user_akun WHERE id = '$user_id'";
		$pro = mysqli_query($conn, $sql);
		$dat = mysqli_fetch_assoc($pro);

		$hak = $dat['hak_akses_id'];
		$slug = getSlugHakAkses($hak);

		if ($hak == '1') {
			$destinasi = 'assets/img/profil/admin/';
			$sql2 = "SELECT id, nama, foto FROM profil_admin WHERE user_akun_id = '$user_id'";
		} elseif ($hak == '2') {
			$destinasi = 'assets/img/profil/pencaker/';
			$sql2 = "SELECT id, nama, photo AS foto FROM profil_pencaker WHERE user_akun_id = '$user_id'";
		} elseif ($hak == '3') {
			$destinasi = 'assets/img/profil/perusahaan/';
			$sql2 = "SELECT id, nama_perusahaan AS nama, logo_perusahaan AS foto FROM profil_perusahaan WHERE user_akun_id = '$user_id'";
		} else {
			$sql2 = "";
		}

		$pro2 = mysqli_query($conn, $sql2);
		$dat2 = mysqli_fetch_assoc($pro2);

		$output = [
			'id' => $user_id,
			'user_id' => $dat2['id'],
			'hak_akses' => $slug,
			'nama' => $dat2['nama'],
			'foto' => $destinasi.$dat2['foto']
		];

		return $output;
	}

	function cekLamarKerja($lowongan_id, $pencaker_id) {
		$conn = koneksi();
		$sql = "SELECT * FROM lamar WHERE lowongan_id = '$lowongan_id' AND profil_pencaker_id = '$pencaker_id'";
		$proc = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($proc);
		
		if ($data != NULL) {
			$output = 1;
		} else {
			$output = 0;
		}
		
		return $output;
	}

?>