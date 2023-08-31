-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 08:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_pelaporan_pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('1212111', 'Jekih', 'Zacky', 'jekih', '+62 860-6798-721'),
('1234567890', 'John Doe', 'johndoe123', 'password123', '123-456-7890'),
('2345678901', 'David Wilson', 'davidw', 'pass4321', '777-888-9999'),
('31524252', 'najmishaukynaksuj', 'jsdjej', 'ksi77sus', '7227288272'),
('3456789012', 'Daniel Davis', 'danield', 'daniel123', '999-888-7777'),
('3525015201880002', 'keenan', 'keenan', 'keenan', '999-999-999'),
('43543534534', 'reza', 'reza', 'reza', '666-666-666'),
('4567890123', 'Michael Johnson', 'mikej', 'pass123', '555-123-4567'),
('5678901234', 'Jessica Taylor', 'jessicat', 'taylorpass', '222-333-4444'),
('6789012345', 'Christopher Anderson', 'chrisa', 'chrispass', '444-333-2222');

--
-- Triggers `masyarakat`
--
DELIMITER $$
CREATE TRIGGER `before_masyarakat_delete` BEFORE DELETE ON `masyarakat` FOR EACH ROW BEGIN
    INSERT INTO masyarakat_backup (nik, nama, username, password, telp)
    VALUES (OLD.nik, OLD.nama, OLD.username, OLD.password, OLD.telp);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat_backup`
--

CREATE TABLE `masyarakat_backup` (
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat_backup`
--

INSERT INTO `masyarakat_backup` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('9876543210', 'Jane Smith', 'janesmith456', 'securepass', '987-654-3210'),
('9012345678', 'Amanda Thomas', 'amandat', 'amandapass', '666-777-8888'),
('8901234567', 'Sarah Miller', 'sarahm', 'sarahpass', '111-222-3333'),
('7890123456', 'Emily Brown', 'emilyb', '12345', '444-555-6666'),
('435435345341', 'kepan', 'oga', 'dsaad', '8323874387');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(14, '2023-08-26', '43543534534', 'sadasdasdasds', 'Screenshot 2023-08-21 214242.png', 'selesai'),
(17, '2023-08-31', '43543534534', 'asdsadsad', 'RobloxScreenShot20230709_042329753.png', 'selesai'),
(18, '2023-08-31', '1212111', 'khjkhjkhjhjh', '', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'zacky', 'jekih', 'jekih', '0813211', 'admin'),
(2, 'ryan', 'rayen', 'rayen', '2941924', 'admin'),
(3, 'nayla', 'nay', 'nay', '81238129', 'petugas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rakyat`
-- (See below for the actual view)
--
CREATE TABLE `rakyat` (
`nik` char(16)
,`nama` varchar(35)
,`telp` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(19, 14, '2023-08-31', 'asu koe\r\n', 1),
(49, 17, '2023-08-31', 'kodksfosfokosdkfosdk', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `zacky`
-- (See below for the actual view)
--
CREATE TABLE `zacky` (
`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` char(16)
,`isi_laporan` text
,`foto` varchar(255)
,`status` enum('0','proses','selesai')
,`tanggapan` text
);

-- --------------------------------------------------------

--
-- Structure for view `rakyat`
--
DROP TABLE IF EXISTS `rakyat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rakyat`  AS SELECT `masyarakat`.`nik` AS `nik`, `masyarakat`.`nama` AS `nama`, `masyarakat`.`telp` AS `telp` FROM `masyarakat` WHERE 11  ;

-- --------------------------------------------------------

--
-- Structure for view `zacky`
--
DROP TABLE IF EXISTS `zacky`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zacky`  AS SELECT `pengaduan`.`id_pengaduan` AS `id_pengaduan`, `pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`, `pengaduan`.`nik` AS `nik`, `pengaduan`.`isi_laporan` AS `isi_laporan`, `pengaduan`.`foto` AS `foto`, `pengaduan`.`status` AS `status`, `tanggapan`.`tanggapan` AS `tanggapan` FROM (`pengaduan` join `tanggapan` on(`pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`,`id_petugas`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
