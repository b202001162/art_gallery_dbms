-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 07:22 PM
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
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `imgname` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imgname`, `url`, `uploaded_at`) VALUES
(1, 'Mona Lisa', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_mona_lisa_by_leonardo_da_vinci.jpg', '2023-09-01 09:42:57'),
(2, 'The Starry Night', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_starry_night_by_vincent_van_gogh.jpg', '2023-09-01 09:43:36'),
(3, 'The Scream', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_scream_by_edvard_munch.jpg', '2023-09-01 09:43:58'),
(4, 'The Night Watch', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_night_watch_by_rembrandt_m29.jpg', '2023-09-01 09:44:18'),
(5, 'The Kiss', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_kiss_by_gustav_klimt.jpg', '2023-09-01 09:45:07'),
(6, 'The Arnolfini Portrait', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_arnolfini_portrait_by_jan_van_eyck_v44.jpg', '2023-09-01 09:47:43'),
(7, 'The Girl With A Pearl Earring', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_girl_with_a_pearl_earring_by_johannes_vermeer.jpg', '2023-09-01 09:47:43'),
(8, 'Inpression Sunrise', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_impression,_sunrise_by_claude_monet.jpg', '2023-09-01 09:51:44'),
(9, 'Las Meninas', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_las_meninas_by_diego_velazquez_l36.jpg', '2023-09-01 09:51:44'),
(10, 'Napoleon Crossing the Alps', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_napoleon_crossing_the_alps_by_jacques-louis_david_i39.jpg', '2023-09-01 09:51:44'),
(11, 'Musicians', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_musicians_by_caravaggio.jpg', '2023-09-01 09:51:44'),
(12, 'The sleeping Gypsy', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_sleeping_gypsy_by_henri_rousseau.jpg', '2023-09-01 09:51:44'),
(13, 'The cleaners', 'https://www.brushwiz.com/assets/images/most-famous-paintings/top_100_paintings_the_gleaners_by_jean-francois_millet.jpg', '2023-09-01 09:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `DOB`, `password`) VALUES
(7, 'user1', 'user1@gmail.com', '2002-01-01', 'NothingIsPossible'),
(8, 'user2', 'user2@gmail.com', '2002-01-01', 'HappyCoding');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`username`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
