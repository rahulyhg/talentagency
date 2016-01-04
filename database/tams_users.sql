-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 01:15 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teamsutlej_talent`
--

-- --------------------------------------------------------

--
-- Table structure for table `tams_users`
--

CREATE TABLE IF NOT EXISTS `tams_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(24) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `first_name` varchar(24) NOT NULL,
  `last_name` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `auth_code` varchar(30) DEFAULT NULL,
  `user_avatar_url` varchar(255) DEFAULT NULL,
  `user_nic` varchar(255) DEFAULT NULL,
  `user_title` varchar(255) DEFAULT NULL,
  `last_modified_by` varchar(255) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `user_status` varchar(255) DEFAULT 'active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tams_users`
--

INSERT INTO `tams_users` (`user_id`, `user_name`, `user_email`, `first_name`, `last_name`, `password`, `role_id`, `auth_code`, `user_avatar_url`, `user_nic`, `user_title`, `last_modified_by`, `last_modified_on`, `created_by`, `created_on`, `user_status`) VALUES
(1, 'test', 'test@test.com', 'test', 'tester', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, '778899', NULL, NULL, 'Mr.', 'system', '2015-03-23 19:14:45', 'system', NULL, 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
