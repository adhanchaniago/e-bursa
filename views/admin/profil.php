<div class="row">
	<div class="col-md-3">
		<?php include "views/admin/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Kelola Data Profil</h3>
				<p>Silahkan isi data berikut dengan data yang valid:</p> <hr>
				<div class="row">
					<div class="col-md-8">
						<form action="cores/admin/profil/ubah-profil-process.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $dataProfil["id"] ?>">
							<div class="form-group">
								<label for="nip">Nomor Induk Pegawai</label>
								<input type="text" name="nip" id="nip" class="form-control" value="<?php echo $dataProfil["nip"] ?>">
							</div>
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $dataProfil["nama"] ?>">
							</div>
							<div class="form-group">
								<label for="jekel">Jenis Kelamin</label>
								<select name="jekel" id="jekel" class="form-control">
									<option value="<?php echo $dataProfil["jenis_kelamin"] ?>"><?php echo $dataProfil["jenis_kelamin"] ?></option>
									<option value="Pria">Pria</option>
									<option value="Wanita">Wanita</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $dataProfil["tempat_lahir"] ?>">
							</div>
							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir</label>
								<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $dataProfil["tanggal_lahir"] ?>" readonly>
							</div>
							<div class="form-group">
								<label for="agama">Agama</label>
								<select name="agama" id="agama" class="form-control">
									<option value="<?php echo $dataProfil["agama"] ?>"><?php echo $dataProfil["agama"] ?></option>
									<option value="Islam">Islam</option>
									<option value="Katolik">Katolik</option>
									<option value="Protestan">Protestan</option>
									<option value="Hindhu">Hindhu</option>
									<option value="Buddha">Buddha</option>
								</select>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat Lengkap</label>
								<textarea name="alamat" id="alamat" class="form-control"><?php echo $dataProfil["alamat"] ?></textarea>
							</div>
							<div class="form-group">
								<label for="telepon">Nomor Telepon</label>
								<input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $dataProfil["telepon"] ?>">
							</div>
							<div class="form-group">
								<label for="foto">Pas Photo</label>
								<input type="file" name="foto" id="foto" class="form-control">
							</div>
							<br>
							<div class="form-group text-right">
								<button type="reset" class="btn btn-sm btn-default">RESET</button>
								<button type="submit" class="btn btn-success">SIMPAN</button>
							</div>
						</form>
					</div>
					<!-- <div class="col-md-4">
						<div class="card">
							<div class="card-body">
								<p>PERHATIAN!</p>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>