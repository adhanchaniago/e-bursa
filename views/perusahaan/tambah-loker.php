<div class="row">
	<div class="col-md-3">
		<?php include "views/perusahaan/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Tambah Lowongan Kerja</h3>
				<p>Silahkan isi data berikut dengan data yang valid:</p> <hr>
				<div class="row">
					<div class="col-md-8">
						<form action="cores/perusahaan/loker/tambah-loker-process.php" method="POST">
							<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" name="title" id="title" class="form-control">
							</div>
							<div class="form-group">
								<label for="deskripsi">Deskripsi Job</label>
								<textarea name="deskripsi" id="deskripsi" class="konten-area"></textarea>
							</div>
							<div class="form-group">
								<label for="syarat">Deskripsi Persyaratan</label>
								<textarea name="syarat" id="syarat" class="konten-area"></textarea>
							</div>
							<div class="form-group">
								<label for="gaji">Sallary</label>
								<input type="text" name="gaji" id="gaji" class="form-control">
							</div>
							<div class="form-group">
								<label for="mulai">Tanggal Mulai</label>
								<input type="text" name="mulai" id="mulai" class="form-control tanggal_pl" readonly>
							</div>
							<div class="form-group">
								<label for="selesai">Tanggal Selesai</label>
								<input type="text" name="selesai" id="selesai" class="form-control tanggal_pl" readonly>
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