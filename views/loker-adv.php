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
		<?php  
			$key = sanitizeThis($_GET['key']);
			if ($key == 'sma') {
				$title = "SMA/SMK";
				$query = "
					SELECT * FROM lowongan WHERE deskripsi_persyaratan LIKE '%sma%' 
					OR deskripsi_persyaratan LIKE '%smk%' 
					OR deskripsi_persyaratan LIKE '%slta%'
					ORDER BY dibuat_pada DESC
				";
			} elseif ($key == 'd3') {
				$title = "DIPLOMA 3";
				$query = "
					SELECT * FROM lowongan WHERE deskripsi_persyaratan LIKE '%d3%' 
					OR deskripsi_persyaratan LIKE '%diploma 3%' 
					OR deskripsi_persyaratan LIKE '%d-3%' 
					ORDER BY dibuat_pada DESC
				";
			} elseif ($key == 's1') {
				$title = "STRATA 1";
				$query = "
					SELECT * FROM lowongan WHERE deskripsi_persyaratan LIKE '%s1%' 
					OR deskripsi_persyaratan LIKE '%strata 1%' 
					OR deskripsi_persyaratan LIKE '%s-1%' 
					ORDER BY dibuat_pada DESC
				";
			} elseif ($key == 's2') {
				$title = "STRATA 2";
				$query = "
					SELECT * FROM lowongan WHERE deskripsi_persyaratan LIKE '%s2%' 
					OR deskripsi_persyaratan LIKE '%strata 2%' 
					OR deskripsi_persyaratan LIKE '%s-2%' 
					ORDER BY dibuat_pada DESC
				";
			}
		?>
		<h3 class="home-title">Lowongan Kerja Terbaru <?php echo $title; ?></h3><hr>
		<?php  
			$list_data = array();
			// $query = "SELECT * FROM lowongan ORDER BY dibuat_pada DESC";
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
							<a href="?page=detail-loker&id=<?php echo $value['id'] ?>"><?php echo $value['judul'] ?></a>
							<span class="badge badge-success">Deadline <?php echo date("d M Y", strtotime($value['tanggal_selesai'])) ?></span>
							<?php  
								if ($value['status'] == 0) {
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
	<div class="col-md-3">
		<?php include "views/partials/rightbar.php"; ?>
	</div>
</div>