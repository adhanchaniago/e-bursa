<div class="row">
	<div class="col-md-3">
		<?php include "views/pencaker/partials/side-menu.php"; ?>
	</div>
	<div class="col-md-9">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">PROFIL</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pendidikan-tab" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false">PENDIDIKAN</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pengalaman-tab" data-toggle="tab" href="#pengalaman" role="tab" aria-controls="pengalaman" aria-selected="false">PENGALAMAN KERJA</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab"> <br>
				<div class="card">
					<div class="card-body">
						<h3 class="home-title">Kelola Data Profil</h3>
						<p>Silahkan isi data berikut dengan data yang valid:</p> <hr>
						<div class="row">
							<div class="col-md-8">
								<form action="cores/pencaker/profil/ubah-profil-process.php" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $dataProfil["id"] ?>">
									<div class="form-group">
										<label for="nik">Nomor Induk Kependudukan</label>
										<input type="text" name="nik" id="nik" class="form-control" value="<?php echo $dataProfil["nik"] ?>">
									</div>
									<div class="form-group">
										<label for="nama">Nama Lengkap</label>
										<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $dataProfil["nama"] ?>">
									</div>
									<div class="form-group">
										<label for="jekel">Jenis Kelamin</label>
										<select name="jekel" id="jekel" class="form-control">
											<option value="<?php echo $dataProfil["jenis_kelamin"] ?>"><?php echo $dataProfil["jenis_kelamin"] ?></option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
										</select>
									</div>
									<div class="form-group">
										<label for="tempat_lahir">Tempat Lahir</label>
										<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $dataProfil["tempat_lahir"] ?>">
									</div>
									<div class="form-group">
										<label for="tanggal_lahir">Tanggal Lahir</label>
										<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $dataProfil["tanggal_lahir"] ?>" readonly>
									</div>
									<div class="form-group">
										<label for="agama">Agama</label>
										<select name="agama" id="agama" class="form-control">
											<option value="<?php echo $dataProfil["agama"] ?>"><?php echo $dataProfil["agama"] ?></option>
											<option value="Islam">Islam</option>
											<option value="Katolik">Katolik</option>
											<option value="Protestan">Protestan</option>
											<option value="Hindhu">Hindhu</option>
											<option value="Buddha">Buddha</option>
										</select>
									</div>
									<div class="form-group">
										<label for="alamat">Alamat Lengkap</label>
										<textarea name="alamat" id="alamat" class="form-control"><?php echo $dataProfil["alamat"] ?></textarea>
									</div>
									<div class="form-group">
										<label for="telepon">Nomor Telepon</label>
										<input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $dataProfil["telepon"] ?>">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" class="form-control" value="<?php echo $dataProfil["email"] ?>">
									</div>
									<div class="form-group">
										<label for="quote">Quote</label>
										<input type="text" name="quote" id="quote" class="form-control" value="<?php echo $dataProfil["quote"] ?>">
									</div>
									<div class="form-group">
										<label for="foto">Pas Photo</label>
										<input type="file" name="foto" id="foto" class="form-control">
									</div>
									<div class="form-group text-right">
										<button type="reset" class="btn btn-sm btn-default">RESET</button>
										<button type="submit" class="btn btn-success">SIMPAN</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab"> <br>
				<div class="card">
					<div class="card-body">
						<h3 class="home-title">Kelola Pendidikan</h3>
						<p>Silahkan isi data berikut dengan data yang valid:</p> <hr>
						<div class="row">
							<div class="col-md-5">
								<p><strong>PENDIDIKAN FORMAL :</strong></p>
								<form action="cores/pencaker/profil/tambah-pendidikan-formal.php" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
									<div class="form-group">
										<label for="tingkat">Tingkat Pendidikan</label>
										<select name="tingkat" id="tingkat" class="form-control">
											<option value="">PILIH</option>
											<option value="SD">Sekolah Dasar</option>
											<option value="SMP">Sekolah Menengah Pertama</option>
											<option value="SMA">Sekolah Menengah Atas</option>
											<option value="SMK">Sekolah Menengah Kejuruan</option>
											<option value="D1">Diploma 1</option>
											<option value="D3">Diploma 3</option>
											<option value="S1">Strata 1</option>
											<option value="S2">Strata 2</option>
										</select>
									</div>
									<div class="form-group">
										<label for="nama_sekolah">Nama Sekolah</label>
										<input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah">
									</div>
									<div class="form-group">
										<label for="alamat_sekolah">Alamat Sekolah</label>
										<input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah">
									</div>
									<div class="form-group">
										<label for="jurusan">Jurusan</label>
										<input type="text" class="form-control" name="jurusan" id="jurusan">
									</div>
									<div class="form-group">
										<label for="th_masuk">Tahun Masuk</label>
										<input type="text" class="form-control" name="th_masuk" id="th_masuk">
									</div>
									<div class="form-group">
										<label for="th_lulus">Tahun Lulus</label>
										<input type="text" class="form-control" name="th_lulus" id="th_lulus">
									</div>
									<div class="form-group">
										<label for="lampiran">Lampiran</label>
										<input type="file" class="form-control" name="lampiran" id="lampiran">
										<small>*Lampiran merupakan hasil scan dari ijazah asli dengan format file jpg/jpeg.</small>
									</div><hr>
									<div class="form-group text-right">
										<button type="reset" class="btn btn-sm btn-default">RESET</button>
										<button type="submit" class="btn btn-success">SIMPAN</button>
									</div>
								</form>
							</div>
							<div class="col-md-7">
								<p><strong>TABEL DATA :</strong></p>
								<div class="table-responsive">
									<table class="table table-bordered display nowrap" id="tabel-data-pendidikan-formal" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Tingkatan</th>
												<th>Nama Sekolah</th>
												<th>Alamat</th>
												<th>Jurusan</th>
												<th>Periode</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php  
												$list_data = [];
												$id = pencakerProfID($_SESSION['user_id']);
												$query = "SELECT * FROM pendidikan_formal WHERE profil_pencaker_id = '$id'";
												$process = mysqli_query($conn, $query);
												while($row = mysqli_fetch_array($process)) {
													$list_data[] = $row;
												}
												foreach ($list_data as $key => $value) {
											?>
												<tr>
													<td class="text-center"><?php echo $key+1; ?></td>
													<td class="text-center"><?php echo $value['tingkat_pendidikan'] ?></td>
													<td class="text-center"><?php echo $value['nama_sekolah'] ?></td>
													<td class="text-center"><?php echo $value['alamat_sekolah'] ?></td>
													<td class="text-center"><?php echo $value['jurusan'] ?></td>
													<td class="text-center"><?php echo $value['tahun_masuk'].'/'.$value['tahun_lulus'] ?></td>
													<td>
														<div class="btn-group">
															<a href="http://localhost/e-bursa/assets/img/lampiran/pendidikan_formal/<?php echo $value['lampiran'] ?>" class="btn btn-success btn-sm" target="_blank">Lampiran</a>
															<a href="?page=hapus-pendidikan-formal&id=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
														</div>
													</td>
												</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div><hr>
						<div class="row">
							<div class="col-md-5">
								<p><strong>PENDIDIKAN NON FORMAL :</strong></p>
								<form action="cores/pencaker/profil/tambah-pendidikan-nonformal.php" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
									<div class="from-group">
										<label for="nama_kegiatan">Nama Kegiatan</label>
										<input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan">
									</div>
									<div class="form-group">
										<label for="penyelenggara">Penyelenggara Kegiatan</label>
										<input type="text" name="penyelenggara" id="penyelenggara" class="form-control">
									</div>
									<div class="form-group">
										<label for="tgl_mulai">Tanggal Mulai</label>
										<input type="text" name="tgl_mulai" id="tgl_mulai" class="form-control tanggal_pl" readonly>
									</div>
									<div class="form-group">
										<label for="tgl_selesai">Tanggal Selesai</label>
										<input type="text" name="tgl_selesai" id="tgl_selesai" class="form-control tanggal_pl" readonly>
									</div>
									<div class="form-group">
										<label for="tempat">Tempat Penyelenggaraan Kegiatan</label>
										<input type="text" name="tempat" id="tempat" class="form-control">
									</div>
									<div class="form-group">
										<label for="lampiran">Lampiran</label>
										<input type="file" class="form-control" name="lampiran" id="lampiran">
										<small>*Lampiran merupakan hasil scan dari sertifikat asli dengan format file jpg/jpeg.</small>
									</div><hr>
									<div class="form-group text-right">
										<button type="reset" class="btn btn-sm btn-default">RESET</button>
										<button type="submit" class="btn btn-success">SIMPAN</button>
									</div>
								</form>
							</div>
							<div class="col-md-7">
								<p><strong>TABEL DATA :</strong></p>
								<div class="table-responsive">
									<table class="table table-bordered display nowrap" id="tabel-data-pendidikan-nonformal" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Kegiatan</th>
												<th>Penyelenggara</th>
												<th>Tanggal Mulai</th>
												<th>Tanggal Selesai</th>
												<th>Tempat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php  
												$list_data2 = [];
												$query2 = "SELECT * FROM pendidikan_nonformal WHERE profil_pencaker_id = '$id'";
												$process2 = mysqli_query($conn, $query2);
												while($row2 = mysqli_fetch_array($process2)) {
													$list_data2[] = $row2;
												}
												foreach ($list_data2 as $key => $value) {
											?>
												<tr>
													<td class="text-center"><?php echo $key+1; ?></td>
													<td class="text-center"><?php echo $value['nama_kegiatan'] ?></td>
													<td class="text-center"><?php echo $value['penyelenggara'] ?></td>
													<td class="text-center"><?php echo $value['tanggal_mulai'] ?></td>
													<td class="text-center"><?php echo $value['tanggal_selesai'] ?></td>
													<td class="text-center"><?php echo $value['tempat_kegiatan'] ?></td>
													<td>
														<div class="btn-group">
															<a href="http://localhost/e-bursa/assets/img/lampiran/pendidikan_nonformal/<?php echo $value['lampiran'] ?>" class="btn btn-success btn-sm" target="_blank">Lampiran</a>&nbsp;
															<a href="?page=hapus-pendidikan-nonformal&id=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
														</div>
													</td>
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
				</div>
			</div>
			<div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab"> <br>
				<div class="card">
					<div class="card-body">
						<h3 class="home-title">Kelola Pengalaman Kerja</h3>
						<p>Silahkan isi data berikut dengan data yang valid:</p> <hr>
						<div class="row">
							<div class="col-md-8">
								<form action="cores/pencaker/profil/tambah-pengalaman-kerja.php" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
									<div class="from-group">
										<label for="nama">Nama Perusahaan</label>
										<input type="text" name="nama" id="nama" class="form-control">
									</div>
									<div class="form-group">
										<label for="jabatan">Jabatan</label>
										<input type="text" name="jabatan" id="jabatan" class="form-control">
									</div>
									<div class="form-group">
										<label for="deskripsi">Deskripsi Jabatan</label>
										<input type="text" name="deskripsi" id="deskripsi" class="form-control">
									</div>
									<div class="form-group">
										<label for="bidang">Bidang Perusahaan</label>
										<input type="text" name="bidang" id="bidang" class="form-control">
									</div>
									<div class="form-group">
										<label for="masuk">Tanggal Masuk</label>
										<input type="text" name="masuk" id="masuk" class="form-control tanggal_pl" readonly>
									</div>
									<div class="form-group">
										<label for="keluar">Tanggal Keluar</label>
										<input type="text" name="keluar" id="keluar" class="form-control tanggal_pl" readonly>
									</div>
									<div class="form-group">
										<label for="lampiran">Lampiran</label>
										<input type="file" class="form-control" name="lampiran" id="lampiran">
										<small>*Lampiran merupakan hasil scan dari surat pengalaman kerja  dengan format file jpg/jpeg.</small>
									</div><hr>
									<div class="form-group text-right">
										<button type="reset" class="btn btn-sm btn-default">RESET</button>
										<button type="submit" class="btn btn-success">SIMPAN</button>
									</div>
								</form>
							</div>
						</div><hr>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered display nowrap" id="tabel-data-pengalaman-kerja" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Perusahaan</th>
												<th>Jabatan</th>
												<th>Deskripsi Jabatan</th>
												<th>Bidang Perusahaan</th>
												<th>Tgl Masuk</th>
												<th>Tgl Keluar</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php  
												$list_data3 = [];
												$query3 = "SELECT * FROM pengalaman_kerja  WHERE profil_pencaker_id = '$id'";
												$process3 = mysqli_query($conn, $query3);
												while($row3 = mysqli_fetch_array($process3)) {
													$list_data3[] = $row3;
												}
												foreach ($list_data3 as $key => $value) {
											?>
												<tr>
													<td class="text-center"><?php echo $key+1; ?></td>
													<td><?php echo $value['nama_perusahaan'] ?></td>
													<td><?php echo $value['jabatan'] ?></td>
													<td><?php echo $value['deskripsi_jabatan'] ?></td>
													<td><?php echo $value['bidang_perusahaan'] ?></td>
													<td><?php echo $value['tanggal_masuk'] ?></td>
													<td><?php echo $value['tanggal_keluar'] ?></td>
													<td>
														<div class="btn-group">
															<a href="http://localhost/e-bursa/assets/img/lampiran/pengalaman_kerja/<?php echo $value['lampiran'] ?>" class="btn btn-success btn-sm" target="_blank">Lampiran</a>
															<a href="?page=hapus-pengalaman-kerja&id=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
														</div>
													</td>
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
				</div>
			</div>
		</div>
	</div>
</div>
