<div class="row">
	<div class="col-md-3">
		<?php include "views/perusahaan/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Kelola Data Profil</h3>
				<p>Silahkan isi data berikut dengan data yang valid:</p> <hr>
				<div class="row">
					<div class="col-md-8">
						<form action="cores/perusahaan/profil/ubah-profil-process.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $dataProfil["id"] ?>">
							<div class="form-group">
								<label for="no_siup">Nomor SIUP</label>
								<input type="text" name="no_siup" id="no_siup" class="form-control" value="<?php echo $dataProfil["no_siup"] ?>">
							</div>
							<div class="form-group">
								<label for="no_situ">Nomor SITU</label>
								<input type="text" name="no_situ" id="no_situ" class="form-control" value="<?php echo $dataProfil["no_situ"] ?>">
							</div>
							<div class="form-group">
								<label for="nama_perusahaan">Nama Perusahaan</label>
								<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="<?php echo $dataProfil["nama_perusahaan"] ?>">
							</div>
							<div class="form-group">
								<label for="bidang_usaha">Bidang Usaha</label>
								<input type="text" name="bidang_usaha" id="bidang_usaha" class="form-control" value="<?php echo $dataProfil["bidang_usaha"] ?>">
							</div>
							<div class="form-group">
								<label for="deskripsi">Deskripsi Perusahaan</label>
								<input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?php echo $dataProfil["deskripsi_perusahaan"] ?>">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat Perusahaan</label>
								<textarea name="alamat" id="alamat" class="form-control"><?php echo $dataProfil["alamat"] ?></textarea>
							</div>
							<div class="form-group">
								<label for="telepon">Telepon</label>
								<input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $dataProfil["telepon"] ?>">
							</div>
							<div class="form-group">
								<label for="website">Website</label>
								<input type="text" name="website" id="website" class="form-control" value="<?php echo $dataProfil["website"] ?>">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control" value="<?php echo $dataProfil["email"] ?>">
							</div>
							<div class="form-group">
								<label for="slogan">Slogan Perusahaan</label>
								<input type="text" name="slogan" id="slogan" class="form-control" value="<?php echo $dataProfil["slogan"] ?>">
							</div>
							<div class="form-group">
								<label for="logo">Logo Perusahaan</label>
								<input type="file" name="logo" id="logo" class="form-control">
							</div>
							<div class="form-group text-right">
								<button type="reset" class="btn btn-sm btn-default">RESET</button>
								<button type="submit" class="btn btn-success">SIMPAN</button>
							</div>
						</form>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-body">
								<p>PERHATIAN!</p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis vero dignissimos, ipsam odio aspernatur deserunt iure consectetur veniam iusto in officia officiis ipsum repellendus eligendi dolorum. Tempore obcaecati iusto quia.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>