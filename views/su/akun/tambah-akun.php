<div class="row">
	<div class="col-md-3">
		<?php include "views/su/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Tambah Admin Baru</h3>
				<p>Silahkan isi data berikut dengan data yang valid:</p> <hr>
				<div class="row">
					<div class="col-md-8">
						<form action="cores/su/akun/tambah-akun-process.php" method="POST">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" name="nip" id="nip" class="form-control">
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" id="nama" class="form-control">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div><hr>
							<div class="form-group text-right">
								<button type="reset" class="btn btn-sm btn-default">RESET</button>
								<button type="submit" class="btn btn-success">SIMPAN</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>