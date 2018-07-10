<div class="card">
	<div class="card-body">
		<div class="text-center">
			<img src="assets/img/profil/perusahaan/<?php echo $dataProfil["logo_perusahaan"] ?>" class="rounded-circle text-center" height="200xp">
			<div class="side-detail">
				<div class="side-akses">[ <?php echo strtoupper($_SESSION['hak_akses']) ?> ]</div>
				<div class="side-nama"><?php echo $dataProfil["nama_perusahaan"] ?></div>
				<div class="side-email"><small><strong><?php echo $dataProfil["email"] ?></strong></small></div>
				<div class="side-nip"><small><strong><?php echo 'NO SIUP. '.$dataProfil["no_siup"] ?></strong></small></div>
				<div class="side-nip"><small><strong><?php echo 'NO SITU. '.$dataProfil["no_situ"] ?></strong></small></div>
			</div>
		</div>
	</div>
	<ul class="list-group">
		<a href="?page=home" class="list-group-item <?php echo $page=='home'?'active':'' ?>">HOME</a>
		<a href="?page=profil" class="list-group-item <?php echo $page=='profil'?'active':'' ?>">PROFIL</a>
		<a href="?page=loker" class="list-group-item <?php echo $page=='loker'?'active':'' ?>">LOKER</a>
		<a href="logout.php" class="list-group-item">LOGOUT</a>
	</ul>
</div>