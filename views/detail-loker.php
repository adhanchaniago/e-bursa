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

<div class="row print-area">
	<div class="col-md-8">
		<h3 class="home-title">
			<?php echo $data['judul'] ?> 
			<span class="float-right">
				<button type="button" class="btn btn-sm btn-primary print-button" onclick="window.print()">PRINT</button>
			</span>
		</h3>
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

<?php 
	if (isset($_SESSION['hak_akses'])) {
		$lamar_status = cekLamarKerja($data['id'], pencakerProfID($_SESSION['user_id']));
		if ($_SESSION['hak_akses'] == 'pencaker') {
?>
	
	<div class="row">
		<div class="col-md-8 text-center">
			<?php
				if ($lamar_status == 1) {
					echo '<a href="#" class="btn btn-primary btn-lg btn-block disabled">ANDA SUDAH MELAMAR PADA LOKER INI !</a>';
				} elseif ($data['bann'] == 1) {
					echo '<a href="#" class="btn btn-danger btn-lg btn-block disabled">LOWONGAN KERJA DI BANNED !</a>';
				} elseif ($data['status'] == 0) {
					echo '<a href="#" class="btn btn-danger btn-lg btn-block disabled">LOWONGAN KERJA SUDAH DITUTUP !</a>';
				} else {
					echo '<a href="?page=lamar-kerja&id='.$data['id'].'" class="btn btn-success btn-lg btn-block">LAMAR SEKARANG !</a>';
				}
			?>
			
		</div>
	</div><hr>
<?php 
		}
?>
	<div class="row">
		<div class="col-md-8">
			<form action="?page=tambah-komentar-loker" method="POST">
				<input type="hidden" name="lowongan_id" value="<?php echo $data['id'] ?>">
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
				<div class="form-group">
					<label for="komentar">TULIS KOMENTAR DISINI :</label>
					<textarea name="komentar" id="komentar" rows="5" class="form-control"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-success">TAMBAH KOMENTAR</button>
				</div>
			</form> <hr>
		</div>
	</div>

<?php			
	}
?>
	
<div class="row">
	<div class="col-md-8">
		<?php  

			$list_data = [];
			$query3 = "SELECT * FROM lowongan_komentar WHERE lowongan_id = '".$data['id']."'";
			$process3 = mysqli_query($conn, $query3);
			while($row = mysqli_fetch_array($process3)) {
				$list_data[] = $row;
			}
			
		?>
		<div class="loker-sub-head"><?php echo count($list_data) ?> KOMENTAR :</div>
		<ul class="list-unstyled">

			<?php
				foreach ($list_data as $value) {
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