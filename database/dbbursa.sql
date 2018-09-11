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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `aktivasi` */

insert  into `aktivasi`(`id`,`user_akun_id`,`token`,`status`) values 
(20,30,'d8f24be5044f434737a4d041c1ad6a',1),
(28,38,'d17b4677a30630d2fbd2dcc26f1d64',1),
(29,39,'fb1718b019d1aacefe697444411a52',0),
(30,40,'5c9f1707ce9b865680330e4fc42bfb',0),
(31,41,'bf74b6a6e8ffd34318c30da34b2e16',0);

/*Table structure for table `hak_akses` */

DROP TABLE IF EXISTS `hak_akses`;

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(10) NOT NULL,
  `nama_akses` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hak_akses` */

insert  into `hak_akses`(`id`,`slug`,`nama_akses`,`keterangan`,`dibuat_pada`) values 
(1,'admin','Administrator','-','2018-05-07'),
(2,'pencaker','Pencari Kerja','-','2018-05-07'),
(3,'perusahaan','Perusahaan','-','2018-05-07'),
(4,'super_su','Web Master','-','2018-09-11');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `info_berita` */

insert  into `info_berita`(`id`,`profil_admin_id`,`judul`,`tanggal`,`kategori`,`konten`,`status`) values 
(1,1,'Lorem Ipsum Dolor Sit Amet','2018-05-28','Berita','<p>Tattatata</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">asdasd</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">asd</td>\r\n<td style=\"width: 33.3333%;\">asd</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n<td style=\"width: 33.3333%;\">&nbsp;</td>\r\n<td style=\"width: 33.3333%;\">2</td>\r\n</tr>\r\n</tbody>\r\n</table>',0),
(2,1,'Ratusan Orang Antre Cari Kerja di Akhir Pekan Sejak Pagi','2018-07-17','Berita','<p><strong>Jakarta</strong>&nbsp;- Ratusan para pencari kerja memadati Mega Career Expo akhir pekan ini. Antrean pun mengular sekitar 30 meter di depan gedung Smesco tempat acara berlangsung.<br /><br />Berdasarkan pantauan&nbsp;<strong>detikFinance</strong>, antrean panjang tak menyurutkan semangat mereka mencari pekerjaan di bursa kerja ini. Pintu gedung pun baru dibuka pukul 10.00 WIB.&nbsp;</p>\r\n<p>Menurut petugas keamanan Smesco Wahyo, antrean telah berlangsung sejak pukul 08.00 WIB dan membuat antrean sepanjang 30 meter.<br /><br /></p>\r\n<center></center>\r\n<p>\"Sudah dari jam 08.00 WIB antreannya. Tadi pagi itu sudah sekitar 30 meter lah,\" katanya saat berbincang dengan&nbsp;<strong>detikFinance</strong>, Jakarta Selatan, Sabtu (7/6/2018).</p>\r\n<p>Sebagai informasi, bursa kerja Mega Career Expo berlangsung dari tanggal 6-7 Juli. Ada sekitar 100 perusahaan yang menawarkan lowongan kerja pada acara kali ini.<br /><br />Sejumlah perusahaan dari perbankan hingga media seperti Bank Danamon, Bank CIMB Niaga, Bank Mega, Kalbe hingga Media Indonesia ikut meramaikan Mega Career Expo kali ini.</p>',1),
(3,1,'Manfaat dan Keuntungan Menjadi Peserta BPJS Ketenagakerjaan','2018-08-23','Berita','<h2>Manfaat dan Keuntungan Menjadi Peserta BPJS Ketenagakerjaan</h2>\r\n<hr />\r\n<div class=\"col-md-9\"><img src=\"http://www.bpjsketenagakerjaan.go.id/assets/uploads/news/01112016_101004_bpjstk_kcp_lahat.jpg\" alt=\"\" width=\"100%\" />\r\n<p>Paparan penjelasan dari tujuan dan manfaat program BPJS Ketenagakerjaan oleh kepala BPJS Ketenagakerjaan KCP Lahat Bapak Sunjana di ruangan yang berlambat Jln Kol. Berlian Blok D No. 4 (Gedung Graha) Kelurahan Bandar jaya Lahat.</p>\r\n<p>Saat dikonfirmasi lahat Online Senin (31/10/2016), Kepala BPJS Ketenagakerjaan KCP lahat Bapak Sunjana menjelaskan tentang awal terbentuknya BPJS Ketenagakerjaan yang sebelumnya Bernama PT. Jamsostek (persero) yang diatur oleh UU No. 3 Tahun 1992 Tentang Jaminan Sosial Tenaga Kerja mengalami proses transformasi per 1 Januari 2014 menjadi BPJS Ketenagakerjaan sesuai amanah UU No. 24 Tahun 2011 Tentang Badan Penyelenggara Jaminan Sosial.</p>\r\n<p>Adapun produk jasa yang disediakan oleh BPJS Ketenagakerjaan yang diatur oleh UU No. 24 Tahun 2011 pasal 6 ayat (2) tentang badan penyelenggara jaminan sosial antara lain:</p>\r\n<p>1. Jaminan Kecelakaan Kerja (JKK)<br />2. Program Jaminan Hari Tua (JHT)<br />3. Program Jaminan Kematian (JK), dan<br />4. Jaminan Pensiun (JP)</p>\r\n<p>Manfaat dan keuntungan yang didapatkan karena:</p>\r\n<p>1. Menanggulangi resiko sosial apabila terjadi musibah yang dialami oleh tenaga kerja<br />2. Memiliki kepastian dalam menghadapi hari tua dan Pensiun.<br />3. Mengutamakan pelayanan prima kepada peserta dalam memberikan layanan.</p>\r\n<p>Lebih lanjut Sunjana mengatakan, \"saya sangat berharap kepada masyarakat pekerja dikabupaten lahat supaya ikut serta bergabung bersama kami di BPJS Ketenagakerjaan, disini kami juga mengajak kepada masyarakat yang non pekerja perusahaan maksudnya untuk masyarakat yang hanya sebagai pekerja lepas seperti Petani, Tukang Ojek, Pedagang dan lai-lain.</p>\r\n<p>Selain itu Sunjana menyampaikan informasi kepada masyarakat yang ingin bergabung di BPJS Ketenagakerjaan sangatlah mudah dengan cara mendatangi langsung kantor BPJS Ketenagakerjaan dengan membawa persyaratan foto copy Ktp (Ktp yang sudah Elektronik) dengan iuran rendahnya perbulan Rp 16.000,- Jelasnya lagi.</p>\r\n<p>Masih kata Sunjana, kami dari BPJS Ketenagakerjaan sangat peduli dengan kesejahteraan dan jiwa masyarakat. \"Mari bergabung bersama BPJS Ketenagakerjaan, Lindungi Jiwamu, Lindungi Keluargamu dan Sejahterakan Masa tuamu Bersama BPJS Ketenagakerjaan\". Ungkapnya sembari mengakhiri obrolan.</p>\r\n</div>\r\n<div class=\"col-md-3 col-xs-12 ext-berita\">\r\n<div class=\"col-md-12\">&nbsp;</div>\r\n</div>',1),
(4,1,'Hak Karyawan Berdasarkan UU Ketenagakerjaan yang Perlu Diketahui','2018-08-23','Info','<p>Menurut UU Ketenagakerjaan Repubik Indonesia No 13 Tahun 2013, pemberi kerja atau pengusaha yang mempekerjakan karyawan melebihi waktu kerja, wajib membayar upah kerja lembur.</p>\r\n<p>Berikut ini adalah pasal-pasal dari UU Ketenagakerjaan Republik Indonesia No 13 Tahun 2013 yang bisa diaplikasikan pada kasus di atas:</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#1 Pasal 77 ayat 2</h3>\r\n<p>Waktu kerja meliputi:</p>\r\n<ul>\r\n<li>7 (tujuh) jam 1 (satu) hari dan 40 (empat puluh) jam 1 (satu) minggu untuk 6 (enam) hari kerja dalam 1 (satu) minggu; atau</li>\r\n<li>8 (delapan) jam 1 (satu) hari dan 40 (empat puluh) jam 1 (satu) minggu untuk 5 (lima) hari kerja dalam 1 (satu) minggu.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#2 Pasal 78 ayat 2</h3>\r\n<p>Pengusaha yang mempekerjakan pekerja/buruh melebihi waktu kerja sebagaimana dimaksud dalam ayat (1) wajib membayar upah kerja lembur.</p>\r\n<p><img class=\"aligncenter wp-image-58698 size-full\" title=\"Hak-Karyawan-01-Karyawan-Lembur-Finansialku\" src=\"https://www.finansialku.com/wp-content/uploads/2018/01/Hak-Karyawan-01-Karyawan-Lembur-Finansialku.jpg\" alt=\"Hak-Karyawan-01-Karyawan-Lembur-Finansialku\" width=\"500\" height=\"337\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Apakah Anda sudah mengetahui peraturan di atas?</p>\r\n<p>Apakah kasus Imran tersebut pernah Anda alami atau terjadi pada teman Anda?</p>\r\n<p>Jika ya, Anda dapat mengadukannya pada Dinas Ketenagakerjaan.</p>\r\n<p>Itu baru kasus kelalaian pihak pengusaha dalam membayarkan uang lembur. Belum lagi berbagai kasus lainnya seperti pihak perusahaan yang tidak membayarkan tunjangan kesehatan para karyawannya, dan lain sebagainya.</p>\r\n<p>&nbsp;</p>\r\n<h2 data-fontsize=\"24\" data-lineheight=\"27\">Hak Karyawan Menurut UU Ketenagakerjaan Republik Indonesia</h2>\r\n<p>Anda sebagai karyawan, sebaiknya mengetahui hak Anda sesuai dengan UU Ketenagakerjaan Republik Indonesia.</p>\r\n<p>Jangan sampai Anda dirugikan sebagai pihak pekerja karena ketidaktahuan Anda akan hak karyawan yang sebetulnya dapat Anda klaim.</p>\r\n<p>Berikut ini hak karyawan yang umumnya perlu Anda ketahui menurut UU Ketenagakerjaan Republik Indonesia.</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#1 Hak Karyawan Menjadi Anggota Serikat Tenaga Kerja</h3>\r\n<p>Anda sebagai tenaga kerja memiliki hak untuk membentuk dan menjadi anggota dari serikat tenaga kerja.</p>\r\n<p>Anda dan rekan tenaga kerja Anda sangat diperbolehkan untuk mengembangkan dan meningkatkan potensi kerja Anda sesuai dengan minat dan bakat.</p>\r\n<p>Tidak hanya itu saja, Anda sebagai tenaga kerja mendapatkan jaminan dari perusahaan (tempat Anda bekerja) dalam hal keselamatan, kesehatan, moral, kesusilaan dan perlakuan yang sesuai dengan harkat serta martabat berdasarkan norma dan nilai-nilai keagamaan dan kemanusiaan.</p>\r\n<p><img class=\"aligncenter wp-image-58697 size-full\" title=\"Hak-Karyawan-02-Serikat-Pekerja-Finansialku\" src=\"https://www.finansialku.com/wp-content/uploads/2018/01/Hak-Karyawan-02-Serikat-Pekerja-Finansialku.jpg\" alt=\"Hak-Karyawan-02-Serikat-Pekerja-Finansialku\" width=\"500\" height=\"337\" /></p>\r\n<p>Peraturan Pemerintah yang masuk dalam UU Ketenagakerjaan tersebut tertulis dalam Undang-undang nomor 13 tahun 2003 pasal 104 tentang Serikat Pekerja dan Undang-undang nomor 21 Tahun 2000 mengenai Serikat Pekerja.</p>\r\n<p>Undang-undang No. 21 Tahun 2000 mengenai Serikat Pekerja memberikan hukuman pidana kepada siapapun yang melakukan tindakan anti serikat pekerja/serikat buruh.</p>\r\n<p>Tindakan yang dimaksud termasuk melarang orang membentuk, bergabung atau melakukan aktivitas serikat pekerja/serikat buruh, memecat atau mengurangi upah pekerja/buruh karena melakukan kegiatan serikat pekerja/serikat buruh, melakukan kampanye anti serikat dan intimidasi dalam bentuk apapun.</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#2 Hak Karyawan Atas Jaminan Sosial dan K3 (Keselamatan serta Kesehatan Kerja)</h3>\r\n<p>Sebagai tenaga kerja, Anda berhak mendapatkan jaminan sosial yang berisi tentang kecelakaan kerja, kematian, hari tua dan pemeliharaan kesehatan.</p>\r\n<p>Bila isi ketentuan perjanjian kerja mengenai hal ini dirasa meragukan, Anda sebagai tenga kerja berhak untuk mengajukan keberatan kepada pihak pemberi kerja atau perusahaan.</p>\r\n<p>Peraturan mengenai hak karyawan atas jaminan sosial ini tertulis dalam UU Ketenagakerjaan No. 13 Tahun 2003, UU No. 03 Tahun 1992, UU No. 01 Tahun 1970, Ketetapan Presiden (Keppres) No. 22 Tahun 1993, Peraturan Pemerintah (PP) No. 14 Tahun 1993, Peraturan Menteri (Permen) No. 4 Tahun 1993, dan No. 1 Tahun 1998.</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#3 Hak Karyawan Menerima Upah yang Layak</h3>\r\n<p>Upah Minimum adalah suatu standar minimum yang digunakan oleh para pengusaha atau pelaku industri untuk memberikan upah kepada pekerja di dalam lingkungan usaha atau kerjanya.</p>\r\n<p>Oleh karena pemenuhan kebutuhan yang layak di setiap provinsi berbeda-beda, maka disebut Upah Minimum Provinsi.</p>\r\n<p>&nbsp;</p>\r\n<p>Menurut Permen No. 1 Tahun 1999 Pasal 1 ayat 1, upah minimum adalah upah bulanan terendah yang terdiri dari upah pokok termasuk tunjangan tetap.</p>\r\n<p>Upah Minimum Provinsi (UMP) adalah upah minimum yang berlaku untuk seluruh kabupaten/kota di satu provinsi.</p>\r\n<p>Upah minimum ini ditetapkan setiap satu tahun sekali oleh gubernur berdasarkan rekomendasi Komisi Penelitian Pengupahan dan Jaminan Sosial Dewan Ketenagakerjaan Daerah (sekarang Dewan Pengupahan Provinsi).</p>\r\n<p><img class=\"aligncenter wp-image-56786 size-full\" title=\"Gaji Karyawan Semangat Kerja Finansialku\" src=\"https://www.finansialku.com/wp-content/uploads/2018/01/Gaji-Karyawan-Semangat-Kerja-Finansialku.jpg\" alt=\"Gaji Karyawan Semangat Kerja Finansialku\" width=\"500\" height=\"337\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Selain itu ada juga yang disebut dengan Upah Minimum Kabupaten/Kota yang merupakan upah minimum yang berlaku di daerah kabupaten/kota.</p>\r\n<p>Penetapan upah minimum kabupaten/kota dilakukan oleh gubernur yang penetapannya harus lebih besar dari upah minimum provinsi.</p>\r\n<p>Sebagai informasi, karyawan lelaki dan wanita upahnya harus sama berdasarkan beban kerjanya.</p>\r\n<p>Peraturan tersebut tertulis dalam Undang-undang No. 13 Tahun 2003, PP No. 8 Tahun 1981 dan Peraturan Menteri No. 01 Tahun 1999.</p>\r\n<p>&nbsp;</p>\r\n<p>Jika beban kerja dan gaji Anda tak berimbang, Anda memiliki hak untuk mengajukan kenaikan.</p>\r\n<p>Kalau perusahaan mangkir dari tanggung jawabnya, Anda dapat melaporkannya pada Dinas Ketenagakerjaan.</p>\r\n<p>Berbicara mengenai upah, sudahkah Anda memprioritaskan upah yang Anda dapatkan untuk persiapan hari tua atau masa pensiun Anda?</p>\r\n<p>Apakah Anda sudah mengetahui bahwa persiapan dana hari tua memerlukan perencanaan yang matang dan sistematis dan persiapannya perlu sesegera mungkin?</p>\r\n<p>Segera persiapkan dana hari tua Anda dengan aplikasi Finansialku! Dijamin, Anda bisa menikmati masa pensiun Anda tanpa rasa khawatir.</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#4 Hak Karyawan atas Pembatasan Waktu Kerja, Istirahat, Cuti &amp; Libur</h3>\r\n<p>UU Ketenagakerjaan No. 13 Tahun 2003 Pasal 79 mengenai waktu kerja:</p>\r\n<ul>\r\n<li>Pengusaha wajib memberi waktu istirahat dan cuti kepada pekerja/buruh.</li>\r\n<li>Waktu istirahat dan cuti sebagaimana dimaksud dalam ayat (1), meliputi:\r\n<ul>\r\n<li>istirahat antara jam kerja, sekurang kurangnya setengah jam setelah bekerja selama 4 (empat) jam terus menerus dan waktu istirahat tersebut tidak termasuk jam kerja;</li>\r\n<li>istirahat mingguan 1 (satu) hari untuk 6 (enam) hari kerja dalam 1 (satu) minggu atau 2 (dua) hari untuk 5 (lima) hari kerja dalam 1 (satu) minggu;</li>\r\n<li>cuti tahunan, sekurang kurangnya 12 (dua belas) hari kerja setelah pekerja/buruh yang bersangkutan bekerja selama 12 (dua belas) bulan secara terus menerus; dan</li>\r\n<li>Istirahat panjang sekurang-kurangnya 2 (dua) bulan dan dilaksanakan pada tahun ketujuh dan kedelapan masing-masing 1 (satu) bulan bagi pekerja/buruh yang telah bekerja selama 6 (enam) tahun secara terus menerus pada perusahaan yang sama dengan ketentuan pekerja/buruh tersebut tidak berhak lagi atas istirahat tahunannya dalam 2 (dua) tahun berjalan dan selanjutnya berlaku untuk setiap kelipatan masa kerja 6 (enam) tahun.</li>\r\n<li>Pelaksanaan waktu istirahat tahunan sebagaimana dimaksud dalam ayat (2) huruf c diatur dalam perjanjian kerja, peraturan perusahaan, atau perjanjian kerja bersama.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<ul>\r\n<li>Hak istirahat panjang sebagaimana dimaksud dalam ayat (2) huruf d hanya berlaku bagi pekerja/buruh yang bekerja pada perusahaan tertentu.</li>\r\n<li>Perusahaan tertentu sebagaimana dimaksud dalam ayat (4) diatur dengan Keputusan Menteri.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><img class=\"aligncenter wp-image-58696 size-full\" title=\"Hak-Karyawan-03-Karyawan-Berlibur-Finansialku\" src=\"https://www.finansialku.com/wp-content/uploads/2018/01/Hak-Karyawan-03-Karyawan-Berlibur-Finansialku.jpg\" alt=\"Hak-Karyawan-03-Karyawan-Berlibur-Finansialku\" width=\"500\" height=\"337\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Jangan diam saja jika Anda mendapatkan perlakuan tidak adil atas jam kerja yang melebihi perjanjian dan beban kerja Anda, ditambah lagi dengan jam lembur yang tidak dibayar.</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#5 Hak Karyawan Membuat Perjanjian Kerja (PKB)</h3>\r\n<p>Anda yang telah tergabung dalam Serikat Tenaga Kerja memiliki hak untuk dapat membuat Perjanjian Kerja atau PKB yang dilaksanakan berdasarkan proses musyawarah.</p>\r\n<p>Perjanjian Kerja tersebut berisi tentang berbagai persetujuan bersama di antaranya hak dan kewajiban pengusaha beserta karyawan, jangka waktu berlakunya perjanjian dan perjanjian yang disepakati oleh keduanya.</p>\r\n<p>Peraturan mengenai hak membuat perjanjian kerja ini tertulis dalam UU Ketenagakerjaan No. 13 Tahun 2003 dan UU No. 21 Tahun 2000.</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#6 Hak Karyawan Perempuan Seperti Libur PMS atau Cuti Hamil</h3>\r\n<p>Pemerintah Republik Indonesia juga memperhatikan para pekerjanya yang berjenis kelamin perempuan melalui beberapa peraturan sebagai berikut:</p>\r\n<p>&nbsp;</p>\r\n<h4 data-fontsize=\"18\" data-lineheight=\"19\"><strong>6.1 Hak Cuti Hamil dan Cuti Melahirkan</strong></h4>\r\n<p>UU No.13 Tahun 2013 Pasal 82 mengatur hak cuti hamil dan melahirkan bagi perempuan. Pekerja perempuan berhak atas istirahat selama 1,5 bulan sebelum melahirkan dan 1,5 bulan setelah melahirkan.</p>\r\n<p>Keluarga pekerja wajib memberi kabar ke perusahaan mengenai kelahiran anaknya dalam tujuh hari setelah melahirkan serta wajib memberikan bukti kelahiran atau akta kelahiran kepada perusahaan dalam enam bulan setelah melahirkan.</p>\r\n<p>&nbsp;</p>\r\n<h4 data-fontsize=\"18\" data-lineheight=\"19\"><strong>6.2 Hak Perlindungan Selama Masa Kehamilan</strong></h4>\r\n<p>UU No. 13 Tahun 2003 Pasal 76 ayat 2 menyatakan bahwa pengusaha dilarang mempekerjakan perempuan hamil yang bisa berbahaya bagi kandungannya dan dirinya sendiri.</p>\r\n<p>Oleh karena itu, perusahaan wajib menjamin perlindungan bagi pekerja wanita yang sedang hamil, karena pekerja yang sedang hamil berada dalam kondisi yang sangat rentan oleh karena itu harus dihindarkan dari beban pekerjaan yang berlebih.</p>\r\n<p><img class=\"aligncenter wp-image-58695 size-full\" title=\"Hak-Karyawan-04-Karyawan-Hamil-Finansialku\" src=\"https://www.finansialku.com/wp-content/uploads/2018/01/Hak-Karyawan-04-Karyawan-Hamil-Finansialku.jpg\" alt=\"Hak-Karyawan-04-Karyawan-Hamil-Finansialku\" width=\"500\" height=\"337\" /></p>\r\n<h4 data-fontsize=\"18\" data-lineheight=\"19\"><strong>6.3 Hak Cuti Keguguran</strong></h4>\r\n<p>Pekerja yang mengalami keguguran juga memiliki hak cuti melahirkan selama 1,5 bulan dengan disertai surat keterangan dokter kandungan. Peraturan ini diatur dalam pasal 82 ayat 2 UU No. 13 Tahun 2003.</p>\r\n<p>&nbsp;</p>\r\n<h4 data-fontsize=\"18\" data-lineheight=\"19\"><strong>6.4 Biaya Persalinan</strong></h4>\r\n<p>Berdasarkan UU No 3 Tahun 1992 tentang jaminan sosial tenaga kerja, perusahaan yang mempekerjakan lebih dari 10 tenaga kerja atau membayar upah paling sedikit Rp1.000.000/bulan wajib mengikut sertakan karyawannya dalam program BPJS Ketenagakerjaan.</p>\r\n<p>Salah satu program BPJS Ketenagakerjaan adalah jaminan kesehatan yang mencakup pemeriksaan dan biaya persalinan.</p>\r\n<p>&nbsp;</p>\r\n<h4 data-fontsize=\"18\" data-lineheight=\"19\"><strong>6.5 Hak Menyusui</strong></h4>\r\n<p>Pasal 83 UU no. 13 Tahun 2003 menyatakan bahwa pekerja yang menyusui minimal diberi waktu untuk menyusui atau memompa ASI pada waktu jam kerja.</p>\r\n<p><img class=\"aligncenter wp-image-58694 size-full\" title=\"Hak-Karyawan-05-Karyawan-Menyusui-Finansialku\" src=\"https://www.finansialku.com/wp-content/uploads/2018/01/Hak-Karyawan-05-Karyawan-Menyusui-Finansialku.jpg\" alt=\"Hak-Karyawan-05-Karyawan-Menyusui-Finansialku\" width=\"500\" height=\"337\" /></p>\r\n<p>&nbsp;</p>\r\n<h4 data-fontsize=\"18\" data-lineheight=\"19\"><strong>6.6 Hak Cuti Menstruasi</strong></h4>\r\n<p>Setiap pegawai perempuan memiliki hak untuk cuti menstruasi pada hari pertama dan kedua periode haidnya.</p>\r\n<p>Hal ini tercantum dalam pasal 81 UU no 13 tahun 2003. Walaupun demikian, masih banyak pekerja perempuan yang belum mengetahui hak yang seharusnya bisa mereka dapatkan.</p>\r\n<p>&nbsp;</p>\r\n<h3 data-fontsize=\"18\" data-lineheight=\"19\">#7 Hak Karyawan Atas Perlindungan Keputusan PHK yang Tidak Adil</h3>\r\n<p>Jika Anda mendapatkan keputusan Pemutusan Hubungan Kerja atau PHK secara tidak adil, Anda memiliki hak untuk mendapatkan perlindungan dari Pemerintah melalui Dinas Tenaga Kerja.</p>\r\n<p>Hal ini diatur dalam surat edaran menteri tenaga kerja nomor SE 907/Men.PHI-PPHI/X/2004. Aturan ini juga mencatat tentang pencegahan pemutusan hubungan kerja massal.</p>',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `lamar` */

insert  into `lamar`(`id`,`lowongan_id`,`profil_pencaker_id`,`tanggal_lamar`,`status`) values 
(3,3,4,'2018-07-15',1),
(4,15,5,'2018-08-10',1);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `lowongan` */

insert  into `lowongan`(`id`,`profil_perusahaan_id`,`judul`,`tanggal_mulai`,`tanggal_selesai`,`deskripsi_pekerjaan`,`deskripsi_persyaratan`,`gaji`,`bann`,`status`,`gambar`,`dibuat_pada`) values 
(3,2,'Web Programmer Junior & Expert','2018-07-11','2018-07-14','<p>Saat ini kami sedang membutuhkan staff Web Programmer yang sangat kompeten di bidangnya terutama di bidang API development maupun Website development.</p>\r\n<p><strong>Tanggung Jawab Pekerjaan :</strong></p>\r\n<p>&ndash; Membuat website atau system baru dengan PHP/HTML standard maupun dengan Content Management System dan database MySql.<br />&ndash; Mampu membuat serta mengintegrasikan API (XML/JSON) ke pihak ketiga. (contoh: Hotel Channel Manager dan Hotel Meta Search Engine)<br />&ndash; Maintenance system yang sudah ada (system OTA dan Activities)<br />&ndash; Membuat dan mengembangkan mobile application Android/IOS (Optional)</p>\r\n<p><strong>Tunjangan :</strong></p>\r\n<p>BPJS Kesehatan, BPJS Ketenagakerjaan</p>\r\n<p><strong>Waktu Bekerja :&nbsp;</strong><br />Senin &ndash; Jumat (09:00 &ndash; 17:00), Sabtu (09:00-15:00)</p>\r\n<p>Jenis Pekerjaan: Penuh Waktu</p>','<p><strong>Syarat Pengalaman :&nbsp;</strong><br />Minimal tamatan SMA dan berpengalaman 2 Tahun dibidangnya ataupun Fresh Graduate dengan keahlian khusus.</p>\r\n<p><strong>Keahlian :</strong></p>\r\n<p>Mengusai XML/JSON, HTML, CSS, PHP, MySQL, JavaScript</p>\r\n<p><strong>Kualifikasi :</strong></p>\r\n<p>&ndash; Pria/Wanita usia maksimal 30 tahun<br />&ndash; Mau bekerja keras dan mau berbagi hal-hal baru dibidangnya<br />&ndash; Siap bekerja dalam team maupun sendiri<br />&ndash; Siap ditarget</p>','5000000',0,1,'no_image.jpg','2018-07-11'),
(8,2,'Lowongan Kerja Marketing Communication','2018-07-04','2018-07-07','<p>JOB DESCRIPTION:<br />1. Make concept, planning, and executing marketing strategic plan including ATL &amp; BTL activities and event.<br />2. Develop quarterly objectives with goal of increasing brand&rsquo;s value<br />3. Plan and execute product launches, promo campaigns and events<br />4. Regularly doing the SWOT market analysis<br />5. Responsible for promotion tools and marketing program<br />6. Plan and manage marketing budget with post evaluation analysis<br />7. Monitor and identify market trends<br />8. Engage with all various kinds of media: newspaper, radio, magazine, online and social media)<br />9. Work closely with graphic design team to conceptualize and execute promotion materials<br />10. Oversee website and social media accounts.<br />11. Responsible for product display in retail market<br />12. Wiling to be placed in Jakarta Barat office</p>','<h5>Syarat Pengalaman :</h5>\r\n<div>minimal 1 th</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>Required skill: Communication Skill, Public Relation, Marketing and Product Development and Market Rresearch.<br />Required language: English and Bahasa Indonesia<br />Very good in words and ideas, energetic, self motivated and multitasking<br />Must be hands on, resourceful, result oriented, strong teamwork and interpersonal skills</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>Male / Female Max 35 years old</p>\r\n</div>','5000000',0,0,'no_image.jpg','2018-08-01'),
(9,2,'Lowongan Kerja Staff Administrasi Assisten (temporary 3-4 bulan ) PT. LESTARI BARA ABADI','2018-07-03','2018-07-22','<div>\r\n<p>&bull; Mampu bekerja dibawah tekanan<br />&bull; Mampu bekerja secara individual &amp; teamwork<br />&bull; Komunikatif, percaya diri, negosiasi, dan kreatif<br />&bull; Bersedia bekerja dengan waktu yang fleksibel<br />&bull; Berkelakuan baik<br />&bull; Data Entry<br />&bull; Filling Document</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>1. Pria/Wanita usia maksimal 28tahun<br />2. Pendidikan min. SMK<br />3. Memiliki pengalaman bekerja min 1 tahun dibidang perkantoran<br />4. Mampu mengoperasikan MS. Office &amp; Email<br />5. Mampu berkomunikasi dengan baik menggunakan telepon<br />6. Familiar dengan copying, scanning, mailing dan faxing<br />7. Handle Document<br />8. Membantu dalam workflow adminstrasi agar pekerjaan didalam kantor berjalan lancar</p>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Pengalaman dibidang administrasi min 1th</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>1. Mampu mengoperasikan MS. Office &amp; Email<br />2. Mampu berkomunikasi dengan baik menggunakan telepon<br />3. Familiar dengan copying, scanning, mailing dan faxing<br />4. Handle Document<br />5. Membantu dalam workflow adminstrasi agar pekerjaan didalam kantor berjalan lancar</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>1. Pria/Wanita usia maksimal 28tahun<br />2. Pendidikan min. SMK<br />3. Memiliki pengalaman bekerja min 1 tahun dibidang perkantoran</p>\r\n</div>\r\n<h5>Waktu Bekerja :</h5>\r\n<div>Jam 09:00 s/d 18:00 (Senin &ndash; Jumat)</div>','1500000',0,1,'no_image.jpg','2018-07-19'),
(10,2,'TRANSLATOR MANDARIN PT INDO GUNA SEJAHTERA','2018-07-18','2018-07-20','<div>\r\n<p>Menerjemakan dokumen bahasa indonesia ke mandarin, begitupun sebaliknya mandarin ke Indonesia<br />Menerjemahkan komunikasi lisan pekerja Indonesia dengan ekspatriade<br />Mengurus dan mengelola dokumen perusahaan</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>BEKERJA SESUAI PROSEDUR PERUSAHAAN</p>\r\n<h5>Waktu Bekerja :</h5>\r\n<div>Jam : 9.00 pagi &ndash; 17.00 sore wib</div>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Pengalaman minimal 1 tahun bahasa mandarin</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>Pria/Wanita, Usia 20-35 tahun<br />Pendidikan min D-3/S-1, diutamakan Jurusan Sastra Mandarin<br />Mampu berbicara, menulis dan mendengar bahasa mandarin<br />Mempunyai motivasi untuk belajar hal-hal yang baru<br />Mampu bekerja sama, disiplin dan komunikatif<br />Bisa menggunakan Ms Office (word, excel)<br />Bisa Bahasa Mandarin baik secara lisan maupun tulisan<br />Mempunyai pengalaman kerja minimal 2 tahun<br />Mempunyai skill sebagai leader<br />Jujur, Teliti dan Rajin<br />Bisa bekerja sama dengan team</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>Pria / Wanita usia max 35 tahun</p>\r\n</div>','5000000',0,1,'no_image.jpg','2018-07-19'),
(11,2,'Staff Administrasi dan Akuntansi','2018-07-20','2018-07-31','<div>\r\n<p>Segara Tours and Travel merupakan perusahaan yang sedang berkembang di kota Bandung membutuhkan staf administrasi dan akuntansi.</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>1. Melakukan proses pembukuan dan menyusun laporan keuangan<br />2. Mengelola kas bank dan kas di tangan<br />3. Menerima dan melakukan pembayaran-pembayaran untuk kegiatan operasional perusahaan<br />4. Mengelola pajak perusahaan<br />5. Melakukan pekerjaan administrasi lainnya</p>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Fresh graduate dipersilakan melamar</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>1. Komputer dan Internet<br />2. Microsoft Office<br />3. Pembukuan dan penyusunan laporan keuangan<br />4. Mengerti perpajakan lebih disukai<br />5. Cepat, rajin, rapi, jujur, teliti</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>&ndash; Wanita<br />&ndash; Pendidikan minimal SMK Akuntansi<br />&ndash; Domisili Bandung (Daerah Sukajadi lebih disukai)<br />&ndash; Usia maksimal 24 tahun<br />&ndash; Menyukai tantangan<br />&ndash; Cekatan dan bisa bekerja dalam tim.</p>\r\n</div>','5000000',0,1,'no_image.jpg','2018-07-19'),
(14,2,'LOWONGAN KERJA API DEVELOPER','2018-08-01','2018-08-07','<div>\r\n<p>Kirana Bali Wisata is one of Travel Agent company. We are currently need experienced staff, especially in API Development and Integration.</p>\r\n</div>\r\n<h5>Tanggung Jawab Pekerjaan :</h5>\r\n<div>\r\n<p>&ndash; Integrate our system with third party systems using API<br />&ndash; Collaborate with the team to develop new features and bug fixing.<br />&ndash; Perform system development / programming.<br />&ndash; Learning new technologies, growing, and innovating continously with us.</p>\r\n<h5>Tunjangan :</h5>\r\n<div>\r\n<p>BPJS Kesehatan, BPJS Ketenagakerjaan</p>\r\n</div>\r\n<h5>Waktu Bekerja :</h5>\r\n<div>Senin &ndash; Jumat (09:00 &ndash; 17:00), Sabtu (09:00-15:00)</div>\r\n</div>','<h5>Syarat Pengalaman :</h5>\r\n<div>Minimum of 2 years or a fresh graduate with special skills are welcome.</div>\r\n<h5>Keahlian :</h5>\r\n<div>\r\n<p>&ndash; Have knowledge to create API using JSON &amp; XML Format<br />&ndash; Having Experience developing/implementing SOAP/REST Web Services<br />&ndash; Have knowledge about API security<br />&ndash; Experience working with native PHP or Framework<br />&ndash; Expert in Javascript</p>\r\n</div>\r\n<h5>Kualifikasi :</h5>\r\n<div>\r\n<p>&ndash; Male / Female Maximum 30 years old<br />&ndash; Able to work with team and individually<br />&ndash; Must be self motivated, adaptable, and good skill communication</p>\r\n</div>','1.000.000 - 3.000.000',0,1,'6d922277497f1d82f025.jpg','2018-08-01'),
(15,4,'Lowongan CMO','2018-08-24','2018-08-31','<p>Credit Marketing Officer (CMO) Mobilku</p>\r\n<p>Kualifikasi :</p>\r\n<p>a. Laki-laki</p>\r\n<p>b. Min D3</p>\r\n<p>c. Usia Max. 28 th</p>\r\n<p>d. memiliki kendaraan bermotor dan Sim C</p>\r\n<p>e. Mengerti dunia Leasing dan Mobil</p>\r\n<p>f. diutamakan berdomisili di Padang</p>','<p>Persyaratan :</p>\r\n<p>Surat lamaran, Curiculum Vitae (CV)</p>\r\n<p>Foto Copy Ijazah terakhir</p>\r\n<p>Foto Copy KTP, SIM C, Pas Foto</p>','4000000',0,1,'bc32c3838d46ac3dcbb2.png','2018-08-10'),
(16,3,'Lowongan Kepala Gudang','2018-08-24','2018-08-31','<p>Dibutuhkan Kepal Gudang Untuk CV. Cengkareng Foding Gate</p>','<p>- Pendidikan Minimal SMA</p>\r\n<p>- Pengalaman dibidang yang sama min. 3 Tahun</p>\r\n<p>- Jujur dan disiplin</p>\r\n<p>- Mampu bekerja sesuai target</p>','5000000',0,1,'aa9d50d5660fcdd8fa46.jpg','2018-08-24');

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
  `lampiran` varchar(100) DEFAULT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_pencaker_id` (`profil_pencaker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan_formal` */

insert  into `pendidikan_formal`(`id`,`profil_pencaker_id`,`tingkat_pendidikan`,`nama_sekolah`,`jurusan`,`tahun_masuk`,`tahun_lulus`,`alamat_sekolah`,`lampiran`,`dibuat_pada`) values 
(8,5,'SD','SD Negeri No. 54 Sungai Asam','-','1990','1996','Sungai Asam Kec. 2x11 Enam Lingkung','9c2f9ee00536ef3e16cd.jpg','2018-08-09'),
(9,5,'SMP','SLTP 1 2x11Enam Lingkung','-','1996','1999','Kec. 2x11 Enam Lingkung','dce767650596b98bb553.jpg','2018-08-09'),
(10,5,'SMA','SMU N1 Lubuk Alung','IPA','1999','2002','Lubuk Alung','587026b77cfc9004c79d.jpg','2018-08-09'),
(12,5,'D3','FT. UNP','T. Elektronika','2002','2007','Padang','916f127470a183750a03.jpg','2018-08-09');

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
  `lampiran` varchar(100) DEFAULT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_pencaker_id` (`profil_pencaker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan_nonformal` */

insert  into `pendidikan_nonformal`(`id`,`profil_pencaker_id`,`nama_kegiatan`,`penyelenggara`,`tanggal_mulai`,`tanggal_selesai`,`tempat_kegiatan`,`lampiran`,`dibuat_pada`) values 
(1,4,'Diklat','Dinas Tenaga Kerja','2018-07-02','2018-07-05','Padang','','2018-07-06'),
(2,5,'Bimtek Penyelenggaraan Perkeretaapian','Direktorat Jenderal Perkeretaapian','2017-08-07','2017-08-09','Rocky Hotel Padang','80600b5e34428c50f293.png','2018-08-10'),
(3,5,'workshop Multimedi Interactive','Komunitas Belajar Multimedia &amp; Design Grafis UNP','2017-09-20','2017-09-21','UNP','34cec68351294c276b1e.png','2018-08-10'),
(4,5,'Seminar Internasional Internet of things and What We Can Do With Programming','Kafe Koding','2016-10-08','2016-10-08','STMIK Indoenesi Padang','7967199b855bc93bdaac.png','2018-08-10'),
(5,5,'English Course','SATNUSA Padang','2006-12-01','2006-12-30','Satnusa Padang','febb5d207981d45465af.png','2018-08-10');

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
  `lampiran` varchar(100) DEFAULT NULL,
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_pencaker_id` (`profil_pencaker_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pengalaman_kerja` */

insert  into `pengalaman_kerja`(`id`,`profil_pencaker_id`,`nama_perusahaan`,`jabatan`,`deskripsi_jabatan`,`bidang_perusahaan`,`tanggal_masuk`,`tanggal_keluar`,`lampiran`,`dibuat_pada`) values 
(1,4,'PT. AMI','Web Dev','Membuat website','Jasa Pengembangan Software','2018-07-02','2018-07-06',NULL,'2018-07-08'),
(4,5,'PT. MCF','Surveyor','Survey Kelayakan Calon Konsumen Pembeli Motor','Leasing','2008-02-01','2011-03-01','725289005b0be6c0611a.jpg','2018-08-10');

/*Table structure for table `profil_admin` */

DROP TABLE IF EXISTS `profil_admin`;

CREATE TABLE `profil_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_akun_id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha','Lain-Lain') DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(12) DEFAULT NULL,
  `foto` varchar(100) DEFAULT 'default.png',
  `dibuat_pada` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_akun_id` (`user_akun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `profil_admin` */

insert  into `profil_admin`(`id`,`user_akun_id`,`nip`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`agama`,`alamat`,`telepon`,`foto`,`dibuat_pada`) values 
(1,1,'131400036','Ridwan Kurnia','Pria','Padang','1984-04-17','Islam','Pariaman','081268280648','f830e3bb7277cd0356bb.png','2018-05-12'),
(2,44,'1314123123','Boy Sand',NULL,NULL,NULL,NULL,NULL,NULL,'default.png','2018-12-09');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `profil_pencaker` */

insert  into `profil_pencaker`(`id`,`user_akun_id`,`nik`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`agama`,`alamat`,`telepon`,`quote`,`email`,`photo`,`dibuat_pada`) values 
(4,30,'1371112904940006','Adi Raka Siwi, S.Kom','Pria','Padang','1994-04-29','Islam','Komplek Filano Mandiri BLOK A1 No.1 Padang','081268280648','Talk Less Do More','adiraka8@gmail.com','81d722468d359107ac2d.jpg','2018-07-05'),
(5,39,'130515050619820001','Kurnia Rahim','Pria','Sicincin','1984-04-17','Islam','Sicincin Kec. 2x11 Enam Lingkung','085263589948','Melawan Malas','kurniarahim84@gmail.com','446da0c7ad00cb032c77.jpg','2018-08-09');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `profil_perusahaan` */

insert  into `profil_perusahaan`(`id`,`user_akun_id`,`nama_perusahaan`,`no_siup`,`no_situ`,`bidang_usaha`,`alamat`,`telepon`,`deskripsi_perusahaan`,`website`,`email`,`logo_perusahaan`,`slogan`,`dibuat_pada`) values 
(2,38,'PT. Andalas Medika Infotama','436/6828A/338.8.12/2','0739/22-09/PK/VIII/0','Jasa','Komplek Cendana Mata Air Thp. VIII Blok A No. 4 Padang','444222','Membuat website','ami-tech.co.id','cs@ami-tech.co.id','c6a0ccdf991102ee0e78.jpg','Membangun Negara','2018-07-08'),
(3,40,'CV. Cengkareng Folding Gate','12/JUL/SIUP-2018','01/JUL/SITU-2018','Folding Gate','Pariaman','(0751)675123','Membuat Rangka Baja','www.cengkarengfoldinggate.com','kurniarahim84@gmail.com','f6270d4da2d495c6c17d.png','Maju Bersama Karyawan','2018-08-09'),
(4,41,'PT Sinar Jernih','13/JUL/SIUP-2018','13/JUL/SITU-2018','Pembiayaan','Padang','(021) 7654675','Pembiyaan Kredit Kendaraan','www.sinarjernih.com','kurniarahim84@gmail.com','f7a15ce919ec1e40a216.png','Membiayai dengan transparan','2018-08-10');

/*Table structure for table `remember` */

DROP TABLE IF EXISTS `remember`;

CREATE TABLE `remember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_akun_id` int(10) unsigned NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `remember` */

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `user_akun` */

insert  into `user_akun`(`id`,`hak_akses_id`,`username`,`password`,`status`,`aktivasi`,`dibuat_pada`) values 
(1,1,'admin','21232f297a57a5a743894a0e4a801fc3 ',1,1,'2018-05-11'),
(38,3,'ami1234','20fd35afc7ae7cb8cc5c7a31b1101f3e',1,1,'2018-07-08'),
(39,2,'kurnia','fbce00b605288f8eefc9b30cf542b60c',1,1,'2018-08-09'),
(40,3,'CV. Cengkareng','fbce00b605288f8eefc9b30cf542b60c',1,1,'2018-08-09'),
(41,3,'PT. SJS','fbce00b605288f8eefc9b30cf542b60c',1,1,'2018-08-10'),
(42,4,'webmaster','50a9c7dbf0fa09e8969978317dca12e8',1,1,'2018-09-12'),
(44,1,'admin2','c84258e9c39059a89ab77d846ddab909',1,1,'2018-12-09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
