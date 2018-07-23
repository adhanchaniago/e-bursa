<div class="row">
	<div class="col-md-3">
		<?php  
			include "views/pencaker/partials/side-menu.php";
			$pencaker_id = pencakerProfID($_SESSION['user_id']);
			$data = getLamaranCountReport($pencaker_id);
		?>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<p style="font-size: 15pt;"><strong>Informasi/Berita Terbaru</strong></p><hr>
				<?php  
					$list_data = [];
					$query = "SELECT * FROM info_berita WHERE status = '1' ORDER BY tanggal DESC LIMIT 5";
					$process = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($process)) {
						$list_data[] = $row;
					}
					foreach ($list_data as $key => $value) {
				?>
				<div class="row bt-mrg-10">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<p class="post-title">
									<a href="main.php?page=detail-info&id=<?php echo $value['id'] ?>" target="_blank"><?php echo $value['judul'] ?></a>
									
								</p><hr>
								<p class="post-time text-right"><span class="badge badge-success float-left"><?php echo strtoupper($value['kategori']) ?></span>Dipublish oleh <a href="#">Admin</a> pada <?php echo date("d M Y", strtotime($value['tanggal'])) ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<div class="card text-white bg-primary mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['total'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>TOTAL</strong>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card text-white bg-warning mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['waiting'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>WAITING</strong>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card text-white bg-success mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['accept'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>DITERIMA</strong>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card text-white bg-danger mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['decline'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>DITOLAK</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>