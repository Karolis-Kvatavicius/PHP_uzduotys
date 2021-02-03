-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 09:30 AM
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
  `id` int(11) NOT NULL,
  `author` varchar(40) COLLATE utf16_lithuanian_ci NOT NULL,
  `shortContent` varchar(200) COLLATE utf16_lithuanian_ci NOT NULL,
  `content` text COLLATE utf16_lithuanian_ci NOT NULL,
  `publishDate` date NOT NULL,
  `type` varchar(40) COLLATE utf16_lithuanian_ci NOT NULL,
  `title` varchar(100) COLLATE utf16_lithuanian_ci DEFAULT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `preview` varchar(255) COLLATE utf16_lithuanian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `author`, `shortContent`, `content`, `publishDate`, `type`, `title`, `addDate`, `preview`) VALUES
(1, 'John Doe', 'Shorty Shorts', 'Very shorty shorts were found', '2020-04-01', 'NewsArticle', 'New Article Title', '2021-01-28 09:03:12', 'https://d3i6fh83elv35t.cloudfront.net/static/2019/09/2019-09-29T133251Z_1883087259_RC1901EB47F0_RTRMADP_3_USA-TRUMP-WHISTLEBLOWER-1024x681.jpg'),
(2, 'Jonas Jon', 'trumptext', 'ilgesnis tekstukas', '2020-04-02', 'ShortArticle', 'Hilarious Title', '2021-01-28 09:03:12', 'https://siauliurvsb.lt/wp-content/uploads/2020/12/coronavirus-mundo-1.jpg'),
(3, 'PetrPetras', 'velgi trumpas', 'tekstas nedidelis', '2020-04-03', 'PhotoArticle', 'Very Dark Title', '2021-01-28 09:03:12', 'https://www.polishnews.co.uk/wp-content/uploads/2020/12/1608703693_LANDSCAPE_1280-1068x600.jpeg'),
(4, 'Vardenis su Pavarde', 'nebeturiu ideju', 'ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ', '2020-04-06', 'NewsArticle', 'Happy Title', '2021-01-28 09:03:12', 'https://cdn.images.express.co.uk/img/dynamic/153/590x/UK-weather-forecast-snow-1094487.jpg?r=1551462415030'),
(6, 'Veikejas', 'trumpulis', 'Ilgas tekstas', '2020-05-25', 'NewsArticle', 'Very Old Title', '2021-01-29 13:57:49', 'https://www.newstalkzb.co.nz/media/19957834/surf-life-saving-drone-little-ripper-undergoing-a-test-on-sydneys-maroubra-beach-in-barely-a-month-it-would-save-two-lives-photo_-news-corp-australia.jpg?mode=crop&width=675&height=379&quality=80&scale=both'),
(7, 'auotritetas', 'trumpesnis turinys', 'tiesiog turinys', '2021-01-28', 'ShortArticle', 'Futuristic Title', '2021-02-01 09:50:10', 'https://s2.15min.lt/images/photos/2019/05/26/original/gitanas-nauseda-su-zmona-diana-5ceafc7dcff19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(15) NOT NULL,
  `straipsnio_id` int(10) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `straipsnio_id`, `link`) VALUES
(1, 1, 'https://images.ctfassets.net/hrltx12pl8hq/4plHDVeTkWuFMihxQnzBSb/aea2f06d675c3d710d095306e377382f/shutterstock_554314555_copy.jpg'),
(2, 1, 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg'),
(3, 1, 'https://www.searchenginejournal.com/wp-content/uploads/2018/10/How-to-Boost-Your-Images%E2%80%99-Visibility-on-Google-Images-760x400.png'),
(4, 2, 'https://media3.s-nbcnews.com/j/newscms/2019_41/3047866/191010-japan-stalker-mc-1121_06b4c20bbf96a51dc8663f334404a899.fit-760w.JPG'),
(5, 2, 'https://www.freedigitalphotos.net/images/img/homepage/394230.jpg'),
(6, 2, 'https://image.shutterstock.com/image-photo/ancient-temple-ruins-gadi-sagar-260nw-786126286.jpg'),
(7, 2, 'https://p.bigstockphoto.com/GeFvQkBbSLaMdpKXF1Zv_bigstock-Aerial-View-Of-Blue-Lakes-And--227291596.jpg'),
(8, 3, 'https://s23527.pcdn.co/wp-content/uploads/2020/01/100k-moon.jpg.optimal.jpg'),
(9, 3, 'https://static.toiimg.com/photo/msid-67868104/67868104.jpg?1368689'),
(10, 3, 'https://www.nhm.ac.uk/content/dam/nhmwww/discover/wpy-2020-winning-images/wpy-winning-image-full-width.jpg'),
(11, 3, 'https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg'),
(12, 3, 'https://killerattitudestatus.in/wp-content/uploads/2019/12/gud-night-images.jpg'),
(13, 4, 'https://www.w3schools.com/w3css/img_lights.jpg'),
(16, 6, 'https://static.toiimg.com/thumb/msid-66476517,imgsize-196276,width-800,height-600,resizemode-75/66476517.jpg'),
(17, 6, 'https://images.ctfassets.net/hrltx12pl8hq/1zlEl4XHkxeDuukJUJyQ7Y/a149a908727e2084d503dc103a620d7f/lohp-image-img-3.jpg?fit=fill&w=480&h=270'),
(18, 6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiT9E-DFBokH8-idRbxYheI-3Bjutkry8_Uw&usqp=CAU'),
(19, 7, 'https://researchdigest.files.wordpress.com/2020/10/gettyimages-923494284.jpg?w=788'),
(20, 7, 'https://www.w3schools.com/howto/img_snow.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentarai`
--

CREATE TABLE `komentarai` (
  `id` int(15) NOT NULL,
  `turinys` text NOT NULL,
  `straipsnio_id` int(11) NOT NULL,
  `vartotojo_vardas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentarai`
--

INSERT INTO `komentarai` (`id`, `turinys`, `straipsnio_id`, `vartotojo_vardas`) VALUES
(4, 'valio', 7, 'vart2');

-- --------------------------------------------------------

--
-- Table structure for table `straipsniai_temos`
--

CREATE TABLE `straipsniai_temos` (
  `straipsnio_id` int(11) NOT NULL,
  `temos_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `straipsniai_temos`
--

INSERT INTO `straipsniai_temos` (`straipsnio_id`, `temos_id`) VALUES
(7, 1),
(7, 3),
(7, 4),
(1, 2),
(1, 5),
(2, 4),
(2, 1),
(2, 3),
(2, 6),
(3, 3),
(4, 2),
(4, 3),
(4, 6),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `temos`
--

CREATE TABLE `temos` (
  `id` int(15) NOT NULL,
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
  `id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `slaptazodis` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`id`, `username`, `vardas`, `pavarde`, `slaptazodis`, `role`) VALUES
(1, 'auotritetas', 'Petras', 'Kazlauskas', 'vart1', 'autorius'),
(2, 'vart2', 'Ponas', 'Bynas', 'vart2', 'standartinis_vartotojas'),
(3, 'vart3', 'Milda', 'Varnaite', 'vart3', 'administratorius');

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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `komentarai`
--
ALTER TABLE `komentarai`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temos`
--
ALTER TABLE `temos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vartotojai`
--
ALTER TABLE `vartotojai`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `komentarai_ibfk_1` FOREIGN KEY (`straipsnio_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarai_ibfk_2` FOREIGN KEY (`vartotojo_vardas`) REFERENCES `vartotojai` (`username`);

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
