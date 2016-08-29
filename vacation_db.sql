-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 04:56 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vacation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(20) NOT NULL DEFAULT '0',
  `the_date` date NOT NULL DEFAULT '0000-00-00',
  `id_state` int(11) NOT NULL DEFAULT '0',
  `id_booking` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_item` (`id_item`),
  KEY `id_state` (`id_state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `id_item`, `the_date`, `id_state`, `id_booking`) VALUES
(1, 2, '2014-08-12', 1, 0),
(2, 2, '2014-08-27', 1, 0),
(3, 8, '2014-07-01', 1, 0),
(4, 8, '2014-07-02', 1, 0),
(5, 8, '2014-07-03', 1, 0),
(6, 8, '2014-07-24', 1, 0),
(7, 8, '2014-07-25', 1, 0),
(8, 8, '2014-07-26', 1, 0),
(9, 8, '2014-07-27', 1, 0),
(10, 8, '2014-07-28', 1, 0),
(11, 8, '2014-07-29', 1, 0),
(12, 8, '2014-07-30', 1, 0),
(13, 8, '2014-07-31', 1, 0),
(14, 23, '2014-09-02', 1, 0),
(15, 23, '2014-09-03', 1, 0),
(16, 23, '2014-09-04', 1, 0),
(17, 23, '2014-09-05', 1, 0),
(18, 23, '2014-09-06', 1, 0),
(19, 23, '2014-09-07', 1, 0),
(20, 23, '2014-09-08', 1, 0),
(21, 23, '2014-09-09', 1, 0),
(22, 23, '2014-09-10', 1, 0),
(23, 23, '2014-09-11', 1, 0),
(24, 23, '2014-09-12', 1, 0),
(25, 23, '2014-09-13', 1, 0),
(26, 23, '2014-09-14', 1, 0),
(27, 23, '2014-09-15', 1, 0),
(28, 23, '2014-09-16', 1, 0),
(29, 23, '2014-09-17', 1, 0),
(30, 23, '2014-09-18', 1, 0),
(31, 23, '2014-09-19', 1, 0),
(32, 23, '2014-09-20', 1, 0),
(33, 23, '2014-09-21', 1, 0),
(34, 23, '2014-09-22', 1, 0),
(35, 23, '2014-09-23', 1, 0),
(36, 23, '2014-09-24', 1, 0),
(37, 1, '2014-09-11', 1, 0),
(38, 1, '2014-09-12', 1, 0),
(39, 23, '2014-09-30', 1, 0),
(40, 23, '2014-10-01', 1, 0),
(41, 2, '2014-09-25', 1, 0),
(42, 2, '2014-09-26', 1, 0),
(43, 2, '2014-09-24', 1, 0),
(44, 2, '2014-09-25', 1, 0),
(45, 2, '2014-09-16', 1, 0),
(46, 2, '2014-09-17', 1, 0),
(47, 2, '2014-09-19', 1, 0),
(48, 2, '2014-09-20', 1, 0),
(49, 2, '2014-09-21', 1, 0),
(50, 2, '2014-09-10', 1, 0),
(51, 2, '2014-09-11', 1, 0),
(52, 2, '2014-09-12', 1, 0),
(53, 2, '2014-09-27', 1, 0),
(54, 2, '2014-09-28', 1, 0),
(55, 2, '2014-09-29', 1, 0),
(56, 2, '2014-09-30', 1, 0),
(57, 1, '2014-09-17', 1, 0),
(58, 1, '2014-09-18', 1, 0),
(59, 1, '2014-09-19', 1, 0),
(60, 1, '2014-09-20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_admin_users`
--

CREATE TABLE IF NOT EXISTS `bookings_admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` tinyint(1) NOT NULL DEFAULT '2',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `date_visit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bookings_admin_users`
--

INSERT INTO `bookings_admin_users` (`id`, `level`, `username`, `password`, `state`, `date_visit`, `visits`) VALUES
(1, 1, 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, '2014-07-07 01:51:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_config`
--

CREATE TABLE IF NOT EXISTS `bookings_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `num_months` tinyint(3) NOT NULL DEFAULT '3',
  `default_lang` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `theme` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `start_day` enum('mon','sun') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sun',
  `date_format` enum('us','eu') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'eu',
  `click_past_dates` enum('on','off') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'off',
  `cal_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `local_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/calendar',
  `version` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bookings_config`
--

INSERT INTO `bookings_config` (`id`, `title`, `num_months`, `default_lang`, `theme`, `start_day`, `date_format`, `click_past_dates`, `cal_url`, `local_path`, `version`) VALUES
(1, 'Availability Calendar', 6, 'en', 'default', 'sun', 'eu', 'off', '/property_calendar', '/calendar', 'v3.03.09');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_items`
--

CREATE TABLE IF NOT EXISTS `bookings_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '1',
  `id_ref_external` int(11) NOT NULL COMMENT 'link to external db table',
  `desc_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `desc_es` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `list_order` int(11) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_ref_external` (`id_ref_external`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1000052 ;

--
-- Dumping data for table `bookings_items`
--

INSERT INTO `bookings_items` (`id`, `id_user`, `id_ref_external`, `desc_en`, `desc_es`, `list_order`, `state`) VALUES
(1, 1, 0, 'Demo Item', 'Demo', 1, 1),
(2, 1, 0, 'Test', 'test', 0, 1),
(7, 1, 0, ' ', ' ', 0, 1),
(8, 1, 0, ' ', ' ', 0, 1),
(6, 1, 0, ' ', ' ', 0, 1),
(4, 1, 0, ' ', ' ', 0, 1),
(11, 1, 0, ' ', ' ', 0, 1),
(12, 1, 0, ' ', ' ', 0, 1),
(13, 1, 0, ' ', ' ', 0, 1),
(5, 1, 0, ' ', ' ', 0, 1),
(14, 1, 0, ' ', ' ', 0, 1),
(15, 1, 0, ' ', ' ', 0, 1),
(16, 1, 0, ' ', ' ', 0, 1),
(17, 1, 0, ' ', ' ', 0, 1),
(18, 1, 0, ' ', ' ', 0, 1),
(22, 1, 0, ' ', ' ', 0, 1),
(3, 1, 0, ' ', ' ', 0, 1),
(21, 1, 0, ' ', ' ', 0, 1),
(23, 1, 0, ' ', ' ', 0, 1),
(25, 1, 0, ' ', ' ', 0, 1),
(9, 1, 0, ' ', ' ', 0, 1),
(26, 1, 0, ' ', ' ', 0, 1),
(27, 1, 0, ' ', ' ', 0, 1),
(28, 1, 0, ' ', ' ', 0, 1),
(29, 1, 0, ' ', ' ', 0, 1),
(30, 1, 0, ' ', ' ', 0, 1),
(31, 1, 0, ' ', ' ', 0, 1),
(32, 1, 0, ' ', ' ', 0, 1),
(33, 1, 0, ' ', ' ', 0, 1),
(34, 1, 0, ' ', ' ', 0, 1),
(35, 1, 0, ' ', ' ', 0, 1),
(36, 1, 0, ' ', ' ', 0, 1),
(37, 1, 0, ' ', ' ', 0, 1),
(38, 1, 0, ' ', ' ', 0, 1),
(39, 1, 0, ' ', ' ', 0, 1),
(40, 1, 0, ' ', ' ', 0, 1),
(41, 1, 0, ' ', ' ', 0, 1),
(42, 1, 0, ' ', ' ', 0, 1),
(43, 1, 0, ' ', ' ', 0, 1),
(44, 1, 0, ' ', ' ', 0, 1),
(45, 1, 0, ' ', ' ', 0, 1),
(46, 1, 0, ' ', ' ', 0, 1),
(47, 1, 0, ' ', ' ', 0, 1),
(48, 1, 0, ' ', ' ', 0, 1),
(49, 1, 0, ' ', ' ', 0, 1),
(50, 1, 0, ' ', ' ', 0, 1),
(51, 1, 0, ' ', ' ', 0, 1),
(52, 1, 0, ' ', ' ', 0, 1),
(53, 1, 0, ' ', ' ', 0, 1),
(54, 1, 0, ' ', ' ', 0, 1),
(55, 1, 0, ' ', ' ', 0, 1),
(56, 1, 0, ' ', ' ', 0, 1),
(57, 1, 0, ' ', ' ', 0, 1),
(58, 1, 0, ' ', ' ', 0, 1),
(59, 1, 0, ' ', ' ', 0, 1),
(60, 1, 0, ' ', ' ', 0, 1),
(61, 1, 0, ' ', ' ', 0, 1),
(62, 1, 0, ' ', ' ', 0, 1),
(63, 1, 0, ' ', ' ', 0, 1),
(64, 1, 0, ' ', ' ', 0, 1),
(65, 1, 0, ' ', ' ', 0, 1),
(66, 1, 0, ' ', ' ', 0, 1),
(67, 1, 0, ' ', ' ', 0, 1),
(68, 1, 0, ' ', ' ', 0, 1),
(69, 1, 0, ' ', ' ', 0, 1),
(70, 1, 0, ' ', ' ', 0, 1),
(71, 1, 0, ' ', ' ', 0, 1),
(72, 1, 0, ' ', ' ', 0, 1),
(73, 1, 0, ' ', ' ', 0, 1),
(74, 1, 0, ' ', ' ', 0, 1),
(75, 1, 0, ' ', ' ', 0, 1),
(76, 1, 0, ' ', ' ', 0, 1),
(77, 1, 0, ' ', ' ', 0, 1),
(78, 1, 0, ' ', ' ', 0, 1),
(79, 1, 0, ' ', ' ', 0, 1),
(80, 1, 0, ' ', ' ', 0, 1),
(81, 1, 0, ' ', ' ', 0, 1),
(82, 1, 0, ' ', ' ', 0, 1),
(83, 1, 0, ' ', ' ', 0, 1),
(84, 1, 0, ' ', ' ', 0, 1),
(85, 1, 0, ' ', ' ', 0, 1),
(86, 1, 0, ' ', ' ', 0, 1),
(87, 1, 0, ' ', ' ', 0, 1),
(88, 1, 0, ' ', ' ', 0, 1),
(89, 1, 0, ' ', ' ', 0, 1),
(90, 1, 0, ' ', ' ', 0, 1),
(91, 1, 0, ' ', ' ', 0, 1),
(92, 1, 0, ' ', ' ', 0, 1),
(93, 1, 0, ' ', ' ', 0, 1),
(94, 1, 0, ' ', ' ', 0, 1),
(95, 1, 0, ' ', ' ', 0, 1),
(96, 1, 0, ' ', ' ', 0, 1),
(97, 1, 0, ' ', ' ', 0, 1),
(98, 1, 0, ' ', ' ', 0, 1),
(99, 1, 0, ' ', ' ', 0, 1),
(100, 1, 0, ' ', ' ', 0, 1),
(101, 1, 0, ' ', ' ', 0, 1),
(102, 1, 0, ' ', ' ', 0, 1),
(103, 1, 0, ' ', ' ', 0, 1),
(104, 1, 0, ' ', ' ', 0, 1),
(105, 1, 0, ' ', ' ', 0, 1),
(106, 1, 0, ' ', ' ', 0, 1),
(107, 1, 0, ' ', ' ', 0, 1),
(108, 1, 0, ' ', ' ', 0, 1),
(109, 1, 0, ' ', ' ', 0, 1),
(110, 1, 0, ' ', ' ', 0, 1),
(111, 1, 0, ' ', ' ', 0, 1),
(112, 1, 0, ' ', ' ', 0, 1),
(113, 1, 0, ' ', ' ', 0, 1),
(114, 1, 0, ' ', ' ', 0, 1),
(115, 1, 0, ' ', ' ', 0, 1),
(116, 1, 0, ' ', ' ', 0, 1),
(117, 1, 0, ' ', ' ', 0, 1),
(118, 1, 0, ' ', ' ', 0, 1),
(119, 1, 0, ' ', ' ', 0, 1),
(120, 1, 0, ' ', ' ', 0, 1),
(121, 1, 0, ' ', ' ', 0, 1),
(122, 1, 0, ' ', ' ', 0, 1),
(123, 1, 0, ' ', ' ', 0, 1),
(124, 1, 0, ' ', ' ', 0, 1),
(125, 1, 0, ' ', ' ', 0, 1),
(126, 1, 0, ' ', ' ', 0, 1),
(127, 1, 0, ' ', ' ', 0, 1),
(128, 1, 0, ' ', ' ', 0, 1),
(129, 1, 0, ' ', ' ', 0, 1),
(130, 1, 0, ' ', ' ', 0, 1),
(131, 1, 0, ' ', ' ', 0, 1),
(132, 1, 0, ' ', ' ', 0, 1),
(133, 1, 0, ' ', ' ', 0, 1),
(134, 1, 0, ' ', ' ', 0, 1),
(135, 1, 0, ' ', ' ', 0, 1),
(136, 1, 0, ' ', ' ', 0, 1),
(137, 1, 0, ' ', ' ', 0, 1),
(138, 1, 0, ' ', ' ', 0, 1),
(139, 1, 0, ' ', ' ', 0, 1),
(140, 1, 0, ' ', ' ', 0, 1),
(141, 1, 0, ' ', ' ', 0, 1),
(142, 1, 0, ' ', ' ', 0, 1),
(143, 1, 0, ' ', ' ', 0, 1),
(144, 1, 0, ' ', ' ', 0, 1),
(145, 1, 0, ' ', ' ', 0, 1),
(146, 1, 0, ' ', ' ', 0, 1),
(147, 1, 0, ' ', ' ', 0, 1),
(148, 1, 0, ' ', ' ', 0, 1),
(149, 1, 0, ' ', ' ', 0, 1),
(150, 1, 0, ' ', ' ', 0, 1),
(151, 1, 0, ' ', ' ', 0, 1),
(152, 1, 0, ' ', ' ', 0, 1),
(153, 1, 0, ' ', ' ', 0, 1),
(154, 1, 0, ' ', ' ', 0, 1),
(155, 1, 0, ' ', ' ', 0, 1),
(156, 1, 0, ' ', ' ', 0, 1),
(157, 1, 0, ' ', ' ', 0, 1),
(158, 1, 0, ' ', ' ', 0, 1),
(159, 1, 0, ' ', ' ', 0, 1),
(160, 1, 0, ' ', ' ', 0, 1),
(161, 1, 0, ' ', ' ', 0, 1),
(162, 1, 0, ' ', ' ', 0, 1),
(163, 1, 0, ' ', ' ', 0, 1),
(164, 1, 0, ' ', ' ', 0, 1),
(165, 1, 0, ' ', ' ', 0, 1),
(166, 1, 0, ' ', ' ', 0, 1),
(167, 1, 0, ' ', ' ', 0, 1),
(168, 1, 0, ' ', ' ', 0, 1),
(169, 1, 0, ' ', ' ', 0, 1),
(170, 1, 0, ' ', ' ', 0, 1),
(171, 1, 0, ' ', ' ', 0, 1),
(172, 1, 0, ' ', ' ', 0, 1),
(173, 1, 0, ' ', ' ', 0, 1),
(174, 1, 0, ' ', ' ', 0, 1),
(175, 1, 0, ' ', ' ', 0, 1),
(176, 1, 0, ' ', ' ', 0, 1),
(177, 1, 0, ' ', ' ', 0, 1),
(178, 1, 0, ' ', ' ', 0, 1),
(179, 1, 0, ' ', ' ', 0, 1),
(180, 1, 0, ' ', ' ', 0, 1),
(181, 1, 0, ' ', ' ', 0, 1),
(182, 1, 0, ' ', ' ', 0, 1),
(183, 1, 0, ' ', ' ', 0, 1),
(184, 1, 0, ' ', ' ', 0, 1),
(185, 1, 0, ' ', ' ', 0, 1),
(186, 1, 0, ' ', ' ', 0, 1),
(187, 1, 0, ' ', ' ', 0, 1),
(188, 1, 0, ' ', ' ', 0, 1),
(189, 1, 0, ' ', ' ', 0, 1),
(190, 1, 0, ' ', ' ', 0, 1),
(191, 1, 0, ' ', ' ', 0, 1),
(192, 1, 0, ' ', ' ', 0, 1),
(193, 1, 0, ' ', ' ', 0, 1),
(194, 1, 0, ' ', ' ', 0, 1),
(195, 1, 0, ' ', ' ', 0, 1),
(196, 1, 0, ' ', ' ', 0, 1),
(197, 1, 0, ' ', ' ', 0, 1),
(198, 1, 0, ' ', ' ', 0, 1),
(199, 1, 0, ' ', ' ', 0, 1),
(200, 1, 0, ' ', ' ', 0, 1),
(201, 1, 0, ' ', ' ', 0, 1),
(202, 1, 0, ' ', ' ', 0, 1),
(203, 1, 0, ' ', ' ', 0, 1),
(204, 1, 0, ' ', ' ', 0, 1),
(205, 1, 0, ' ', ' ', 0, 1),
(206, 1, 0, ' ', ' ', 0, 1),
(207, 1, 0, ' ', ' ', 0, 1),
(208, 1, 0, ' ', ' ', 0, 1),
(209, 1, 0, ' ', ' ', 0, 1),
(210, 1, 0, ' ', ' ', 0, 1),
(211, 1, 0, ' ', ' ', 0, 1),
(212, 1, 0, ' ', ' ', 0, 1),
(213, 1, 0, ' ', ' ', 0, 1),
(214, 1, 0, ' ', ' ', 0, 1),
(215, 1, 0, ' ', ' ', 0, 1),
(216, 1, 0, ' ', ' ', 0, 1),
(217, 1, 0, ' ', ' ', 0, 1),
(218, 1, 0, ' ', ' ', 0, 1),
(219, 1, 0, ' ', ' ', 0, 1),
(220, 1, 0, ' ', ' ', 0, 1),
(221, 1, 0, ' ', ' ', 0, 1),
(222, 1, 0, ' ', ' ', 0, 1),
(223, 1, 0, ' ', ' ', 0, 1),
(224, 1, 0, ' ', ' ', 0, 1),
(225, 1, 0, ' ', ' ', 0, 1),
(226, 1, 0, ' ', ' ', 0, 1),
(227, 1, 0, ' ', ' ', 0, 1),
(228, 1, 0, ' ', ' ', 0, 1),
(229, 1, 0, ' ', ' ', 0, 1),
(230, 1, 0, ' ', ' ', 0, 1),
(231, 1, 0, ' ', ' ', 0, 1),
(232, 1, 0, ' ', ' ', 0, 1),
(233, 1, 0, ' ', ' ', 0, 1),
(234, 1, 0, ' ', ' ', 0, 1),
(235, 1, 0, ' ', ' ', 0, 1),
(236, 1, 0, ' ', ' ', 0, 1),
(237, 1, 0, ' ', ' ', 0, 1),
(238, 1, 0, ' ', ' ', 0, 1),
(239, 1, 0, ' ', ' ', 0, 1),
(240, 1, 0, ' ', ' ', 0, 1),
(241, 1, 0, ' ', ' ', 0, 1),
(242, 1, 0, ' ', ' ', 0, 1),
(243, 1, 0, ' ', ' ', 0, 1),
(244, 1, 0, ' ', ' ', 0, 1),
(245, 1, 0, ' ', ' ', 0, 1),
(246, 1, 0, ' ', ' ', 0, 1),
(247, 1, 0, ' ', ' ', 0, 1),
(248, 1, 0, ' ', ' ', 0, 1),
(249, 1, 0, ' ', ' ', 0, 1),
(250, 1, 0, ' ', ' ', 0, 1),
(251, 1, 0, ' ', ' ', 0, 1),
(252, 1, 0, ' ', ' ', 0, 1),
(253, 1, 0, ' ', ' ', 0, 1),
(254, 1, 0, ' ', ' ', 0, 1),
(255, 1, 0, ' ', ' ', 0, 1),
(256, 1, 0, ' ', ' ', 0, 1),
(257, 1, 0, ' ', ' ', 0, 1),
(258, 1, 0, ' ', ' ', 0, 1),
(259, 1, 0, ' ', ' ', 0, 1),
(260, 1, 0, ' ', ' ', 0, 1),
(261, 1, 0, ' ', ' ', 0, 1),
(262, 1, 0, ' ', ' ', 0, 1),
(263, 1, 0, ' ', ' ', 0, 1),
(264, 1, 0, ' ', ' ', 0, 1),
(265, 1, 0, ' ', ' ', 0, 1),
(266, 1, 0, ' ', ' ', 0, 1),
(267, 1, 0, ' ', ' ', 0, 1),
(268, 1, 0, ' ', ' ', 0, 1),
(269, 1, 0, ' ', ' ', 0, 1),
(270, 1, 0, ' ', ' ', 0, 1),
(271, 1, 0, ' ', ' ', 0, 1),
(272, 1, 0, ' ', ' ', 0, 1),
(273, 1, 0, ' ', ' ', 0, 1),
(274, 1, 0, ' ', ' ', 0, 1),
(275, 1, 0, ' ', ' ', 0, 1),
(276, 1, 0, ' ', ' ', 0, 1),
(277, 1, 0, ' ', ' ', 0, 1),
(278, 1, 0, ' ', ' ', 0, 1),
(279, 1, 0, ' ', ' ', 0, 1),
(280, 1, 0, ' ', ' ', 0, 1),
(281, 1, 0, ' ', ' ', 0, 1),
(282, 1, 0, ' ', ' ', 0, 1),
(283, 1, 0, ' ', ' ', 0, 1),
(284, 1, 0, ' ', ' ', 0, 1),
(285, 1, 0, ' ', ' ', 0, 1),
(286, 1, 0, ' ', ' ', 0, 1),
(287, 1, 0, ' ', ' ', 0, 1),
(288, 1, 0, ' ', ' ', 0, 1),
(289, 1, 0, ' ', ' ', 0, 1),
(290, 1, 0, ' ', ' ', 0, 1),
(291, 1, 0, ' ', ' ', 0, 1),
(292, 1, 0, ' ', ' ', 0, 1),
(293, 1, 0, ' ', ' ', 0, 1),
(294, 1, 0, ' ', ' ', 0, 1),
(295, 1, 0, ' ', ' ', 0, 1),
(296, 1, 0, ' ', ' ', 0, 1),
(297, 1, 0, ' ', ' ', 0, 1),
(298, 1, 0, ' ', ' ', 0, 1),
(299, 1, 0, ' ', ' ', 0, 1),
(300, 1, 0, ' ', ' ', 0, 1),
(301, 1, 0, ' ', ' ', 0, 1),
(302, 1, 0, ' ', ' ', 0, 1),
(303, 1, 0, ' ', ' ', 0, 1),
(304, 1, 0, ' ', ' ', 0, 1),
(305, 1, 0, ' ', ' ', 0, 1),
(306, 1, 0, ' ', ' ', 0, 1),
(307, 1, 0, ' ', ' ', 0, 1),
(308, 1, 0, ' ', ' ', 0, 1),
(309, 1, 0, ' ', ' ', 0, 1),
(310, 1, 0, ' ', ' ', 0, 1),
(311, 1, 0, ' ', ' ', 0, 1),
(312, 1, 0, ' ', ' ', 0, 1),
(313, 1, 0, ' ', ' ', 0, 1),
(314, 1, 0, ' ', ' ', 0, 1),
(315, 1, 0, ' ', ' ', 0, 1),
(316, 1, 0, ' ', ' ', 0, 1),
(317, 1, 0, ' ', ' ', 0, 1),
(318, 1, 0, ' ', ' ', 0, 1),
(319, 1, 0, ' ', ' ', 0, 1),
(320, 1, 0, ' ', ' ', 0, 1),
(321, 1, 0, ' ', ' ', 0, 1),
(322, 1, 0, ' ', ' ', 0, 1),
(323, 1, 0, ' ', ' ', 0, 1),
(324, 1, 0, ' ', ' ', 0, 1),
(325, 1, 0, ' ', ' ', 0, 1),
(326, 1, 0, ' ', ' ', 0, 1),
(327, 1, 0, ' ', ' ', 0, 1),
(328, 1, 0, ' ', ' ', 0, 1),
(329, 1, 0, ' ', ' ', 0, 1),
(330, 1, 0, ' ', ' ', 0, 1),
(331, 1, 0, ' ', ' ', 0, 1),
(332, 1, 0, ' ', ' ', 0, 1),
(333, 1, 0, ' ', ' ', 0, 1),
(334, 1, 0, ' ', ' ', 0, 1),
(335, 1, 0, ' ', ' ', 0, 1),
(336, 1, 0, ' ', ' ', 0, 1),
(337, 1, 0, ' ', ' ', 0, 1),
(338, 1, 0, ' ', ' ', 0, 1),
(339, 1, 0, ' ', ' ', 0, 1),
(340, 1, 0, ' ', ' ', 0, 1),
(341, 1, 0, ' ', ' ', 0, 1),
(342, 1, 0, ' ', ' ', 0, 1),
(343, 1, 0, ' ', ' ', 0, 1),
(344, 1, 0, ' ', ' ', 0, 1),
(345, 1, 0, ' ', ' ', 0, 1),
(346, 1, 0, ' ', ' ', 0, 1),
(347, 1, 0, ' ', ' ', 0, 1),
(348, 1, 0, ' ', ' ', 0, 1),
(349, 1, 0, ' ', ' ', 0, 1),
(350, 1, 0, ' ', ' ', 0, 1),
(351, 1, 0, ' ', ' ', 0, 1),
(352, 1, 0, ' ', ' ', 0, 1),
(353, 1, 0, ' ', ' ', 0, 1),
(354, 1, 0, ' ', ' ', 0, 1),
(355, 1, 0, ' ', ' ', 0, 1),
(356, 1, 0, ' ', ' ', 0, 1),
(357, 1, 0, ' ', ' ', 0, 1),
(358, 1, 0, ' ', ' ', 0, 1),
(359, 1, 0, ' ', ' ', 0, 1),
(360, 1, 0, ' ', ' ', 0, 1),
(361, 1, 0, ' ', ' ', 0, 1),
(362, 1, 0, ' ', ' ', 0, 1),
(363, 1, 0, ' ', ' ', 0, 1),
(364, 1, 0, ' ', ' ', 0, 1),
(365, 1, 0, ' ', ' ', 0, 1),
(366, 1, 0, ' ', ' ', 0, 1),
(367, 1, 0, ' ', ' ', 0, 1),
(368, 1, 0, ' ', ' ', 0, 1),
(369, 1, 0, ' ', ' ', 0, 1),
(370, 1, 0, ' ', ' ', 0, 1),
(371, 1, 0, ' ', ' ', 0, 1),
(372, 1, 0, ' ', ' ', 0, 1),
(373, 1, 0, ' ', ' ', 0, 1),
(374, 1, 0, ' ', ' ', 0, 1),
(375, 1, 0, ' ', ' ', 0, 1),
(1000000, 1, 0, ' ', ' ', 0, 1),
(1000001, 1, 0, ' ', ' ', 0, 1),
(1000002, 1, 0, ' ', ' ', 0, 1),
(1000003, 1, 0, ' ', ' ', 0, 1),
(1000004, 1, 0, ' ', ' ', 0, 1),
(1000005, 1, 0, ' ', ' ', 0, 1),
(1000006, 1, 0, ' ', ' ', 0, 1),
(1000007, 1, 0, ' ', ' ', 0, 1),
(1000008, 1, 0, ' ', ' ', 0, 1),
(1000009, 1, 0, ' ', ' ', 0, 1),
(1000010, 1, 0, ' ', ' ', 0, 1),
(1000011, 1, 0, ' ', ' ', 0, 1),
(1000012, 1, 0, ' ', ' ', 0, 1),
(1000013, 1, 0, ' ', ' ', 0, 1),
(1000014, 1, 0, ' ', ' ', 0, 1),
(1000015, 1, 0, ' ', ' ', 0, 1),
(1000016, 1, 0, ' ', ' ', 0, 1),
(1000017, 1, 0, ' ', ' ', 0, 1),
(1000018, 1, 0, ' ', ' ', 0, 1),
(1000019, 1, 0, ' ', ' ', 0, 1),
(1000020, 1, 0, ' ', ' ', 0, 1),
(1000021, 1, 0, ' ', ' ', 0, 1),
(1000022, 1, 0, ' ', ' ', 0, 1),
(1000023, 1, 0, ' ', ' ', 0, 1),
(1000024, 1, 0, ' ', ' ', 0, 1),
(1000025, 1, 0, ' ', ' ', 0, 1),
(1000026, 1, 0, ' ', ' ', 0, 1),
(1000027, 1, 0, ' ', ' ', 0, 1),
(1000028, 1, 0, ' ', ' ', 0, 1),
(1000029, 1, 0, ' ', ' ', 0, 1),
(1000030, 1, 0, ' ', ' ', 0, 1),
(1000031, 1, 0, ' ', ' ', 0, 1),
(1000032, 1, 0, ' ', ' ', 0, 1),
(1000033, 1, 0, ' ', ' ', 0, 1),
(1000034, 1, 0, ' ', ' ', 0, 1),
(1000035, 1, 0, ' ', ' ', 0, 1),
(1000036, 1, 0, ' ', ' ', 0, 1),
(1000037, 1, 0, ' ', ' ', 0, 1),
(1000038, 1, 0, ' ', ' ', 0, 1),
(1000039, 1, 0, ' ', ' ', 0, 1),
(1000040, 1, 0, ' ', ' ', 0, 1),
(1000041, 1, 0, ' ', ' ', 0, 1),
(1000042, 1, 0, ' ', ' ', 0, 1),
(1000043, 1, 0, ' ', ' ', 0, 1),
(1000044, 1, 0, ' ', ' ', 0, 1),
(1000045, 1, 0, ' ', ' ', 0, 1),
(1000046, 1, 0, ' ', ' ', 0, 1),
(1000047, 1, 0, ' ', ' ', 0, 1),
(1000048, 1, 0, ' ', ' ', 0, 1),
(1000049, 1, 0, ' ', ' ', 0, 1),
(1000050, 1, 0, ' ', ' ', 0, 1),
(1000051, 1, 0, ' ', ' ', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_last_update`
--

CREATE TABLE IF NOT EXISTS `bookings_last_update` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_item` int(10) NOT NULL DEFAULT '0',
  `date_mod` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_item` (`id_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bookings_last_update`
--

INSERT INTO `bookings_last_update` (`id`, `id_item`, `date_mod`) VALUES
(1, 2, '2014-07-07 04:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_states`
--

CREATE TABLE IF NOT EXISTS `bookings_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `desc_es` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `list_order` int(11) NOT NULL DEFAULT '0',
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `show_in_key` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bookings_states`
--

INSERT INTO `bookings_states` (`id`, `desc_en`, `desc_es`, `code`, `state`, `list_order`, `class`, `show_in_key`) VALUES
(1, 'Booked', 'Reservado', 'b', 1, 0, 'booked', 1),
(2, 'Booked am', 'Reservado am', 'b_am', 0, 1, 'booked_am', 1),
(3, 'Booked pm', 'Reservado pm', 'b_pm', 0, 2, 'booked_pm', 1),
(4, 'Provisional', 'Provisional', 'pr', 0, 3, 'booked_pr', 1),
(5, 'Provisional am', 'Provisional am', 'pr_am', 0, 4, 'booked_pr_am', 1),
(6, 'Provisional pm', 'Provisional pm', 'pr_pm', 0, 5, 'booked_pr_pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `honey_sitesettings`
--

CREATE TABLE IF NOT EXISTS `honey_sitesettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitelogo` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `alt_text` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `honey_sitesettings`
--

INSERT INTO `honey_sitesettings` (`id`, `sitelogo`, `contact_no`, `contact_email`, `alt_text`) VALUES
(1, 'logo.png', '', '', 'Honey');

-- --------------------------------------------------------

--
-- Table structure for table `vacarion_countries`
--

CREATE TABLE IF NOT EXISTS `vacarion_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `printable_name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `vacarion_countries`
--

INSERT INTO `vacarion_countries` (`id`, `iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES
(1, 'AD', 'ANDORRA', 'Andorra', 'AND', 20),
(2, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
(3, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
(4, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
(5, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
(6, 'AL', 'ALBANIA', 'Albania', 'ALB', 8),
(7, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51),
(8, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
(9, 'AO', 'ANGOLA', 'Angola', 'AGO', 24),
(10, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
(11, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
(12, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
(13, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40),
(14, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
(15, 'AW', 'ARUBA', 'Aruba', 'ABW', 533),
(16, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
(17, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
(18, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52),
(19, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
(20, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56),
(21, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
(22, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
(23, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
(24, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108),
(25, 'BJ', 'BENIN', 'Benin', 'BEN', 204),
(26, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
(27, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
(28, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
(29, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76),
(30, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
(31, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
(32, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
(33, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
(34, 'BY', 'BELARUS', 'Belarus', 'BLR', 112),
(35, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84),
(36, 'CA', 'CANADA', 'Canada', 'CAN', 124),
(37, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
(38, 'CD', 'CONGO', 'Congo', 'COD', 180),
(39, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
(40, 'CG', 'CONGO', 'Congo', 'COG', 178),
(41, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
(42, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384),
(43, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
(44, 'CL', 'CHILE', 'Chile', 'CHL', 152),
(45, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
(46, 'CN', 'CHINA', 'China', 'CHN', 156),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170),
(48, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
(49, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
(50, 'CU', 'CUBA', 'Cuba', 'CUB', 192),
(51, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
(52, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
(53, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
(54, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
(55, 'DE', 'GERMANY', 'Germany', 'DEU', 276),
(56, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
(57, 'DK', 'DENMARK', 'Denmark', 'DNK', 208),
(58, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212),
(59, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
(60, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
(61, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
(62, 'EE', 'ESTONIA', 'Estonia', 'EST', 233),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818),
(64, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
(65, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232),
(66, 'ES', 'SPAIN', 'Spain', 'ESP', 724),
(67, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
(68, 'FI', 'FINLAND', 'Finland', 'FIN', 246),
(69, 'FJ', 'FIJI', 'Fiji', 'FJI', 242),
(70, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
(71, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
(72, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250),
(74, 'GA', 'GABON', 'Gabon', 'GAB', 266),
(75, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
(76, 'GD', 'GRENADA', 'Grenada', 'GRD', 308),
(77, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268),
(78, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
(79, 'GH', 'GHANA', 'Ghana', 'GHA', 288),
(80, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
(81, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304),
(82, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270),
(83, 'GN', 'GUINEA', 'Guinea', 'GIN', 324),
(84, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
(85, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
(86, 'GR', 'GREECE', 'Greece', 'GRC', 300),
(87, 'GS', 'SOUTH GEORGIA', 'South Georgia ', NULL, NULL),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
(89, 'GU', 'GUAM', 'Guam', 'GUM', 316),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328),
(92, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
(94, 'HN', 'HONDURAS', 'Honduras', 'HND', 340),
(95, 'HR', 'CROATIA', 'Croatia', 'HRV', 191),
(96, 'HT', 'HAITI', 'Haiti', 'HTI', 332),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348),
(98, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
(99, 'IE', 'IRELAND', 'Ireland', 'IRL', 372),
(100, 'IL', 'ISRAEL', 'Israel', 'ISR', 376),
(101, 'IN', 'INDIA', 'India', 'IND', 356),
(102, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
(103, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
(104, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
(105, 'IS', 'ICELAND', 'Iceland', 'ISL', 352),
(106, 'IT', 'ITALY', 'Italy', 'ITA', 380),
(107, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400),
(109, 'JP', 'JAPAN', 'Japan', 'JPN', 392),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404),
(111, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
(112, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
(113, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
(114, 'KM', 'COMOROS', 'Comoros', 'COM', 174),
(115, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
(116, 'KP', 'KOREA', 'Korea', 'PRK', 408),
(117, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
(118, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
(119, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
(120, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
(121, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418),
(122, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422),
(123, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
(124, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
(125, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
(126, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430),
(127, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
(128, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
(129, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
(130, 'LV', 'LATVIA', 'Latvia', 'LVA', 428),
(131, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
(132, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504),
(133, 'MC', 'MONACO', 'Monaco', 'MCO', 492),
(134, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
(135, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
(136, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
(137, 'MK', 'MACEDONIA', 'Macedonia', 'MKD', 807),
(138, 'ML', 'MALI', 'Mali', 'MLI', 466),
(139, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
(140, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
(141, 'MO', 'MACAO', 'Macao', 'MAC', 446),
(142, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
(143, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
(144, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
(145, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
(146, 'MT', 'MALTA', 'Malta', 'MLT', 470),
(147, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
(148, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462),
(149, 'MW', 'MALAWI', 'Malawi', 'MWI', 454),
(150, 'MX', 'MEXICO', 'Mexico', 'MEX', 484),
(151, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
(152, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
(153, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
(154, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562),
(156, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
(157, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
(158, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
(159, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578),
(161, 'NP', 'NEPAL', 'Nepal', 'NPL', 524),
(162, 'NR', 'NAURU', 'Nauru', 'NRU', 520),
(163, 'NU', 'NIUE', 'Niue', 'NIU', 570),
(164, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
(165, 'OM', 'OMAN', 'Oman', 'OMN', 512),
(166, 'PA', 'PANAMA', 'Panama', 'PAN', 591),
(167, 'PE', 'PERU', 'Peru', 'PER', 604),
(168, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
(169, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
(170, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
(171, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
(172, 'PL', 'POLAND', 'Poland', 'POL', 616),
(173, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
(174, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
(175, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
(176, 'PS', 'PALESTINIAN TERRITORY', 'Palestinian Territory', NULL, NULL),
(177, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
(178, 'PW', 'PALAU', 'Palau', 'PLW', 585),
(179, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
(180, 'QA', 'QATAR', 'Qatar', 'QAT', 634),
(181, 'RE', 'REUNION', 'Reunion', 'REU', 638),
(182, 'RO', 'ROMANIA', 'Romania', 'ROM', 642),
(183, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
(184, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646),
(185, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
(186, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
(187, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
(188, 'SD', 'SUDAN', 'Sudan', 'SDN', 736),
(189, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752),
(190, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
(191, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
(192, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
(193, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
(194, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
(195, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
(196, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
(197, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686),
(198, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706),
(199, 'SR', 'SURINAME', 'Suriname', 'SUR', 740),
(200, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
(201, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
(202, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
(203, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
(204, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
(205, 'TD', 'CHAD', 'Chad', 'TCD', 148),
(206, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
(207, 'TG', 'TOGO', 'Togo', 'TGO', 768),
(208, 'TH', 'THAILAND', 'Thailand', 'THA', 764),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
(210, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
(211, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
(212, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
(213, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
(214, 'TO', 'TONGA', 'Tonga', 'TON', 776),
(215, 'TR', 'TURKEY', 'Turkey', 'TUR', 792),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
(217, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
(218, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
(219, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
(220, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
(221, 'UG', 'UGANDA', 'Uganda', 'UGA', 800),
(222, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
(223, 'US', 'UNITED STATES', 'United States', 'USA', 840),
(224, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858),
(225, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
(226, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
(227, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
(228, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
(229, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
(230, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
(231, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
(232, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
(233, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
(234, 'WS', 'SAMOA', 'Samoa', 'WSM', 882),
(235, 'YE', 'YEMEN', 'Yemen', 'YEM', 887),
(236, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
(237, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_banner`
--

CREATE TABLE IF NOT EXISTS `vacation_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(200) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `status_2` (`status`),
  KEY `status_3` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vacation_banner`
--

INSERT INTO `vacation_banner` (`id`, `user_id`, `name`, `description`, `image`, `link`, `status`) VALUES
(1, 0, '', '', '23681_banner.jpg', '', 0),
(2, 0, '', '', '27944_banner.jpg', '', 0),
(3, 0, '', '', '23105_banner.jpg', '', 0),
(4, 0, '', '', '24870_banner.jpg', '', 0),
(5, 0, '', '', '8551_banner.jpg', '', 0),
(6, 0, '', '', '27622_banner.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_bestrated_amount`
--

CREATE TABLE IF NOT EXISTS `vacation_bestrated_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacation_bestrated_amount`
--

INSERT INTO `vacation_bestrated_amount` (`id`, `percentage`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_category`
--

CREATE TABLE IF NOT EXISTS `vacation_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `vacation_category`
--

INSERT INTO `vacation_category` (`id`, `user_id`, `name`, `description`, `image`, `status`) VALUES
(4, 0, 'Popular Courses', 'Popular Courses', 'place_1.png', 1),
(6, 0, 'Faboulous Beaches', 'Faboulous Beaches', 'place_2.png', 1),
(5, 0, 'Graceful Mountains', 'Graceful Mountains', 'place_3.png', 1),
(7, 0, 'Great Cities', 'Great Cities', 'place_4.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_cms`
--

CREATE TABLE IF NOT EXISTS `vacation_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `pagedetail` longtext NOT NULL,
  `image` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='adventure_circle_cms' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `vacation_cms`
--

INSERT INTO `vacation_cms` (`id`, `pagename`, `title`, `pagedetail`, `image`) VALUES
(1, 'About Us', 'About Us', '<p>\r\n	<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Home Vacation Club is a booking system where renters can book available homes for their getaways. The Club is unique and very distinctive. Club rules are designed to help secure renter&#39;s vacation interest and maintain owner&#39;s confidence. Besides the benefit of having properties marketed to a larger global audience, Home Vacation Club strives above and beyond to get properties to generate consistent income as consistently as possible. In addition to our list of benefits, we offer vacation home owners the most value than any other vacation rental website in the industry. Take advantage of our limited trial period and list your property today!We operate and manage a home booking system where renters can book available vacation homes and get instant confirmation just like a hotel.</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n	<br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n	<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Book a home now! Become a member now!</span></p>\r\n', ''),
(4, 'Contact Us', 'Contact Us', '<p>\r\n	For technical assistance to list your property, please call :&nbsp;<strong>1-407-535-8309 </strong></p>\r\n<p>\r\n	<a href="mailto:homevacationclub@hotmail.com" style="font-weight:bold; color:#0d4c78;">Click Here</a> to contact us by sending email .</p>\r\n', '');
INSERT INTO `vacation_cms` (`id`, `pagename`, `title`, `pagedetail`, `image`) VALUES
(5, 'Terms And Condition', 'Terms And Condition', '<p>\r\n	<br />\r\n	By using or accessing, HomeVacationClub.com, HomeVacationClub.com, HomeVacationClub.com, HomeVacationClub.com, HomeVacationClub.com., HomeVataionClub.com, HomeVacationClub.com or a subdomain of any of such websites (each referred to herein as a &quot;Site&quot;), you acknowledge that you agree to and are subject to the following terms and conditions, as well as our Privacy Policy (collectively, the &quot;Terms&quot;). If you do not fully agree to these Terms, Privacy Policy and any other terms and conditions posted or linked to any Site, you are not authorized to access or otherwise use the Site. Under these Terms, &quot;use&quot; or &quot;access&quot; of the Site specifically includes any direct or indirect access or use of the Site or any cached version of the Site and any direct or indirect access or use of any information or content on the Site, regardless of how obtained and the term &quot;Site&quot; includes, without limitation, any cached version thereof.</p>\r\n<p>\r\n	Each Site is operated by HomeVacationClub.com, Inc. (a subsidiary of HomeVacationClub, Inc.) or a subsidiary of HomeVacationClub, Inc., as explained further under &quot;General - HomeVacationClub Corporate Entities&quot; below. Unless otherwise specified, the entity controlling the Site you are accessing is referred to herein as &quot;HomeVacationClub,&quot; &quot;we,&quot; &quot;us&quot; or &quot;our&quot;. You should read through all the Terms carefully. The Terms constitute a legally binding agreement between you and HomeVacationClub, Inc and/or homevacationclub.com. You are not authorized to use this Site unless you are at least 18 and able to enter into legally binding contracts. We do not knowingly collect the information of anyone under the age of 18.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>The Site is a Venue and We are Not a Party to any Rental Agreement or other Transaction Between Users of the Site. </strong></p>\r\n<p>\r\n	We urge all users to be responsible about their use of this Site and any transaction entered into as a result of either listing a property or renting a property. We do not own or manage, nor can we contract for, any vacation rental property listed on a Site. HomeVacationClub.com and other Sites act as a venue to allow homeowners and property managers who advertise on the Site (each, a &quot;member&quot;) to offer for rent in a variety of pricing formats, a specific vacation rental property to potential renters (each, a &quot;traveler&quot; and, collectively with a member, the &quot;users&quot;). On some Sites, we also offer software to property managers or owners to assist them in offering their properties for rent (also referred to as users&quot; herein). Sites also may offer other tools or services or provide various ways for users to communicate with one other and enter into rental agreements or other transactions.</p>\r\n<p>\r\n	We are not involved in any transaction between travelers and members even though we may from time to time provide tools that relate to a booking, such as a tool to enable a traveler to enter into a transaction to lease a specific property directly from a member. As a result, any part of an actual or potential transaction between a traveler and a member, including the quality, condition, safety or legality of the properties advertised, the truth or accuracy of the listings (including the content thereof or any property or guest book review), the ability of members to rent a vacation property or the ability of travelers to pay for vacation rental properties are solely the responsibility of each user.</p>\r\n<p>\r\n	You acknowledge and agree that you may be required to enter into a separate agreement and/or waiver prior to making a booking or purchasing a product or service and may place additional restrictions on your booking, product or service.</p>\r\n<p>\r\n	<strong>Responsibility for applicable laws, rules and regulations :</strong> Users agree that they are responsible for, and agree to abide by, all laws, rules and regulations applicable to their use of the Site, their use of any tool, service or product offered on the Site and any transaction they enter into on the Site or in connection with their use of the Site.</p>\r\n<p>\r\n	Members further agree that they are responsible for and agree to abide by all laws, rules and regulations applicable to the advertisement of their rental property and the conduct of their rental business, including but not limited to taxes, permit or license requirements, zoning ordinances, safety compliance and compliance with all anti-discrimination and fair housing laws, as applicable. Please be aware that, even though we are not a party to any rental transaction and assume no liability for legal compliance pertaining to rental properties listed on the Site, there may be circumstances where we are nevertheless legally obligated (as we may determine in our sole discretion) to provide information relating to your listing in order to comply with governmental bodies in relation to investigations, litigation or administrative proceedings, and we may choose to comply with or disregard such obligation in our sole discretion.</p>\r\n<p>\r\n	<strong>Travel Advisories:</strong> Although most travel is completed without a serious incident, travel to some destinations may involve more risk than others. We urge travelers to research the location they wish to visit and to review travel prohibitions, warnings, announcements and advisories issued by the United States Government prior to booking. Information may be found at <a href="www.state.gov" style="color:#0d4c78;">www.state.gov</a>, <a href="www.tsa.gov" style="color:#0d4c78;">www.tsa.gov</a>, <a href="www.dot.gov" style="color:#0d4c78;">www.dot.gov</a>, <a href="www.faa.gov" style="color:#0d4c78;">www.faa.gov</a>, <a href="www.cdc.gov" style="color:#0d4c78;">www.cdc.gov</a>, <a href="www.treas.gov" style="color:#0d4c78;">www.treas.gov/ofac</a> and <a href="www.customs.gov" style="color:#0d4c78;">www.customs.gov</a>. Warnings of Suspicious Activity: While we do take certain measures with a goal to assist users to avoid potentially fraudulent or other illegal activity of which we become aware, we assume no liability or obligation to take any such measures or actions. In the event we do provide warnings or messages to users about any such activity, we do not warrant that such messages are accurate or that such messages will reach any or all users they should have reached in a timely manner or at all or that such messages or measures will prevent any harm, result or action.</p>\r\n<br />\r\n<p>\r\n	<strong>Limited License to Use the Site.</strong></p>\r\n<p>\r\n	Users are granted a limited, revocable, non-exclusive license to access the Site and the content and services provided on the Site solely for the purpose of advertising a vacation rental property, searching for a vacation rental property, purchasing or researching (for the purpose of inquiring about purchasing) any of the products or services offered on any Site, participating in an interactive area hosted on any Site or for any other purpose clearly stated on a Site, all in accordance with the Terms. Any use of the Site that is not for one of these purposes or otherwise in accordance with the Terms or as otherwise authorized by us in writing is expressly prohibited.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Unauthorized Uses of the Site.</strong></p>\r\n<p>\r\n	The license to use the Site only extends to the uses expressly described herein. The license to use the site granted to users in these Terms does not include any right of collection, aggregation, copying, scraping, duplication, display or derivative use of the Site nor any right of use of data mining, robots, spiders or similar data gathering and extraction tools without our prior written permission; provided, however, that a limited exception from the foregoing exclusion is provided to general purpose internet search engines that use tools to gather information for the sole purpose of displaying hyperlinks to the Site, provided they each do so from a stable IP address or range of IP addresses using an easily identifiable agent and comply with our robots.txt file. &quot;General purpose internet search engines&quot; do not include a website or search engine or other service that provides classified listings or property rental advertisements, or any subset of the same or which is in the business of providing vacation property rental services or other services that compete with us.</p>\r\n<p>\r\n	<strong>Unauthorized uses of the Site also include, without limitation, those listed below. You agree not to do any of the following, unless otherwise previously authorized by us in writing:</strong></p>\r\n<ul style="padding-left: 15px;">\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Any commercial use (other than by members with a fully paid up subscription in good standing (a &quot;valid subscription&quot;) or by members pursuant to a valid license to software offered on a Site (a &quot;valid license&quot;)) of the Site or any content on the Site.</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Any use of the Site or the tools and services on the Site for the purpose of booking or soliciting a rental for a property other than a property listed under a valid subscription;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Copy, reproduce, upload, post, display, republish, distribute, or transmit any part of the content in any form whatsoever;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Reproduce any portion of the Site on your website or otherwise, using any device including, but not limited to, use of a frame or border environment around the Site, or other framing technique to enclose</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Deep-link to any portion of the Site without our express written permission;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Modify, translate into any language or computer language, or create derivative works from, any content or any part of the Site;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Reverse engineer any part of the Site;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Sell, offer for sale, transfer, or license any portion of the Site in any form to any third parties;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Use any robot, spider, scraper, other automatic device, or manual process to monitor, copy, or keep a database copy of the content or any portion of the Site;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Use the Site and its inquiry functionality other than to advertise and/or research vacation rentals, to make legitimate inquiries to our members or any other use expressly authorized on the Site;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Use the Site or post or transmit information that is in any way false, fraudulent, or misleading, including making any reservation or inquiry under false pretenses, or taking any action that may be considered phishing or that would give rise to criminal or civil liability;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Post or transmit any unlawful, threatening, abusive, libelous, defamatory, obscene, vulgar, indecent, inflammatory, sexually explicit, pornographic or profane material;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Violate, plagiarize or infringe the rights of us or third parties including, without limitation, copyright, trademark, patent, trade secrets, rights of publicity or privacy or any other intellectual or proprietary rights; or</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		Use or access the Site in any way that, in our sole discretion, adversely affects or could adversely affect the performance or function of the Site or any other system used by us or the Site. If you are aware of or experience any content, activity or communication through or in connection with the Site that appears to be in violation of the above restrictions, or in violation of any other provision of these Terms, we ask that you please inform us of any such violation by contacting us as set forth under &quot;Contact Us&quot; below.</li>\r\n</ul>\r\n<p>\r\n	<br />\r\n	<strong>Proprietary Rights and Downloading of Information from the Site.</strong></p>\r\n<p>\r\n	The Site and all content and information on the Site are protected by copyright as a collective work and/or compilation, pursuant to applicable U.S. and international copyright laws and conventions and database rights. You agree to abide by any and all copyright notices, information, or restrictions contained in or relating to any content on the Site. Copying, storing or otherwise accessing the Site or any content on the Site for other than for your personal, noncommercial use (other than in accordance with a valid subscription) is expressly prohibited without prior written permission from us. As part of the rental inquiry process, for your own personal, noncommercial use and not for further distribution, you may download, display, and/or print one copy of any portion of the Site. You may not modify the same, and you must reproduce our copyright notice in the form displayed on the relevant portion(s) of the Site that you desire to download, display or print.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Your E-mail Address and Data; Our Privacy Policy; Data Transmittal.</strong></p>\r\n<p>\r\n	When you provide your e-mail address to us in connection with any service or tool provided on the Site or otherwise, you agree to allow the Site and its affiliated websites to add your e-mail address to our database of users. You may receive one or more promotional e-mails from either the Site or a website of one of HomeVacationClub&rsquo;s affiliates. You are welcome to opt not to receive such promotional e-mails from the Site or such affiliates&rsquo; websites at any time. Please review our Privacy Policy for more information regarding our e-mail and other data collection practices and safeguards, and how to opt not to receive such emails. Your use of the Site signifies your acknowledgment of and agreement with our Privacy Policy.</p>\r\n<p>\r\n	Each user acknowledges and agrees that, regardless of such user&rsquo;s physical location, we may store and process any data transmitted to the Site from such user at locations both within and outside of the United States.</p>\r\n<p>\r\n	In the event that you use any of our tools that we may from time to time offer that integrate in any way with a third party website to which you have provided data or information, you acknowledge and agree that such third party website shall be responsible for how the data or information you have provided to such website is handled.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Identity Verification.</strong></p>\r\n<p>\r\n	User verification on the Internet is difficult and we cannot, and do not, assume any responsibility for the confirmation of each user&#39;s purported identity. We encourage you to communicate directly with a traveler or member through the tools available on the Site though even this does not assure you of the identity of the person with which you are communicating. You agree to (i) keep your password and online ID for both your account with us and your email account secure and strictly confidential, providing it only to authorized users of your accounts, (ii) instruct each person to whom you give your online ID and password that he or she is not to disclose it to any unauthorized person, (iii) notify us immediately and select a new online ID and password if you believe your password for either your account with us or your email account may have become known to an unauthorized person, and (iv) notify us immediately if you are contacted by anyone requesting your online ID and password. We discourage you from giving anyone access to your online ID and password for your account with us and your email account. However, if you do give someone your online ID and online password, or if you fail to adequately safeguard such information, you are responsible for any and all transactions that the person performs while using your account with us or your email account, even those transactions that are fraudulent or that you did not intend or want performed.</p>\r\n<p>\r\n	EACH USER ACKNOWLEDGES AND AGREES THAT: (1) NEITHER HOMEVACATIONCLUB NOR ANY OF ITS AFFILIATES WILL HAVE ANY LIABILITY TO ANY USER FOR ANY UNAUTHORIZED TRANSACTION MADE USING ANY USER&rsquo;S PASSWORD; AND (2) THE UNAUTHORIZED USE OF YOUR ONLINE ID AND PASSWORD FOR YOUR HOMEVACATIONCLUB ACCOUNT OR YOUR EMAIL ACCOUNT COULD CAUSE YOU TO INCUR LIABILITY TO BOTH HOMEVACATIONCLUB AND OTHER USERS. Further, we may, without notice to you, suspend or cancel your listing at any time even without receiving notice from you if we suspect, in our sole discretion, that your account with us or your email account is being used in an unauthorized or fraudulent manner.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Limitations on Communications and Use of Other Users&rsquo; Information; No Spam. </strong></p>\r\n<p>\r\n	You agree that, with respect to other users&#39; personal information that you obtain directly or indirectly from or through the Site or through any Site-related communication, transaction or software, we have granted to you a license to use such information only for: (a) Site-related communications that are not unsolicited commercial messages, (b) using services offered through the Site, and (c) inquiring about or otherwise facilitating a financial transaction between you and the other user related to the purpose of the Site. (such as inquiring about or booking an on-line booking or charging a personal credit card) Any other purpose will require express permission from the user. You may not use any such information for any unlawful purpose or with any unlawful intent.</p>\r\n<p>\r\n	In all cases, you must give users an opportunity to remove themselves from your address book or database and a chance to review what information you have collected about them. In addition, under no circumstances, except as defined in this provision, may you disclose personal information about another user to any third party without both our consent and the consent of the other user. You agree that other users may use your personal information to communicate with you in accordance with this provision. Further, you agree that you will protect other users&rsquo; personal information with the same degree of care that you protect your own confidential information (using at minimum a reasonable standard of care), and you assume all liability for the misuse, loss, or unauthorized transfer of such information.</p>\r\n<p>\r\n	We do not tolerate spam or unsolicited commercial electronic communications of any kind. Therefore, without limiting the foregoing, you are not licensed to add a Site user, even a user who has rented a vacation property from you or to you, to your mailing list (email or physical mail) without the user&#39;s express consent. You may not use any tool or service on the Site to send spam or unsolicited commercial electronic communications of any kind or in any other way that would violate these Terms. You are responsible for all content you provide to the Site or through any tool or service provided on the Site.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Responsibility for Property Listings, Reviews and Other User contributed Content; Participation in Interactive Forums.</strong></p>\r\n<p>\r\n	We have no duty to pre-screen content posted on the Site by members, travelers or other users, whether directly contributed by the user or contributed by us or a third party on behalf of the user (including, without limitation, property listings, reviews of a rental property, participation in an interactive community, forum or blog (each an &quot;Interactive Forum&quot;) or any other content provided by a user to the Site), (collectively, &quot;user contributed content&quot;). We are not responsible for user contributed content. &quot;User contributed content&quot; also includes information that a user provided to a third party website which is then provided to our Site by a tool we offer.</p>\r\n<p>\r\n	We reserve the right to decline to permit the posting on the Site of, or to remove from the Site, any user contributed content that fails to meet our Content Guidelines , any other guidelines posted on a Site or if it otherwise violates these Terms, each as determined in our discretion. We may also remove user contributed content if it is brought to our attention, such as by notice given to us by a user or any third party that any part of these Terms, or any other requirements governing the posting of such content, has/have been apparently breached in respect of such content, as determined in our consent. Finally, we reserve the right (but do not assume the obligation) to edit a member&rsquo;s content or user contributed content in a non-substantive manner solely to cause the content to comply with our content guidelines or formatting requirements.</p>\r\n<p>\r\n	<strong>At a minimum, user contributed content must:</strong></p>\r\n<ul style="padding-left: 15px;">\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		not infringe anyone&rsquo;s rights, violate the law or otherwise be inappropriate;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		not include personal information that can be used to identify or contact any person;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		not include promotional content that would promote other websites, businesses, services or products unaffiliated with this Site without our express permission;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		not be obscene, abusive, discriminatory or illegal content; or</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		not be false or misleading.</li>\r\n</ul>\r\n<p>\r\n	Property Listings: All property listings on the Site are the sole responsibility of the member (who may be the owner or a property manager or duly authorized property manager or agent of the owner) and we specifically disclaim any and all liability arising from the alleged accuracy of the listings, property reviews, guest book entries, or any alleged breaches of contract on a member&#39;s part. Members are solely responsible for keeping their property information up-to-date on the Site, including, but not limited to any and all representations about any property, its amenities, location, price, and its availability for a specific date or range of dates. We do not represent or warrant that any of the copy, content, property reviews, guest book entries, property location, suitability, pricing or availability information published on the Site is accurate or up-to-date even in the case where prospective travelers have searched for specific special offers, dates, or types of properties. Members are solely responsible for ensuring the accuracy of any property descriptions, and travelers are solely responsible for verifying the accuracy of such descriptions.</p>\r\n<p>\r\n	<strong>Responsibility for All Other User Contributed Content :</strong> All other user contributed content is the sole responsibility of the user who contributed such content, whether such user contributed the content directly or through a third party website. Users are solely responsible for their user contributed content and we specifically disclaim all liability for user contributed content.</p>\r\n<p>\r\n	The user represents and warrants that the user owns or otherwise controls and have all legal rights to the user&rsquo;s submission and the name or other identifier used in connection with such submission including, but not limited to, all the rights necessary to provide, post, upload, input or submit the user contributed content. We reserve the right to request a proof of ownership or permission, and to refuse to post user generated content without such proof or if such proof is, in our sole discretion, insufficient. License and Rights Granted to Us: By submitting or authorizing user contributed content, you grant to us and our affiliates a perpetual, worldwide, irrevocable, unrestricted, non-exclusive, royalty-free and fully paid-up license to use, copy, license, sublicense (through multiple tiers), adapt, distribute, display, publicly perform, reproduce, transmit, modify, edit and otherwise exploit the copy, the photographs and the likenesses (if any) of any of your user contributed content, in connection with our business or the business of our affiliates. Notwithstanding the foregoing, following the termination or expiration of a property listing subscription, we will not continue to display the user contributed content that was displayed in such listing.</p>\r\n<p>\r\n	You further grant us and our affiliates the ability to copyright and protect the user contributed content, including the images, copy, and content available via any member&rsquo;s listing, from the unauthorized use by unaffiliated third parties who may, from time to time, attempt to pirate such information via electronic or other means. This includes, but is not limited to, the right to file suit to seek injunctive relief to protect such material. You further agree to assist us-at our expense and control-to protect such copyrighted material from unauthorized redistribution.</p>\r\n<p>\r\n	You agree that we may sublicense all the rights granted to us under these Terms to one or more third parties we may contract with to display all or part of the member&rsquo;s property listing or otherwise provide promotional or other services related to our business.</p>\r\n<p>\r\n	Further, each member agrees that we may reproduce in whole or in part any photographic material supplied by such member in the promotion of either such member&rsquo;s property or the promotion of the Site.</p>\r\n<p>\r\n	In the event that it is determined that you retain any rights of attribution, integrity or any other moral rights in any user contributed content, you hereby declare that you do not require that any personally identifying information be used in connection with the user contributed content or any derivative works thereof and that you have no objection to the publication, use, modification, deletion or exploitation of the user contributed content by us or our affiliates.</p>\r\n<p>\r\n	<strong>Privacy Policy :</strong> We adhere to strong principles of privacy and user contributed content may be disclosed only as provided in these Terms or our Privacy Policy.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Social Media or Third Party Websites.</strong></p>\r\n<p>\r\n	If the Site offers a tool or service which allows us to access or use any profile or other information about you that you have provided to Facebook or another third party website (each a &quot; Social Media Site &quot;) and you decide to use such a tool or service, you acknowledge and agree that:</p>\r\n<ul style="padding-left: 15px;">\r\n	<li style="list-style-type:lower-roman; list-style-position: outside;">\r\n		The information or content that are a part of your Social Media Site profile, which you have designated as &quot;public&quot; (or a similar designation) (with such information or content and referred to herein as &quot;Social Media Content&quot;) may be accessed and used by us in connection with the Site;</li>\r\n	<li style="list-style-type:lower-roman; list-style-position: outside;">\r\n		The Social Media Content will be considered &quot;user generated content&quot; under these Terms and both you and we shall have the same rights and responsibilities as you and we have with respect to user generated content under these Terms;</li>\r\n	<li style="list-style-type:lower-roman; list-style-position: outside;">\r\n		In the event that the Social Media Content was for any reason misclassified with a public or similar designation or is otherwise inaccurate or to which you do not agree with for any reason, you agree to work with the Social Media Site to make any changes or resolve any disputes and acknowledge that we will not be able to provide you with recourse; and</li>\r\n	<li style="list-style-type:lower-roman; list-style-position: outside;">\r\n		The operation of your profile and account with and on the Social Media Site shall continue to be governed by the terms and conditions and privacy policy of such Social Media Site. 10. Translations and Maps.</li>\r\n</ul>\r\n<p>\r\n	If any user contributed content created by members or users is translated for display on any Site or any site of any affiliate of HomeVacationClub, the member or user is solely responsible for the review and accuracy of such translation. Unless we specify otherwise to the user or member, any translation services are offered by us free of charge.</p>\r\n<p>\r\n	Maps provided on the Site that are provided by Google are subject to the Google Maps terms and conditions located on www.google.com.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Notification of Infringement; DMCA Policy.</strong></p>\r\n<p>\r\n	We respect the intellectual property rights of others, and HomeVacationClub does not permit, condone, or tolerate the posting of any content on the Site that infringes any person&#39;s copyright. HomeVacationClub will terminate, in appropriate circumstances, a member or traveler who is the source of repeat infringements of copyright. Should you become aware of or suspect any copyright infringement on this Site, please refer to our procedures for Notification of Copyright Infringement .<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Unsolicited Ideas and Feedback.</strong></p>\r\n<p>\r\n	<strong>Unsolicited Ideas:</strong> From time to time, users submit to us ideas or suggestions pertaining to our business, such as ideas for new or improved products or technologies, website or tool enhancements, processes, materials, marketing plans or new product names. We are under no obligation to review or consider them. If you choose to submit any ideas, original creative artwork, suggestions or other works (&quot;submissions&quot;) in any form to us, then regardless of what you say, write or provide to us in connection with your submissions, the following terms shall apply. The sole purpose of this policy is to avoid potential misunderstandings or disputes in the event that any part of our business, such as our products, websites, technologies or marketing strategies, seem similar to any of your submissions. If you provide any submissions to us, you agree that: (1) your submission and its contents will automatically become the property of HomeVacationClub, without any compensation to you; (2) HomeVacationClub may use or redistribute any such submission and its contents for any purpose and in any way; (3) there is no obligation for HomeVacationClub to review any submission; and (4) there is no obligation to keep any submission confidential.</p>\r\n<p>\r\n	<strong>Feedback on our Business:</strong> We welcome your feedback regarding many areas of our business. If you want to send us your feedback, we simply request that you send it to us using the links under &quot;General - Contact Us&quot; below or you can choose from the many other listed areas for your feedback. Please provide only specific feedback on our websites and services. Keep in mind that we assume no obligation to keep any feedback you provide confidential and we reserve the right to use or disclose such information in any manner. To provide feedback, you can contact us as provided under &quot;Contact Us&quot; below.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Software Available on the Site.</strong></p>\r\n<p>\r\n	The Site is controlled and operated by HomeVacationClub or an affiliate of HomeVacationClub in the United States. Software available on the Site (the &quot;Software&quot;) is subject to United States export controls. No Software available on the Site or software available any other site operated by HomeVacationClub or an affiliate of HomeVacationClub in the United States may be downloaded or otherwise exported or re-exported (a) into (or to a resident of) Cuba, Iraq, Libya, North Korea, Iran, Syria or any other country to which the United States has embargoed goods, or (b) anyone on the United States Treasury Department&rsquo;s list of Specially Designated Nationals or the United States Commerce Department&rsquo;s Table of Deny Orders. By using the Site, you represent and warrant that you are not located in, under the control of, or a national or resident of any such country or on any such list. All Software is the copyrighted work of Homevacationclub, an affiliate of Homevacationclub or an identified third party. Your use of such Software is governed by these Terms and the terms of any additional license agreement that accompanies or is included with such Software. If the Software is not accompanied by an additional license agreement, we hereby grant you a limited, personal, nontransferable license to use the Software for viewing and using this Site in accordance with these Terms and for no other purpose.</p>\r\n<p>\r\n	THE SOFTWARE IS WARRANTED, IF AT ALL, ONLY ACCORDING TO THE TERMS OF THE LICENSE AGREEMENT ACCOMPANYING SUCH SOFTWARE. COPYING OR REPRODUCING ANY SOFTWARE AVAILABLE ON THIS SITE IS EXPRESSLY PROHIBITED, EXCEPT AS SPECIFICALLY PROVIDED FOR IN A LICENSE AGREEMENT ACCOMPANYING SUCH SOFTWARE.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Links to Third Party Sites.</strong></p>\r\n<p>\r\n	This Site may contain links and pointers to other Internet sites, resources, and sponsors of the Site. Links to and from the Site to other third-party sites, maintained by third parties, do not constitute an endorsement by us of any third parties, the third-party sites or the contents thereof. We may also provide tools to allow interaction between the Site and a third party site, such as a Social Media Site. We are not responsible in any way for such third-party sites or resources and your use of such sites and resources will not be governed by these Terms.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Limitation of Liability.</strong></p>\r\n<p>\r\n	IN NO EVENT WILL HOMEVACATIONCLUB, SUBSIDIARIES, AFFILIATES, OFFICERS, DIRECTORS, CONSULTANTS, AGENTS AND/OR EMPLOYEES (COLLECTIVELY, THE &quot;HOMEVACATIONCLUB, INC&quot;), OR ANY THIRD PARTY PROVIDER OF A SERVICE OR TOOL OFFERED ON ANY SITE OF A MEMBER OF THE HOMEVACATIONCLUB, INC (EACH A &quot;THIRD PARTY PROVIDER&quot;), BE LIABLE FOR ANY LOST PROFITS OR ANY INDIRECT, CONSEQUENTIAL, SPECIAL, INCIDENTAL, OR PUNITIVE DAMAGES ARISING OUT OF, BASED ON, OR RESULTING FROM (A) OUR SITE, (B) THESE TERMS, (C) ANY BREACH OF THESE TERMS BY YOU OR A THIRD PARTY, (D) USE OF THE SITE, TOOLS OR SERVICES WE PROVIDE RELATED TO THE BUSINESS WE OPERATE ON THE SITE BY YOU OR ANY THIRD PARTY (E) ANY USER CONTRIBUTED CONTENT, (F) INTERACTION BETWEEN OUR SITE AND ANY THIRD PARTY SITE, INCLUDING WITHOUT LIMITATION A SOCIAL MEDIA SITE, FACILITATED BY A TOOL OR SERVICE ON OUR SITE AND/OR (G) ANY ACTUAL OR ATTEMPTED COMMUNICATION OR TRANSACTION BETWEEN USERS, IN EACH CASE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THESE LIMITATIONS AND EXCLUSIONS APPLY WITHOUT REGARD TO WHETHER THE DAMAGES ARISE FROM (1) BREACH OF CONTRACT, (2) BREACH OF WARRANTY, (3) STRICT LIABILITY, (4) TORT, (5) NEGLIGENCE, OR (6) ANY OTHER CAUSE OF ACTION, TO THE MAXIMUM EXTENT SUC H EXCLUSION AND LIMITATIONS ARE NOT PROHIBITED BY APPLICABLE LAW. IF YOU ARE DISSATISFIED WITH THE SITE, YOU DO NOT AGREE WITH ANY PART OF THE TERMS, OR HAVE ANY OTHER DISPUTE OR CLAIM WITH OR AGAINST US OR ANOTHER USER OF THE SITE WITH RESPECT TO THESE TERMS OR THE SITE, THEN YOUR SOLE AND EXCLUSIVE REMEDY AGAINST US IS TO DISCONTINUE USING THE SITE. IN ALL EVENTS, OUR LIABILITY, AND THE LIABILITY OF ANY MEMBER OF THE HOMEVACATIONCLUB, INC, TO YOU OR ANY THIRD PARTY IN ANY CIRCUMSTANCE ARISING OUT OF OR IN CONNECTION WITH THE SITE IS LIMITED TO THE GREATER OF (A) THE AMOUNT OF FEES YOU PAY TO US IN THE TWELVE MONTHS PRIOR TO THE ACTION GIVING RISE TO LIABILITY OR (B) $50.00 IN THE AGGREGATE FOR ALL CLAIMS.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Disclaimers.</strong></p>\r\n<p>\r\n	THE SITE, INCLUDING ALL CONTENT, SOFTWARE, FUNCTIONS, MATERIALS AND INFORMATION MADE AVAILABLE ON OR ACCESSED THROUGH THE SITE, IS PROVIDED &quot;AS IS.&quot; TO THE FULLEST EXTENT PERMISSIBLE BY LAW, WE MAKE NO REPRESENTATIONS OR WARRANTIES OF ANY KIND WHATSOEVER FOR THE CONTENT ON THE SITE OR THE MATERIALS, INFORMATION AND FUNCTIONS MADE ACCESSIBLE BY THE SOFTWARE USED ON OR ACCESSED THROUGH THE SITE, FOR ANY PRODUCTS OR SERVICES OR HYPERTEXT LINKS TO THIRD PARTIES OR FOR ANY BREACH OF SECURITY ASSOCIATED WITH THE TRANSMISSION OF SENSITIVE INFORMATION THROUGH THE SITE OR ANY LINKED SITE, EVEN IF WE BECOME AWARE OF ANY SUCH BREACHES. FURTHER, WE EXPRESSLY DISCLAIM ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, NON-INFRINGEMENT, MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR ACCURACY. WE DO NOT WARRANT THAT THE FUNCTIONS CONTAINED IN THE SITE OR ANY MATERIALS OR CONTENT CONTAINED THEREIN WILL BE UNINTERRUPTED OR ERROR FREE, THAT DEFECTS WILL BE CORRECTED, OR THAT THE SITE OR THE SERVER THAT MAKES IT AVAILABLE IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.</p>\r\n<p>\r\n	YOU ACKNOWLEDGE AND AGREE THAT ANY TRANSMISSION TO AND FROM THIS SITE IS NOT CONFIDENTIAL AND YOUR COMMUNICATIONS OR USER CONTRIBUTED CONTENT MAY BE READ OR INTERCEPTED BY OTHERS. YOU FURTHER ACKNOWLEDGE AND AGREE THAT BY SUBMITTING COMMUNICATIONS OR USER CONTRIBUTED CONTENT TO US AND BY POSTING INFORMATION ON THE SITE, INCLUDING PROPERTY LISTINGS, NO CONFIDENTIAL, FIDUCIARY, CONTRACTUALLY IMPLIED OR OTHER RELATIONSHIP IS CREATED BETWEEN YOU AND US OTHER THAN PURSUANT TO THESE TERMS.</p>\r\n<p>\r\n	YOU ACKNOWLEDGE AND AGREE THAT YOU WILL NOT HOLD OR SEEK TO HOLD US OR ANY THIRD PARTY PROVIDER RESPONSIBLE FOR THE CONTENT PROVIDED BY ANY USER, INCLUDING, WITHOUT LIMITATION, ANY TRANSLATION THEREOF, AND YOU FURTHER ACKNOWLEDGE AND AGREE THAT WE ARE NOT A PARTY TO ANY RENTAL TRANSACTION OR OTHER TRANSACTION BETWEEN USERS OF THE SITE. WE HAVE NO CONTROL OVER AND DO NOT GUARANTEE (OTHER THAN PURSUANT TO ANY GUARANTEE THE MAY BE OFFERED ON THE SITE) THE SAFETY OF ANY TRANSACTION, RENTAL PROPERTY OR THE TRUTH OR ACCURACY OF ANY LISTING OR OTHER CONTENT PROVIDED ON THE SITE.</p>\r\n<p>\r\n	YOU FURTHER ACKNOWLEDGE THAT BY DISPLAYING INFORMATION OR PROPERTY LISTINGS IN PARTICULAR DESTINATIONS, WE DO NOT REPRESENT OR WARRANT THAT TRAVEL TO SUCH DESTINATIONS IS WITHOUT RISK AND ARE NOT LIABLE FOR DAMAGES WITH RESPECT TO TRAVEL TO ANY DESTINATION.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Release; Indemnification</strong></p>\r\n<p>\r\n	IN THE EVENT THAT YOU HAVE A DISPUTE WITH ONE OR MORE OTHER USERS OF THE SITE (INCLUDING, WITHOUT LIMITATION, ANY DISPUTE BETWEEN USERS REGARDING ANY TRANSACTION OR USER CONTRIBUTED CONTENT) OR ANY THIRD PARTY WEBSITE THAT MAY BE LINKED TO OR FROM OR OTHERWISE INTERACT WITH THE SITE, INCLUDING WITHOUT LIMITATION ANY SOCIAL MEDIA SITE, YOU HEREBY AGREE TO RELEASE, REMISE AND FOREVER DISCHARGE EACH MEMBER OF THE HOMEVACATIONCLUB, INC, EACH OF THEIR RESPECTIVE AGENTS, DIRECTORS, OFFICERS, EMPLOYEES, AND ALL OTHER RELATED PERSONS OR ENTITIES FROM ANY AND ALL MANNER OF RIGHTS, CLAIMS, COMPLAINTS, DEMANDS, CAUSES OF ACTION, PROCEEDINGS, LIABLITIES, OBLIGATIONS, LEGAL FEES, COSTS, AND DISBURSEMENTS OF ANY NATURE WHATSOEVER, WHETHER KNOWN OR UNKNOWN, WHICH NOW OR HEREAFTER ARISE FROM, RELATE TO, OR ARE CONNECTED WITH SUCH DISPUTE AND/OR YOUR USE OF THE SITE.</p>\r\n<p>\r\n	IF YOU ARE A CALIFORNIA RESIDENT, YOU WAIVE CALIFORNIA CIVIL CODE SECTION 1542, WHICH SAYS: &quot;A GENERAL RELEASE DOES NOT EXTEND TO CLAIMS WHICH THE CREDITOR DOES NOT KNOW OR SUSPECT TO EXIST IN HIS FAVOR AT THE TIME OF EXECUTING THE RELEASE, WHICH, IF KNOWN BY HIM MUST HAVE MATERIALLY AFFECTED HI S SETTLEMENT WITH THE DEBTOR.&quot;</p>\r\n<p>\r\n	YOU HEREBY AGREE TO INDEMNIFY, DEFEND AND HOLD EACH MEMBER OF THE HOMEVACATIONCLUB, INC (COLLECTIVELY, THE &quot;INDEMNIFIED PARTIES&quot;) HARMLESS FROM AND AGAINST ANY AND ALL LIABILITY AND COSTS INCURRED BY THE INDEMNIFIED PARTIES IN CONNECTION WITH ANY CLAIM ARISING OUT OF YOUR USE OF THE SITE OR OTHERWISE RELATING TO THE BUSINESS WE CONDUCT ON THE SITE (INCLUDING, WITHOUT LIMITATION, ANY POTENTIAL OR ACTUAL COMMUNICATION, TRANSACTION OR DISPUTE BETWEEN YOU AND ANY OTHER USER OR THIRD PARTY), ANY CONTENT POSTED BY YOU OR ON YOUR BEHALF OR POSTED BY OTHER USERS OF YOUR ACCOUNT TO THE SITE, ANY USE OF ANY TOOL OR SERVICE PROVIDED BY A THIRD PARTY PROVIDER, ANY USE OF A TOOL OR SERVICE OFFERED BY US THAT INTERACTS WITH A THIRD PARTY WEBSITE, INCLUDING WITHTOUT LIMITATION ANY SOCIAL MEDIA SITE OR ANY BREACH BY YOU OF THESE TERMS OR THE REPRESENTATIONS, WARRANTIES AND COVENANTS MADE BY YOU HEREIN, INCLUDING WITHOUT LIMITATION, ATTORNEYS&#39; FEES AND COSTS. YOU SHALL COOPERATE AS FULLY AS REASONABLY REQUIRED IN THE DEFENSE OF ANY CLAIM. WE RESERVE THE RIGHT, AT OUR OWN EXPENSE, TO ASSUME THE EXCLUSIVE DEFENSE AND CONTROL OF ANY MATTER OTHERWISE SUBJECT TO INDEMNIFICATION BY YOU AND YOU SHALL NOT IN ANY EVENT SETTLE ANY MATTER WITHOUT OUR WRITTEN CONSENT.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Jurisdiction; Choice of Law and Forum; Time Limit.</strong></p>\r\n<p>\r\n	THIS SITE IS OPERATED BY US IN THE UNITED STATES AND WE MAKE NO WARRANTY THAT THE MATERIALS AND CONTENT ON THE SITE ARE APPROPRIATE OR AVAILABLE FOR USE OUTSIDE OF THE UNITED STATES. THOSE WHO CHOOSE TO ACCESS THE SITE FROM OUTSIDE THE UNITED STATES DO SO ON THEIR OWN INITIATIVE AND ARE RESPONSIBLE FOR LOCAL LAWS, IF AND TO THE EXTENT THAT LOCAL LAWS ARE APPLICABLE.</p>\r\n<p>\r\n	ANY AND ALL SERVICES AND RIGHTS OF USE HEREUNDER ARE PERFORMED, PERFORMABLE AND/OR SOLD IN THE STATE OF FLORIDA, UNITED STATES OF AMERICA, AND YOU IRREVOCABLY AGREE AND CONSENT THAT ANY CAUSE OF ACTION YOU MAY SUBMIT IN CONNECTION WITH YOUR USE OF THE SITE OR PURSUANT TO THESE TERMS WILL BE FILED IN THE STATE OR FEDERAL COURTS IN ORANGE COUNTY, FLORIDA WHICH YOU ACKNOWLEDGE, CONSENT TO AND AGREE WILL BE THE EXCLUSIVE FORUM AND VENUE FOR ANY LEGAL DISPUTE BETWEEN YOU AND US. YOU ALSO AGREE THAT ANY DISPUTE BETWEEN YOU AND US WILL BE GOVERNED BY THE LAWS OF THE STATE OF FLORIDA, WITHOUT REGARD TO CONFLICT OF LAWS PRINCIPLES. ANY CAUSE OF ACTION YOU MAY HAVE HEREUNDER OR WITH RESPECT TO YOUR USE OF THE SITE MUST BE COMMENCED BY FILING SUIT IN ORANGE COUNTY, FLORIDA, WITHIN ONE (30) CALENDAR DAYS AFTER THE INCIDENT UPON WHICH THE CLAIM OR CAUSE OF ACTION IS BASED FIRST OCCURRED.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Additional Terms and Conditions Applicable to all future affiliations including a ReservationManager&trade;</strong></p>\r\n<p>\r\n	In addition to being bound by the other terms set forth herein, Users and Members who will use ReservationManager will also be bound by the following terms, which are in addition to any other terms applicable in connection with using our Site..</p>\r\n<p>\r\n	<strong>Services</strong>. We will soon provide ReservationManager as a service to our users and members on our Site operated by HomeVacationClub (such Sites and services, collectively, our &quot;Services&quot;) to manage inquiries, quotes, rental agreements and payments. Please review the following terms carefully. If you do not agree to these terms, you have no right to obtain information from or otherwise continue using our Services. Failure to use our Services in accordance with the following terms of use may subject you to severe civil and criminal penalties. We reserve the right to modify the terms or policies relating to the Services at any time, effective upon posting of an updated version of these terms on the Site. You are responsible for regularly reviewing these terms. By using our Services, you agree that the posting of new or revised terms and conditions on the Site will constitute adequate and constructive notice to you of any and all revisions and changes. Continued use of the Services after any such changes or after explicitly accepting the new terms upon logging into the Site shall constitute your consent to such changes.</p>\r\n<p>\r\n	<strong>Rental Agreement</strong>. By utilizing a rental agreement in (soon to be) ReservationManager, the user (as &quot;Guest&quot;) and member (as &quot;Owner&quot;) each agree to the terms and conditions set forth in the rental agreement (including without limitation the cancellation refund policy) effective as of the date that the user indicates acceptance of the rental agreement. You hereby acknowledge and agree that (a) you are fully responsible for the terms and conditions of the rental agreement, (b) any rental agreement used, whether a sample provided by the Site or a rental agreement copied and pasted in (soon to be) ReservationManager by either party, is used solely at their own risk and expense, (c) nothing contained in (soon to be) ReservationManager, this Agreement, or any sample rental agreement is a substitute for the advice of an attorney, and (d) that you have been hereby advised to obtain local legal counsel to prepare, review and revise as necessary any rental agreements to ensure compliance with federal, state, and local law and their particular circumstances, and to revise the rental agreement as necessary to accurately represent their property, rules, features, etc. Property Damage Protection (soon to come and currently not offered). By utilizing and/or purchasing Property Damage Protection in the (soon to be) ReservationManager, you agree to the terms and conditions under the Property Damage Protection plan, acknowledge that you understand that certain policy restrictions apply, and agree that Property Damage Protection may be included in the rental. You further acknowledge and agree that (a) although the Property Damage Protection policy will pay a maximum benefit up to the policy limit, you remain fully responsible for the care and condition of the vacation rental property and for any damage to the vacation rental property, (b) you remain fully responsible for any damages that are not covered by the policy or that exceed the policy limits, (c) if during you stay at the vacation rental (if applicable) you, as the insured person under the Property Damage Protection plan, causes any damage to real or personal property of the member as a result of inadvertent acts or omissions, you will be responsible for the cost of repair or replacement of such property and hereby authorize and request CSA Travel Protection and Insurance Services to pay directly the Member any amount payable under the terms and conditions of the Property Damage Protection plan up to a maximum benefit of the policy limit. Full details of the Property Damage Protection coverage are contained in the Description of Coverage . Members further acknowledge and agree that they will choose the plan level with the appropriate level of coverage needed for each vacation rental property and that they will offer that same plan level to all Users agreeing to rent this property. Carefree Rental Guarantee (currently not offered and soon to come). By utilizing and/or purchasing Carefree Rental Guarantee in the (soon to be) ReservationManager, you agree to the terms and conditions of the Carefree Rental Guarantee on the site. Cancellation Protection (currently not offered and soon to come). By utilizing and/or purchasing (the soon to come) Cancellation Protection in the (soon to be) ReservationManager, you agree to the terms and conditions under the plan and acknowledge that User understands that certain policy restrictions apply. Full details of the (soon to come) Cancellation Protection coverage are contained in the Description of Coverage.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>GENERAL</strong></p>\r\n<p>\r\n	<strong>Contact Us: To contact us for any reason, users can go to:</strong></p>\r\n<p>\r\n	<a href="homevacationclub.com">HomeVacationClub.com</a> Your agreement to abide by these Terms, the Privacy Policy and any other terms posted on any Site, with respect to any Site you use, is between you and the entity listed above operating such Site. No Agency: Our relationship is that of independent contractors, and no agency, partnership, joint venture, employee-employer or franchiser-franchisee relations is intended or created by these Terms or your use of the Site.</p>\r\n<p>\r\n	<strong>Notices</strong>: Except as explicitly stated otherwise, any notices to us shall be given by email to contact us on homevacationclub.com.</p>\r\n<p>\r\n	When we need to send you notice, it will be sent to the email address you provide to the Site during the registration process or as later updated in your account (if applicable). Notice shall be deemed given upon receipt or 24 hours after an email is sent, unless the sending party is notified that the email address is invalid. Alternatively, we may give you notice by certified mail, postage prepaid and return receipt requested, to any physical or electronic address provided to us during the registration process or as later updated in your account (if applicable). In such case, notice shall be deemed given three days after the date of mailing to a physical address and one day after mailing to an electronic address.</p>\r\n<p>\r\n	Changes to the Site or these Terms and Conditions: We may change, suspend or discontinue any aspect of the Site at any time, including the availability of any Site features, database, or content. We may also impose limits on certain features or services or restrict your access to parts or the entire Site without notice or liability.</p>\r\n<p>\r\n	This version of the Terms became effective on the date set forth above and this version amends the version effective prior to such date. We reserve the right, in our sole discretion, to amend these Terms, in whole or in part, at any time, with or without your consent, and you acknowledge and agree that your consent to any such amendment is not required in the event the proposed amendment is clerical and/or non-substantive in nature. Notification of any amendment will be posted on the Site by the indication of the last amendment date at the top of these Terms and will be effective immediately. If you disagree with any non-clerical and/or substantive amendment to these Terms, then (i) your sole remedy as a traveler, or any other user other than a member, is to discontinue your use of the Site, and (ii) your sole remedy as a member is to withhold your consent to the applicability of the proposed amendment to your use of the Site, in which case your use of the Site will continue to be governed by the terms and conditions that were applicable to your use of the Site during the then current term of your subscription as the same were in effect immediately prior to the proposed amendment and you agree that you are responsible for keeping a copy of such terms. When members renew subscriptions, the terms in effect at the time of renewal will govern, provided that such terms may change as described above. We also reserve the right, in our sole discretion and from time to time, to offer programs, products or services with unique terms and conditions that are separate from and may supersede or supplement in certain respects these Terms. In such cases, your use of the Site with respect to such special program is governed by the terms and conditions of such l program, product or service.</p>\r\n<p>\r\n	Subscription rates are set at the time of a user or member&rsquo;s subscription or renewal, as applicable. Such rates are subject to change without notice or approval. The rates in effect at the time of the member&rsquo;s next subscription renewal, new listing or a member&rsquo;s upgrade or any other additional or new order of any product or service will govern for such renewal or other order. The types of products and services (including the features, terms and operation thereof) offered at the time of a member&rsquo;s subscription are subject to change without notice or approval. We further reserve the right to offer additional products, services or features for purchase at any time. See also the section below relating to auto renewal of subscriptions.</p>\r\n<p>\r\n	<strong>Your Record of These Terms:</strong> We do not separately file the Terms entered into by each user of the Site. Please make a copy of these Terms for your records by printing and/or saving a downloaded copy of the Terms on your personal computer.</p>\r\n<p>\r\n	<strong>Enforcement of These Terms:</strong> We may immediately terminate any user&rsquo;s access to or use of the Site due to such user&rsquo;s breach of these Terms or any other unauthorized use of the Site. However, we do not guarantee that we will take action against all breaches of these Terms. Our failure to take immediate action with respect to a breach by you or others does not waive our right to act with respect to such breach or any other breach. Any action or inaction by us in response to any breach of these Terms does not limit our rights with respect to actions we may take in response to any other similar or different type of breach.</p>\r\n<p>\r\n	<strong>Entire Agreement, Headings and Severability:</strong> These Terms constitute the entire agreement between us and you with respect to the matters set forth herein, and supersede any prior agreement between us and you with respect to your use of the Site. Headings in these Terms are for reference only and do not limit the scope or extent of such section. If any portion of these Terms is found to be invalid or unenforceable by any court of competent jurisdiction, the other provisions of these Terms shall remain in full force and effect. Further, any provision of these Terms held invalid or unenforceable only in part or degree will remain in full force and effect to the extent not held invalid or unenforceable. Assignment: We may assign these Terms in our sole discretion. Users must obtain our prior written consent to assign these Terms, which may be granted or withheld by us in our sole discretion.<br />\r\n	&nbsp;</p>\r\n<h1>\r\n	Additional Terms and Conditions Applicable to Our Members</h1>\r\n<p>\r\n	In addition to being bound by the Terms set forth above, members who purchase subscriptions to advertise a property on the Site are also bound by the following terms, which are in addition to any other terms agreed to in connection with purchasing or renewing a subscription.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Member Eligibility; Accuracy of Information; Representations.</strong></p>\r\n<p>\r\n	Our services may only be used by members who can form legally binding contracts under applicable law. If you are registering as a business entity, you represent that you have the authority to bind the entity to these Terms. Each member represents and covenants that all information submitted to us and to the Site during such member&rsquo;s registration with the Site shall be true and correct. Each member further agrees to promptly provide notice to the Site by contacting us as provided above under &quot;General - Contact Us&quot; regarding any updates to any such contact information previously submitted by such member to the Site. Each member agrees to promptly provide such proof of personal identification, proof of ownership of the property listed on the Site, and proof of authority to list the property as we may request. Each member further represents and covenants that:</p>\r\n<ul style="padding-left: 15px;">\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		it owns and/or has all necessary rights and authority to offer for rent and to rent the property listed by such member;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		it will not wrongfully withhold a rental deposit in breach of the underlying rental agreement;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		that it will accurately describe the subject rental property and will not fail to disclose a material defect in, or material information about, a rental property;</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		that it will not wrongfully deny access to the listed property; and</li>\r\n	<li style="list-style-type: disc; list-style-position: outside;">\r\n		that it will not fail to provide a refund when due in accordance with the underlying rental agreement. Upon our request, each member agrees to promptly provide to us such proof of personal identification, proof that the condition, location, or amenities associated with the property are accurately described in the listing, proof of ownership of the property listed on the Site, and/or proof of authority to list the property as we may request.</li>\r\n</ul>\r\n<p>\r\n	<strong>Content, Layout and Copy.</strong></p>\r\n<p>\r\n	All content and copy edits submitted by members are subject to review and approval by us in our sole discretion. We reserve the right to refuse to publish any content that we determine, in our sole discretion, does not meet these Terms or is otherwise unacceptable to us. However, we assume no duty to review content and we shall not have any liability for any loss or damage resulting from the design or positioning of the copy, properties, content and/or photographs or any change made to any content, photograph or copy submitted by any member. All content must meet these Terms and our Content Guidelines . We reserve the right to edit content submitted to the Site in a non-substantive manner solely to cause the content to comply with our content guidelines or formatting requirements. Members are responsible for reviewing and ensuring that any content displayed on the Site appears as the member intended.</p>\r\n<br />\r\n<br />\r\n<p>\r\n	All printed (paper based) photographs submitted by a member will be discarded after we have scanned the same into our electronic database. We have no responsibility to return such photographs to you. We will use reasonable efforts to reproduce faithfully any photograph submitted, but we are not responsible for any loss or damage or harm otherwise resulting from any defect in this regard. Photographs should depict the vacation rental as the main subject of the photograph and may not include children or adults if you do not have their legal consent or any information that would violate the privacy rights, intellectual property rights or any other rights of a third party. Photographs must meet our Content Guidelines. We reserve the right not to display or to remove any photographs that we determine, in our sole discretion, do not meet these Terms or are otherwise unacceptable to us.</p>\r\n<p>\r\n	<strong>Photographs.</strong></p>\r\n<p>\r\n	All printed (paper based) photographs submitted by a member will be discarded after we have scanned the same into our electronic database. We have no responsibility to return such photographs to you. We will use reasonable efforts to reproduce faithfully any photograph submitted, but we are not responsible for any loss or damage or harm otherwise resulting from any defect in this regard. Photographs should depict the vacation rental as the main subject of the photograph and may not include children or adults if you do not have their legal consent or any information that would violate the privacy rights, intellectual property rights or any other rights of a third party. Photographs must meet our Content Guidelines. We reserve the right not to display or to remove any photographs that we determine, in our sole discretion, do not meet these Terms or are otherwise unacceptable to us.</p>\r\n<p>\r\n	By submitting a photograph either electronically through the Site or by mailing a paper photograph to our offices, the member represents and warrants that (a) (i) it holds all intellectual property rights with respect to each submitted photograph, or (ii) it has secured from the copyright holder all rights necessary for the photograph to be used in an online advertisement, (b) that any people in the photograph have given permission for their likeness to be displayed in an online advertisement on the Site, (c) that the photograph accurately and fairly represents the subject of the photograph and has not been altered in any manner that would mislead a viewer of that photograph, and (d) that it will indemnify and hold harmless the Site and any member of the HOMEVACATIONCLUB, INC from any cause of action arising from any misrepresentation with respect to any and all photographs so submitted.</p>\r\n<p>\r\n	It is the member&rsquo;s responsibility to obtain reproduction permission for all photographic and other material used in its advertisements. The member warrants that it is the owner of the copyright in such material or is authorized by the owner thereof to grant to us the rights therein contained and agrees to provide any proof of such rights to us that we may request. Further, each member agrees that we may reproduce in whole or in part any photographic material supplied by such member in the promotion of either such member&rsquo;s property or the promotion of the Site.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Uses of Our Trademarks or Logos.</strong></p>\r\n<p>\r\n	There are limited ways in which you may use our trademarks or logos without specific prior written authorization. The following are general guidelines: It is usually permissible for you to refer to HomeVacationClub or the name of one of our affiliate websites on which you list your property in a descriptive manner in your listing on the Site or in other permissible communications. For example, you might say &quot;Check out my vacation rental on HomeVacationClub,&quot; or &quot;I list properties on HomeVacationClub.&quot; However, you may not refer to HomeVacationClub or any of our affiliates in any way that might lead someone to believe that your company or site is sponsored by, affiliated with, or endorsed by HomeVacationClub or one of our affiliates. For example, you may not say &quot;HomeVacationClub sponsors my vacation rental,&quot; or describe your property as &quot;HomeVacationClub&rsquo;s best vacation rental.&quot; You may not use the HomeVacationClub name or one of our affiliates&rsquo; names on any other website that lists vacation rentals without our prior written authorization.</p>\r\n<p>\r\n	The HomeVacationClub name and logo and those of the HomeVacationClub, Inc and our affiliates are registered trademarks in the United States and other jurisdictions around the world. We generally do not permit the use of our names and logos, other than as described above or with our prior written authorization. If you want permission to use our name and/or logo in any other manner, including, without limitation, on any website, business card, signage, t-shirts, etc., or if you have other questions, you may email us from the site.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Hypertext Links.</strong></p>\r\n<p>\r\n	We reserve the right to refuse hypertext links to, or addresses of, other web sites from members&#39; pages, and to remove links or web addresses without notice at our sole discretion. Further, we reserve the right to charge for hypertext links at any time.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Substitution of Properties; Advertising More Than One Property; Property Managers.</strong></p>\r\n<p>\r\n	Each advertisement must relate to an individual and uniquely identified property, unless (i) you are a property manager who has signed up for one of our packages for members who are property managers or (ii) you otherwise purchased a subscription package that expressly allows for substitution of properties. This means that:</p>\r\n<ul style="padding-left:15px;">\r\n	<li style="list-style-type: lower-alpha">\r\n		The property in an advertisement may not be substituted for another property without our consent. We may approve a request if the property that was listed was sold or the contract with the owner was cancelled and the member provides sufficient proof thereof and completes any additional request forms we may request. The term of the subscription for any substituted property shall be the same as the term of the originally listed property (i.e., the term will not be extended past the original term).<br />\r\n		If a member submits changes to an existing listing that, if approved, would substantially alter the listing to make it that of another property, then we have the right to terminate the listing and may choose, in our sole discretion, to retain any fees associated with the term of the previously existing listing as compensation for the violation of this condition.</li>\r\n	<li style="list-style-type: lower-alpha">\r\n		The listing specifically cannot be a mere example of properties in a given area. Only one property can appear on each advertisement, unless it is a property with multiple rental units on the same site and additional advertising units are purchased. We reserve the right to amend the copy or remove any advertisement when more than one property is described in such advertisement, and may choose, in our sole discretion to retain any fees associated with the initial term of such non-conforming listing as compensation for the violation of this condition.</li>\r\n	<li style="list-style-type: lower-alpha">\r\n		Members who manage SIX or more properties should contact HomeVacationClub, Inc for Property Managers via email to discuss the packages that may best suit their needs. All other subscription listing packages require one subscription per listing (one subscription per property). Contact HomeVacationClub, Inc for Property.</li>\r\n</ul>\r\n<p>\r\n	<strong>Unauthorized Payment Methods; Subscription Payments; Automatic Renewal of Subscription Payments</strong></p>\r\n<p>\r\n	<strong>Payments between members and travelers:</strong> We are not a party to any payment transaction between members and travelers. No member may request any traveler to mail cash, or utilize any instant-cash wire transfer service such as Western Union or MoneyGram in payment for all or part of a property rental transaction. Any violation of this term or any other unacceptable payment methods that may be posted on the Site may result in the immediate removal of the non-conforming listing from the Site without notice to the member and without refund. From time to time, we may become aware of users attempting to conduct a transaction that would involve an unauthorized payment method or a fraudulent payment method. Ideally, we hope to be able to assist users in avoiding such transactions, but we assume no liability or responsibility to do so or to inform users of any such actual or suspected activity. Payments for subscriptions: Payment for subscription listings must be made to us in U.S. Dollars paid either by major credit or debit card, or a check drawn on a U.S. bank.</p>\r\n<p>\r\n	<strong>Automatic Renewal</strong>.<br />\r\n	as applicable, for any subscription paid for by credit card, such subscription shall automatically renew at the expiration of the then-current term for an additional term of the same duration (as the previous term) and at the then-current non-promotional subscription rate. If such subscription was purchased by check or another form of payment other than by credit card (if such other payment form was permitted), such subscription shall not be automatically renewed. Automatic renewal applies to all subscriptions purchased by credit card on or after the applicable date set forth above and all subscriptions in force as of such date if we contact the member to obtain the credit card information in order to facilitate automatic renewal. This automatic renewal feature allows your service to remain uninterrupted at the expiration of your then-current term. If you wish to turn off auto-renewal, you must log on to your account and manually turn off auto-renewal in your owner dashboard, at any time prior to expiration of the then-current term. Upon any such turning off auto-renewal, your subscription will remain active through the expiration of your then-current subscription term; however your subscription will not be automatically renewed upon the expiration of your then current term. If your subscription does not auto-renew or expires at the end of your then current subscription term and you desire to renew your subscription, you will be required to pay the then-current non-promotional subscription rate to renew your subscription or to activate a new subscription.<br />\r\n	If you do not turn off auto-renewal and you continue to use our subscription service, you re-affirm and authorize us to charge your credit card at the end of each subscription term for an additional term of the same duration as the initial term and at the then-current non-promotional subscription rate for the same product or service.<br />\r\n	If the product or service that you last purchased has changed in any way or is no longer offered, you agree and authorize us to charge your credit card at the renewal of your subscription term for a product or service that is the most similar, as determined by us, to the product or service that you previously purchased, even if the price of such product or service is not the same of the prior product or service that you purchased. You agree to be responsible for any such charges, and we reserve the right to obtain payment directly from you if necessary.<br />\r\n	If you wish to avoid billing of subscription fees for the renewal term to your credit card, you must turn off auto-renewal for your subscription before it renews. If you wish to change your credit card to be charged or if your credit card information otherwise changes, see details on site for HomeVacationClub, Inc or for HomeVacationClub, Inc Supporet &amp; FAQ information on updating the information in your owner dashboard, as applicable or to provide the new or different credit card information.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Subscription Term, Refund Requests and Termination or Transfer of Listings.</strong></p>\r\n<p>\r\n	<strong>Subscription Term</strong>: All subscription listings are sold to run the full term that is chosen by the member. The term starts on the date that the member submits the full or initial (as applicable) payment and expires on the last date of the term chosen by the member. For example, for an annual subscription term, if the member submits payment for the subscription on July 1st, the subscription would expire on June 30 of the following year.</p>\r\n<p>\r\n	<strong>Refund Requests</strong>: Generally, no refunds are available unless a member qualifies for a refund under any guarantee program we may have in effect. If you believe you qualify for a refund under a guarantee we are offering, you may contact customer support by sending your request to the address listed under &ldquo;General &ndash; Contact Us&rdquo; above and include your listing number, and your reason for dissatisfaction. We will then determine, in accordance with the applicable guarantee program, whether any refund is due.</p>\r\n<p>\r\n	<strong>Refund Requests for Subscription Listings Not Completed:</strong> In the event you purchase a subscription for a listing but do not complete the creation of the listing or the listing does not get posted after purchase for any other reason, refund requests will be considered only during the first three (3) months following the purchase date. If within such three (3) month period you do not complete the creation of your listing as we may require to display such listing on the Site (i) you shall not be entitled to any refund and (ii) your subscription will expire no more than 15 months from the purchase date of the subscription regardless of the listing posting date.</p>\r\n<p>\r\n	If you renew your subscription, or if your subscription automatically renews under its terms of your subscription, your listing will remain online for the entire subscription period without refund. If you sell your property and no longer wish for the listing to remain online, please contact us and we can remove the listing; however, no refund will be owed.</p>\r\n<p>\r\n	<strong>Our Right to Terminate a Listing:</strong> If, in our sole discretion, any member submits unsuitable material to our Site or into our database, misuses the Site or our online system or is in material breach of these Terms, we reserve the right to terminate such member&rsquo;s subscription(s) immediately without refund. In addition, if we become aware of or receive a complaint or a series of complaints from any user or other third party regarding a member&rsquo;s listing or rental practices that, in our sole discretion, warrants the immediate removal of such member&rsquo;s listing from the Site (for example, and without limitation, if a member double-books a property for multiple travelers on the same date, or engages in any practice that, in our sole discretion, would be considered deceptive, unfair or improper within the vacation rental industry or in an online marketplace for vacation rentals, if we determine or suspect that the member&rsquo;s payment-related practices or procedures are not secure, legal or otherwise proper, or if we receive a complaint that any listing&rsquo;s content infringes on the rights of a third party), then we may immediately terminate such member&rsquo;s listing(s) or subscription(s) without notice to the member and without refund. We assume no duty to investigate complaints. Finally, if any member is abusive or offensive to any employee or representative of the HomeVacationClub, Inc, we reserve the right to terminate such member&rsquo;s listing(s) or subscription(s) immediately without refund. Finally, if any member is in breach of these Terms or its obligations to us or any of our third party providers then we may terminate such member&rsquo;s subscription(s) immediately without notice to the member and without refund.</p>\r\n<p>\r\n	<strong>Transfer of Listing to a Third Party:</strong> No listing may be transferred to another party. In the event of a property sale, HomeVacationClub will provide guidance to both seller and buyer regarding options for creating a new listing.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Additional Terms Applicable.</strong></p>\r\n<p>\r\n	A description of the features and applicable fees and commissions that will apply to pay-per-booking listings will be displayed under the &ldquo;List Your Property&rdquo; tab of the Site offering such product, when made generally available.</p>\r\n<p>\r\n	When available, pay-per-booking listings may be agreed to by property owners and managers approved for an online payments account. Such accounts are subject to the additional terms, conditions and requirements set forth during the sign up for such an account, including those of our third party providers. Online booking and payments is required for all pay-per-booking listings. Online payments are provided by third party providers and are subject to the terms and conditions and privacy policies of such providers.</p>\r\n<p>\r\n	Cancellation policies are required for all pay-per-booking listings, and requirements for such cancellation policies shall be displayed through the &ldquo;List Your Property tab of the Site offering the pay-per-booking listing. To the fullest extent legally permissible, Members who list their properties in a pay-per-booking listing, agree to rent such properties through such listing and not through any other means.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h1 style="color:#0d4c78;">\r\n	<span style="color:#000000;">ADDITIONAL TERMS AND CONDITIONS</span></h1>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="color:#0d4c78; font-size:18px;">\r\n	<span style="color:#000000;">AGREEMENT BETWEEN OWNER, CUSTOMER AND HOME VACATION CLUB INC.</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">This site is operated by Home Vacation Club Inc and offered to the customer, conditioned on your acceptance without modifying the terms, conditions, and notices herein. Your use of this website constitutes your agreement to all such terms, conditions, and notices.</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">This site is for your personal and non-commercial use only. You may not copy, modify, transmit, license, distribute, perform, reproduce, display, publish, create derivative works from, transfer, or sell any information, products, software or services obtained from this site.</span></p>\r\n<p style="color:#0d4c78; font-size:18px;">\r\n	<span style="color:#000000;">LIABILITY DISCLAIMER:</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">Products, software, information and services published by Home Vacation Club Inc and its Owners on this site may include inaccuracies or typographical errors. Home Vacation Club and its Owners do not warrant the completeness, currency, reliability, or accuracy of any of the contents (availability and rates) or unit data found on this site. This content and data is subject to change without notice. Changes and improvements are constantly added to the information herein.</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">Home Vacation Club Inc makes no representations about the suitability of the information, products, software and services contained on this site for any purpose. All such information, products, software and services are provided &quot;AS IS&quot; without warranty of any kind. Home Vacation Club Inc hereby disclaims all warranties and conditions with regard to this information, products, software and services. Including all implied warranties and conditions of merchantability, fitness for a particular purpose, title, and noninfringement. In any event shall Home Vacation Club Inc be liable for any indirect, direct, punitive, special, incidental or consequential damages arising out of, or in any way connected with, the use of this site or inability to use this site, or with the delay, or for any information, products, software, and services obtained through this site, or otherwise arising out of the use of this site, whether based on tort, strict liability, contract, or otherwise. Even if Home Vacation Club Inc has been advised of the possibility of damages. Because some provinces/states/jurisdictions do not allow the exclusion or limitation of liability for consequential or incidental damages, the above limitation may not apply to you nor anyone involve in your transaction.</span></p>\r\n<p style="color:#0d4c78; font-size:18px;">\r\n	<span style="color:#000000;">NO UNLAWFUL OR PROHIBITED USE:</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">As a condition of your use of this site, you warrant that you will not use this site for any purpose that is unlawful or prohibited by these terms, conditions, and notices.</span></p>\r\n<p style="color:#0d4c78; font-size:18px;">\r\n	<span style="color:#000000;">LINKS TO THIRD-PARTY WEBSITES:</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">This site may contain hyperlinks to other sites operated by parties other than Home Vacation Club Inc. Such hyperlinks are provided for your reference only. Home Vacation Club Inc does not control such sites and is not responsible for their contents. Home Vacation Club Inc&#39;s inclusion of hyperlinks to such sites does not imply any endorsement of the material on such sites or any association with their operators.</span></p>\r\n<p style="color:#0d4c78; font-size:18px;">\r\n	<span style="color:#000000;">MODIFICATION OF THESE TERMS AND CONDITIONS</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">Home Vacation Club Inc reserves the right to change the terms, conditions, and notices under which this site is offered.</span></p>\r\n<p style="color:#0d4c78; font-size:18px;">\r\n	<span style="color:#000000;">GENERAL</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">This agreement is governed by the laws of the state of Florida of United Estates. Use of this site is unauthorized in any jurisdiction that does not give effect to all provisions of these terms and conditions, including, without limitation, this paragraph. You agree that no partnership, joint venture, employment, or agency relationship exists between you and Home Vacation Club Inc as a result of use of this site or this agreement. Home Vacation Club Inc&#39;s performance of this agreement is subject to existing laws and legal process. And nothing contained in this agreement is in derogation of Home Vacation Club Inc&#39;s right to comply with law enforcement requests or information provided to or requirements relating to your use of this site or gathered by Home Vacation Club Inc with respect to such use.</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">This agreement constitutes the entire agreement between the customer and Home Vacation Club Inc with respect to this site and it supersedes all prior or contemporaneous communications and proposals, whether electronic, written or oral, between the customer and Home Vacation Club Inc with respect to this site. A printed version of this agreement and of any notice given in electronic form shall be admissible in judicial or administrative proceedings based upon or relating to this agreement to the same extent and subject to the same conditions as other business documents and records originally generated and maintained in printed form. Any rights not expressly granted herein are reserved.</span></p>\r\n<p style="color:#0d4c78; font-size:18px;">\r\n	<span style="color:#000000;">USE OF &quot;REQUEST FOR BOOKING&quot; SERVICE:</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">The &quot;Request for Booking&quot; service on this site is provided solely to assist customers in determining the potential availability of vacation homes and to potentially make legitimate reservations or otherwise transact business , not limited to for sale by owner, with the owners or managers of vacation homes, and for no other purposes.</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">You warrant that you are at least 18 years of age and possess the legal authority to enter into this agreement and to use this site in accordance with all terms and conditions herein. You agree to be financially responsible for all of your use of this site (as well as for use of your account by others, including, without limitation, minors living with you). You also warrant that all information supplied by you or members of your household in using this site is true and accurate.</span></p>\r\n<p style="color:#0d4c78;">\r\n	<span style="color:#000000;">Separate terms and conditions will apply to your reservation of vacation homes. You agree to abide by the terms or conditions of purchase imposed by owners with whom you elect to rent or buy from, including, but not limited to, payment of all amounts when due and compliance with all rules and restrictions regarding availability of products, fares or services. You shall be completely responsible for all charges, fees, duties, taxes, and assessments arising out of the use of this site.<br />\r\n	<strong>Home Vacation Club Inc. All rights reserved.</strong></span></p>\r\n', '');
INSERT INTO `vacation_cms` (`id`, `pagename`, `title`, `pagedetail`, `image`) VALUES
(6, 'Privacy Policy', 'Privacy Policy', '<p>\r\n	This Privacy Policy is intended to inform you about the types of information gathered by Home Vacation Club, Inc. (&quot;HVC, Inc&quot;, &quot;we&quot;, &quot;us&quot;) when you use the HomeVacationClub.com service (the &quot;Service&quot;), how we use and safeguard that information, and the degree to which you may control the collection and use of that information. Through the Service, HomeVacationClub provides a venue for vacation rental property owners or managers (&quot;Owners&quot;) to advertise their vacation rental properties to potential renters, and for potential renters (&quot;Renters&quot;) to find a suitable vacation rental property.</p>\r\n<p>\r\n	We may update this Privacy Policy from time to time. If you are a registered user of the Service, we will attempt to inform you of any material changes by email. Otherwise, you may always view the most recent Privacy Policy on the HomeVacationClub.com. Your continued use of the Service constitutes your agreement with the existing and updated policies</p>\r\n<p>\r\n	<strong>Information Collection, Use, and Tracking</strong><br />\r\n	We will not collect any personally identifiable information about you unless you choose to provide that information to us. Most areas of the Service are accessible without registration or the need to disclose any personally identifiable information. However, Owners will be required to register with the Service, and, following the FIXED LOW PRICE trial period, purchase a subscription in order to advertise properties on the Service. In order to register as an Owner and complete the subscription process, you will be required to provide your name, address, telephone number, email address, and credit card information. All personal financial information you provide to us in order for us to complete the subscription process will be securely collected and provided to a third party vendor, who will process payments and complete transactions.</p>\r\n<p>\r\n	Owners will be required to create a public profile, which will include your name and telephone number, and may include other optional information. Please be aware that information in your public profile may be viewed by the general public.</p>\r\n<p>\r\n	HomeVacationClub does not knowingly collect any personally identifiable information from, or allow registration by, persons under 18 years old. If you are under 18 years of age, you are not authorized to create an account on the Service, but you may utilize those portions of the Service that do not require the collection of personally identifiable information.</p>\r\n<p>\r\n	<strong>Analytics</strong> We may use third party services (eg Google Analytics) to automatically collect and store certain information about your interaction with the Service, including IP addresses, browser type, internet service provider (ISP), referring/exit pages, operating system, date/time stamps, and related data. We use this information, which does not identify individual users, solely to improve the quality of our products and services. We also use cookies to make it easier for you to use the Service. You are free to decline cookies, but by doing so you may not be able to take full advantage of all of our services.</p>\r\n<p>\r\n	<strong>Cookies</strong> We use cookies to store your preferences and to record session information. A cookie is a small text file placed on your computer when you visit our website. The cookie enables the Service to readily recognize you as you move through it or return on subsequent visits. Cookies also allow us to make sure that only your browser can exchange information regarding your account with our servers. We do not link the information we store in cookies to any personally identifiable information you submit while using the Service.</p>\r\n<p>\r\n	<strong>Email Notices</strong> When you register as an Owner, we will send you a welcome email which includes welcome information about the Service and your account. We will send also you emails with information about any inquires you may receive from Renters regarding a property you have advertised. You may also request to receive periodic emails from us notifying you about new or upcoming HomeVacationClub products or services. If you later decide you no longer wish to receive these emails, you may opt-out as instructed in each email. Be advised, however, that you may not opt-out of receiving emails from us related to inquiries from Renters, technical support requests, or updates to the HomeVacationClub Terms and Conditions or Privacy Policy.</p>\r\n<p>\r\n	<strong>Newsletters</strong><br />\r\n	HomeVacationClub gives you the opportunity to subscribe to newsletters by providing us with your email address. We will send each newsletter to the email address you have provided. If you later decide you no longer wish to receive these newsletters, you may opt-out as instructed in each email.<br />\r\n	If you forget your account login information, you may request that we send it to the email address associated with your account. Please take steps to keep your account information secure to prevent unauthorized access.</p>\r\n<p>\r\n	<strong>California Do Not Track Notice</strong><br />\r\n	HomeVacationClub does not track its users over time and across third party websites, and therefore does not respond to Do Not Track signals sent by your browser or mobile application. HomeVacationClub does not authorize the collection by third parties of personally identifiable information from HomeVacationClub users.</p>\r\n<p>\r\n	<strong>Disclosure</strong><br />\r\n	We understand how highly our users value the privacy and security of their personally identifiable information. We will disclose information collected from and about you only as follows:<br />\r\n	(1) to our related companies, service providers, and Affiliates (as defined below), to enable them to fulfill a product or service request or to perform a business, professional or technical support function for us;<br />\r\n	(2) as necessary if we believe that there has been a violation of our Terms and Conditions or of our rights or the rights of any third party; and<br />\r\n	(3) to respond to judicial process and provide information to law enforcement agencies or in connection with an investigation on matters related to public safety, as permitted by law, or otherwise as required by law.</p>\r\n<p>\r\n	<strong>Disclosure to Affiliates</strong><br />\r\n	HomeVacationClub uses third party marketers (&quot;Affiliates&quot;) to assist in marketing and promoting the Service and the advertised properties. In connection with these efforts, we share with our Affiliates certain information about Owners and their advertised properties, including text, photographs, and the Owner&rsquo;s public profile. We do not disclose any personal financial information to Affiliates, nor do Affiliates collect any personal financial information.</p>\r\n<p>\r\n	<strong>Public Disclosure</strong><br />\r\n	Please keep in mind that any information you choose to include in your public profile and advertisements will be visible to the general public and may be collected and used by others. Consequently, we urge you to be cautious in deciding what and how much information you choose to disclose.</p>\r\n<p>\r\n	<strong>Links To Third Party Sites</strong><br />\r\n	The Service may contain links to third party websites. These sites may have their own terms of service and privacy policies which do not apply to HomeVacationClub or the Service.</p>\r\n<p>\r\n	<strong>Business Transitions</strong> In the event HomeVacationClub goes through a business transition, such as a merger, acquisition by another company, or sale of all or a portion of its assets, any personally identifiable information we have on record will likely be among the assets transferred. The transferred information will remain subject to the provisions of this Privacy Policy or any subsequent updated versions.</p>\r\n<p>\r\n	<strong>Information Security</strong> We employ encryption and other security measures to protect the loss, misuse, and alteration of the information under our control. We take commercially reasonable steps to protect this information by using secure-socket-layer (&quot;SSL&quot;) to protect the transmission of such information. However, please be advised that while we make every effort to ensure the integrity and security of our network and systems, we cannot guarantee that our security measures will prevent unauthorized access from occurring. Please take steps to maintain the security of your account information.</p>\r\n<p>\r\n	<strong>Contact Us</strong> If you have any questions or concerns about this Privacy Policy, HomeVacationClub, or the Service, please contact us. Thank you.</p>\r\n', ''),
(7, 'Help', 'Help', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.\r\n', ''),
(11, 'Payment Successful', 'Payment Successful', '<p>Dear customer,</p>\r\n<p>Thank you very much for ordering our product. You will be receiving an e-mail  within next few minutes about the products you have purchased.</p>\r\n<p>For any problems please e-mail <a href=\\"mailto:info@10doller.com\\">info1@10doller.com</a>.Â Â </p>\r\n<p>Please <a href=\\"index.php\\">click here</a> to visit the home page. </p>', ''),
(12, 'Payment Failure', 'Payment Failure', '<p>\r\n	We have been unable to obtain payment authorisation.</p>\r\n<p>\r\n	It may be that your card issuer has declined payment. Alternatively, there may be an error in the details you have supplied. Please ensure that the details you have supplied are correct.</p>\r\n', ''),
(13, 'Benefits', 'Benefits', '<p>\r\n	Hotel reservation system&nbsp;that guarantees rental income directly to you.<br />\r\n	Better than do-nothing&nbsp;online space websites that only&nbsp;post an add of&nbsp;your vacation&nbsp;home.&nbsp;<br />\r\n	This is an actual operational business growing and operating. Soon to arrive is a large call center to&nbsp;adequately maintain business&nbsp;volume.&nbsp;<br />\r\n	Hotel industry&#39;s only competitor.&nbsp;<br />\r\n	Exceptional marketing strategies.&nbsp;<br />\r\n	We don&#39;t collect a commission when you rent your home.&nbsp;<br />\r\n	Pay the same membership fee every year and block inflation without ever increasing.<br />\r\n	Lifetime membership pricelock for original members during trial period.&nbsp;<br />\r\n	Fastest growing company&nbsp;in industry.&nbsp;<br />\r\n	We offer renters&#39; incentives to generate consistent rental traffic for your home.&nbsp;<br />\r\n	For a limited time offer... Join Now and take advantage of our low price trial membership and lock in your lifetime never-to-be-increased annual membership fee or one time lifetime membership fee.&nbsp;<br />\r\n	Join Now!&nbsp;</p>\r\n', ''),
(14, 'Reservations', 'Reservations', '<p>\r\n	<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">With homes in the world&#39;s most magnificent destinations,&nbsp;<wbr>HomeVacationClub&#39; spacious homes are simple to book online or directly with the owner/manager. Make your&nbsp;home reservation today!&nbsp;</wbr></span></p>\r\n<p>\r\n	<wbr>\r\n	<p style="text-align:center; font-size: 25px; font-weight: bold; color:#F60">\r\n		Which accomodations would you prefer?</p>\r\n	<div class="vs">\r\n		<img alt="" height="69" src="images/vs.png" width="69" /></div>\r\n	<ul class="floor">\r\n		<li>\r\n<!--<b>Lorem ipsum dolor sit amet, consectetur</b>-->			<img alt="" src="images/floor_1.png" />\r\n			<p style="font-size:18px; line-height: 24px; margin-top: 10px;">\r\n				<strong>Benefits of the home</strong></p>\r\n			<ul style="padding-left:10px;">\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Average homes are 5 times bigger than average&nbsp;hotel rooms&nbsp;</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">More value, more convenience, &nbsp;more space and definite privacy</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Average homes are 15% cheaper than average hotel rooms</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Be at home everywhere you go with your family</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Enjoy the comforts of home with private bedrooms, living rooms, bonus rooms&nbsp;with media area, home theather system, jaccuzi, private swimming pools,&nbsp;elegant dining areas, fully-stocked kitchens and more...&nbsp;</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Save money from room service, snack bars, dining out and hotel boutiques</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Staying in a home is much more rewarding than a hotel room&nbsp;</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Many homes are pet friendly</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">No double booking&nbsp;</span></li>\r\n			</ul>\r\n<!--<p><strong>Disadvantage of the hotel floor plan</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel velit id augue rhoncus mollis sed nec metus2.</p>-->		</li>\r\n		<li>\r\n<!--<b>Lorem ipsum dolor sit amet, consectetur</b>-->			<img alt="" src="images/floor_plan1.jpg" />\r\n			<p style="font-size:18px; line-height: 24px; margin-top: 10px;">\r\n				<strong>Benefits of the Hotel</strong></p>\r\n			<ul style="padding-left:10px;">\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Restricted to a space 5 times smaller than an average home&nbsp;</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">No kitchen, fridge, dishwasher, washer &amp; dryer</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">More expensive in hotel shopping &amp; hotel restaurants</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Over-priced snack bars &amp; outrageous room service cost</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Questionable privacy for your intimacy</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Risk of having your belongings stolen</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Risk being interupted during sleep &amp; intimacy</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Reservation given to other people due double booking</span></li>\r\n				<li style="list-style-type: disc; list-style-position: outside; float: none; margin: 2px 0; width: 100%;">\r\n					<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">punishment instead of a reward for your hard earned money</span></li>\r\n			</ul>\r\n<!--<p><strong>Disadvantage of the hotel floor plan</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel velit id augue rhoncus mollis sed nec metus2.</p>-->		</li>\r\n	</ul>\r\n	</wbr></p>\r\n', ''),
(15, 'Membership', 'Membership', '<div class="member_top">\r\n	<div class="member_top_video_area">\r\n		<video autoplay="" controls="" height="100%" width="100%"> <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></video></div>\r\n	<div class="member_top_content_area">\r\n		<h2>\r\n			Membership</h2>\r\n		<p>\r\n			<br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>Hotel reservation system&nbsp;that guarantees rental income directly to you</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>Hotel industry&#39;s strategic competitor </span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>Exceptional marketing strategies </span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>We don&#39;t collect a commission when you rent your home </span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>Multiple listings incentives that get your fitth listing free</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>Become an Original Member today and pay the same annual membership fee forever</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>Pay a transferable up front lifetime membership fee and never pay again... guarantees all benefits forever </span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>Don&#39;t miss out on membership opportunities because we&#39;re growing fast </span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>*</strong>We offer renters a <u>Rewards Program</u> based on repeat business and referrals </span></p>\r\n		<p>\r\n			<br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;" />\r\n			<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong>For a limited time only</strong>... Join Now and take advantage of our low price trial membership to lock-in your lifetime never-to-be-increased annual membership fee or pay a one-time transferable membership fee for lifetime with all the benefits.&nbsp;</span></p>\r\n	</div>\r\n</div>\r\n<p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"> </source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<p>\r\n		<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"></source></p>\r\n	<source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4"><source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">\r\n	<div class="member_bottom">\r\n		<ul class="home_item" style="margin-top:0;">\r\n			<li>\r\n				<div class="round_container">\r\n					<h1>\r\n						1</h1>\r\n				</div>\r\n				<div class="home_item_container">\r\n					<div class="lft_container">\r\n						<img alt="" src="images/member_img1.png" /></div>\r\n					<div class="rght_container">\r\n						<h4>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Homes are more economical and convenient...</span></h4>\r\n						<p>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">staying in a home is much more rewarding for people and is a growing trend. Every research out there has shown that&nbsp;home&nbsp;vacation is&nbsp;more convenient and more economical&nbsp;than hotel vacation for the consumer. A 300 sqft hotel room doesn&#39;t compare with an average 1700 sqft home.</span></p>\r\n					</div>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class="round_container">\r\n					<h1>\r\n						2</h1>\r\n				</div>\r\n				<div class="home_item_container">\r\n					<div class="lft_container">\r\n						<img alt="" src="images/member_img2.png" /></div>\r\n					<div class="rght_container">\r\n						<h4>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Earn consistent income with HomevacationClub...</span></h4>\r\n						<p>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">We offer renters&#39; incentives to generate consistent rental traffic for your home. The relentless process through which we communicate the exposure of your homes to the public is intended to maximize the probability of a rental. In fact, we guarantee it or your membership fee will be free the following year.</span></p>\r\n					</div>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class="round_container">\r\n					<h1>\r\n						3</h1>\r\n				</div>\r\n				<div class="home_item_container">\r\n					<div class="lft_container">\r\n						<img alt="" src="images/member_img3.png" /></div>\r\n					<div class="rght_container">\r\n						<h4>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">Homevacationclub is hotel industry version of homes...</span></h4>\r\n						<p>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">We&#39;re working relentlessly to ensure that our system guarantees your rental. We&#39;re not a do-nothing&nbsp;online space website that only&nbsp;post an ad of&nbsp;your&nbsp;home and just collect a fee. We provide a high level exposure, expertise, experience, service&nbsp;and promote transparency in all dealings.</span></p>\r\n					</div>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class="round_container">\r\n					<h1>\r\n						4</h1>\r\n				</div>\r\n				<div class="home_item_container">\r\n					<div class="lft_container">\r\n						<img alt="" src="images/member_img4.png" /></div>\r\n					<div class="rght_container">\r\n						<h4>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">HomeVacationClub is a fast growing company...&nbsp;</span></h4>\r\n						<p>\r\n							<span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;">as an original member, you&#39;ll pay a very competitive annual membership fee that will never increase, you will never pay commissions, lifetime membership fee option, money back rental guarantee and much more...</span></p>\r\n					</div>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n	</source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></source></p>\r\n', ''),
(16, 'Locations', 'Locations', '<p>\r\n	<span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px">BEAUTIFUL HOME ACCOMMODATIONS</span><br style="padding:0px;margin:0px;color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px" />\r\n	<br style="padding:0px;margin:0px;color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px" />\r\n	<span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px">Better than any vacation home rental website!</span><br style="padding:0px;margin:0px;color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px" />\r\n	<span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px">Search for millions of vacation homes accross the world. From the Americas to Asia and the Caribbean to Europe, The Home Vacation Club home accommodations offer unmatched vacation rental experience and new opportunities for every traveler to create great memories in all corners of the world. Browse home locations and experience our variety of beautiful home accommodations today!</span><br style="padding:0px;margin:0px;color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px" />\r\n	<br style="padding:0px;margin:0px;color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px" />\r\n	<span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px">View home locations by region or select one of the following:</span><br style="padding:0px;margin:0px;color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px" />\r\n	<span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:11.818181991577148px">USA/CANADA MEXICO/CARIBBEAN CENTRAL/SOUTH AMERICA EUROPE ASIA AFRICA/MIDDLE EAST</span></p>\r\n', ''),
(17, 'Review Tips & Guidelines', 'Review Tips & Guidelines', '<p>\r\n	Please note you must have stayed at this property before submitting a review.</p>\r\n<p>\r\n	<strong>Below are some questions to consider when writing your review:</strong></p>\r\n<p>\r\n	Was the listing description accurate regarding the location?</p>\r\n<p>\r\n	Did the listing photos accurately reflect the rental&#39;s appearance and amenities?</p>\r\n<p>\r\n	Was the property clean and well-maintained?</p>\r\n<p>\r\n	Was the owner helpful in answering your questions or concerns?</p>\r\n<p>\r\n	Would you recommend this property to a friend or relative?</p>\r\n<p>\r\n	What nearby activities, attractions and restaurants would you recommend?</p>\r\n', '');
INSERT INTO `vacation_cms` (`id`, `pagename`, `title`, `pagedetail`, `image`) VALUES
(18, 'list your prorerty', 'list your prorerty', '<p>During the trial period, you become an "Original Member", you''ll get to keep your benefits FOREVER without any penality, without any cost, gimmicks, buts, ifs or ands... so 5, 10, 20 years from now you''ll still pay the same membership fee and still retain those same benefits as long as you keep your property listed with us...<br/><br/>\r\n\r\n<b>Home Vacation Club</b> is going to help you generate consistent income with your property as consistently as possible...<br/><br/>\r\n\r\n<b>Best value for your money...</b> Join today to lock in your membership fee along with all the benefits and transfer them when you sell your home or when you pass it on to your family...</p>\r\n						</div>\r\n						<div class="ben_des_right">\r\n							<ul>\r\n								<li>\r\n									<img src="images/1.png" alt="" />\r\n									<p>We''re going to freeze your cost forever which means you''ll never pay a fee increase (included all features'' fees) even though our fees will most definitely go up due to inflation and price increases like everything else in life... </p>\r\n								</li>\r\n								<li>\r\n									<img src="images/2.png" alt="" />\r\n									<p>We offer you Money Back Guarantee Rental which means that we''ll guarantee you at least one rental in a calendar year period or the following year will be free...  so you''re never going to pay your fee unless you make money... </p>\r\n								</li>\r\n								<li>\r\n									<img src="images/3.png" alt="" />\r\n									<p>We''ll never collect commission fees from you... so you could make $40k, $50k, $60k in a year renting your property or whatever the amount may be, you''ll never pay us commission fees...</p> \r\n								</li>\r\n								<li>\r\n									<img src="images/4.png" alt="" />\r\n									<p>We offer a Rewards Program based on repeat business and referrals to encourage and to generate consistent rental traffic for your home... </p>\r\n								</li>\r\n								<li>\r\n									<img src="images/5.png" alt="" />\r\n									<p>We offer you an optional Lifetime Membership, so you''ll pay one lump sum up front that comes with all the features of the website forever and you''ll NEVER pay another dime and is transferable to the next owner or your family even long after you pass on... so, among other additional benefits, as you can see, you clearly get a lot of bang for your buck...</p>\r\n								</li>\r\n							</ul>', '');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_extra_amount`
--

CREATE TABLE IF NOT EXISTS `vacation_extra_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `amount_paid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `vacation_extra_amount`
--

INSERT INTO `vacation_extra_amount` (`id`, `user_id`, `prop_id`, `amount_paid`, `date`) VALUES
(11, 64, 23, '49', '2014-07-25 08:02:15'),
(13, 64, 25, '114', '2014-07-25 08:17:53'),
(14, 64, 26, '16', '2014-09-02 10:38:14'),
(15, 73, 27, '150', '2014-09-05 10:24:47'),
(16, 73, 28, '54', '2014-09-05 11:34:32'),
(17, 73, 29, '144', '2014-09-05 11:41:21'),
(18, 64, 30, '258', '2014-09-16 06:32:58'),
(19, 84, 31, '0', '2014-10-04 13:38:51'),
(20, 84, 32, '0', '2014-10-04 13:58:27'),
(21, 85, 33, '0', '2014-10-05 23:22:29'),
(22, 85, 34, '0', '2014-10-05 23:25:40'),
(23, 86, 35, '0', '2014-10-06 18:24:04'),
(24, 86, 36, '0', '2014-11-19 17:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_favourite_property`
--

CREATE TABLE IF NOT EXISTS `vacation_favourite_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `vacation_favourite_property`
--

INSERT INTO `vacation_favourite_property` (`id`, `user_id`, `prop_id`, `date`) VALUES
(1, 64, 4, '2014-07-06 00:22:47'),
(2, 64, 1, '2014-07-06 00:26:36'),
(3, 0, 2, '2014-07-08 02:51:25'),
(4, 0, 23, '2014-07-29 07:29:31'),
(5, 0, 8, '2014-09-04 06:11:09'),
(6, 0, 1, '2014-09-04 07:27:56'),
(7, 0, 1, '2014-09-04 07:28:01'),
(8, 0, 1, '2014-09-04 07:28:55'),
(9, 64, 8, '2014-09-05 07:16:59'),
(10, 0, 0, '2014-09-12 21:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_featured_amount`
--

CREATE TABLE IF NOT EXISTS `vacation_featured_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacation_featured_amount`
--

INSERT INTO `vacation_featured_amount` (`id`, `percentage`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_group`
--

CREATE TABLE IF NOT EXISTS `vacation_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `member_city` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `group_members` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacation_group`
--

INSERT INTO `vacation_group` (`id`, `group_name`, `member_city`, `group_members`, `create_date`) VALUES
(1, 'New Year', '', '64,71,62,70,73,74,84,81,86', '2015-01-05 08:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_image`
--

CREATE TABLE IF NOT EXISTS `vacation_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `adv_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `adv_id` (`adv_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `vacation_image`
--

INSERT INTO `vacation_image` (`id`, `user_id`, `adv_id`, `title`, `description`, `image`, `date_added`) VALUES
(37, 0, 1, '', '', '14040395663.jpg', '2014-07-01 06:11:20'),
(36, 0, 1, '', '', '14040395664.jpg', '2014-07-01 06:11:20'),
(35, 0, 1, '', '', '14040395662.jpg', '2014-07-01 06:11:20'),
(34, 0, 1, '', '', '14040395661.jpg', '2014-07-01 06:11:20'),
(41, 0, 2, '', '', '14040397043.jpg', '2014-07-01 06:11:39'),
(40, 0, 2, '', '', '14040397042.jpg', '2014-07-01 06:11:39'),
(39, 0, 2, '', '', '14040397041.jpg', '2014-07-01 06:11:39'),
(38, 0, 2, '', '', '14040397044.jpg', '2014-07-01 06:11:39'),
(44, 0, 3, '', '', '14040398152.jpg', '2014-07-01 06:11:58'),
(43, 0, 3, '', '', '14040398151 (1).jpg', '2014-07-01 06:11:58'),
(42, 0, 3, '', '', '14040398154.jpg', '2014-07-01 06:11:58'),
(49, 0, 4, '', '', '14040399924.jpg', '2014-07-01 06:12:19'),
(48, 0, 4, '', '', '14040399923.jpg', '2014-07-01 06:12:19'),
(47, 0, 4, '', '', '14040399912.jpg', '2014-07-01 06:12:19'),
(46, 0, 4, '', '', '14040399911.jpg', '2014-07-01 06:12:19'),
(32, 0, 5, '', '', '1404055540Tulips.jpg', '2014-06-29 10:26:08'),
(33, 0, 6, '', '', '1404056198HydrangeasDEEP.jpg', '2014-06-29 10:38:18'),
(45, 0, 3, '', '', '14040398153.jpg', '2014-07-01 06:11:58'),
(50, 0, 0, '', '', '1404649682Sunset.jpg', '2014-07-06 07:28:20'),
(51, 0, 0, '', '', '1404649684Water lilies.jpg', '2014-07-06 07:28:20'),
(52, 0, 0, '', '', '1404649689Winter.jpg', '2014-07-06 07:28:20'),
(53, 0, 0, '', '', '1404649682Sunset.jpg', '2014-07-06 07:28:54'),
(54, 0, 0, '', '', '1404649684Water lilies.jpg', '2014-07-06 07:28:54'),
(55, 0, 0, '', '', '1404649689Winter.jpg', '2014-07-06 07:28:54'),
(56, 0, 7, '', '', '1404650469Water lilies.jpg', '2014-07-06 07:41:19'),
(57, 0, 7, '', '', '1404650475Winter.jpg', '2014-07-06 07:41:19'),
(64, 64, 0, '', '', '1404741797Chrysanthemum.jpg', '2014-07-07 09:04:10'),
(65, 64, 10, '', '', '1404742147Chrysanthemum.jpg', '2014-07-07 09:09:29'),
(66, 64, 10, '', '', '1404742162Desert.jpg', '2014-07-07 09:09:29'),
(67, 64, 11, '', '', '1404742453Chrysanthemum.jpg', '2014-07-07 09:14:40'),
(68, 64, 11, '', '', '1404742470Desert.jpg', '2014-07-07 09:14:40'),
(69, 64, 12, '', '', '1404820942Koala.jpg', '2014-07-08 07:08:01'),
(70, 64, 12, '', '', '1404820953Lighthouse.jpg', '2014-07-08 07:08:01'),
(71, 64, 13, '', '', '1404821795Lighthouse.jpg', '2014-07-08 07:16:56'),
(72, 64, 13, '', '', '1404821807Penguins.jpg', '2014-07-08 07:16:56'),
(73, 66, 14, '', '', '1405266111red 001.JPG', '2014-07-13 10:41:59'),
(74, 67, 17, '', '', '1406173025Night Fever Club, GIS & footbal game October 2011 (1).JPG', '2014-07-23 10:38:50'),
(75, 64, 18, '', '', '1404821795Lighthouse.jpg', '2014-07-24 02:47:31'),
(76, 64, 18, '', '', '1404821807Penguins.jpg', '2014-07-24 02:47:31'),
(77, 64, 20, '', '', '1406207477no_image.jpg', '2014-07-24 08:11:22'),
(79, 68, 22, '', '', '1406270694index.jpg', '2014-07-25 01:44:58'),
(80, 68, 21, '', '', '1406270841index1.jpg', '2014-07-25 01:47:25'),
(81, 68, 22, '', '', '1406289502no_image.jpg', '2014-07-25 06:58:26'),
(94, 64, 23, '', '', '1406294360Sweet-Home-Photos-Pictures-Wallpapers-9.JPG', '2014-07-25 08:19:23'),
(83, 68, 22, '', '', '1406289574Banner-P-summer448-21813774-2560-1024.jpg', '2014-07-25 06:59:40'),
(84, 64, 8, '', '', '1406289865e551a0d808b14508a495754ad24d237f_AdPanel.jpg', '2014-07-25 07:04:34'),
(85, 64, 8, '', '', '140628986639.jpg', '2014-07-25 07:04:34'),
(86, 64, 8, '', '', '1406289869building-eco-friendly-home-designs-how-to-build-eco-friendly-homes-and-588x346.jpg', '2014-07-25 07:04:34'),
(87, 64, 9, '', '', '1406289977Ralph-Bunche-Home-1.jpg', '2014-07-25 07:06:43'),
(88, 64, 9, '', '', '1406289980Green-your-home-Green-you-002.jpg', '2014-07-25 07:06:43'),
(89, 64, 9, '', '', '1406289992modern-mix-home.jpg', '2014-07-25 07:06:43'),
(91, 64, 24, '', '', '1406294266Sweet-Home-Photos-Pictures-Wallpapers-9.JPG', '2014-07-25 08:17:53'),
(93, 64, 25, '', '', '1406294299Home-Sweet-Home-600x400.jpg', '2014-07-25 08:18:22'),
(112, 0, 27, '', '', '1433702945Australia, Downtown Sydney and Waterfront.jpg', '2015-06-07 08:49:08'),
(96, 73, 28, '', '', '1409916850Home-Sweet-Home-600x400.jpg', '2014-09-05 11:34:32'),
(97, 73, 28, '', '', '1409916862Sweet-Home-Photos-Pictures-Wallpapers-9.JPG', '2014-09-05 11:34:32'),
(98, 73, 29, '', '', '1409917190Home-Sweet-Home-600x400.jpg', '2014-09-05 11:41:21'),
(99, 0, 36, '', '', '1433695648Skyscrapers-Island-Building-HD-Desktop-Wallpaper.jpg', '2015-06-07 06:47:36'),
(100, 0, 36, '', '', '1433695650Trevi-Fountain-1.jpg', '2015-06-07 06:47:36'),
(101, 0, 35, '', '', '1433695684Germany_2.jpg', '2015-06-07 06:48:11'),
(102, 0, 34, '', '', '1433695722european-travel-417-2.jpg', '2015-06-07 06:48:49'),
(103, 0, 34, '', '', '1433695723france beautyjf.jpg', '2015-06-07 06:48:49'),
(104, 0, 33, '', '', '1433695765france beautyjf.jpg', '2015-06-07 06:49:32'),
(105, 0, 33, '', '', '1433695766Germany_2.jpg', '2015-06-07 06:49:32'),
(106, 0, 32, '', '', '143369580499fbebf457aa8436378fbea4a6e92f35_large.jpeg', '2015-06-07 06:50:10'),
(107, 0, 32, '', '', '14336958051296_1280x800.jpg', '2015-06-07 06:50:10'),
(108, 0, 31, '', '', '1433695838331890-building-hd-wallpaper.jpg', '2015-06-07 06:50:46'),
(109, 0, 31, '', '', '1433695839amazing_tourist_places_32-other.jpg', '2015-06-07 06:50:46'),
(110, 0, 30, '', '', '1433695877331890-building-hd-wallpaper.jpg', '2015-06-07 06:51:25'),
(111, 0, 30, '', '', '1433695878amazing_tourist_places_32-other.jpg', '2015-06-07 06:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_newest_amount`
--

CREATE TABLE IF NOT EXISTS `vacation_newest_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacation_newest_amount`
--

INSERT INTO `vacation_newest_amount` (`id`, `percentage`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_percentage`
--

CREATE TABLE IF NOT EXISTS `vacation_percentage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` int(11) NOT NULL,
  `lifetimeprice` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacation_percentage`
--

INSERT INTO `vacation_percentage` (`id`, `percentage`, `lifetimeprice`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_product`
--

CREATE TABLE IF NOT EXISTS `vacation_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` varchar(256) NOT NULL,
  `subcat` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `desc` text NOT NULL,
  `img` text NOT NULL,
  `regular_price` int(11) NOT NULL,
  `offer_price` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vacation_product`
--

INSERT INTO `vacation_product` (`id`, `user_id`, `cat_id`, `subcat`, `name`, `desc`, `img`, `regular_price`, `offer_price`, `start_date`, `end_date`, `datetime`) VALUES
(1, 0, '7', '', '$350 for an Annual Family Membership to Houston', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\''Content here, content here\\'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\''lorem ipsum\\'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'product_1.png', 1, 51, '2014-06-01', '2014-06-30', '2014-06-24 04:39:41'),
(2, 0, '6', '', '$35 for an Annual Family Membership to Houston', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\''Content here, content here\\'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\''lorem ipsum\\'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'product_2.png', 10, 15, '2014-06-05', '2014-06-30', '2014-06-21 14:38:47'),
(3, 0, '4', '', '$35 for an Annual Family Membership to Houston', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\''Content here, content here\\'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\''lorem ipsum\\'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'product_3.png', 10, 11, '2014-06-06', '2014-06-27', '2014-06-21 14:38:52'),
(4, 0, '5', '', '$35 for an Annual Family Membership to Houston', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\''Content here, content here\\'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\''lorem ipsum\\'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'product_4.png', 10, 10, '2014-06-09', '2014-06-30', '2014-06-21 14:38:58'),
(6, 3, '6', '', 'My tst Deal', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\''Content here, content here\\'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\''lorem ipsum\\'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). ', 'product_1.png', 10, 0, '2014-06-01', '2014-06-30', '2014-06-22 11:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_property`
--

CREATE TABLE IF NOT EXISTS `vacation_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `continent` int(11) NOT NULL,
  `is_featured` int(3) NOT NULL DEFAULT '0',
  `is_toprated` int(2) NOT NULL DEFAULT '0',
  `is_newest` int(2) NOT NULL DEFAULT '0',
  `is_toppriority` int(2) NOT NULL DEFAULT '0',
  `contact_fname` varchar(200) NOT NULL,
  `contact_lname` varchar(200) NOT NULL,
  `contact_email` varchar(256) NOT NULL,
  `contact_country` varchar(70) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `owner_info` text NOT NULL,
  `rates` text NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `street_address` text NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `zip` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `property_type` text NOT NULL,
  `accomodation_type` text NOT NULL,
  `airport` varchar(255) NOT NULL,
  `attraction` varchar(255) NOT NULL,
  `home_ID` varchar(255) NOT NULL,
  `meals` text NOT NULL,
  `suitability` text NOT NULL,
  `bedrooms` text NOT NULL,
  `bathrooms` text NOT NULL,
  `kitchen` text NOT NULL,
  `amenities` text NOT NULL,
  `entertainment` text NOT NULL,
  `communications` text NOT NULL,
  `outdoor_features` text NOT NULL,
  `video1` text NOT NULL,
  `video2` text NOT NULL,
  `video3` text NOT NULL,
  `video4` text NOT NULL,
  `deal_price` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `membership_type` int(11) NOT NULL,
  `reward` varchar(255) NOT NULL,
  `creditcard_holder_name` varchar(256) NOT NULL,
  `creditcard_number` varchar(256) NOT NULL,
  `creditcard_exp` varchar(256) NOT NULL,
  `creditcard_cvv` varchar(256) NOT NULL,
  `creditcard_city` varchar(256) NOT NULL,
  `creditcard_state` varchar(256) NOT NULL,
  `creditcard_zip` varchar(256) NOT NULL,
  `creditcard_country` varchar(256) NOT NULL,
  `payby` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `vacation_property`
--

INSERT INTO `vacation_property` (`id`, `user_id`, `cat_id`, `continent`, `is_featured`, `is_toprated`, `is_newest`, `is_toppriority`, `contact_fname`, `contact_lname`, `contact_email`, `contact_country`, `contact_phone`, `owner_info`, `rates`, `title`, `description`, `price`, `street_address`, `address`, `city`, `state`, `zip`, `country`, `property_type`, `accomodation_type`, `airport`, `attraction`, `home_ID`, `meals`, `suitability`, `bedrooms`, `bathrooms`, `kitchen`, `amenities`, `entertainment`, `communications`, `outdoor_features`, `video1`, `video2`, `video3`, `video4`, `deal_price`, `start_date`, `end_date`, `membership_type`, `reward`, `creditcard_holder_name`, `creditcard_number`, `creditcard_exp`, `creditcard_cvv`, `creditcard_city`, `creditcard_state`, `creditcard_zip`, `creditcard_country`, `payby`, `status`) VALUES
(2, 64, 4, 2, 0, 0, 0, 0, 'Avik', 'Ghosh', 'test@test.com', 'India', '123456', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Good Time Spend', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 10, 'Garoua', 'Garoua', 'Garoua', 'Garoua', '12345', 'CM', 'test', 'test', 'test', 'test', 'test', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, ', 'test', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, ', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'http://youtu.be/pBUiR402UHM', 'http://youtu.be/GSHAyfqJQ58', '', '', 0, '0000-00-00', '0000-00-00', 0, '3', '', '', '', '', '', '', '', '', '', 1),
(3, 64, 4, 5, 0, 1, 0, 0, 'Avik', 'Ghosh', 'test@test.com', 'India', '123456', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Vally Of Sweet', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 10, 'Kolkata', 'Kolkata', 'Kolkata', 'wb', '743127', 'IN', 'test', 'test', 'Dum Dum Airport, Kolkata', 'test', 'test', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'test', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'test', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', 1),
(4, 64, 6, 4, 0, 0, 0, 1, 'Avik', 'Ghosh', 'test@test.com', 'India', '123456', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'My Property', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 10, 'Andenne', 'Andenne', 'Andenne', 'Namur', '5300', 'BE', 'test', 'test', 'test', 'test', 'test', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'test', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', 1),
(8, 64, 4, 6, 1, 0, 0, 0, 'Avik', 'Ghosh', 'test@test.com', 'India', '123456', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'House in The vally', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 10, 'Rio de Janeiro', 'Rio de Janeiro', 'Rio de Janeiro', 'Rio de Janeiro', '28970-000', 'BR', 'test', 'test', 'test', 'test', 'test', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'test', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'http://youtu.be/pBUiR402UHM', 'http://youtu.be/GSHAyfqJQ58', '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', 1),
(9, 64, 5, 1, 0, 0, 0, 0, 'jhon ', 'Stan', 'test@test.com', 'India', '123456', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'My best Place', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 10, 'test1', 'Bacalar', 'Bacalar', 'Tenochtitlan', '700051', 'MX', 'test', 'test', 'test', 'test', 'test', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'test', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'http://youtu.be/GSHAyfqJQ58', 'http://youtu.be/GSHAyfqJQ58', 'http://youtu.be/GSHAyfqJQ58', '', 8, '2014-09-02', '2014-09-23', 0, '', '', '', '', '', '', '', '', '', '', 1),
(23, 64, 4, 1, 0, 0, 1, 1, 'avik', 'ghosh', 'nits.avik@gmail.com', 'India', '911234567890', 'contact me on my phone number', 'not very high', 'Featured Home :)', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi', 15, '345', 'Los Angeles', 'Los Angeles', 'California', '90005', 'GB', 'Home', 'hotel', 'Netaji suvash', 'victoria', '122', '4 bedrooms', 'good', '', '2 bathrooms', '2 kitchen and 1 dinning', 'good', 'telivision', 'bus,train', 'play ground', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', 1),
(25, 64, 6, 1, 0, 0, 1, 1, 'avik', 'ghosh', 'nits.avik@gmail.com', 'India', '911234567890', 'contact through my phone', 'lowq rate', 'Best property', 'My Home Group is a 1500 crore two decade old company headquartered at Hyderabad. Under the leadership of Dr.Rameswar Rao Jupally the group has grown rapidly and has its presence in construction, cement, power, consultancy and education', 30, 'New York', 'New York', 'Arizona', 'New York', '10005', 'US', 'Home', 'hotel', 'Netaji suvash', 'victoria', '122', '3 bedrooms', 'This is my first property posting', '', '3 bathrooms', '3 kitchens', 'good', 'indoor games', 'bus,car', 'swimming pool', '', '', '', '', 25, '2014-09-01', '2014-09-19', 0, '6', 'vnvbn', 'vbnvb', 'vbnvbn', 'vbnvbn', 'bvnvbn', 'vbnvbn', 'vbnvb', 'nvbnvbn', 'paypal', 1),
(27, 73, 4, 1, 1, 1, 1, 1, 'avisek', 'saha', 'nits.avisek@gmail.com', 'India', '152154141', '<p>\r\n	contact on my numberr</p>\r\n', 'nice rate', 'my first property', '<p>\r\n	test</p>\r\n', 100, 'birati', 'birati', 'kolkata', 'west bengal', '7151515', 'IN', 'permenent', 'bus', 'netaji subhash', 'victoria', '112', '5', 'good', '', '5', '5', 'good', 'tv,ac', 'bsu,train', 'field,swimming pool', '', '', '', '', 0, '0000-00-00', '0000-00-00', 1, '', '', '', '', '', '', '', '', '', '', 1),
(30, 64, 4, 2, 1, 0, 0, 0, 'Avik', 'Ghosh', 'nits.avik@gmail.com', 'India', '152154141', '', '', 'testing my new property', '<p>\r\n	sadas</p>\r\n', 100, 'birati', 'birati', 'Kolkata', 'west bengal', '60060', 'AZ', 'asd', 'asd', 'dsa', 'dsa', 'as', 'ads', 'asd', '', 'sad', 'sad', 'sda', 'asd', 'dsa', 'sad', '', '', '', '', 0, '0000-00-00', '0000-00-00', 2, '3', '', '', '', '', '', '', '', '', 'paypal', 1),
(31, 84, 6, 6, 1, 1, 1, 1, 'Jose Luis', 'Quinones', 'LaVillapr@gmail.com', 'Puerto Rico', '7874442044', '', '', 'La Villa', '<p>\r\n	This cozy apartment is in the 2nd floor of La Villa, a beachfront Colonial style building. It&#39;s equipped with all amenities to make you feel at home. The balcony is facing to the beach and the Atlantic Ocean, you sleep with the sound of the wind and sea waves, and same you wake up with this sweet environment. La Villa is located in a quiet and hidden beach at the end of 441 street in the town of Aguada, City of Discovery (first Christopher Columbus arrival to Puerto Rico). You can see at the map, Aguada is at the West End of the Island of Puerto Rico between Aguadilla (20 minutes) and Rincon (10 minutes).</p>\r\n', 0, 'Carr. 441 Km. 2.6 Interior Plaaya ', 'Bo Carrizales', 'Aguada', 'Puerto Rico', '00602', 'PR', '', '', 'Aeropuerto Rafel Hernandez is 25-30 minutes away in Aguadilla.', '', '', '2 bedrooms', 'Excellent for Holidays, Short Breaks or Winter Getaways. Suitable for Family, Friends or Corporate.', '', '1 bathroom', 'Fully equiped kitchen.\r\nDinning table for 4.', '', 'Tv, blueray, blutooth music player, wireless internet.\r\n\r\nThe beautiful beach.\r\n\r\nKayak.', 'The place is going to be totally in shape on your arrival. Jose Luis, your host, is going to take care of keys exchange, and is always on call to help you with any of your needs. \r\n\r\nNot will always be present on the property but available.', 'A comfortable size balcony with view to the beach and ocean.\r\n\r\nFor common use: Wood Deck, BBQ and Hammocks, with a beach style garden at the yard.\r\n\r\nThe Villa counts on 4 equal apartments, 2 on 2nd floor and 2 penthouses on 3rd floor.\r\n\r\nThe whole Villa is available for Family Reunions, Weddings and other group activities.', '', '', '', '', 0, '0000-00-00', '0000-00-00', 2, '', '', '', '', '', '', '', '', '', 'paypal', 1),
(32, 84, 6, 6, 1, 1, 1, 1, 'Jose Luis', 'Quinones', 'LaVillapr@gmail.com', 'Puerto Rico', '7874442044', '<p>\r\n	Jose uis Quinones</p>\r\n', 'Hi Season form November 1st to april 30:\r\n$162/night(minimum 3), $805/week, $2,415/month\r\n\r\nRegular Season form May 1st to June 30:\r\n$139/night(minimum 2), $695/week, $2,085/month\r\n\r\nLow Season form July 1st to October 31:\r\n$104/night(minimum 2), $520/week, $1,560/month', 'La Villa', '<p>\r\n	This cozy apartment is in the 2nd floor of La Villa, a beachfront Colonial style building. It&#39;s equipped with all amenities to make you feel at home. The balcony is facing to the beach and the Atlantic Ocean, you sleep with the sound of the wind and sea waves, and same you wake up with this sweet environment. La Villa is located in a quiet and hidden beach at the end of 441 street in the town of Aguada, City of Discovery (first Christopher Columbus arrival to Puerto Rico). You can see at the map, Aguada is at the West End of the Island of Puerto Rico between Aguadilla (20 minutes) and Rincon (10 minutes).</p>\r\n', 0, 'Carr. 441 Km. 2.6 Interior Plaaya ', 'Bo Carrizales', 'Aguada', 'Puerto Rico', '00602', 'PR', '3 story Colonia lstyle Villa ', 'Apartment', 'Aeropuerto Rafel Hernandez is 25-30 minutes away in Aguadilla.', 'Watersports, Adventure, hiking, fishing etc', '655', '2 bedrooms', 'Excellent for Holidays, Short Breaks or Winter Getaways. Suitable for Family, Friends or Corporate.', '', '1 bathroom', 'Fully equiped kitchen.\r\nDinning table for 4.', 'Camino de La Playa (just 5 minutes away), it''s really good for Night Live, have fun with family and friends. There are many oceanfront bars and restaurants offering local and international food. All this in a beach-island environment.', 'Tv, blueray, blutooth music player, wireless internet.\r\n\r\nThe beautiful beach.\r\n\r\nKayak.', 'The place is going to be totally in shape on your arrival. Jose Luis, your host, is going to take care of keys exchange, and is always on call to help you with any of your needs. \r\n\r\nNot will always be present on the property but available.', 'A comfortable size balcony with view to the beach and ocean.\r\n\r\nFor common use: Wood Deck, BBQ and Hammocks, with a beach style garden at the yard.\r\n\r\nThe Villa counts on 4 equal apartments, 2 on 2nd floor and 2 penthouses on 3rd floor.\r\n\r\nThe whole Villa is available for Family Reunions, Weddings and other group activities.', '', '', '', '', 0, '0000-00-00', '0000-00-00', 2, '', '', '', '', '', '', '', '', '', 'paypal', 1),
(33, 85, 6, 1, 0, 0, 0, 0, 'Doming', 'Cruz', 'dcruzlulo@gmail.com', 'Puerto Rico', '787-450-1945', '<p>\r\n	Domingo Cruz Mendez Tel: 787-450-1945</p>\r\n', '$175.00 per night .  Check in 1:00 Pm. Check out 11:00 am', 'Aguada Beach Hose', '<p>\r\n	Beach House . The property has four bedrooms and three bathrooms. The Master bedroom has one queen bed and one bathroom. Ano twother room has two full bed. The other two rooms have two twin/full bunk beds . The property is a concrete house. The house has one car garage. There is space for another car. There is a cement fence. The house has a big terrace. The beach is behind the hose.</p>\r\n', 0, 'Carr 115 Km19.1 Barrio Rio Grande Comunidad Nieves ', 'AGuada, P.R.', 'Aguada', 'Puerto Rico', '00602', 'PR', 'Beach house', 'Twelve people', 'San Juan Airport or Aguadilla Airport', 'Beach, Searfing, Golf, Water fall', '8373', 'Four Bed rooms', 'none', '', 'Three Bathrooms', 'One Kitchen with dining table.', 'Beach', 'Dishnetwork and wifi', 'Internet', 'Beach', '', '', '', '', 0, '0000-00-00', '0000-00-00', 2, '', '', '', '', '', '', '', '', '', 'paypal', 1),
(34, 85, 6, 1, 0, 0, 0, 0, 'Doming', 'Cruz', 'dcruzlulo@gmail.com', 'Puerto Rico', '787-450-1945', '<p>\r\n	Domingo Cruz Mendez Tel: 787-450-1945</p>\r\n', '$175.00 per night .  Check in 1:00 Pm. Check out 11:00 am', 'Aguada Beach Hose', '<p>\r\n	Beach House . The property has four bedrooms and three bathrooms. The Master bedroom has one queen bed and one bathroom. Ano twother room has two full bed. The other two rooms have two twin/full bunk beds . The property is a concrete house. The house has one car garage. There is space for another car. There is a cement fence. The house has a big terrace. The beach is behind the hose.</p>\r\n', 0, 'Carr 115 Km19.1 Barrio Rio Grande Comunidad Nieves ', 'AGuada, P.R.', 'Aguada', 'Puerto Rico', '00602', 'PR', 'Beach house', 'Twelve people', 'San Juan Airport or Aguadilla Airport', 'Beach, Searfing, Golf, Water fall', '8373', 'Four Bed rooms', 'none', '', 'Three Bathrooms', 'One Kitchen with dining table.', 'Beach', 'Dishnetwork and wifi', 'Internet', 'Beach', '', '', '', '', 0, '0000-00-00', '0000-00-00', 2, '', '', '', '', '', '', '', '', '', 'paypal', 1),
(35, 86, 6, 1, 1, 0, 0, 0, 'brendon', 'kelly', 'brendon@creativehaus.com', 'United States', '6195004739', '<p>\r\n	no</p>\r\n', '199', 'Amazing Pacific Coast Views ', '<p>\r\n	5 bedroom 3 bath home</p>\r\n', 199, '2233 winchester', 'san diego', 'san diego', 'CALIFORNIA (CA)', '92109', 'US', 'house', 'washing machine ', 'close', 'sea world ', '6199985544', '5', 'yes', '', '3', 'yes', 'yes', 'yes', 'yes', 'yes', 'https://www.youtube.com/watch?v=p4uc0SA0UVw', '', '', '', 0, '0000-00-00', '0000-00-00', 2, '4', '', '', '', '', '', '', '', '', 'paypal', 1),
(36, 86, 5, 1, 1, 1, 1, 1, 'awerwe', 'werw', 'fwee@yahoo.com', '23432 winchester', '6199932366', '', '', 'house', '<p>\r\n	test</p>\r\n', 99, '2134 former', 'wienoc', 'jallyberry', 'CALIFORNIA (CA)', '92108', 'US', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', '0000-00-00', 1, '', '', '', '', '', '', '', '', '', 'paypal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_property_booking`
--

CREATE TABLE IF NOT EXISTS `vacation_property_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lived` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount_paid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `booked_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `vacation_property_booking`
--

INSERT INTO `vacation_property_booking` (`id`, `user_id`, `owner_id`, `prop_id`, `name`, `email`, `lived`, `start_date`, `end_date`, `amount_paid`, `booked_date`) VALUES
(2, 64, 64, 4, 'Avik', 'nits.avik@gmail.com', 'kolkata', '2014-07-01', '2014-07-25', '10', '2014-07-06 05:34:16'),
(3, 0, 0, 4, 'Avik', 'nits.avik@gmail.com', 'Kolkata', '2014-07-01', '2014-07-31', '15000', '2014-07-07 01:54:31'),
(4, 0, 0, 8, 'Avik', 'nits.avik@gmail.com', 'Kolkata', '2014-07-01', '2014-07-03', '150', '2014-07-07 04:57:06'),
(5, 68, 0, 8, 'avisek', 'nits.avisek@gmail.com', 'india', '2014-07-24', '2014-07-31', '80', '2014-07-25 02:49:14'),
(6, 64, 0, 23, 'Avik', 'nits.avik@gmail.com', 'test', '2014-09-02', '2014-09-24', '345', '2014-09-02 11:21:55'),
(7, 73, 64, 1, 'avisek', 'nits.avisek@gmail.com', 'test', '2014-09-11', '2014-09-12', '200', '2014-09-05 13:12:50'),
(8, 73, 64, 23, 'avisek', 'nits.avisek@gmail.com', 'test', '2014-09-30', '2014-10-01', '30', '0000-00-00 00:00:00'),
(10, 73, 64, 2, 'avisek', 'nits.avisek@gmail.com', 'test', '2014-09-24', '2014-09-26', '20', '2014-09-08 11:27:25'),
(11, 73, 64, 2, 'avisek', 'nits.avisek@gmail.com', 'test', '2014-09-16', '2014-09-18', '20', '2014-09-08 11:31:44'),
(12, 73, 64, 2, 'avisek', 'nits.avisek@gmail.com', 'test', '2014-09-19', '2014-09-21', '20', '2014-09-08 11:37:55'),
(13, 73, 64, 2, 'avisek', 'nits.avisek@gmail.com', 'test', '2014-09-10', '2014-09-12', '20', '2014-09-08 11:50:29'),
(14, 0, 64, 2, 'abc', 'nits.avik@gmail.com', 'austin', '2014-09-27', '2014-09-30', '30', '2014-09-08 13:49:55'),
(15, 0, 64, 1, 'hjkh', 'hjk', 'jkhjk', '2014-09-17', '2014-09-20', '300', '2014-09-17 11:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_property_rate`
--

CREATE TABLE IF NOT EXISTS `vacation_property_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(2) NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vacation_property_rate`
--

INSERT INTO `vacation_property_rate` (`id`, `prop_id`, `user_id`, `score`, `ip`, `date`) VALUES
(1, 8, 1, 4, '122.110.187.85', '2014-07-09 02:18:51'),
(2, 8, 64, 5, '122.160.187.85', '2014-07-09 04:16:34'),
(3, 1, 0, 5, '122.160.187.85', '2014-07-25 06:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_property_review`
--

CREATE TABLE IF NOT EXISTS `vacation_property_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `review_title` varchar(256) NOT NULL,
  `review_desc` text NOT NULL,
  `email_address` varchar(256) NOT NULL,
  `arrival_date` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `living_ciy` varchar(256) NOT NULL,
  `recomemded` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vacation_property_review`
--

INSERT INTO `vacation_property_review` (`id`, `user_id`, `prop_id`, `review_title`, `review_desc`, `email_address`, `arrival_date`, `name`, `living_ciy`, `recomemded`, `date`) VALUES
(1, 64, 4, 'ghjgj', 'gjghj', 'nits.avik@gmail.com', '', 'Paid', 'ghj', 'Adventure Seekers,Families with young children,Tourists without a car', '2014-07-05 13:30:40'),
(2, 64, 4, 'This is my test review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus nulla ullamcorper dolor tincidunt adipiscing imperdiet dolor bibendum. Donec sed metus eu ligula laoreet volutpat non nec eros. Integer sollicitudin felis eu turpis euismod sit amet consequat tellus tincidunt. ', 'nits.avik@gmail.com', '2014-07-24', 'Avik', 'Kolkata', 'Adventure Seekers,Families with young children,Tourists without a car', '2014-07-06 00:06:27'),
(3, 0, 5, 'My test Review', ' Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat', 'Nits.avik1@test.com', '2014-07-09', 'Test User', 'Kolkata', 'Adventure Seekers,Families with young children,Families with teenagers', '2014-07-06 07:22:31'),
(4, 0, 4, 'good Time Spent', ' Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat  Beautiful Farmhouse in the Hamlet of Bonchester Bridge available to rent on a years lease. Situat', 'Nits.avik1@test.com', '2014-07-25', 'Top Banner', 'Kolkata', 'Age 55+,Families with teenagers', '2014-07-06 07:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_sitesettings`
--

CREATE TABLE IF NOT EXISTS `vacation_sitesettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alt_text` varchar(256) NOT NULL,
  `sitelogo` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacation_sitesettings`
--

INSERT INTO `vacation_sitesettings` (`id`, `alt_text`, `sitelogo`) VALUES
(1, 'Vacation', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_social`
--

CREATE TABLE IF NOT EXISTS `vacation_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `vacation_social`
--

INSERT INTO `vacation_social` (`id`, `name`, `link`, `image`) VALUES
(1, 'Facebook', 'https://www.facebook.com/homevacationclub', 'item_1.png'),
(2, 'Twitter', 'https://twitter.com/homevacation', 'item_2.png'),
(3, 'Google Plus', 'https://plus.google.com/u/0/b/108627531444693608552/', 'item_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_tbladmin`
--

CREATE TABLE IF NOT EXISTS `vacation_tbladmin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `paypal_email` varchar(256) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `publishable_key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vacation_tbladmin`
--

INSERT INTO `vacation_tbladmin` (`id`, `name`, `admin_username`, `admin_password`, `email`, `address`, `image`, `status`, `paypal_email`, `secret_key`, `publishable_key`) VALUES
(1, 'Super Administrator', 'admin', '123456!', 'nits.avik@gmail.com', '', '', '1', 'cliffnicolas@hotmail.com', '8n6gZXs782UAYp43', '3aSm9fY4sTd'),
(2, 'Avik', 'avik1', '123456', 'nits.avik@gmail.com', '', '', '1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_toppriority_amount`
--

CREATE TABLE IF NOT EXISTS `vacation_toppriority_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacation_toppriority_amount`
--

INSERT INTO `vacation_toppriority_amount` (`id`, `percentage`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_user`
--

CREATE TABLE IF NOT EXISTS `vacation_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_user_id` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(256) NOT NULL,
  `paypal_email` text NOT NULL,
  `api_id` varchar(256) NOT NULL,
  `transactiok_key` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `about_me` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_loggedin` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  `city` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `span_startdate` date NOT NULL,
  `span_enddate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `vacation_user`
--

INSERT INTO `vacation_user` (`id`, `fb_user_id`, `type`, `fname`, `lname`, `email`, `paypal_email`, `api_id`, `transactiok_key`, `password`, `gender`, `dob`, `address`, `about_me`, `image`, `add_date`, `status`, `is_loggedin`, `last_login`, `ip`, `city`, `state`, `country`, `phone`, `span_startdate`, `span_enddate`) VALUES
(64, '', 0, 'Avik', 'Ghosh', 'nits.avik@gmail.com', 'talk2_avik@yahoo.co.in', '7Z2RRwxuT94X', '4x4U4szBq6L7W92T', 'e10adc3949ba59abbe56e057f20f883e', '', '--', 'Kolkata', '', '', '2014-07-02', '1', 1, '2015-02-16 14:07:11', '122.160.187.85', 'kolkata', '', '', '1234567890', '2014-07-02', '2014-07-01'),
(71, '', 0, 'test', 'test', 'test@test.com', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '--', 'test', '', '', '2014-07-28', '0', 0, '0000-00-00 00:00:00', '122.160.187.85', 'kolkata', '', '', '2154', '2014-07-28', '2014-09-26'),
(62, '', 0, 'Avik', 'Ghosh', 'nits.avik11@gmail.com', '', '', '', '202cb962ac59075b964b07152d234b70', '', '--', 'asdasd', '', '', '2014-07-02', '1', 1, '2014-07-08 04:25:16', '122.160.187.85', 'kolkata', '', '', '1231232131', '2014-07-02', '2014-08-31'),
(70, '', 0, 'avi', 'saha', 'dipanjan54@gmail.com', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '--', '345', '', '', '2014-07-28', '1', 0, '0000-00-00 00:00:00', '122.160.187.85', 'kolkata', '', '', '12232', '2014-07-28', '2015-07-28'),
(73, '', 0, 'avisek', 'saha', 'nits.avisek@gmail.com', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '--', '345 nilachal', '', '', '2014-09-05', '1', 1, '2014-09-12 14:36:28', '122.160.187.85', 'kolkata', '', '', '12321626', '2014-09-05', '0000-00-00'),
(74, '', 0, 'dxsfsdf', 'fdsdf', 'test@test1.com', '', '', '', '202cb962ac59075b964b07152d234b70', '', '--', 'asdasd', '', '', '2014-09-09', '0', 0, '0000-00-00 00:00:00', '122.160.187.85', 'kolkata', '', '', '1231231', '2014-09-09', '0000-00-00'),
(84, '', 0, 'Jose Luis', 'Quinones', 'surfershouse@gmail.com', '', '', '', 'b3b720459f067c1b184fce7ebd5cddf6', '', '--', '655 Bo. Carrizales, Aguada, Puerto Rico 00602-2322', '', '', '2014-10-02', '1', 1, '2014-10-04 13:08:51', '76.72.249.225', 'kolkata', '', '', '7874442044', '2014-10-02', '0000-00-00'),
(81, '', 0, 'Karunadri', 'Ghosh', 'nits.karunadri@gmail.com', '', '', '', '098f6bcd4621d373cade4e832627b4f6', '', '--', 'Test', '', '', '2014-09-15', '1', 0, '0000-00-00 00:00:00', '122.160.187.85', 'kolkata', '', '', '12333', '2014-09-15', '0000-00-00'),
(86, '', 0, 'brendon', 'kelly', 'brendon@creativehaus.com', '', '', '', '6104df369888589d6dbea304b59a32d4', '', '--', '2233 winchester', '', '', '2014-10-06', '1', 1, '2014-11-19 17:17:05', '72.196.169.201', 'kolkata', '', '', '6199922288', '2014-10-06', '0000-00-00'),
(85, '', 0, 'Domingo', 'Cruz', 'dcruzlulo@gmail.com', '', '', '', 'ec1223318f02bd5df53d5fc943408986', '', '--', 'Urb.Villa Rita Calle2B7 San Sebastian, P.R. 00685', '', '', '2014-10-05', '1', 0, '0000-00-00 00:00:00', '72.50.82.251', 'kolkata', '', '', '787-450-1945', '2014-10-05', '0000-00-00'),
(87, '', 0, 'brian', 'kellerman', 'brenaon@test.com', '', '', '', '6104df369888589d6dbea304b59a32d4', '', '--', '3343 winchester', '', '', '2014-11-19', '0', 0, '0000-00-00 00:00:00', '72.196.169.201', 'kolkata', '', '', '6199922288', '2014-11-19', '0000-00-00'),
(88, '', 0, 'brandon', 'kellerman', 'brandon@creativehaus.com', '', '', '', '6104df369888589d6dbea304b59a32d4', '', '--', '2332 winchester', '', '', '2014-11-19', '0', 0, '0000-00-00 00:00:00', '72.196.169.201', 'kolkata', '', '', '6193390085', '2014-11-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_user_billinginfo`
--

CREATE TABLE IF NOT EXISTS `vacation_user_billinginfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `creditcard_number` varchar(50) NOT NULL,
  `creditcard_exp` varchar(15) NOT NULL,
  `creditcard_cvv` varchar(15) NOT NULL,
  `creditcard_holder_fname` varchar(256) NOT NULL,
  `creditcard_holder_lname` varchar(256) NOT NULL,
  `creditcard_city` varchar(100) NOT NULL,
  `creditcard_state` varchar(100) NOT NULL,
  `creditcard_zip` varchar(50) NOT NULL,
  `creditcard_country` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vacation_user_billinginfo`
--

INSERT INTO `vacation_user_billinginfo` (`id`, `user_id`, `creditcard_number`, `creditcard_exp`, `creditcard_cvv`, `creditcard_holder_fname`, `creditcard_holder_lname`, `creditcard_city`, `creditcard_state`, `creditcard_zip`, `creditcard_country`) VALUES
(1, 63, '6011000000000012', '04/15', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(2, 64, '4242424242424242', '02/2019', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(3, 65, '6011000000000012', '04/15', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(4, 66, '6011000000000012', '04/15', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(5, 67, '6011000000000012', '04/15', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(6, 68, '4242424242424242', '04/2015', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(7, 70, '4242424242424242', '04/2015', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(8, 72, '4242424242424242', '04/2015', '782', 'John', 'Doe', 'San Francisco', 'CA', '94133', 'US'),
(9, 73, '4444333322221111', '05/2019', '123', 'avisek', 'saha', 'kolkata', 'wb', '700051', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `vacation_user_payments`
--

CREATE TABLE IF NOT EXISTS `vacation_user_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount_paid` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `vacation_user_payments`
--

INSERT INTO `vacation_user_payments` (`id`, `user_id`, `amount_paid`, `date`) VALUES
(12, 70, '90', '2014-07-28 00:18:39'),
(3, 64, '198', '2014-07-02 07:48:44'),
(6, 64, '1', '2014-07-02 09:10:21'),
(7, 64, '1', '2014-07-02 09:21:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
