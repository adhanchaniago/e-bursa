<div class="row">
	<div class="col-md-3">
		<?php include "views/su/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="card">
			<div class="card-body">
				<h3 class="home-title">Kelola Data User Akun</h3><hr>
				<a href="?page=tambah-akun" class="btn btn-success">Tambah Admin Baru</a><hr>
				<p>Berikut adalah tabel data user akun yang terdaftar:</p><hr>
				<?php 
					$query = "SELECT * FROM user_akun WHERE hak_akses_id = '2' OR hak_akses_id = '3' OR hak_akses_id = '1'";
					$process = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($process)) {
						$list_data[] = $row;
					}
				?>
				<table class="table table-bordered nowrap" id="tabel-data-user-akun">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">ID</th>
							<th class="text-center">USERNAME</th>
							<th class="text-center">HAK AKSES</th>
							<th class="text-center">STATUS</th>
							<th class="text-center">AKTIVASI</th>
							<th class="text-center">TGL DAFTAR</th>
							<th class="text-center">AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($list_data as $key => $value) {	
						?>
							<tr>
								<td class="text-center"><?php echo $key+1; ?></td>
								<td class="text-center"><?php echo 'UID#'.$value['id'] ?></td>
								<td class="text-center"><?php echo $value['username'] ?></td>
								<td class="text-center"><?php echo strtoupper(getSlugHakAkses($value['hak_akses_id'])) ?></td>
								<td class="text-center"><?php echo $value['status']==1?'ACTIVE':'BANNED' ?></td>
								<td class="text-center"><?php echo $value['aktivasi']==1?'SUDAH':'BELUM' ?></td>
								<td class="text-center"><?php echo date('d M Y', strtotime($value['dibuat_pada'])) ?></td>
								<td class="text-center">
									<div class="btn-group">
										<a href="?page=banned&id=<?php echo $value['id'] ?>&val=<?php echo $value['status'] ?>" class="btn btn-sm btn-<?php echo $value['status']==1?'danger':'success' ?>">
											<?php echo $value['status']==1?'BANNED':'UNBANNED' ?>
										</a>
										<a href="?page=aktivasi&id=<?php echo $value['id'] ?>" class="btn btn-sm btn-success <?php echo $value['aktivasi']==1?'disabled':'' ?>">
											AKTIVASI
										</a>
										<?php  
											if ($value['hak_akses_id'] == '2') {
												echo '<a href="main.php?page=profil-pencaker&id='.pencakerProfID($value['id']).'" class="btn btn-sm btn-primary" target="_blank">PROFIL</a>';
											} elseif ($value['hak_akses_id'] == '3') {
												echo '<a href="main.php?page=profil-perusahaan&id='.perusahaanProfID($value['id']).'" class="btn btn-sm btn-primary" target="_blank">PROFIL</a>';
											} else {
												echo '';
											}
											if ($value['hak_akses_id'] == '1') {
												echo '<a href="?page=reset-password&id='.$value['id'].'" class="btn btn-sm btn-primary">RESET PASSWORD</a>';
											}
										?>
										
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