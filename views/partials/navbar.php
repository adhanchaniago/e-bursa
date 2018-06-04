<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="/e-bursa">eBURSA</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/e-bursa">Beranda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Tentang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Kontak</a>
				</li>
			</ul>
			<?php  
				if (!isset($_SESSION['username'])) {	
			?>	
				<form class="form-inline my-2 my-lg-0" method="POST" action="cores/auth/login_process.php">
					<input class="form-control-sm mr-sm-2" type="text" placeholder="Username" name="username">
					<input class="form-control-sm mr-sm-2" type="password" placeholder="Password" name="password">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button> &nbsp;
					<a href="?page=daftar" class="btn btn-outline-primary my-2 my-sm-0">Daftar</a>
				</form>
			<?php
				} else {
					if ($_SESSION['hak_akses'] == 'admin') {
						echo '<a class="btn btn-sm btn-outline-primary my-2 my-sm-0" href="admin-dashboard.php?page=home">DASHBOARD</a>';
					}
				}

			?>
			
		</div>
	</div>
</nav>