<div class="row login-container">
	<div class="col-md-4 offset-md-4">
		<div class="card">
			<div class="card-body">
				<h5 class="text-center">FORM LOGIN</h5>
				<p class="text-center">Silahkan isi Username & Password :</p><hr>
				<form action="cores/auth/login_process.php" method="POST">
					<div class="form-group">
						<label for="username">Username :</label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label for="password">Password :</label>
						<input type="password" class="form-control" name="password">
					</div> 
					<div>&nbsp;</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success">LOGIN</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>