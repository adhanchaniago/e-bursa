/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.32-MariaDB : Database - dbbursa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `aktivasi` */

DROP TABLE IF EXISTS `aktivasi`;

CREATE TABLE `aktivasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_akun_id` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `aktivasi` */

insert  into `aktivasi`(`id`,`user_akun_id`,`token`,`status`) values 
(20,30,'d8f24be5044f434737a4d041c1ad6a',1),
(28,38,'d17b4677a30630d2fbd2dcc26f1d64',1);

/*Table structure for table `hak_akses` */

DROP TABLE IF EXISTS `hak_akses`;

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(10) NOT NULL,
  `nama_akses` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hak_akses` */

insert  into `hak_akses`(`id`,`slug`,`nama_akses`,`keterangan`,`dibuat_pada`) values 
(1,'admin','Administrator','-','2018-05-07'),
(2,'pencaker','Pencari Kerja','-','2018-05-07'),
(3,'perusahaan','Perusahaan','-','2018-05-07');

/*Table structure for table `info_berita` */

DROP TABLE IF EXISTS `info_berita`;

CREATE TABLE `info_berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_admin_id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` enum('Berita','Event','Info') NOT NULL,
  `konten` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_admin_id` (`profil_admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `info_berita` */

insert  into `info_berita`(`id`,`profil_admin_id`,`judul`,`tanggal`,`kategori`,`konten`,`status`) values 
(1,1,'Lorem Ipsum Dolor Sit Amet','2018-05-28','Berita','<p>Tattatata</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">asdasd</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">asd</td>\r\n<td style=\"width: 33.3333%;\">asd</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n<td style=\"width: 33.3333%;\">2</td>\r\n</tr>\r\n</tbody>\r\n</table>',0),
(2,1,'Ratusan Orang Antre Cari Kerja di Akhir Pekan Sejak Pagi','2018-07-17','Berita','<p><strong>Jakarta</strong>&nbsp;- Ratusan para pencari kerja memadati Mega Career Expo akhir pekan ini. Antrean pun mengular sekitar 30 meter di depan gedung Smesco tempat acara berlangsung.<br /><br />Berdasarkan pantauan&nbsp;<strong>detikFinance</strong>, antrean panjang tak menyurutkan semangat mereka mencari pekerjaan di bursa kerja ini. Pintu gedung pun baru dibuka pukul 10.00 WIB.&nbsp;</p>\r\n<p>Menurut petugas keamanan Smesco Wahyo, antrean telah berlangsung sejak pukul 08.00 WIB dan membuat antrean sepanjang 30 meter.<br /><br /></p>\r\n<center></center>\r\n<p>\"Sudah dari jam 08.00 WIB antreannya. Tadi pagi itu sudah sekitar 30 meter lah,\" katanya saat berbincang dengan&nbsp;<strong>detikFinance</strong>, Jakarta Selatan, Sabtu (7/6/2018).</p>\r\n<p>Sebagai informasi, bursa kerja Mega Career Expo berlangsung dari tanggal 6-7 Juli. Ada sekitar 100 perusahaan yang menawarkan lowongan kerja pada acara kali ini.<br /><br />Sejumlah perusahaan dari perbankan hingga media seperti Bank Danamon, Bank CIMB Niaga, Bank Mega, Kalbe hingga Media Indonesia ikut meramaikan Mega Career Expo kali ini.</p>',1);

/*Table structure for table `info_komentar` */

DROP TABLE IF EXISTS `info_komentar`;

CREATE TABLE `info_komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `user_akun_id` int(11) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `info_komentar` */

insert  into `info_komentar`(`id`,`info_id`,`user_akun_id`,`konten`,`tanggal`) values 
(1,2,1,'tes komentar','2018-07-17'),
(2,2,1,'tes komen 2','2018-07-17'),
(3,2,30,'tes komen 3\r\n','2018-07-17');

/*Table structure for table `lamar` */

DROP TABLE IF EXISTS `lamar`;

CREATE TABLE `lamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `profil_pencaker_id` int(11) NOT NULL,
  `tanggal_lamar` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `lamar` */

insert  into `lamar`(`id`,`lowongan_id`,`profil_pencaker_id`,`tanggal_lamar`,`status`) values 
(3,3,4,'2018-07-15',1);

/*Table structure for table `lowongan` */

DROP TABLE IF EXISTS `lowongan`;

CREATE TABLE `lowongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_perusahaan_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `deskripsi_persyaratan` text NOT NULL,
  `gaji` varchar(100) NOT NULL,
  `bann` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `gambar` varchar(255) DEFAULT 'no_image.jpg',
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_perusahaan_id` (`profil_perusahaan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `lowongan` */

insert  into `lowongan`(`id`,`profil_perusahaan_id`,`judul`,`tanggal_mulai`,`tanggal_selesai`,`deskripsi_pekerjaan`,`deskripsi_persyaratan`,`gaji`,`bann`,`status`,`gambar`,`dibuat_pada`) values 
(3,2,'Web Programmer Junior & Expert','2018-07-11','2018-07-14','<p>Saat ini kami sedang membutuhkan staff Web Programmer yang sangat kompeten di bidangnya terutama di bidang API development maupun Website development.</p>\r\n<p><strong>Tanggung Jawab Pekerjaan :</strong></p>\r\n<p>&ndash; Membuat website atau system baru dengan PHP/HTML standard maupun dengan Content Management System dan database MySql.<br />&ndash; Mampu membuat serta mengintegrasikan API (XML/JSON) ke pihak ketiga. (contoh: Hotel Channel Manager dan Hotel Meta Search Engine)<br />&ndash; Maintenance system yang sudah ada (system OTA dan Activities)<br />&ndash; Membuat dan mengembangkan mobile application Android/IOS (Optional)</p>\r\n<p><strong>Tunjangan :</strong></p>\r\n<p>BPJS Kesehatan, BPJS Ketenagakerjaan</p>\r\n<p><strong>Waktu Bekerja :&nbsp;</strong><br />Senin &ndash; Jumat (09:00 &ndash; 17:00), Sabtu (09:00-15:00)</p>\r\n<p>Jenis Pekerjaan: Penuh Waktu</p>','<p><strong>Syarat Pengalaman :&nbsp;</strong><br />Minimal tamatan SMA dan berpengalaman 2 Tahun dibidangnya ataupun Fresh Graduate dengan keahlian khusus.</p>\r\n<p><strong>Keahlian :</strong></p>\r\n<p>Mengusai XML/JSON, HTML, CSS, PHP, MySQL, JavaScript</p>\r\n<p><strong>Kualifikasi :</strong></p>\r\n<p>&ndash; Pria/Wanita usia maksimal 30 tahun<br />&ndash; Mau bekerja keras dan mau berbagi hal-hal baru dibidangnya<br />&ndash; Siap bekerja dalam team maupun sendiri<br />&ndash; Siap ditarget</p>','5000000',0,1,'no_image.jpg','2018-07-11'),
(8,2,'Lowongan Kerja Marketing Communication','2018-07-04','2018-07-07','<p>JOB DESCRIPTION:<br />1. Make concept, planning, and executing marketing strategic plan including ATL &amp; BTL activities and event.<br />2. Develop quarterly objectives with goal of increasing brand&rsquo;s value<br />3. Plan and execute product launches, promo campaigns and events<br />4. Regularly doing the SWOT market analysis<br />5. Responsible for promotion tools and marketing program<br />6. Plan and manage marketing budget with post evaluation analysis<br />7. Monitor and identify market trends<br />8. Engage with all various kinds of media: newspaper, radio, magazine, online and social media)<br />9. Work closely with graphic design team to conceptualize and execute promotion materials<br />10. Oversee website and social media accounts.<br />11. Responsible for product display in retail market<br />12. Wiling to be placed in Jakarta Barat office</p>','<h5>Syarat Pengalaman :</h5>\r\n<div>minimal 1 th</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>Required skill: Communication Skill, Public Relation, Marketing and Product Development and Market Rresearch.<br />Required language: English and Bahasa Indonesia<br />Very good in words and ideas, energetic, self motivated and multitasking<br />Must be hands on, resourceful, result oriented, strong teamwork and interpersonal skills</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>Male / Female Max 35 years old</p>\r\n</div>','5000000',0,0,'no_image.jpg','2018-08-01'),
(9,2,'Lowongan Kerja Staff Administrasi Assisten (temporary 3-4 bulan ) PT. LESTARI BARA ABADI','2018-07-03','2018-07-22','<div>\r\n<p>&bull; Mampu bekerja dibawah tekanan<br />&bull; Mampu bekerja secara individual &amp; teamwork<br />&bull; Komunikatif, percaya diri, negosiasi, dan kreatif<br />&bull; Bersedia bekerja dengan waktu yang fleksibel<br />&bull; Berkelakuan baik<br />&bull; Data Entry<br />&bull; Filling Document</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>1. Pria/Wanita usia maksimal 28tahun<br />2. Pendidikan min. SMK<br />3. Memiliki pengalaman bekerja min 1 tahun dibidang perkantoran<br />4. Mampu mengoperasikan MS. Office &amp; Email<br />5. Mampu berkomunikasi dengan baik menggunakan telepon<br />6. Familiar dengan copying, scanning, mailing dan faxing<br />7. Handle Document<br />8. Membantu dalam workflow adminstrasi agar pekerjaan didalam kantor berjalan lancar</p>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Pengalaman dibidang administrasi min 1th</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>1. Mampu mengoperasikan MS. Office &amp; Email<br />2. Mampu berkomunikasi dengan baik menggunakan telepon<br />3. Familiar dengan copying, scanning, mailing dan faxing<br />4. Handle Document<br />5. Membantu dalam workflow adminstrasi agar pekerjaan didalam kantor berjalan lancar</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>1. Pria/Wanita usia maksimal 28tahun<br />2. Pendidikan min. SMK<br />3. Memiliki pengalaman bekerja min 1 tahun dibidang perkantoran</p>\r\n</div>\r\n<h5>Waktu Bekerja :</h5>\r\n<div>Jam 09:00 s/d 18:00 (Senin &ndash; Jumat)</div>','1500000',0,1,'no_image.jpg','2018-07-19'),
(10,2,'TRANSLATOR MANDARIN PT INDO GUNA SEJAHTERA','2018-07-18','2018-07-20','<div>\r\n<p>Menerjemakan dokumen bahasa indonesia ke mandarin, begitupun sebaliknya mandarin ke Indonesia<br />Menerjemahkan komunikasi lisan pekerja Indonesia dengan ekspatriade<br />Mengurus dan mengelola dokumen perusahaan</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>BEKERJA SESUAI PROSEDUR PERUSAHAAN</p>\r\n<h5>Waktu Bekerja :</h5>\r\n<div>Jam : 9.00 pagi &ndash; 17.00 sore wib</div>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Pengalaman minimal 1 tahun bahasa mandarin</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>Pria/Wanita, Usia 20-35 tahun<br />Pendidikan min D-3/S-1, diutamakan Jurusan Sastra Mandarin<br />Mampu berbicara, menulis dan mendengar bahasa mandarin<br />Mempunyai motivasi untuk belajar hal-hal yang baru<br />Mampu bekerja sama, disiplin dan komunikatif<br />Bisa menggunakan Ms Office (word, excel)<br />Bisa Bahasa Mandarin baik secara lisan maupun tulisan<br />Mempunyai pengalaman kerja minimal 2 tahun<br />Mempunyai skill sebagai leader<br />Jujur, Teliti dan Rajin<br />Bisa bekerja sama dengan team</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>Pria / Wanita usia max 35 tahun</p>\r\n</div>','5000000',0,1,'no_image.jpg','2018-07-19'),
(11,2,'Staff Administrasi dan Akuntansi','2018-07-20','2018-07-31','<div>\r\n<p>Segara Tours and Travel merupakan perusahaan yang sedang berkembang di kota Bandung membutuhkan staf administrasi dan akuntansi.</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>1. Melakukan proses pembukuan dan menyusun laporan keuangan<br />2. Mengelola kas bank dan kas di tangan<br />3. Menerima dan melakukan pembayaran-pembayaran untuk kegiatan operasional perusahaan<br />4. Mengelola pajak perusahaan<br />5. Melakukan pekerjaan administrasi lainnya</p>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Fresh graduate dipersilakan melamar</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>1. Komputer dan Internet<br />2. Microsoft Office<br />3. Pembukuan dan penyusunan laporan keuangan<br />4. Mengerti perpajakan lebih disukai<br />5. Cepat, rajin, rapi, jujur, teliti</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>&ndash; Wanita<br />&ndash; Pendidikan minimal SMK Akuntansi<br />&ndash; Domisili Bandung (Daerah Sukajadi lebih disukai)<br />&ndash; Usia maksimal 24 tahun<br />&ndash; Menyukai tantangan<br />&ndash; Cekatan dan bisa bekerja dalam tim.</p>\r\n</div>','5000000',0,1,'no_image.jpg','2018-07-19'),
(14,2,'LOWONGAN KERJA API DEVELOPER','2018-08-01','2018-08-07','<div>\r\n<p>Kirana Bali Wisata is one of Travel Agent company. We are currently need experienced staff, especially in API Development and Integration.</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>&ndash; Integrate our system with third party systems using API<br />&ndash; Collaborate with the team to develop new features and bug fixing.<br />&ndash; Perform system development / programming.<br />&ndash; Learning new technologies, growing, and innovating continously with us.</p>\r\n<h5>Tunjangan :</h5>\r\n<div>\r\n<p>BPJS Kesehatan, BPJS Ketenagakerjaan</p>\r\n</div>\r\n<h5>Waktu Bekerja :</h5>\r\n<div>Senin &ndash; Jumat (09:00 &ndash; 17:00), Sabtu (09:00-15:00)</div>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Minimum of 2 years or a fresh graduate with special skills are welcome.</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>&ndash; Have knowledge to create API using JSON &amp; XML Format<br />&ndash; Having Experience developing/implementing SOAP/REST Web Services<br />&ndash; Have knowledge about API security<br />&ndash; Experience working with native PHP or Framework<br />&ndash; Expert in Javascript</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>&ndash; Male / Female Maximum 30 years old<br />&ndash; Able to work with team and individually<br />&ndash; Must be self motivated, adaptable, and good skill communication</p>\r\n</div>','1.000.000 - 3.000.000',0,1,'6d922277497f1d82f025.jpg','2018-08-01');

/*Table structure for table `lowongan_komentar` */

DROP TABLE IF EXISTS `lowongan_komentar`;

CREATE TABLE `lowongan_komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `user_akun_id` int(11) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `lowongan_komentar` */

insert  into `lowongan_komentar`(`id`,`lowongan_id`,`user_akun_id`,`konten`,`tanggal`) values 
(1,3,30,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2018-07-13'),
(3,3,38,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut quisquam fugiat rem magni nemo, obcaecati maiores suscipit doloremque, aliquam consequuntur qui neque animi dolores ipsum dolorum ea velit? Ullam, nihil.','2018-07-13'),
(4,3,30,'Lorem ipsum dolor sit amet, consectetur adipisicing elit,','2018-07-13'),
(5,3,1,'WTF!!!!!','2018-07-15');

/*Table structure for table `pendidikan_formal` */

DROP TABLE IF EXISTS `pendidikan_formal`;

CREATE TABLE `pendidikan_formal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_pencaker_id` int(11) NOT NULL,
  `tingkat_pendidikan` enum('SD','SMP','SMA','SMK','D1','D3','S1','S2') NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `tahun_masuk` varchar(4) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_pencaker_id` (`profil_pencaker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan_formal` */

insert  into `pendidikan_formal`(`id`,`profil_pencaker_id`,`tingkat_pendidikan`,`nama_sekolah`,`jurusan`,`tahun_masuk`,`tahun_lulus`,`alamat_sekolah`,`dibuat_pada`) values 
(1,4,'SD','SDN 45 Bungo Pasang','-','2000','2006','Padang','0000-00-00'),
(2,4,'SMP','SMP Negeri 7 Padang','-','2006','2009','Padang','2018-07-06'),
(3,4,'SMK','SMK Negeri 5 Padang','Teknik Elektronika','2009','2012','Padang','2018-07-06'),
(4,4,'S1','STMIK Indonesia ','Sistem Informasi','2013','2018','Padang','2018-07-06');

/*Table structure for table `pendidikan_nonformal` */

DROP TABLE IF EXISTS `pendidikan_nonformal`;

CREATE TABLE `pendidikan_nonformal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_pencaker_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_pencaker_id` (`profil_pencaker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan_nonformal` */

insert  into `pendidikan_nonformal`(`id`,`profil_pencaker_id`,`nama_kegiatan`,`penyelenggara`,`tanggal_mulai`,`tanggal_selesai`,`tempat_kegiatan`,`dibuat_pada`) values 
(1,4,'Diklat','Dinas Tenaga Kerja','2018-07-02','2018-07-05','Padang','2018-07-06');

/*Table structure for table `pengalaman_kerja` */

DROP TABLE IF EXISTS `pengalaman_kerja`;

CREATE TABLE `pengalaman_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_pencaker_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `deskripsi_jabatan` text NOT NULL,
  `bidang_perusahaan` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_pencaker_id` (`profil_pencaker_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pengalaman_kerja` */

insert  into `pengalaman_kerja`(`id`,`profil_pencaker_id`,`nama_perusahaan`,`jabatan`,`deskripsi_jabatan`,`bidang_perusahaan`,`tanggal_masuk`,`tanggal_keluar`,`dibuat_pada`) values 
(1,4,'PT. AMI','Web Dev','Membuat website','Jasa Pengembangan Software','2018-07-02','2018-07-06','2018-07-08');

/*Table structure for table `profil_admin` */

DROP TABLE IF EXISTS `profil_admin`;

CREATE TABLE `profil_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_akun_id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha','Lain-Lain') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.png',
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_akun_id` (`user_akun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profil_admin` */

insert  into `profil_admin`(`id`,`user_akun_id`,`nip`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`agama`,`alamat`,`telepon`,`foto`,`dibuat_pada`) values 
(1,1,'131400036','Syafrudin Siregar, S.Kom., M.Pd','Pria','Padang','1994-04-29','Islam','Komplek Filano Mandiri BLOK A1/1 Tabing','081268280648','af063cd827d662dc95f2.png','2018-05-12');

/*Table structure for table `profil_pencaker` */

DROP TABLE IF EXISTS `profil_pencaker`;

CREATE TABLE `profil_pencaker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_akun_id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha') DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(12) DEFAULT NULL,
  `quote` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT 'default.png',
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_akun_id` (`user_akun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `profil_pencaker` */

insert  into `profil_pencaker`(`id`,`user_akun_id`,`nik`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`agama`,`alamat`,`telepon`,`quote`,`email`,`photo`,`dibuat_pada`) values 
(4,30,'1371112904940006','Adi Raka Siwi, S.Kom','Pria','Padang','1994-04-29','Islam','Komplek Filano Mandiri BLOK A1 No.1 Padang','081268280648','Talk Less Do More','adiraka8@gmail.com','81d722468d359107ac2d.jpg','2018-07-05');

/*Table structure for table `profil_perusahaan` */

DROP TABLE IF EXISTS `profil_perusahaan`;

CREATE TABLE `profil_perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_akun_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `no_siup` varchar(20) NOT NULL,
  `no_situ` varchar(20) NOT NULL,
  `bidang_usaha` varchar(50) NOT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `deskripsi_perusahaan` text,
  `website` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `logo_perusahaan` varchar(100) DEFAULT 'default.png',
  `slogan` varchar(50) DEFAULT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_akun_id` (`user_akun_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `profil_perusahaan` */

insert  into `profil_perusahaan`(`id`,`user_akun_id`,`nama_perusahaan`,`no_siup`,`no_situ`,`bidang_usaha`,`alamat`,`telepon`,`deskripsi_perusahaan`,`website`,`email`,`logo_perusahaan`,`slogan`,`dibuat_pada`) values 
(2,38,'PT. Andalas Medika Infotama','436/6828A/338.8.12/2','0739/22-09/PK/VIII/0','Jasa','Komplek Cendana Mata Air Thp. VIII Blok A No. 4 Padang','444222','Membuat website','ami-tech.co.id','cs@ami-tech.co.id','c6a0ccdf991102ee0e78.jpg','Membangun Negara','2018-07-08');

/*Table structure for table `user_akun` */

DROP TABLE IF EXISTS `user_akun`;

CREATE TABLE `user_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hak_akses_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `aktivasi` tinyint(1) NOT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `hak_akses_id` (`hak_akses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `user_akun` */

insert  into `user_akun`(`id`,`hak_akses_id`,`username`,`password`,`status`,`aktivasi`,`dibuat_pada`) values 
(1,1,'admin','21232f297a57a5a743894a0e4a801fc3',1,1,'2018-05-11'),
(30,2,'zeddevil','0858dcffabb19cf27bcae1865f8530c5',1,1,'2018-06-05'),
(38,3,'ami1234','20fd35afc7ae7cb8cc5c7a31b1101f3e',1,1,'2018-07-08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
