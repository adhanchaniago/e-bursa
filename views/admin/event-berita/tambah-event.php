<div class="row">
	<div class="col-md-3">
		<?php include "views/admin/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">
					Tambah Event/Berita Baru 
					<a href="?page=list-event" class="btn btn-sm btn-primary float-right">LIST BERITA/EVENT</a>
				</h3>

				<p>Silahkan isi form berikut untuk menambah event/berita:</p><hr>
				<form action="cores/admin/event/add-event-process.php" method="POST">
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" class="form-control col-md-7" name="judul" id="judul">
					</div>
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control col-md-7">
							<option value="">Pilih Kategori</option>
							<option value="Berita">Berita</option>
							<option value="Event">Event</option>
							<option value="Info">Info</option>
						</select>
					</div>
					<div class="form-group">
						<label for="konten">Konten</label>
						<textarea name="konten" id="konten" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="status">Publish</label>
						<select name="status" id="status" class="form-control col-md-7">
							<option value="">Pilih Status</option>
							<option value="1">Ya</option>
							<option value="0">Tidak</option>
						</select>
					</div><br><hr>
					<div class="form-group">
						<button type="reset" class="btn btn-sm btn-default float-right">Reset</button>
						<button type="submit" class="btn btn-success">Simpan Konten</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>