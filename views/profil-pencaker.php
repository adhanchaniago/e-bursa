<?php  
	$profil_id = sanitizeThis($_GET['id']);
	$data_pencaker = getPencakerProfil2(sanitizeThis($_GET['id']));
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="home-title">Profil Pencari Kerja</h3><hr>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<img src="assets/img/profil/pencaker/<?php echo $data_pencaker["photo"] ?>" class="rounded text-center" width="100%">
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<div class="loker-sub-head">BIODATA DIRI :</div>
				<table class="table table-striped">
					<tr>
						<td><strong>NIK</strong></td>
						<td><?php echo $data_pencaker['nik'] ?></td>
					</tr>
					<tr>
						<td><strong>Nama Lengkap</strong></td>
						<td><?php echo $data_pencaker['nama'] ?></td>
					</tr>
					<tr>
						<td><strong>Jenis Kelamin</strong></td>
						<td><?php echo $data_pencaker['jenis_kelamin'] ?></td>
					</tr>
					<tr>
						<td><strong>Tempat Lahir</strong></td>
						<td><?php echo $data_pencaker['tempat_lahir'] ?></td>
					</tr>
					<tr>
						<td><strong>Tanggal Lahir</strong></td>
						<td><?php echo date('d M Y', strtotime($data_pencaker['tanggal_lahir'])) ?></td>
					</tr>
					<tr>
						<td><strong>Agama</strong></td>
						<td><?php echo $data_pencaker['agama'] ?></td>
					</tr>
					<tr>
						<td><strong>Alamat</strong></td>
						<td><?php echo $data_pencaker['alamat'] ?></td>
					</tr>
					<tr>
						<td><strong>Telepon</strong></td>
						<td><?php echo $data_pencaker['telepon'] ?></td>
					</tr>
					<tr>
						<td><strong>E-Mail</strong></td>
						<td><?php echo $data_pencaker['email'] ?></td>
					</tr>
					<tr>
						<td><strong>Quote</strong></td>
						<td><?php echo $data_pencaker['quote'] ?></td>
					</tr>
				</table>
			</div>
		</div><hr>
		<div class="row">
			<div class="col-md-12">
				<div class="loker-sub-head">PENDIDIKAN FORMAL :</div>
				<table class="table table-bordered tabel-profil nowrap">
					<thead>
						<tr>
							<th>#</th>
							<th>Tingkat</th>
							<th>Nama Sekolah</th>
							<th>Alamat</th>
							<th>Jurusan</th>
							<th>Tahun Lulus</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$list1 = [];
							$q1 = "SELECT * FROM pendidikan_formal WHERE profil_pencaker_id = '$profil_id'";
							$p1 = mysqli_query($conn, $q1);
							while($r1 = mysqli_fetch_array($p1)) {
								$list1[] = $r1;
							}
							foreach ($list1 as $key => $value) {
						?>
							<tr>
								<td class="text-center"><?php echo $key+1 ?></td>
								<td class="text-center"><?php echo $value['tingkat_pendidikan'] ?></td>
								<td><?php echo $value['nama_sekolah'] ?></td>
								<td><?php echo $value['alamat_sekolah'] ?></td>
								<td class="text-center"><?php echo $value['jurusan'] ?></td>
								<td class="text-center"><?php echo $value['tahun_lulus'] ?></td>
							</tr>
						<?php  
							}
						?>
					</tbody>
				</table>
			</div>
		</div><hr>
		<div class="row">
			<div class="col-md-12">
				<div class="loker-sub-head">PENDIDIKAN NON-FORMAL :</div>
				<table class="table table-bordered tabel-profil nowrap">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Kegiatan</th>
							<th>Penyelenggara</th>
							<th>Tempat</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$list2 = [];
							$q2 = "SELECT * FROM pendidikan_nonformal WHERE profil_pencaker_id = '$profil_id'";
							$p2 = mysqli_query($conn, $q2);
							while($r2 = mysqli_fetch_array($p2)) {
								$list2[] = $r2;
							}
							foreach ($list2 as $key => $value) {
						?>
							<tr>
								<td class="text-center"><?php echo $key+1 ?></td>
								<td><?php echo $value['nama_kegiatan'] ?></td>
								<td><?php echo $value['penyelenggara'] ?></td>
								<td><?php echo $value['tempat_kegiatan'] ?></td>
								<td class="text-center"><?php echo $value['tanggal_mulai'] ?></td>
								<td class="text-center"><?php echo $value['tanggal_selesai'] ?></td>
							</tr>
						<?php  
							}
						?>
					</tbody>
				</table>
			</div>
		</div><hr>
		<div class="row">
			<div class="col-md-12">
				<div class="loker-sub-head">PENGALAMAN KERJA :</div>
				<table class="table table-bordered tabel-profil nowrap">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Perusahaan</th>
							<th>Bidang Usaha</th>
							<th>Jabatan</th>
							<th>Deskripsi Jabatan</th>
							<th>Tanggal Masuk</th>
							<th>Tanggal Berhenti</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$list3 = [];
							$q3 = "SELECT * FROM pengalaman_kerja WHERE profil_pencaker_id = '$profil_id'";
							$p3 = mysqli_query($conn, $q3);
							while($r3 = mysqli_fetch_array($p3)) {
								$list3[] = $r3;
							}
							foreach ($list3 as $key => $value) {
						?>
							<tr>
								<td class="text-center"><?php echo $key+1 ?></td>
								<td><?php echo $value['nama_perusahaan'] ?></td>
								<td><?php echo $value['bidang_perusahaan'] ?></td>
								<td><?php echo $value['jabatan'] ?></td>
								<td><?php echo $value['deskripsi_jabatan'] ?></td>
								<td class="text-center"><?php echo $value['tanggal_masuk'] ?></td>
								<td class="text-center"><?php echo $value['tanggal_berhenti'] ?></td>
							</tr>
						<?php  
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>