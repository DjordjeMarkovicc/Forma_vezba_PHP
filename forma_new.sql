-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 11:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forma_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `osobe_komentari`
--

CREATE TABLE `osobe_komentari` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `pol` varchar(10) NOT NULL,
  `god` varchar(10) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osobe_komentari`
--

INSERT INTO `osobe_komentari` (`id`, `ime_prezime`, `email`, `komentar`, `pol`, `god`, `created_at`) VALUES
(1, 'Djole Marinkovic', 'dsgds@dsgd.com', 'dsadsa saf asfas sa fsa ffsa', 'M', '0-29', 1555321628),
(2, 'Ana Kevic', 'ana@ana.com', 'hfhf jfjhjhg gjkgkjg kj gkj gj', 'Z', '30-60', 1555321758),
(3, 'Zorica Cvetic', 'zora@zora.com', 'Cao bre ej :)', 'Z', '60+', 1555322183),
(4, 'Dejan Dekic', 'dejan@dejan.com', 'Da das dsg sxz dsg sd dfj hfgejd', 'M', '60+', 1555322643),
(6, 'dsgsdg', 'dsgds@dsgd.com', 'sdgds dsg dg dsg sdg sdg ds', 'M', '30-60', 1555330577),
(7, 'Veljko Djokovic', 'velja@velja.com', 'MRS BRE', 'M', '60+', 1556110555);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `osobe_komentari`
--
ALTER TABLE `osobe_komentari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `osobe_komentari`
--
ALTER TABLE `osobe_komentari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
