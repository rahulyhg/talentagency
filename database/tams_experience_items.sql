/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.21 : Database - talentagency
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`talentagency` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `talentagency`;

/*Table structure for table `tams_experience_items` */

DROP TABLE IF EXISTS `tams_experience_items`;

CREATE TABLE `tams_experience_items` (
  `experience_item_id` int(11) DEFAULT NULL,
  `experience_item_name` varchar(50) DEFAULT NULL,
  `experience_item_desc` varchar(255) DEFAULT NULL,
  `experience_item_status` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_experience_items` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
