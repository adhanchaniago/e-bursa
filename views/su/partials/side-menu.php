<div class="card">
	<div class="card-body">
		<div class="text-center">
			<div class="side-detail">
				<div class="side-akses">[ <?php echo strtoupper($_SESSION['hak_akses']) ?> ]</div>
				<div class="side-nama"><?php echo strtoupper($_SESSION['username']) ?></div>
			</div>
		</div>
	</div>
	<ul class="list-group">
		<a href="?page=home" class="list-group-item <?php echo $page=='home'?'active':'' ?>">HOME</a>
		<a href="?page=akun" class="list-group-item <?php echo $page=='akun'?'active':'' ?>">USER AKUN</a>
		<a href="logout.php" class="list-group-item">LOGOUT</a>
	</ul>
</div>