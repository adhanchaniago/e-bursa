-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 02:31 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbursa`
--

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `slug` varchar(10) NOT NULL,
  `nama_akses` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_berita`
--

CREATE TABLE `info_berita` (
  `id` int(11) NOT NULL,
  `profil_admin_id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` enum('Berita','Event','Info') NOT NULL,
  `konten` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(11) NOT NULL,
  `profil_perusahaan_id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `deskripsi_persyaratan` text NOT NULL,
  `gaji` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_formal`
--

CREATE TABLE `pendidikan_formal` (
  `id` int(11) NOT NULL,
  `profil_pencaker_id` int(11) NOT NULL,
  `tingkat_pendidikan` enum('SD','SMP','SMA','SMK','D1','D3','S1','S2') NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `tahun_masuk` varchar(4) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_nonformal`
--

CREATE TABLE `pendidikan_nonformal` (
  `id` int(11) NOT NULL,
  `profil_pencaker_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE `pengalaman_kerja` (
  `id` int(11) NOT NULL,
  `profil_pencaker_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `deskripsi_jabatan` text NOT NULL,
  `bidang_perusahaan` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_admin`
--

CREATE TABLE `profil_admin` (
  `id` int(11) NOT NULL,
  `user_akun_id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha','Lain-Lain') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_pencaker`
--

CREATE TABLE `profil_pencaker` (
  `id` int(11) NOT NULL,
  `user_akun_id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `quote` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `id` int(11) NOT NULL,
  `user_akun_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `no_siup` varchar(20) DEFAULT NULL,
  `no_situ` varchar(20) DEFAULT NULL,
  `bidang_usaha` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `deskripsi_perusahaan` text,
  `website` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `logo_perusahaan` varchar(100) DEFAULT NULL,
  `slogan` varchar(50) DEFAULT NULL,
  `tanggal_dibuat` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_akun`
--

CREATE TABLE `user_akun` (
  `id` int(11) NOT NULL,
  `hak_akses_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dibuat_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_berita`
--
ALTER TABLE `info_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_admin_id` (`profil_admin_id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_perusahaan_id` (`profil_perusahaan_id`);

--
-- Indexes for table `pendidikan_formal`
--
ALTER TABLE `pendidikan_formal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_pencaker_id` (`profil_pencaker_id`);

--
-- Indexes for table `pendidikan_nonformal`
--
ALTER TABLE `pendidikan_nonformal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_pencaker_id` (`profil_pencaker_id`);

--
-- Indexes for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_pencaker_id` (`profil_pencaker_id`);

--
-- Indexes for table `profil_admin`
--
ALTER TABLE `profil_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_akun_id` (`user_akun_id`);

--
-- Indexes for table `profil_pencaker`
--
ALTER TABLE `profil_pencaker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_akun_id` (`user_akun_id`);

--
-- Indexes for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_akun_id` (`user_akun_id`);

--
-- Indexes for table `user_akun`
--
ALTER TABLE `user_akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hak_akses_id` (`hak_akses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info_berita`
--
ALTER TABLE `info_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendidikan_formal`
--
ALTER TABLE `pendidikan_formal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendidikan_nonformal`
--
ALTER TABLE `pendidikan_nonformal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profil_admin`
--
ALTER TABLE `profil_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profil_pencaker`
--
ALTER TABLE `profil_pencaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_akun`
--
ALTER TABLE `user_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
