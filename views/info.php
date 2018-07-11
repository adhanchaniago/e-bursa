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
		<h3 class="home-title">Artikel Informasi Terbaru</h3>
		<?php  

			$query = "SELECT * FROM info_berita";
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
						<p class="post-title"><a href="#" class=""><?php echo $value['judul'] ?></a></p><hr>
						<div><?php echo $value['konten'] ?></div><hr>
						<p class="post-time text-right">Kategori : <?php echo $value['kategori'] ?> | Dipublish pada : <?php echo $value['tanggal'] ?></p>
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