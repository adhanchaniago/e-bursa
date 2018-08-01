<div class="row">
	<div class="col-md-3">
		<?php include "views/admin/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Kelola Lowongan Kerja</h3>
				<p>Berikut adalah tabel data lowongan kerja:</p><hr>
				<?php 
					$query = "SELECT * FROM lowongan";
					$process = mysqli_query($conn, $query);
					$list_data = [];
					while($row = mysqli_fetch_array($process)) {
						$list_data[] = $row;
					}
				?>
				<table class="table table-bordered nowrap" id="tabel-data-user-akun">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Title</th>
							<th class="text-center">Sallary</th>
							<th class="text-center">Mulai</th>
							<th class="text-center">Selesai</th>
							<th class="text-center">Status</th>
							<th class="text-center">Bann</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($list_data as $key => $value) {
						?>
							<tr>
								<td class="text-center"><?php echo $key+1 ?></td>
								<td><?php echo $value['judul'] ?></td>
								<td class="text-center">IDR <?php echo $value['gaji'] ?></td>
								<td class="text-center"><?php echo date('d M Y', strtotime($value['tanggal_mulai'])) ?></td>
								<td class="text-center"><?php echo date('d M Y', strtotime($value['tanggal_selesai'])) ?></td>
								<td class="text-center">
									<?php  
										if ($value['status'] == '1') {
											echo '<span class="badge badge-success">On Going</span>';
										} else {
											echo '<span class="badge badge-danger">Closed</span>';
										}
									?>
								</td>
								<td class="text-center">
									<?php
										if ($value['bann'] == '0') {
											echo '<span class="badge badge-success">Tidak</span>';
										} else {
											echo '<span class="badge badge-danger">Ya</span>';
										}
									?>
								</td>
								<td class="text-center">
									<div class="btn-group">
										<a href="main.php?page=profil-perusahaan&id=<?php echo $value['profil_perusahaan_id'] ?>" class="btn btn-success btn-sm" target="_blank">Profil</a>
										<a href="?page=banned-loker&id=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Banned</a>
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