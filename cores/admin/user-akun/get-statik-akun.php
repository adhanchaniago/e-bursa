<?php  

	include "../../misc/connect.php";

	$data_akun = [];
	$year = date('Y');
	$data_akun['bulan'] = [
		'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
	];

	for ($i=1; $i <= 12 ; $i++) { 
		$query = "SELECT COUNT(id) AS total FROM profil_pencaker WHERE MONTH(dibuat_pada) = '".$i."' AND YEAR(dibuat_pada) = '".$year."'";
		$process = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($process);
		$data_akun['pencaker'][] = $data['total'];

		$query2 = "SELECT COUNT(id) AS total FROM profil_perusahaan WHERE MONTH(dibuat_pada) = '".$i."' AND YEAR(dibuat_pada) = '".$year."'";
		$process2 = mysqli_query($conn, $query2);
		$data2 = mysqli_fetch_assoc($process2);
		$data_akun['perusahaan'][] = $data2['total'];
	}

	echo json_encode($data_akun);

?>