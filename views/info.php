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
		<h3 class="home-title">Artikel Informasi Terbaru</h3><hr>
		<?php  
			$list_data = [];
			$query = "SELECT * FROM info_berita WHERE status = '1' ORDER BY tanggal DESC";
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
	<div class="col-md-3">
		<?php include "views/partials/rightbar.php"; ?>
	</div>
</div>