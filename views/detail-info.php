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
	<div class="col-md-8">
		<h3 class="home-title"><?php echo $data['judul'] ?></h3>
		<div><?php echo $data['konten'] ?></div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque doloremque laborum cumque ipsa quas id reprehenderit inventore, adipisci eum facilis ducimus mollitia dolore deleniti ex hic. Modi magni, quasi libero.</p>
			</div>
		</div>
	</div>
</div>