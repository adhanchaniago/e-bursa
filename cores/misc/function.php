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

	function getPerusahaanProfil($id) {
		$conn = koneksi();
		$sql = "SELECT * FROM profil_perusahaan WHERE user_akun_id = '$id'";
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

?>