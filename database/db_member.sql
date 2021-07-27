-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2021 at 07:34 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_member`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` varchar(8) NOT NULL,
  `tanggal_gabung` date NOT NULL,
  `jenis_member` enum('Gratis','Pelajar','Personal','Bisnis') NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `whatsapp` varchar(13) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `tanggal_gabung`, `jenis_member`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `email`, `whatsapp`, `foto_profil`) VALUES
('ID-00001', '2021-08-01', 'Gratis', 'Indra Styawantoro', 'Laki-laki', 'Tanjung Karang, Lampung', 'indra.styawantoro@gmail.com', '081377783334', 'd10b3f26590f1ad3b7fde9f8c73c203fc260b67f.jpg'),
('ID-00002', '2021-08-01', 'Personal', 'Alice Doe', 'Perempuan', 'Tanjung Karang, Lampung', 'alice.doe@gmail.com', '082377883344', '624c7e295978a42eb83909be5417d5f963163e5a.png'),
('ID-00003', '2021-08-02', 'Pelajar', 'Mike Brown', 'Laki-laki', 'Rajabasa, Lampung', 'mike.brown@gmail.com', '082188669988', 'f52c609ff6a0cee16ce85a242787fe853abdbe6c.png'),
('ID-00004', '2021-08-03', 'Personal', 'Jonathan Smart', 'Laki-laki', 'Kedaton, Lampung', 'jonathan.smart@gmail.com', '082373378448', '8f66cb94fa7c333b034680f4e893cc90ff60855c.png'),
('ID-00005', '2021-08-05', 'Pelajar', 'Pauline Smith', 'Perempuan', 'Teluk Betung, Lampung', 'pauline.smith@gmail.com', '085669919779', '3e2b802811fcedfb5717c292d44e77950e4f255e.png'),
('ID-00006', '2021-08-07', 'Bisnis', 'Ronnie Blake', 'Laki-laki', 'Bandar Lampung, Lampung', 'ronnie.blake@gmail.com', '082173775544', 'ffe79bc092b7ae85a782087d96767044b3669340.png'),
('ID-00007', '2021-08-10', 'Pelajar', 'Marsha Singer', 'Perempuan', 'Teluk Betung, Lampung', 'marsha.singer@gmail.com', '085758857778', 'b5d00325dbfde70641ca07e96dc6a6fb2a8dac7d.png'),
('ID-00008', '2021-08-11', 'Gratis', 'Manver Jacobson', 'Laki-laki', 'Rajabasa, Lampung', 'manver.jacobson@gmail.com', '082189897676', 'a83e0d83d5a1a8d542919af2e4d50cdacfbbe216.jpg'),
('ID-00009', '2021-08-13', 'Pelajar', 'Lindsay Spice', 'Perempuan', 'Kedaton, Lampung', 'lindsay.spice@gmail.com', '0895881122441', '1fa9f7ba55dd26b1d6c489b4eb8126762961ec71.png'),
('ID-00010', '2021-08-15', 'Personal', 'Lynda Marquez', 'Perempuan', 'Tanjung Karang, Lampung', 'lynda.marquez@gmail.com', '0898557766889', '0490b58023c01ef83c74189f8d7c4714750d5c9f.png'),
('ID-00011', '2021-08-20', 'Pelajar', 'James Doe', 'Laki-laki', 'Rajabasa, Lampung', 'james.doe@gmail.com', '082380905643', '328fb1f5e6e3537cb37bb11e9a3b682187f0e924.png'),
('ID-00012', '2021-08-21', 'Personal', 'Mark Parker', 'Laki-laki', 'Bandar Lampung, Lampung', 'mark.parker@gmail.com', '082123459876', '46bf3929d7da59d1216f0606413a5f39df8d620d.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
