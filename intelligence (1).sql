-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-03-10 05:54:51
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `intelligence`
--
CREATE DATABASE IF NOT EXISTS `intelligence` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `intelligence`;

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `L_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `L_t_id` int(11) NOT NULL,
  `L_c_id` bigint(20) NOT NULL,
  `L_u_id` bigint(20) NOT NULL,
  `L_name` varchar(50) NOT NULL,
  `L_content` text NOT NULL,
  `L_stat` int(11) NOT NULL,
  `L_date` timestamp NOT NULL,
  `L_note` text NOT NULL,
  PRIMARY KEY (`L_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- 表的结构 `newcase`
--

CREATE TABLE IF NOT EXISTS `newcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `c_content` text NOT NULL,
  `c_state` int(5) NOT NULL,
  `c_class` int(11) NOT NULL,
  `c_date` timestamp NOT NULL,
  `c_note` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_name` varchar(50) NOT NULL,
  `n_content` text NOT NULL,
  `n_class` int(11) NOT NULL,
  `n_date` timestamp NOT NULL,
  `n_note` text NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `are` varchar(20) NOT NULL,
  `priority` int(5) NOT NULL,
  `class` int(11) NOT NULL,
  `note` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
