<div class="row">
	<div class="col-md-3">
		<?php 
			include "views/admin/partials/side-menu.php";
			$data = getLokerCountReport();
		?>
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-4">
				<div class="card text-white bg-primary mb-3">
					<div class="card-header text-center">
						<strong>TOTAL KESELURUHAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['total'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>LOWONGAN KERJA</strong>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-white bg-success mb-3">
					<div class="card-header text-center">
						<strong>LOWONGAN KERJA</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['ongoing'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>ON GOING</strong>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-white bg-danger mb-3">
					<div class="card-header text-center">
						<strong>LOWONGAN KERJA</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['closed'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>CLOSED</strong>
					</div>
				</div>
			</div>
		</div><br>	
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>GRAFIK JUMLAH LOKER PADA TAHUN <?php echo date("Y") ?></strong>
						<a href="?page=print-loker" class="btn btn-primary float-right btn-sm" target="_blank">PRINT LAPORAN</a>
					</div>
					<div class="card-body">
						<canvas id="chart-loker" width="100%"></canvas>
					</div>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>GRAFIK JUMLAH AKUN YANG TERDAFTAR PADA TAHUN <?php echo date("Y") ?></strong>
						<a href="?page=print-user-akun" class="btn btn-primary float-right btn-sm" target="_blank">PRINT LAPORAN</a>
					</div>
					<div class="card-body">
						<canvas id="chart-akun" width="100%"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>