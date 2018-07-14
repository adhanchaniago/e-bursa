<?php  
	$profil_id = sanitizeThis($_GET['id']);
	$data_perusahaan = getPerusahaanProfil2(sanitizeThis($_GET['id']));
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="home-title">Profil Perusahaan</h3><hr>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<img src="assets/img/profil/perusahaan/<?php echo $data_perusahaan["logo_perusahaan"] ?>" class="rounded text-center" width="100%">
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<div class="loker-sub-head">BIODATA PERUSAHAAN :</div>
				<table class="table table-striped">
					<tr>
						<td><strong>No. SIUP</strong></td>
						<td><?php echo $data_perusahaan['no_siup'] ?></td>
					</tr>
					<tr>
						<td><strong>No. SITU</strong></td>
						<td><?php echo $data_perusahaan['no_situ'] ?></td>
					</tr>
					<tr>
						<td><strong>Nama Perusahaan</strong></td>
						<td><?php echo $data_perusahaan['nama_perusahaan'] ?></td>
					</tr>
					<tr>
						<td><strong>Bidang Usaha</strong></td>
						<td><?php echo $data_perusahaan['bidang_usaha'] ?></td>
					</tr>
					<tr>
						<td><strong>Deskripsi Perusahaan</strong></td>
						<td><?php echo $data_perusahaan['deskripsi_perusahaan'] ?></td>
					</tr>
					<tr>
						<td><strong>Alamat</strong></td>
						<td><?php echo $data_perusahaan['alamat'] ?></td>
					</tr>
					<tr>
						<td><strong>Telepon</strong></td>
						<td><?php echo $data_perusahaan['telepon'] ?></td>
					</tr>
					<tr>
						<td><strong>E-Mail</strong></td>
						<td><?php echo $data_perusahaan['email'] ?></td>
					</tr>
					<tr>
						<td><strong>Website</strong></td>
						<td><?php echo $data_perusahaan['website'] ?></td>
					</tr>
					<tr>
						<td><strong>Slogan</strong></td>
						<td><?php echo $data_perusahaan['slogan'] ?></td>
					</tr>
					<tr>
						<td><strong>Bergabung Sejak</strong></td>
						<td><?php echo date("d M Y", strtotime($data_perusahaan['dibuat_pada'])) ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>