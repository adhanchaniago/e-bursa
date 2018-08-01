<div class="row">
	<div class="col-md-3">
		<?php include "views/admin/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">List Data Event/Berita</h3>
				<p>Berikut adalah tabel data event/berita yang terdaftar:</p><hr>
				<?php 
					$query = "SELECT * FROM info_berita";
					$process = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($process)) {
						$list_data[] = $row;
					}
				?>
				<div class="table-responsive">
					<table class="table table-bordered nowrap" id="tabel-data-user-akun">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Penulis</th>
								<th class="text-center">Judul</th>
								<th class="text-center">Kategori</th>
								<th class="text-center">Tanggal</th>
								<th class="text-center">Status</th>
								<th class="text-center">Konten</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								foreach ($list_data as $key => $value) {	
							?>
								<tr>
									<td class="text-center"><?php echo $key+1; ?></td>
									<td class="text-center"><?php echo $value['profil_admin_id']; ?></td>
									<td class="text-center"><?php echo $value['judul']; ?></td>
									<td class="text-center"><?php echo $value['kategori']; ?></td>
									<td class="text-center"><?php echo date('d M Y', strtotime($value['tanggal'])); ?></td>
									<td class="text-center"><?php echo $value['status']==1?'Published':'Hiden'; ?></td>
									<td class="text-center"><?php echo strlimit($value['konten'], 10); ?></td>
									<td class="text-center">
										<div class="btn-group">
											<a href="?page=ubah-event&id=<?php echo $value['id'] ?>" class="btn btn-sm btn-success">Ubah</a>
											<a href="?page=publish&id=<?php echo $value['id'] ?>&val=<?php echo $value['status'] ?>" class="btn btn-sm btn-<?php echo $value['status']==1?'danger':'success' ?>">
												<?php echo $value['status']==1?'Hide':'Publish' ?>
											</a>
										</div>
									</td>
								</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>