<div class="card">
	<div class="card-body">
		<div class="text-center">
			<img src="assets/img/profil/admin/<?php echo $dataProfil["foto"] ?>" class="rounded-circle text-center" height="200xp">
			<div class="side-detail">
				<div class="side-akses">[ <?php echo strtoupper($_SESSION['hak_akses']) ?> ]</div>
				<div class="side-nip"><?php echo 'NIP. '.$dataProfil["nip"] ?></div>
				<div class="side-nama"><?php echo $dataProfil["nama"] ?></div>
			</div>
		</div>
	</div>
	<ul class="list-group">
		<a href="?page=home" class="list-group-item <?php echo $page=='home'?'active':'' ?>">HOME</a>
		<a href="?page=akun" class="list-group-item <?php echo $page=='akun'?'active':'' ?>">USER AKUN</a>
		<a href="?page=event" class="list-group-item <?php echo $page=='event'?'active':'' ?>">BERITA/EVENT</a>
		<a href="?page=loker" class="list-group-item <?php echo $page=='loker'?'active':'' ?>">LOKER</a>
		<a href="logout.php" class="list-group-item">LOGOUT</a>
	</ul>
</div>