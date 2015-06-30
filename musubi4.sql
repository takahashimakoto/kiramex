-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 6 月 25 日 09:37
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musubi`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `deal_id` smallint(5) unsigned NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `deals`
--

INSERT INTO `deals` (`deal_id`, `user_name`, `address`) VALUES
(1, '', ''),
(2, '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `detail_id` smallint(5) unsigned NOT NULL,
  `item_id` smallint(5) unsigned NOT NULL,
  `item_num` smallint(5) unsigned NOT NULL,
  `rice_id` smallint(5) unsigned NOT NULL,
  `nori_id` smallint(5) unsigned NOT NULL,
  `deal_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` smallint(5) unsigned NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `image`, `price`) VALUES
(1, '明太子', 'ONIGIRI_01.jpg', 150),
(2, 'シーチキン', 'ONIGIRI_02.jpg', 100),
(3, '梅', 'ONIGIRI_03.jpg', 120),
(4, 'おかか', 'ONIGIRI_04.jpg', 110);

-- --------------------------------------------------------

--
-- テーブルの構造 `noris`
--

CREATE TABLE IF NOT EXISTS `noris` (
  `nori_id` smallint(5) unsigned NOT NULL,
  `nori_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `noris`
--

INSERT INTO `noris` (`nori_id`, `nori_name`) VALUES
(3, '焼きのり'),
(4, '味付けのり'),
(5, '韓国のり'),
(6, 'すんごいのり');

-- --------------------------------------------------------

--
-- テーブルの構造 `rices`
--

CREATE TABLE IF NOT EXISTS `rices` (
  `rice_id` smallint(5) unsigned NOT NULL,
  `rice_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `rices`
--

INSERT INTO `rices` (`rice_id`, `rice_name`) VALUES
(1, '白米'),
(2, '玄米'),
(3, '五穀米'),
(4, 'タイ米');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `noris`
--
ALTER TABLE `noris`
  ADD PRIMARY KEY (`nori_id`);

--
-- Indexes for table `rices`
--
ALTER TABLE `rices`
  ADD PRIMARY KEY (`rice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deal_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `detail_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `noris`
--
ALTER TABLE `noris`
  MODIFY `nori_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rices`
--
ALTER TABLE `rices`
  MODIFY `rice_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

