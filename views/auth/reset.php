<?php  

	$user_id = sanitizeThis($_GET['user']);
	$token = sanitizeThis($_GET['token']);

	$resetQ = "SELECT status FROM remember WHERE user_akun_id = '$user_id' AND token = '$token'";
	$resetP = mysqli_query($conn, $resetQ);
	$resetDt = mysqli_fetch_assoc($resetP);
	$status = $resetDt['status'];

	if ($status == 1) {
		$_SESSION['gagal'] = 'Token  yang anda gunakan sudah expire/tidak bisa digunakan lagi.Silahkan request link reset yang terbaru!';
		header('Location:?page=lupa-password');
		die();
	}

?>

<div class="row login-container">
	<div class="col-md-4 offset-md-4">
		<div class="card">
			<div class="card-body">
				<h5 class="text-center">UBAH PASSWORD</h5>
				<p class="text-center">Silahkan isi Password baru anda :</p><hr>
				<form action="cores/auth/reset_process.php" method="POST">
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
					<input type="hidden" name="token" id="token" value="<?php echo $token; ?>">
					<div class="form-group">
						<label for="password">Password Baru :</label>
						<input type="password" class="form-control" name="password">
					</div> 
					<div class="form-group">
						<label for="password_konfirmasi">Konfirmasi Password Baru :</label>
						<input type="password" class="form-control" name="password_konfirmasi">
					</div> 
					<div>&nbsp;</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-block btn-success">SIMPAN</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>