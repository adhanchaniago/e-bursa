<?php include "views/partials/carousel.php"; ?>

<div class="card bg-scondary my-4 text-center">
	<div class="card-body">
		<p class="m-0">
			Selamat datang di Bursa Kerja Online. Bagi yang belum mempunyai akun silahkan 
			<a href="?page=daftar">Daftar</a> terlebih dahulu. Sudah punya akun? 
			<a href="?page=login">Login</a> disini.
		</p>
	</div>
</div>

<?php  

	$id = $_GET['id'];
	$query = "SELECT * FROM info_berita WHERE id = '$id'";
	$process = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($process);

?>

<div class="row">
	<div class="col-md-9">
		<h3 class="home-title"><?php echo $data['judul'] ?></h3>
		<div><?php echo $data['konten'] ?></div>
	</div>
	<div class="col-md-3">
		<?php include "views/partials/rightbar.php"; ?>
	</div>
</div><hr>

<?php  
	if (isset($_SESSION['hak_akses'])) {
?>
	<div class="row">
		<div class="col-md-8">
			<form action="?page=tambah-komentar-info" method="POST">
				<input type="hidden" name="info_id" value="<?php echo $data['id'] ?>">
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
				<div class="form-group">
					<label for="komentar">TULIS KOMENTAR DISINI :</label>
					<textarea name="komentar" id="komentar" rows="5" class="form-control"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-success">TAMBAH KOMENTAR</button>
				</div>
			</form><hr>
		</div>
	</div>				
<?php  
	}
?>

<div class="row">
	<div class="col-md-8">
		<?php  
			$list_data3 = [];
			$query3 = "SELECT * FROM info_komentar WHERE info_id = '".$data['id']."'";
			$process3 = mysqli_query($conn, $query3);
			while($row3 = mysqli_fetch_array($process3)) {
				$list_data3[] = $row3;
			}
		?>
		<div class="loker-sub-head"><?php echo count($list_data3) ?> KOMENTAR :</div>
		<ul class="list-unstyled">

			<?php
				foreach ($list_data3 as $value) {
					$list_detail_profil = getKomentarDetailUser($value['user_akun_id']);
			?>
				
				<li class="media my-4">
					<img class="mr-3 rounded-circle" src="<?php echo $list_detail_profil['foto'] ?>" width="64" height="64" alt="Generic placeholder image">
					<div class="media-body">
						<?php
							if ($list_detail_profil['hak_akses'] == 'pencaker') {
								echo '<h5 class="mt-0 mb-1"><a href="?page=profil-pencaker&id='.$list_detail_profil['user_id'].'">'.$list_detail_profil['nama'].'</a></h5>';
							} elseif ($list_detail_profil['hak_akses'] == 'perusahaan') {
								echo '<h5 class="mt-0 mb-1"><a href="?page=profil-perusahaan&id='.$list_detail_profil['user_id'].'">'.$list_detail_profil['nama'].'</a></h5>';
							} else {
								echo '<h5 class="mt-0 mb-1"><a href="#">'.$list_detail_profil['nama'].'</a></h5>';
							}
						?>
						<span class="badge badge-<?php echo $list_detail_profil['hak_akses'] == 'admin'?'danger':'primary' ?>"><?php echo strtoupper($list_detail_profil['hak_akses']) ?></span> <span class="badge badge-success"><?php echo date('d M Y', strtotime($value['tanggal'])) ?></span>
						<div><?php echo $value['konten'] ?></div>
					</div>
				</li><hr>

			<?php
				}

			?>
			
		</ul>
	</div>
</div>