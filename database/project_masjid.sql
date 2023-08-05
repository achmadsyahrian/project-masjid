-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 08:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `imam`
--

CREATE TABLE `imam` (
  `id_imam` int(11) NOT NULL,
  `nama_imam` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `masjid`
--

CREATE TABLE `masjid` (
  `id_masjid` int(11) NOT NULL,
  `nama_masjid` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `pendiri` varchar(100) NOT NULL,
  `tgl_bangun` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masjid`
--

INSERT INTO `masjid` (`id_masjid`, `nama_masjid`, `deskripsi`, `pendiri`, `tgl_bangun`, `alamat`, `telp`, `email`, `facebook`, `youtube`, `foto`) VALUES
(1, 'Al - Manar', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos maiores repellendus soluta natus fuga perferendis ad fugit porro adipisci autem libero in aperiam a quasi consequuntur, blanditiis totam fugiat unde quam! Nulla quam quisquam hic laborum, error eos. Dolore nisi obcaecati eaque accusantium quidem perspiciatis numquam illo ducimus facilis quam quod velit quia, commodi, nulla, hic in. Accusantium, adipisci consequuntur at natus, facere recusandae eius sequi numquam minima quis quod. Expedita voluptatibus accusantium voluptas sed quam corrupti quo dignissimos illo!', 'Achmad Syahrian', '2019-02-12', 'Jl. Masjid Perumahan Alam Lestari', '089528126200', 'mosque@gmail.com', '', '', '63fa077e72c25.masjid.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_post` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `judul`, `tgl_post`, `deskripsi`, `foto`) VALUES
(25, 'Masjid Baru', '2023-02-27', '', '63fc132611316.wallpaperflare.com_wallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(40, 'achmad', 'achmad', '698d51a19d8a121ce581499d7b701668', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `video` varchar(150) NOT NULL,
  `tgl_post` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imam`
--
ALTER TABLE `imam`
  ADD PRIMARY KEY (`id_imam`);

--
-- Indexes for table `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`id_masjid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imam`
--
ALTER TABLE `imam`
  MODIFY `id_imam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `id_masjid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
