<div class="row print-area" style="padding-left: 100px; padding-right: 100px;">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 text-center">
				<img src="assets/img/logo_pariaman.png" alt="" width="70"><br><br>
				<h4>LAPORAN AKUN YANG TERDAFTAR PADA E-BURSA TAHUN <?php echo date('Y') ?></h4>
				<p>
					<strong>DINAS PERDAGANGAN TENAGA KERJA KOPERASI DAN UKM</strong><br>
					<span style="font-size: 12px;">Jl. Sam Ratulangi No.30, Jl. Baru, Pariaman Tengah, Kota Pariaman, Sumatera Barat 25513 - Telp. (0751) 92105</span>
				</p>
				<hr><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>A. TABEL DATA USER AKUN</strong>
				<p>
					Berikut adalah tabel data seluruh user akun yang terdaftar di E-BURSA selama tahun <?php echo date('Y') ?> :
				</p>
				<?php 
					$query = "SELECT * FROM user_akun WHERE hak_akses_id = '2' OR hak_akses_id = '3'";
					$process = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($process)) {
						$list_data[] = $row;
					}
				?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">ID</th>
							<th class="text-center">USERNAME</th>
							<th class="text-center">HAK AKSES</th>
							<th class="text-center">STATUS</th>
							<th class="text-center">AKTIVASI</th>
							<th class="text-center">TGL DAFTAR</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($list_data as $key => $value) {	
						?>
							<tr>
								<td class="text-center"><?php echo $key+1; ?></td>
								<td class="text-center"><?php echo 'UID#'.$value['id'] ?></td>
								<td class="text-center"><?php echo $value['username'] ?></td>
								<td class="text-center"><?php echo strtoupper(getSlugHakAkses($value['hak_akses_id'])) ?></td>
								<td class="text-center"><?php echo $value['status']==1?'ACTIVE':'BANNED' ?></td>
								<td class="text-center"><?php echo $value['aktivasi']==1?'SUDAH':'BELUM' ?></td>
								<td class="text-center"><?php echo date('d M Y', strtotime($value['dibuat_pada'])) ?></td>
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
				<strong>B. GRAFIK DATA USER AKUN</strong>
				<p>
					Berikut adalah grafik data seluruh user akun yang terdaftar di E-BURSA selama tahun <?php echo date('Y') ?> :
				</p>
				<canvas id="chart-akun" width="700" height="300"></canvas>
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