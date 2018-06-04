<?php
	
	// start session
	session_start();

	// unset session
	session_unset();

	// feedback notification
	$_SESSION['sukses'] = 'Anda telah berhasil melakukan logout.';
	header('Location: main.php?page=login');
	die();

?>