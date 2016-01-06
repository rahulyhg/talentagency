/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.6.24 : Database - tams
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tams_client_comments` */

DROP TABLE IF EXISTS `tams_client_comments`;

CREATE TABLE `tams_client_comments` (
  `client_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `comment` varchar(255) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`client_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_client_comments` */

/*Table structure for table `tams_clients` */

DROP TABLE IF EXISTS `tams_clients`;

CREATE TABLE `tams_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `client_city` varchar(100) NOT NULL,
  `client_country` varchar(100) NOT NULL,
  `client_phone_1` varchar(50) DEFAULT NULL,
  `client_phone_2` varchar(50) DEFAULT NULL,
  `client_fax` varchar(50) DEFAULT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_status` varchar(50) DEFAULT NULL,
  `client_account_manager` varchar(50) DEFAULT NULL,
  `creadted_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_clients` */

/*Table structure for table `tams_document_types` */

DROP TABLE IF EXISTS `tams_document_types`;

CREATE TABLE `tams_document_types` (
  `document_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_name` varchar(50) DEFAULT NULL,
  `document_type_extension` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`document_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_document_types` */

/*Table structure for table `tams_experience_items` */

DROP TABLE IF EXISTS `tams_experience_items`;

CREATE TABLE `tams_experience_items` (
  `experience_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `experience_item_name` varchar(50) DEFAULT NULL,
  `experience_item_desc` varchar(255) DEFAULT NULL,
  `experience_item_status` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`experience_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_experience_items` */

/*Table structure for table `tams_languages` */

DROP TABLE IF EXISTS `tams_languages`;

CREATE TABLE `tams_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(50) NOT NULL,
  `language_status` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_languages` */

/*Table structure for table `tams_portfolio_items` */

DROP TABLE IF EXISTS `tams_portfolio_items`;

CREATE TABLE `tams_portfolio_items` (
  `portfolio_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_item_name` varchar(100) DEFAULT NULL,
  `portfolio_item_status` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`portfolio_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_portfolio_items` */

/*Table structure for table `tams_talent` */

DROP TABLE IF EXISTS `tams_talent`;

CREATE TABLE `tams_talent` (
  `talent_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `qatari` tinyint(1) DEFAULT NULL,
  `passport_no` varchar(100) DEFAULT NULL,
  `passport_copy_attached` tinyint(1) DEFAULT NULL,
  `qatari_id` varchar(100) DEFAULT NULL,
  `qatari_id_copy_attached` tinyint(1) DEFAULT NULL,
  `NOC_copy_attached` tinyint(1) DEFAULT NULL,
  `sponsors_id_copy_attached` tinyint(1) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `area_of_residence` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `noc_required` tinyint(1) DEFAULT NULL,
  `height_cm` varchar(50) DEFAULT NULL,
  `weight_kg` varchar(50) DEFAULT NULL,
  `hair_color` varchar(50) DEFAULT NULL,
  `eye_color` varchar(50) DEFAULT NULL,
  `dress_size` varchar(50) DEFAULT NULL,
  `shoe_size` varchar(50) DEFAULT NULL,
  `waist_cm` varchar(50) DEFAULT NULL,
  `collar_cm` varchar(50) DEFAULT NULL,
  `chest_cm` varchar(50) DEFAULT NULL,
  `registration_date` varchar(50) DEFAULT NULL,
  `created_by_user` varchar(50) DEFAULT NULL,
  `created_on_date` varchar(50) DEFAULT NULL,
  `last_modified_by_user` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  `photo_url` varchar(50) DEFAULT NULL,
  `cv_url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`talent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent` */

/*Table structure for table `tams_talent_documents` */

DROP TABLE IF EXISTS `tams_talent_documents`;

CREATE TABLE `tams_talent_documents` (
  `document_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) DEFAULT NULL COMMENT 'Foreign Key',
  `document_path` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`document_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_documents` */

/*Table structure for table `tams_talent_experience` */

DROP TABLE IF EXISTS `tams_talent_experience`;

CREATE TABLE `tams_talent_experience` (
  `talent_experience_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) DEFAULT NULL COMMENT 'Foreign Key',
  `talent_experience_item_status` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`talent_experience_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_experience` */

/*Table structure for table `tams_talent_language` */

DROP TABLE IF EXISTS `tams_talent_language`;

CREATE TABLE `tams_talent_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `talent_language_status` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_language` */

/*Table structure for table `tams_talent_portfolio` */

DROP TABLE IF EXISTS `tams_talent_portfolio`;

CREATE TABLE `tams_talent_portfolio` (
  `portfolio_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) DEFAULT NULL COMMENT 'Foreign Key',
  `talent_portfolio_detail` varchar(255) DEFAULT NULL,
  `talent_portfolio_item_url` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`portfolio_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_portfolio` */

/*Table structure for table `tams_user_comments` */

DROP TABLE IF EXISTS `tams_user_comments`;

CREATE TABLE `tams_user_comments` (
  `talent_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) DEFAULT NULL COMMENT 'Foreign Key',
  `comment` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`talent_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_user_comments` */

/*Table structure for table `tams_user_roles` */

DROP TABLE IF EXISTS `tams_user_roles`;

CREATE TABLE `tams_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_user_roles` */

/*Table structure for table `tams_users` */

DROP TABLE IF EXISTS `tams_users`;

CREATE TABLE `tams_users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tams_users` */

insert  into `tams_users`(`user_id`,`user_name`,`user_email`,`first_name`,`last_name`,`password`,`role_id`,`auth_code`,`user_avatar_url`,`user_nic`,`user_title`,`last_modified_by`,`last_modified_on`,`created_by`,`created_on`,`user_status`) values (1,'test','test@test.com','test','tester','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'778899',NULL,NULL,'Mr.','system','2015-03-23 19:14:45','system',NULL,'active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
