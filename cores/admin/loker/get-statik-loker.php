<?php  
	
	include "../../misc/connect.php";
	
	$data_loker = [];
	$year = date('Y');
	$data_loker['bulan'] = [
		'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
	];

	for ($i=1; $i <= 12 ; $i++) { 
		$query = "SELECT COUNT(id) AS total_loker FROM lowongan WHERE MONTH(dibuat_pada) = '".$i."' AND YEAR(dibuat_pada) = '".$year."'";
		$process = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($process);
		$data_loker['total'][] = $data['total_loker'];
	}

	echo json_encode($data_loker);

?>