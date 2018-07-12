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
	
	$query = "SELECT * FROM lowongan WHERE id = '$id'";
	$process = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($process);

	$query2 = "SELECT * FROM profil_perusahaan WHERE id = '".$data['profil_perusahaan_id']."'";
	$process2 = mysqli_query($conn, $query2);
	$data2 = mysqli_fetch_assoc($process2);

?>

<div class="row">
	<div class="col-md-8">
		<h3 class="home-title"><?php echo $data['judul'] ?></h3>
		<div class="loker-sub-head">DESKRIPSI PEKERJAAN :</div>
		<div><?php echo $data['deskripsi_pekerjaan'] ?></div>
		<div class="loker-sub-head">DESKRIPSI PERSYARATAN :</div>
		<div><?php echo $data['deskripsi_persyaratan'] ?></div>
		<div class="loker-sub-head">GAJI :</div>
		<div>IDR <?php echo number_format($data['gaji'], 0) ?></div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<div>
					<table width="100%">
						<tr>
							<td class="text-center">
								<img src="assets/img/profil/perusahaan/<?php echo $data2["logo_perusahaan"] ?>" class="rounded-circle text-center" height="150px"><hr>
								<p><strong><?php echo $data2['nama_perusahaan'] ?></strong></p>
								<hr>
							</td>
						</tr>
						<tr>
							<td class="text-center"><strong>No SIUP</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['no_siup'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>No SITU</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['no_situ'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Bidang Usaha</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['bidang_usaha'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Deskripsi Perusahaan</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['deskripsi_perusahaan'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Alamat</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['alamat'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Telepon</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['telepon'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>E-Mail</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['email'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Website</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['website'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Slogan</strong></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $data2['slogan'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><hr>
<div class="row">
	<div class="col-md-12 text-center">
		<?php  
			var_dump(isset($_SESSION['hak_akses']));
			if ($_SESSION['hak_akses'] == 'pencaker') {
				echo '<a href="" class="btn btn-success btn-lg">LAMAR SEKARANG !</a>';
			}

		?>
	</div>
</div><hr>
<div class="row">
	<div class="col-md-12">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum blanditiis rem voluptas minus cumque cupiditate alias earum vel iste odit excepturi eligendi delectus ratione, accusamus debitis est aliquid non molestias.
		</p>
	</div>
</div>

