<div class="row login-container">
	<div class="col-md-4 offset-md-4">
		<div class="card">
			<div class="card-body">
				<h5 class="text-center">Lupa Password</h5>
				<p class="text-center">Silahkan isi Username & Email anda, dan kami akan mengirimkan link untuk mereset password anda :</p><hr>
				<form action="cores/auth/send_reset_password.php" method="POST">
					<div class="form-group">
						<label for="username">Username :</label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="email" class="form-control" name="email">
					</div> 
					<div>&nbsp;</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-block btn-success">Kirim Password Reset Email</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>