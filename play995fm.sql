-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 10:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `play995fm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registered_date` datetime NOT NULL,
  `registered_by` varchar(20) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `registered_date`, `registered_by`, `group_id`) VALUES
(1, 'admin', '$2y$10$c2soZ2kySXYwczModm1Lcu7LFL2jp6Opi/D2qP0yQJO5Ej87vBvM6', '2016-01-28 13:40:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id` int(11) NOT NULL,
  `display_img` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `content_img` varchar(150) NOT NULL,
  `content_vid` varchar(150) NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive; (I)nactive; (R)emoved',
  `date_added` datetime NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `display_img`, `name`, `description`, `content_img`, `content_vid`, `status`, `date_added`, `added_by`, `date_updated`, `updated_by`) VALUES
(1, 'a7270dc2ee85fd10074f3be4496f29ef.png', 'Coca Cola', 'Always Coca Cola.', '42f7d25f572f47839317ac25fe9f15f9.png', '', 'A', '2016-02-16 07:06:07', 'admin', '2016-02-19 07:28:12', 'admin'),
(2, '70712684833c90583af2193b9903707f.png', 'Radio Sandstorm', 'Radio Sandstorm', '5fa5d5d7938ecfdc12a2a216cdf75eb2.png', '', 'A', '2016-02-19 04:10:36', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countdown`
--

CREATE TABLE IF NOT EXISTS `countdown` (
`id` int(11) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive; (I)nactive; (R)emoved',
  `date_added` datetime NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countdown`
--

INSERT INTO `countdown` (`id`, `content`, `status`, `date_added`, `added_by`, `date_updated`, `updated_by`, `date_end`) VALUES
(1, '01. ROADS - Lawson<br>02. I''M IN LOVE WITH A MONSTER - Fifth Harmony<br>03. WHAT DO YOU MEAN - Justni Bieber<br>04. VERGE - Owl City & Aloe Blace<br>05. RUMORS - Jake Miller<br>06. HAIR - Little Mix<br>07. UNBELIEVABLE - Owl City ft. Hamson<br>08. LOCKED AWAY - R. City ft. Adam Levine<br>09. WHIP IT - Lunchmoney Lewis<br>10. SAME OLD LOVE - Selena Gomez', 'A', '2016-02-22 02:56:48', 'admin', '2016-03-01 06:49:32', 'admin', '2016-04-01'),
(2, 'asdasdasd<br>asdadasdasd<br>asdsd<br>asdasd', 'R', '2016-02-22 03:34:47', 'admin', '2016-02-22 03:40:22', NULL, '2016-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive; (I)nactive; (R)emoved',
  `date_added` datetime NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `filename`, `description`, `status`, `date_added`, `added_by`, `date_updated`, `updated_by`, `date_end`) VALUES
(1, 'a2d4d97113483807a4f31846f4c88b90.png', 'Radio Sandstorm', 'A', '2016-02-02 08:35:31', 'admin', NULL, NULL, '2016-02-04'),
(2, '8a5ed92fdef02162853589485c4499a4.png', 'Summa Palooza', 'A', '2016-02-02 08:38:03', 'admin', '2016-02-03 06:49:40', 'admin', '2016-02-05'),
(3, 'd6f0321d31db6443b9b5ca7323b8e3ae.png', 'Coca Cola', 'A', '2016-02-02 11:20:02', 'admin', '2016-02-15 03:19:38', 'admin', '2016-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
`id` int(11) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive; (I)nactive; (R)emoved',
  `date_added` datetime NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `filename`, `description`, `status`, `date_added`, `added_by`, `date_updated`, `updated_by`) VALUES
(1, '5360cc45bb93a4f5e36f5b35b3d09074.png', 'Weekdays Program Schedules', 'A', '2016-02-03 06:24:41', 'admin', '2016-02-03 06:49:23', 'admin'),
(2, 'cdb760064729e7313654b0814f84d1ac.png', 'Weekend Program Schedules', 'A', '2016-02-03 06:25:27', 'admin', '2016-02-03 06:31:49', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stationinfo`
--

CREATE TABLE IF NOT EXISTS `stationinfo` (
`id` int(11) NOT NULL,
  `classification` char(1) NOT NULL COMMENT '(P)rofile; (C)ontact',
  `filename` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive; (I)nactive; (R)emoved',
  `date_added` datetime NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stationinfo`
--

INSERT INTO `stationinfo` (`id`, `classification`, `filename`, `description`, `status`, `date_added`, `added_by`, `date_updated`, `updated_by`) VALUES
(1, 'P', '52b62c313e3d7a6ecca7a23fd8c66d19.png', 'Profile', 'A', '2016-02-18 12:17:24', 'admin', '2016-03-01 03:45:44', 'admin'),
(2, 'C', '0110d3e3937b2d70643e41ed0b476fa0.png', 'Contact 1', 'A', '2016-02-18 12:22:42', 'admin', NULL, NULL),
(3, 'P', '9f2c16a7922e059624845bf4981a7b5c.png', 'Survey 1', 'A', '2016-02-19 04:22:12', 'admin', NULL, NULL),
(4, 'P', '4c041fbbf7c140bec329f3ed26e324e1.png', 'Survey 2', 'A', '2016-02-19 04:22:32', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stationslides`
--

CREATE TABLE IF NOT EXISTS `stationslides` (
`id` int(11) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive; (I)nactive; (R)emoved',
  `date_added` datetime NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stationslides`
--

INSERT INTO `stationslides` (`id`, `filename`, `description`, `status`, `date_added`, `added_by`, `date_updated`, `updated_by`) VALUES
(1, '7367047eb23851bb55e0021d932b2e41.png', '1ST THING IN THE MORNING with SONNYB, MIKE & KATZ', 'A', '2016-01-29 08:49:44', 'admin', '2016-02-03 07:52:33', 'admin'),
(2, '0cdd85b15f350576b649e1b4f42c999a.png', 'BONUS STAGE', 'A', '2016-01-29 08:51:58', 'admin', NULL, NULL),
(3, '739e5de16aac23898ef6a3ce5c1f14a1.png', 'CAR POOL CLUB', 'A', '2016-01-29 08:54:40', 'admin', NULL, NULL),
(4, '0f74596adea0836279af4a540cc22c25.png', 'CLUB PLAY', 'A', '2016-01-29 08:55:15', 'admin', NULL, NULL),
(5, 'fe4985d13e9ff957f6a2e7e22777dd01.png', 'COUNTING SHEEP', 'A', '2016-01-29 08:55:46', 'admin', NULL, NULL),
(6, 'c0b82118bb63e257b75ad5a2becc5ad1.png', 'HOMERUN', 'A', '2016-01-29 08:56:09', 'admin', NULL, NULL),
(7, '837380964c0f904fcb1da7a97b11bb57.png', 'MID MORNING HIGH', 'A', '2016-01-29 08:56:36', 'admin', NULL, NULL),
(8, '3c371bb5df2ab69c5bdad47bdf69c50c.png', 'ON THE GO SHOW', 'A', '2016-01-29 08:56:58', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countdown`
--
ALTER TABLE `countdown`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stationinfo`
--
ALTER TABLE `stationinfo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stationslides`
--
ALTER TABLE `stationslides`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countdown`
--
ALTER TABLE `countdown`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stationinfo`
--
ALTER TABLE `stationinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stationslides`
--
ALTER TABLE `stationslides`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
