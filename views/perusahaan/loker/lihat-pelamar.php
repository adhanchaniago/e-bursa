<div class="row">
	<div class="col-md-3">
		<?php include "views/perusahaan/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Daftar Pelamar Kerja</h3>
				<p>Berikut adalah daftar dari pencaker yang melamar pada lowongan anda:</p> <hr>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered nowrap" id="tabel-list-loker">
							<thead>
								<tr>
									<th>#</th>
									<th>NIK</th>
									<th>Nama Pencaker</th>
									<th>Jenis Kelamin</th>
									<th>Tmp/Tgl Lahir</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php  
									$lowongan_id = sanitizeThis($_GET['id']);
									$query = "SELECT * FROM lamar WHERE lowongan_id = '$lowongan_id'";
									$proces = mysqli_query($conn, $query);
									while($row = mysqli_fetch_array($proces)) {
										$list_data[] = $row;
									}
									foreach ($list_data as $key => $value) {
										$data_pencaker = getPencakerProfil2($value['profil_pencaker_id']);
								?>
									<tr>
										<td class="text-center"><?php echo $key+1; ?></td>
										<td class="text-center"><?php echo $data_pencaker['nik'] ?></td>
										<td><?php echo $data_pencaker['nama'] ?></td>
										<td class="text-center"><?php echo $data_pencaker['jenis_kelamin'] ?></td>
										<td><?php echo $data_pencaker['tempat_lahir'].', '.date("d M Y", strtotime($data_pencaker['tanggal_lahir'])) ?></td>
										<?php  
											if ($value['status'] == '0') {
												echo '<td><span class="badge badge-primary">Waiting</span></td>';
											} elseif ($value['status'] == '1') {
												echo '<td><span class="badge badge-success">Accept</span></td>';
											} elseif ($value['status'] == '2') {
												echo '<td><span class="badge badge-danger">Decline</span></td>';
											}
										?>
										<td class="text-center">
											<div class="btn-group">
												<a href="main.php?page=profil-pencaker&id=<?php echo $value['profil_pencaker_id'] ?>" class="btn btn-primary btn-sm" target="_blank">DETAIL</a>
												<a href="?page=lamar-aksi&id=<?php echo $value['id'] ?>&val=1" class="btn btn-success btn-sm <?php echo $value['status'] != '0'?'disabled':'' ?>">TERIMA</a>
												<a href="?page=lamar-aksi&id=<?php echo $value['id'] ?>&val=2" class="btn btn-danger btn-sm <?php echo $value['status'] != '0'?'disabled':'' ?>">TOLAK</a>
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
</div>