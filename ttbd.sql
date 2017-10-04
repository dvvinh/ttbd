-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 03:53 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanbong`
--

CREATE TABLE `sanbong` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `so_nguoi_moi_doi` varchar(200) DEFAULT NULL,
  `id_trung_tam` int(11) NOT NULL,
  `ghi_chu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanbong`
--

INSERT INTO `sanbong` (`id`, `ten`, `so_nguoi_moi_doi`, `id_trung_tam`, `ghi_chu`) VALUES
(1, 'Sân số 1 dhnl', '7', 1, NULL),
(2, 'Sân số 2', '7', 1, 'Sửa lại ghi chú'),
(3, 'Sân số 4', '7', 1, 'Sửa lại ghi chú');

-- --------------------------------------------------------

--
-- Table structure for table `trungtambongda`
--

CREATE TABLE `trungtambongda` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `ghi_chu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trungtambongda`
--

INSERT INTO `trungtambongda` (`id`, `ten`, `dia_chi`, `sdt`, `ghi_chu`) VALUES
(1, 'dhnl', '102', '12345678', 'Ghi chus'),
(2, 'Trường thành', 'La sơn', '1234', 'Ghi chú'),
(3, 'Lâm hoằng', 'Lâm hoằng', '1234', 'Sân lâm hoằng'),
(33, 'them', 'dia chi', '123', 'ghi chu'),
(39, 'them', 'dia chi', '123', 'ghi chu'),
(40, 'them', 'dia chi', '123', 'ghi chu'),
(41, 'them', 'dia chi', '123', 'ghi chu'),
(42, 'them', 'dia chi', '123', 'ghi chu'),
(43, 'them', 'dia chi', '123', 'ghi chu'),
(44, 'them', 'dia chi', '123', 'ghi chu'),
(45, 'Vinh sửa 5', 'địa chỉ 5', 'sdt 5', 'ghi chú 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanbong`
--
ALTER TABLE `sanbong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trungtambongda`
--
ALTER TABLE `trungtambongda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanbong`
--
ALTER TABLE `sanbong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trungtambongda`
--
ALTER TABLE `trungtambongda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
