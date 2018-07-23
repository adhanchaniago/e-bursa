<div class="row">
	<div class="col-md-3">
		<?php  
			include "views/pencaker/partials/side-menu.php";
			$pencaker_id = pencakerProfID($_SESSION['user_id']);
			$data = getLamaranCountReport($pencaker_id);
		?>
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-3">
				<div class="card text-white bg-primary mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['total'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>TOTAL</strong>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card text-white bg-warning mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['waiting'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>WAITING</strong>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card text-white bg-success mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['accept'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>DITERIMA</strong>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card text-white bg-danger mb-3">
					<div class="card-header text-center">
						<strong>LAMARAN</strong>
					</div>
					<div class="card-body text-center count-number">
						<?php echo $data['decline'] ?>
					</div>
					<div class="card-footer text-center">
						<strong>DITOLAK</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>