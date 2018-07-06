<div class="row login-container">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-body text-center">
				<h5>JOIN DENGAN E-BURSA</h5>
				<p>KENAPA ANDA INGIN BERGABUNG DENGAN KAMI ?</p><hr>
				<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalPencaker">SAYA BUTUH PEKERJAAN !</button> <br><br>
				<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalPerusahaan">KAMI BUTUH KARYAWAN !</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPencaker" tabindex="-1" role="dialog" aria-labelledby="modalPencaker" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">DAFTAR AKUN PENCAKER BARU</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="cores/auth/daftar_pencaker_process.php" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password">
					</div>
					<div class="form-group">
						<label for="password-ulang">Konfirmasi Password</label>
						<input type="password" class="form-control" name="password-ulang" id="password-ulang">
					</div>
					<div class="form-group">
						<label for="email">Alamat Email</label>
						<input type="text" class="form-control" name="email" id="email">
					</div>
					<div class="form-group">
						<label for="nik">Nomor Induk Kependudukan</label>
						<input type="text" class="form-control" name="nik" id="nik">
					</div>
					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" id="nama">
					</div>
					<div class="form-group">
						<label for="jekel">Jenis Kelamin</label>
						<select name="jekel" id="jekel" class="form-control">
							<option value="">Pilih</option>
							<option value="Pria">Pria</option>
							<option value="Wanita">Wanita</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">BATAL</button>
					<button type="submit" class="btn btn-success float-left">DAFTAR AKUN</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPerusahaan" tabindex="-1" role="dialog" aria-labelledby="modalPerusahaan" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">DAFTAR AKUN PERUSAHAAN BARU</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="cores/auth/daftar_perusahaan_process.php" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password">
					</div>
					<div class="form-group">
						<label for="password-ulang">Konfirmasi Password</label>
						<input type="password" class="form-control" name="password-ulang" id="password-ulang">
					</div>
					<div class="form-group">
						<label for="email">Alamat Email</label>
						<input type="text" class="form-control" name="email" id="email">
					</div>
					<div class="form-group">
						<label for="siup">Nomor SIUP</label>
						<input type="text" class="form-control" name="siup" id="siup">
					</div>
					<div class="form-group">
						<label for="situ">Nomor SITU</label>
						<input type="text" class="form-control" name="situ" id="situ">
					</div>
					<div class="form-group">
						<label for="nama">Nama Perusahaan</label>
						<input type="text" class="form-control" name="nama" id="nama">
					</div>
					<div class="form-group">
						<label for="bidang">Bidang Usaha</label>
						<input type="text" class="form-control" name="bidang" id="bidang">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">BATAL</button>
					<button type="submit" class="btn btn-success float-left">DAFTAR AKUN</button>
				</div>
			</form>
		</div>
	</div>
</div>