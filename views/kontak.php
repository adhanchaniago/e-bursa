<?php include "views/partials/carousel.php"; ?>

<div class="card bg-scondary my-4 text-center">
	<div class="card-body">
		<p class="m-0">
			Selamat datang di Bursa Kerja Online. Bagi yang belum memmpunyai akun silahkan 
			<a href="?page=daftar">Daftar</a> terlebih dahulu. Sudah punya akun? 
			<a href="?page=login">Login</a> disini.
		</p>
	</div>
</div>

<div class="row">
	<div class="col-md-9">
		<h3 class="home-title">Kontak</h3><hr>
		<p><strong>KANTOR DINAS PERDAGANGAN TENAGA KERJA KOPERASI DAN UKM</strong></p>
		<p>Jl. Sam Ratulangi No.30, Jl. Baru, Pariaman Tengah, Kota Pariaman, Sumatera Barat 25513 Telp. (0751) 92105</p>
		<img src="assets/img/dinas.JPG" alt="" width="100%"><br><br>
		<p><strong>DENAH LOKASI KANTOR</strong></p>
		<div id="map" style="height: 400px; width: 100%;"></div>
	</div>
	<div class="col-md-3">
		<?php include "views/partials/rightbar.php"; ?>
	</div>
</div>



<script>
	function initMap() {
		var depnaker = {lat: -0.6359058, lng: 100.1276977};
		var map = new google.maps.Map(
			document.getElementById('map'), {zoom: 15, center: depnaker});
		var marker = new google.maps.Marker({position: depnaker, map: map});
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAvDWxCEcELFlnoSFQ9Pk77d75eZiBYUM&callback=initMap" async defer></script>