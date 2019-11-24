-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2019 at 02:54 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_events` int(11) NOT NULL,
  `judul_event` varchar(255) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `urls` varchar(255) NOT NULL,
  `gambar_event` varchar(255) DEFAULT NULL,
  `tanggal_mulai` varchar(20) DEFAULT NULL,
  `tanggal_akhir` varchar(20) DEFAULT NULL,
  `waktu_mulai` varchar(20) NOT NULL,
  `waktu_akhir` varchar(20) NOT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `peserta` int(11) NOT NULL,
  `deskripsi` text,
  `create_date` date NOT NULL,
  `nama_penyelenggara` varchar(100) DEFAULT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `nominal_pajak` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_events`, `judul_event`, `lokasi`, `urls`, `gambar_event`, `tanggal_mulai`, `tanggal_akhir`, `waktu_mulai`, `waktu_akhir`, `harga`, `peserta`, `deskripsi`, `create_date`, `nama_penyelenggara`, `no_rekening`, `nama_bank`, `nama_rekening`, `nominal_pajak`, `deleted`, `id_users`, `id_kategori`) VALUES
(6, 'Mendaki Gunung Bersama Kamu', 'Jl Semanggi barat, Malang, Jawa Timur', 'https://goo.gl/maps/xM9Svm1hEyR2', 'bromo.jpg', '2018-12-14', '2018-12-20', '12.00', '20.00', '100000', 95, 'Berapa kali kutanya mimpi\r\nHarapan-harapan kita berdua yang berdebu\r\nJawaban ada pada masa lalu\r\n\r\nBerapa kali kusapu sungai dimataku\r\nSedang punggungmu bahkan tak sudi bicara\r\nDan matamu, hatimu, jiwamu, sebagai asing pengembara\r\n\r\nBerapa jauh jarak kutempuh\r\nMenangis luka sedihku bersimpuh\r\nTidak ada janji tidak ada mimpi\r\nSemua hilang ditelan benci\r\n\r\nApalah dayaku saat ini\r\nMenggapai harap yang pupus dan musnah\r\nKebingunan, kesepian, kesedihan\r\nAdalah teman setiap yang menyedihkan\r\n\r\n', '2018-12-09', 'Expedisi Bromo Travel', '', '', '', 0, 0, 1, 4),
(7, 'QA Meetup #4', 'Dilo Malang | Malang Digital Innovation Lounge', 'https://goo.gl/maps/xM9Svm1hEyR2', 'qa.png', '2018-12-16', '2018-12-16', '18.00', '21.00', '20000', 100, 'Meetup komunitas Malang Quality Assurance (MQA) yang ke 4 akan membahas tentang Testing Manifesto.', '2018-12-09', 'Malang Quality Assurance', '', '', '', 0, 0, 1, 3),
(9, 'Its A New Day and Breakfast Of Champions Block Party 2019', 'The Great Northern  119 Utah St  San Francisco, CA 94103  United States', 'https://goo.gl/maps/KRAETcbeejP2', 'poster.png', '2019-01-04', '2019-01-05', '08.00', '16.00', '250000', 20, 'The rumors are true, San Franciscos two most legendary block parties are coming together....\r\nAbout this Event\r\nOn New Years Day 2019 join us for....\r\n\r\nIts A New Day and Breakfast of Champions Block Party\r\n\r\nThis will sell out!  Its go time!!  Snag your ticket today, secure a spot on the dance floor for SFs favorite celebration', '2018-12-11', 'The Great Northern', '', '', '', 0, 0, 6, 5),
(10, 'xTalks 01: Startup AtoZ', 'Nest Coffee  85 Jalan Adityawarman  Kec. Jombang, Jawa Timur 61419', 'https://goo.gl/maps/xM9Svm1hEyR2', 'meetup_startup.png', '2018-12-14', '2018-12-14', '18.00', '21.00', '0', 60, 'xTalks 01: STARTUP AtoZ\r\nsemua hal yang perlu kalian ketahui tentang \r\nSTARTUP, akan kita kupas habis disini\r\n.\r\nBersama kita:\r\nSunil Tolani\r\n(Founder Calibreworks, CEO iDaff)\r\n.\r\nKhoirul Hayim\r\n(Local Entrepreneur, CEO PeHa Group) \r\n.\r\nDipandu oleh:\r\nAnhar Widodo\r\n(Jombang Creative Network)\r\n.\r\nMore Info:\r\n\r\nhttp://bit.ly/xTalksbyNESTx', '2018-12-14', 'NESTx', '', '', '', 0, 0, 5, 3),
(11, 'GovNext 2019', 'Hotel Mulia Senayan  Senayan, Jl. Asia Afrika, RT.1/RW.3, Gelora  Kota Jakarta Pusat', 'https://goo.gl/maps/F4Zm5kAkUor', 'gopay.png', '2018-12-22', '2018-12-22', '18.00', '21.00', '0', 60, 'GovPay | GovNext , produced by GovInsider with support from the Office of the President of Indonesia, will bring together leading innovators from across ASEAN, and key decision-makers from Indonesias federal, provincial and city governments.', '2018-12-16', 'Clarion Events Pte Ltd', '', '', '', 0, 0, 2, 3),
(12, 'MQA meetup 11', 'Dilo malang', 'https://maps.google.com', 'Ellipse 20.png', '2019-11-20', '2019-11-20', '18:00', '21:00', '50000', 60, 'Sudah lewat', '2019-11-21', 'MQA', '132324454645', 'BCA', 'Saya sendiri', 5000, 0, 1, 3),
(13, 'Coba', 'Malang', 'https://maps.google.com', 'jeremy-bishop-151467-unsplash.jpg', '2019-11-29', '2019-11-29', '14.00', '15.00', '5000', 60, 'hahaha', '2019-11-23', 'Adan', '12345', 'BNI', 'Fardhan Ardhi Ramadhan', 500, 0, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_kategori` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`, `deleted`) VALUES
(1, 'musik', 0),
(2, 'seni', 0),
(3, 'bisnis dan profesional', 0),
(4, 'film dan media', 0),
(5, 'makanan dan minuman', 0),
(6, 'Hiburan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_events` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `no_rekening` varchar(30) DEFAULT NULL,
  `nama_rekening` varchar(50) DEFAULT NULL,
  `foto_bukti_tf` text,
  `status` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_events`, `id_users`, `no_rekening`, `nama_rekening`, `foto_bukti_tf`, `status`, `deleted`) VALUES
(10, 6, 1, '', '', '', 1, 0),
(11, 7, 1, '', '', '', 0, 0),
(13, 6, 1, '', '', '', 0, 1),
(19, 7, 6, '', '', '', 0, 0),
(20, 6, 6, '', '', '', 1, 0),
(21, 7, 8, '', '', '', 0, 0),
(22, 6, 8, '', '', '', 0, 0),
(29, 7, 5, '', '', '', 0, 0),
(35, 6, 8, '', '', '', 0, 0),
(36, 7, 6, '', '', '', 0, 0),
(49, 11, 1, '', '', '', 0, 0),
(50, 9, 1, '', '', '', 0, 0),
(51, 10, 11, '', '', '', 0, 1),
(52, 7, 11, '', '', '', 0, 1),
(53, 7, 11, NULL, NULL, NULL, 0, 0),
(54, 6, 11, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gambar_profile` varchar(255) DEFAULT 'user.svg',
  `create_date` datetime DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `idusers_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `pass`, `email`, `gambar_profile`, `create_date`, `saldo`, `deleted`, `idusers_level`) VALUES
(1, 'Panji Awwaludi', 'panjiAD', '123', 'panji@gmail.com', 'business-man.png', '2018-12-05 00:00:00', 700000, 0, 2),
(2, 'admin', 'root', 'admin', 'root@gmail.com', 'LOGO POLITEKNIK NEGERI MALANG.png', '2018-12-05 00:00:00', 0, 0, 1),
(5, 'Sumiyati', 'sumiyati123', '098', 'sumiyati@gmail.com', 'user.svg', '2018-12-05 23:17:41', 400000, 0, 2),
(6, 'aku dan kamu', 'aku', 'siapa', 'aku@kamu.kita', '2-28-2-1024x681.jpg', '2018-12-07 12:54:38', 380000, 0, 2),
(7, 'jainudin', 'jail', 'pass', 'jail@jai.com', 'user.svg', '2018-12-12 00:51:02', 200000, 1, 2),
(8, 'waluyo', 'waluyo SID', 'asd', 'waluyo@blogsopot.com', 'smk(PNG).png', '2018-12-15 08:41:58', 300000, 0, 2),
(9, 'ali', 'aliyullah', 'aliyullah', 'ali@jd.id', 'user.svg', '2018-12-16 03:42:52', 0, 0, 2),
(10, 'Muhammad Aliyul', 'mmdiyul', 'tahun2014', 'mmdiyul@gmail.com', 'user.svg', '2018-12-19 15:53:51', 0, 0, 2),
(11, 'adan', 'fardhanardhi', '123', 'fa.dsg.id@gmail.com', 'user.svg', '2019-11-14 09:16:22', 479880100, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_level`
--

CREATE TABLE `users_level` (
  `idusers_level` int(11) NOT NULL,
  `tipe` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_level`
--

INSERT INTO `users_level` (`idusers_level`, `tipe`) VALUES
(1, 1),
(2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_events`),
  ADD KEY `fk_events_users1_idx` (`id_users`),
  ADD KEY `fk_events_kategori1_idx` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `fk_pengunjung_events1_idx` (`id_events`),
  ADD KEY `fk_pengunjung_users1_idx` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `fk_users_users_level_idx` (`idusers_level`);

--
-- Indexes for table `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`idusers_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_events` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_level`
--
ALTER TABLE `users_level`
  MODIFY `idusers_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_kategori1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_events_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `fk_pengunjung_events1` FOREIGN KEY (`id_events`) REFERENCES `events` (`id_events`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengunjung_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_users_level` FOREIGN KEY (`idusers_level`) REFERENCES `users_level` (`idusers_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
