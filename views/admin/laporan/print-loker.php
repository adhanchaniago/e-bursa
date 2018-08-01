<div class="row print-area" style="padding-left: 100px; padding-right: 100px;">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 text-center">
				<img src="assets/img/logo_pariaman.png" alt="" width="70"><br><br>
				<h4>LAPORAN LOWONGAN PEKERJAAN YANG TERDAFTAR PADA E-BURSA TAHUN <?php echo date('Y') ?></h4>
				<p>
					<strong>DINAS PERDAGANGAN TENAGA KERJA KOPERASI DAN UKM</strong><br>
					<span style="font-size: 12px;">Jl. Sam Ratulangi No.30, Jl. Baru, Pariaman Tengah, Kota Pariaman, Sumatera Barat 25513 - Telp. (0751) 92105</span>
				</p>
				<hr><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>A. TABEL DATA LOWONGAN PEKERJAAN</strong>
				<p>
					Berikut adalah tabel data seluruh lowongan pekerjaan yang terdaftar di E-BURSA selama tahun <?php echo date('Y') ?> :
				</p>
				<?php 
					$query = "SELECT * FROM lowongan";
					$process = mysqli_query($conn, $query);
					$list_data = [];
					$date_now = date("Y-m-d");
					while($row = mysqli_fetch_array($process)) {
						$list_data[] = $row;
					}
				?>
				<table class="table table-bordered" style="font-size: 15px;">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Title</th>
							<th class="text-center">Perusahaan</th>
							<th class="text-center">Sallary</th>
							<th class="text-center">Mulai</th>
							<th class="text-center">Selesai</th>
							<th class="text-center">Bann</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($list_data as $key => $value) {
						?>
							<tr>
								<td class="text-center"><?php echo $key+1 ?></td>
								<td><?php echo $value['judul'] ?></td>
								<td><?php echo getPerusahaanProfil2($value['profil_perusahaan_id'])['nama_perusahaan'] ?></td>
								<td class="text-center"><?php echo $value['gaji'] ?></td>
								<td class="text-center"><?php echo date('d M Y', strtotime($value['tanggal_mulai'])) ?></td>
								<td class="text-center"><?php echo date('d M Y', strtotime($value['tanggal_selesai'])) ?></td>
								<td class="text-center">
									<?php
										if ($value['bann'] == '0') {
											echo 'NO';
										} else {
											echo 'Yes';
										}
									?>
								</td>
							</tr>
						<?php  
							}
						?>
					</tbody>
				</table>
			</div>
		</div><br><br>
		<div class="row">
			<div class="col-md-12">
				<strong>B. GRAFIK DATA LOWONGAN PEKERJAAN</strong>
				<p>
					Berikut adalah grafik data seluruh user akun yang terdaftar di E-BURSA selama tahun <?php echo date('Y') ?> :
				</p>
				<canvas id="chart-loker" width="700" height="300"></canvas>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){
		setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
	});
</script>