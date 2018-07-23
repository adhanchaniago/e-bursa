<div class="row">
	<div class="col-md-3">
		<?php include "views/perusahaan/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Kelola Lowongan Kerja</h3>
				<p>Berikut adalah data lowongan kerja dari perusahaan anda:</p> <hr>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered nowrap" id="tabel-list-loker">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Sallary</th>
									<th>Mulai</th>
									<th>Selesai</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$list_data = array();
									$id = perusahaanProfID($_SESSION['user_id']);
									$query = "SELECT * FROM lowongan WHERE profil_perusahaan_id = '$id'";
									$process = mysqli_query($conn, $query);
									while($row = mysqli_fetch_array($process)) {
										$list_data[] = $row;
									}
									foreach ($list_data as $key => $value) {
								?>
									<tr>
										<td class="text-center"><?php echo $key+1; ?></td>
										<td><?php echo $value['judul'] ?></td>
										<td class="text-center"><?php echo 'IDR '.number_format($value['gaji'], 0) ?></td>
										<td class="text-center"><?php echo date("d M Y", strtotime($value['tanggal_mulai'])) ?></td>
										<td class="text-center"><?php echo date("d M Y", strtotime($value['tanggal_selesai'])) ?></td>
										<td class="text-center">
											<?php 
												$date_now = date("Y-m-d");
												if ($value['status'] == 0 || $date_now > $value['tanggal_selesai']) {
													echo '<span class="badge badge-danger">CLOSED</span>';
												} else {
													echo '<span class="badge badge-success">ON GOING</span>';
												}
											?>
										</td>
										<td>
											<div class="btn-group" role="group">
												<a href="main.php?page=detail-loker&id=<?php echo $value['id'] ?>" class="btn btn-primary btn-sm" target="_blank">DETAIL</a>
												<a href="?page=lihat-pelamar&id=<?php echo $value['id'] ?>" class="btn btn-primary btn-sm" target="_blank">PELAMAR</a>
												<a href="#" class="btn btn-success btn-sm">UBAH</a>
												<a href="?page=finis-loker&id=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm <?php echo $value['status']=='0'||$date_now>$value['tanggal_selesai']?'disabled':'' ?>">TUTUP</a>
											</div>
										</td>
									</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div><hr>
				<div class="row">
					<div class="col-md-12">
						<a href="?page=tambah-loker" class="btn btn-success">Tambah Lowongan Kerja Baru</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>