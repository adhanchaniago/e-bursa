<?php include "views/partials/carousel.php"; ?>

<div class="card bg-scondary my-4 text-center">
	<div class="card-body">
		<p class="m-0">
			Selamat datang di Bursa Kerja Online. Bagi yang belum memmpunyai akun silahkan 
			<a href="?page=daftar">Daftar</a> terlebih dahulu. Sudah punya akun? 
			<a href="?page=login">Login</a> disini.
		</p>
	</div>
</div>

<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<h3 class="home-title">Informasi/Berita Terbaru</h3>
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
									<a href="?page=detail-info&id=<?php echo $value['id'] ?>" class=""><?php echo $value['judul'] ?></a>
									
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
		</div><br>
		<div class="row">
			<div class="col-md-12">
				<h3 class="home-title">Lowongan Kerja Terbaru</h3>
				<?php  
					$list_data2 = array();
					$query2 = "SELECT * FROM lowongan ORDER BY dibuat_pada DESC LIMIT 5";
					$process2 = mysqli_query($conn, $query2);
					while($row = mysqli_fetch_array($process2)) {
						$list_data2[] = $row;
					}
					foreach ($list_data2 as $key => $value) {
				?>
				<div class="row bt-mrg-10">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<p class="post-title">
									<a href="?page=detail-loker&id=<?php echo $value['id'] ?>"><?php echo $value['judul'] ?></a>
									<span class="badge badge-success">Deadline <?php echo date("d M Y", strtotime($value['tanggal_selesai'])) ?></span>
									<?php  
										$date_now = date("Y-m-d");
										if ($value['status'] == 0 || $date_now > $value['tanggal_selesai']) {
											echo '<span class="badge badge-danger">Closed</span> ';
										}
										if ($value['bann'] == 1) {
											echo '<span class="badge badge-danger">Banned</span> ';
										}
									?>
								</p><hr>
								<p class="post-time text-right">Dipublish oleh <a href="#"><?php echo perusahaanGetNama($value['profil_perusahaan_id']) ?></a> pada <?php echo date("d M Y", strtotime($value['dibuat_pada'])) ?></p>
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
		<?php include "views/partials/rightbar.php"; ?>
	</div>
</div>