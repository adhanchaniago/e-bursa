<div class="row">
	<div class="col-md-3">
		<?php include "views/pencaker/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Daftar Lamaran</h3>
				<p>Berikut adalah tabel data lamaran yang sudah diinputkan:</p><hr>
				<table class="table table-bordered nowrap" id="tabel-data-user-akun">
					<?php  

						$list_data = [];
						$user_id = pencakerProfID($_SESSION['user_id']);
						$query = "
							SELECT lamar.id, lamar.lowongan_id, lowongan.gaji, lowongan.profil_perusahaan_id, lamar.tanggal_lamar, lamar.status, lowongan.judul, lowongan.tanggal_selesai, profil_perusahaan.nama_perusahaan 
							FROM profil_perusahaan, lamar, lowongan 
							WHERE lamar.lowongan_id = lowongan.id
							AND lowongan.profil_perusahaan_id = profil_perusahaan.id 
							AND lamar.profil_pencaker_id = '$user_id' 
							ORDER BY lamar.tanggal_lamar DESC
						";
						$process = mysqli_query($conn, $query);
						while($row = mysqli_fetch_array($process)) {
							$list_data[] = $row;
						}

					?>
					<thead>
						<tr>
							<th>#</th>
							<th>Judul Loker</th>
							<th>Nama Perusahaan</th>
							<th>Gaji</th>
							<th>Deadline Loker</th>
							<th>Tanggal Lamar</th>
							<th>Status</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($list_data as $key => $value) {
						?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value['judul'] ?></td>
								<td><?php echo $value['nama_perusahaan'] ?></td>
								<td><?php echo $value['gaji'] ?></td>
								<td><?php echo date("d M Y", strtotime($value['tanggal_selesai'])) ?></td>
								<td><?php echo date("d M Y", strtotime($value['tanggal_lamar'])) ?></td>
								<?php  
									if ($value['status'] == '0') {
										echo '<td><span class="badge badge-primary">Waiting</span></td>';
									} elseif ($value['status'] == '1') {
										echo '<td><span class="badge badge-success">Accept</span></td>';
									} elseif ($value['status'] == '2') {
										echo '<td><span class="badge badge-danger">Decline</span></td>';
									}
								?>
								<td>
									<div class="btn-group">
										<a href="main.php?page=detail-loker&id=<?php echo $value['lowongan_id'] ?>" class="btn btn-success btn-sm" target="_blank">LOWONGAN</a>
										<a href="main.php?page=profil-perusahaan&id=<?php echo $value['profil_perusahaan_id'] ?>" class="btn btn-primary btn-sm" target="_blank">PERUSAHAAN</a>
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