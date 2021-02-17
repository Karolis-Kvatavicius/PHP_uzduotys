-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 05:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` varchar(40) NOT NULL,
  `shortContent` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `publishDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(40) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `preview` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `author`, `shortContent`, `content`, `publishDate`, `type`, `title`, `addDate`, `preview`) VALUES
(29, 'PetrPetras', 'straipsnis', 'ilgas aprasymas lalalala', '2021-02-11 07:39:48', 'PhotoArticle', 'Petro straipsnis', '2021-02-11 07:45:31', 'https://image.shutterstock.com/image-photo/adiyogi-statue-isha-foundation-coimbatore-260nw-1118016773.jpg'),
(30, 'autorius', 'cia mano pirmas straipsnis', 'labai svarbus kontentas', '2021-02-17 16:24:39', 'PhotoArticle', 'Cool Article', '2021-02-17 16:27:14', 'https://images.indianexpress.com/2019/09/teacher-day_1.jpg'),
(31, 'autorius', 'Lala', 'Blabla', '2021-02-17 16:25:34', 'ShortArticle', 'Kitas straipsnis', '2021-02-17 16:25:34', 'https://resize.indiatvnews.com/en/resize/newbucket/715_-/2018/02/propose-1517999844.jpg'),
(33, 'Ponas', 'lala1', 'laaaaaaaaaaaaaaaaalllllllllllllllllaaaaaaaaaaaaaaaaaaaaaa', '2021-02-17 16:34:54', 'NewsArticle', 'Underrated', '2021-02-17 16:34:54', 'https://images.ctfassets.net/hrltx12pl8hq/4f6DfV5DbqaQUSw0uo0mWi/ff068ff5fc855601751499d694c0111a/shutterstock_376532611.jpg?fit=fill&w=800&h=300');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(15) UNSIGNED NOT NULL,
  `straipsnio_id` int(11) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `straipsnio_id`, `link`) VALUES
(179, 29, 'https://s23527.pcdn.co/wp-content/uploads/2020/01/100k-moon.jpg.optimal.jpg'),
(180, 29, 'http://joombig.com/demo-extensions1/images/gallery_slider/Swan_large.jpg'),
(181, 30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsmbLPQoO9FCSvJPicOt2s1fY_Le0MUFk_EQ&usqp=CAU'),
(182, 31, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOd256TcC6vcaQ99TYzoP0pBbch9_Q-bbrmw&usqp=CAU'),
(183, 31, 'https://www.traveller.com.au/content/dam/images/h/1/q/a/b/k/image.related.articleLeadwide.620x349.h1qyip.png/1600986508585.jpg'),
(185, 33, 'https://www.pics4learning.com/images/pics-banner1-1300.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentarai`
--

CREATE TABLE `komentarai` (
  `id` int(15) UNSIGNED NOT NULL,
  `turinys` text NOT NULL,
  `straipsnio_id` int(11) UNSIGNED NOT NULL,
  `vartotojo_vardas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentarai`
--

INSERT INTO `komentarai` (`id`, `turinys`, `straipsnio_id`, `vartotojo_vardas`) VALUES
(35, 'blaaaaaa', 29, 'Kazimir'),
(37, 'pakomentinau', 29, 'autorius'),
(38, 'ponas bynas buvo cia', 30, 'Ponas'),
(39, 'neidomu', 29, 'Ponas'),
(40, 'nuuuu daaaaaa', 33, 'miroslav'),
(41, 'kto tak napisal', 30, 'miroslav'),
(42, '..............', 31, 'miroslav'),
(43, 'xoxoxo', 33, 'komentatorius'),
(44, 'ai nzn', 30, 'komentatorius');

-- --------------------------------------------------------

--
-- Table structure for table `straipsniai_temos`
--

CREATE TABLE `straipsniai_temos` (
  `straipsnio_id` int(11) UNSIGNED NOT NULL,
  `temos_id` int(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `straipsniai_temos`
--

INSERT INTO `straipsniai_temos` (`straipsnio_id`, `temos_id`) VALUES
(29, 5),
(30, 2),
(31, 4),
(33, 6);

-- --------------------------------------------------------

--
-- Table structure for table `temos`
--

CREATE TABLE `temos` (
  `id` int(15) UNSIGNED NOT NULL,
  `pavadinimas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temos`
--

INSERT INTO `temos` (`id`, `pavadinimas`) VALUES
(1, 'Kriminalai'),
(2, 'Lietuva'),
(3, 'Uzsienis'),
(4, 'Sportas'),
(5, 'Verslas'),
(6, 'Orai');

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `id` int(15) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `slaptazodis` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `statusas` varchar(255) NOT NULL DEFAULT 'Aktyvus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`id`, `username`, `vardas`, `pavarde`, `slaptazodis`, `role`, `statusas`) VALUES
(3, 'vart3', 'Milda', 'Varnaite', 'vart3', 'Administratorius', 'Aktyvus'),
(16, 'Kazimir', 'Kazimieras', 'Bepavardis', 'kazimir', 'StandartinisVartotojas', 'Aktyvus'),
(17, 'PetrPetras', 'Petras', 'lalala', 'petras', 'Autorius', 'Aktyvus'),
(18, 'autorius', 'Vardzius', 'Pavardzius', 'autorius', 'Autorius', 'Aktyvus'),
(19, 'Ponas', 'Ponas', 'Bynas', 'ponas', 'Autorius', 'Aktyvus'),
(20, 'komentatorius', 'Jonas', 'Zukas', 'koment', 'StandartinisVartotojas', 'Aktyvus'),
(21, 'miroslav', 'mirka', 'bogdanov', 'mirka', 'StandartinisVartotojas', 'Aktyvus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shortContent` (`shortContent`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `straipsnio_id` (`straipsnio_id`);

--
-- Indexes for table `komentarai`
--
ALTER TABLE `komentarai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `straipsnio_id` (`straipsnio_id`) USING BTREE,
  ADD KEY `vartotojo_vardas` (`vartotojo_vardas`) USING BTREE;

--
-- Indexes for table `straipsniai_temos`
--
ALTER TABLE `straipsniai_temos`
  ADD KEY `straipsnio_id` (`straipsnio_id`),
  ADD KEY `temos_id` (`temos_id`);

--
-- Indexes for table `temos`
--
ALTER TABLE `temos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vartotojai`
--
ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `komentarai`
--
ALTER TABLE `komentarai`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `temos`
--
ALTER TABLE `temos`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vartotojai`
--
ALTER TABLE `vartotojai`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`straipsnio_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarai`
--
ALTER TABLE `komentarai`
  ADD CONSTRAINT `komentarai_ibfk_1` FOREIGN KEY (`straipsnio_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `straipsniai_temos`
--
ALTER TABLE `straipsniai_temos`
  ADD CONSTRAINT `straipsniai_temos_ibfk_1` FOREIGN KEY (`temos_id`) REFERENCES `temos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `straipsniai_temos_ibfk_2` FOREIGN KEY (`straipsnio_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
