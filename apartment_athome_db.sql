-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 06:31 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment_athome_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) UNSIGNED NOT NULL,
  `display_id` int(10) NOT NULL,
  `id_member` varchar(255) NOT NULL,
  `date_booking` varchar(50) NOT NULL,
  `time_booking` time NOT NULL,
  `time_booking2` time NOT NULL,
  `book_type_time` varchar(10) NOT NULL COMMENT 'ราคาห้อง',
  `member_status` int(5) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `slips_img` varchar(255) NOT NULL,
  `check_out` varchar(50) NOT NULL,
  `time_checkout` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `display_id`, `id_member`, `date_booking`, `time_booking`, `time_booking2`, `book_type_time`, `member_status`, `comment`, `slips_img`, `check_out`, `time_checkout`) VALUES
(11445, 11357, '11403', '2022-04-18', '00:00:00', '00:00:00', '8000', 1, '', '0', '2022-04-20', '');

-- --------------------------------------------------------

--
-- Table structure for table `display`
--

CREATE TABLE `display` (
  `display_id` int(11) NOT NULL,
  `display_fulltime_price` int(10) NOT NULL,
  `display_img` varchar(100) NOT NULL,
  `display_detail` text NOT NULL,
  `display_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `display`
--

INSERT INTO `display` (`display_id`, `display_fulltime_price`, `display_img`, `display_detail`, `display_name`) VALUES
(11356, 5000, '95885669_10157522130613472_8068372571235549184_n.jpg', '', 'ห้อง Studio 28ตรม'),
(11361, 5000, 'happy-new-year-2022-fireworks-gif-image.gif', '<p>fdsf</p>\r\n', 'วงศ์วิสิฎฐ์'),
(11357, 4000, 'hbxmn9lqw0sf6awduwmc.jpg', '<p><img alt=\"\" src=\"https://scdn.hongpak.in.th/media/rooms/photos/19/0602/171107_6700.jpeg\" style=\"height:562px; width:750px\" /></p>\r\n', 'วงศ์วิสิฎฐ์'),
(11358, 2500, 'b80fb54cc34640c633b003422d08e1f1.jpg', '<p>gdfg</p>\r\n', 'fgfd'),
(11359, 2200, 'ipd-5.jpg', '<p>fdsfdsf</p>\r\n', 'วงศ์วิสิฎฐ์'),
(11360, 3500, 'S__2515022.jpg', '<p>3500</p>\r\n', 'ศิริภัสสรเฮ้าส์');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `type_member` int(5) NOT NULL,
  `name_member` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `lastname_member` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Username_member` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Password_member` int(50) NOT NULL,
  `date_member` datetime NOT NULL,
  `email_member` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `address_member` text CHARACTER SET utf8mb4 NOT NULL,
  `phone_member` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `type_member`, `name_member`, `lastname_member`, `Username_member`, `Password_member`, `date_member`, `email_member`, `address_member`, `phone_member`) VALUES
(11370, 1, 'กรณ์ดนัย', 'ffff', 'admin', 1, '2018-11-09 08:48:00', 'korndani999@gmail.com', 'mmm ggg   ', '038-694492เเเเ'),
(11402, 0, 'progrcc', 'hghfg', 'pro', 1, '0000-00-00 00:00:00', 'hhgfhgf', 'ghjfgjhfghjfghgf ', 'gfhfg'),
(11403, 0, 'pro', 'dfgdf', 'test', 1, '0000-00-00 00:00:00', 'gfdgdf', 'gfgdg ', 'gdfgdf');

-- --------------------------------------------------------

--
-- Table structure for table `type_member`
--

CREATE TABLE `type_member` (
  `type_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_member`
--

INSERT INTO `type_member` (`type_id`, `id`, `name`) VALUES
(1, 1, 'admin'),
(2, 0, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`display_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `type_member`
--
ALTER TABLE `type_member`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11446;

--
-- AUTO_INCREMENT for table `display`
--
ALTER TABLE `display`
  MODIFY `display_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11363;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11404;

--
-- AUTO_INCREMENT for table `type_member`
--
ALTER TABLE `type_member`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
