/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.21 : Database - teamsutlej_talent
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
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`client_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tams_client_comments` */

insert  into `tams_client_comments`(`client_comment_id`,`client_id`,`comment`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,1,'Far far away, behind the word mountains far from the countries Vokalia and Consonantia,there live the blind texts. ',NULL,NULL,NULL,NULL);

/*Table structure for table `tams_clients` */

DROP TABLE IF EXISTS `tams_clients`;

CREATE TABLE `tams_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `logo_url` varchar(50) DEFAULT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_title` varchar(100) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `client_city` varchar(100) NOT NULL,
  `client_country` varchar(100) NOT NULL,
  `client_phone_1` varchar(50) DEFAULT NULL,
  `client_phone_2` varchar(50) DEFAULT NULL,
  `client_fax` varchar(50) DEFAULT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_status` varchar(50) NOT NULL,
  `client_account_manager` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tams_clients` */

insert  into `tams_clients`(`client_id`,`company_name`,`logo_url`,`client_name`,`client_title`,`client_address`,`client_city`,`client_country`,`client_phone_1`,`client_phone_2`,`client_fax`,`client_email`,`client_status`,`client_account_manager`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,'Angels Photography','/talent/uploads/clients/1_logo.jpg','Edward Doyle','Operation Manager','street # 403,main road,queens land																																																																												','Queens Land','Australia','6325453746842','0985093853','9023582958','edward@gmail.com','active','Ashley','1','2016-01-25 18:16:03','1','2016-02-02 10:41:09'),(2,'ABC productions','/talent/uploads/clients/2_logo.jpg','John Smith','Advertising sales executive','block # 34, main street, Qatar															','Qatar','Qatar','0989877875767','987856754564','878798780','john@gmail.com','active','John','1','2016-01-26 11:34:16','1','2016-02-02 10:14:04'),(3,'Start Films Productions','/talent/uploads/clients/3_logo.jpg','Alexandra Saint','Production Manager','block # 54, los angeles, united states								','Los Angeles','United States','8735893754','894366346','4893679834','saint@gmail.com','active','Scott','1','2016-01-26 11:45:01','1','2016-02-02 09:30:02'),(4,'XYZ Entertainment','/talent/uploads/clients/4_logo.jpg','Sanjay Kapoor','CEO','5-km main mumbai road, 												','Mumbai','India','8473894573','3457965354','3242376865','sanjay@gmail.com','active','Rohit Sharma','1','2016-02-02 18:06:16','1','2016-02-03 07:15:56'),(6,'Entwine Advertising agency','/talent/uploads/clients/6_logo.jpg','Mariah Desouza ','Marketing Manager','Cald Well Street 												','England','United Kingdom','876676990','576576456','341237512','mariah@agency.com','active','Nicole Arnold','1','2016-02-02 18:54:01','1','2016-02-03 07:15:04'),(7,'AVG Entertainment','/talent/uploads/clients/7_logo.jpg',' Abdullah','Producer','main street # 56 																						','Lahore','Pakistan','769878975','35465777','4353453','abdullah@avg.com','active','Huzaifa','1','2016-02-03 07:09:41','1','2016-02-04 05:49:59');

/*Table structure for table `tams_document_types` */

DROP TABLE IF EXISTS `tams_document_types`;

CREATE TABLE `tams_document_types` (
  `document_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_name` varchar(50) DEFAULT NULL,
  `document_type_desc` varchar(255) DEFAULT NULL,
  `document_type_extension` varchar(50) DEFAULT NULL,
  `document_type_status` varchar(50) NOT NULL DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`document_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tams_document_types` */

insert  into `tams_document_types`(`document_type_id`,`document_type_name`,`document_type_desc`,`document_type_extension`,`document_type_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,'docx','MS word document','.docx','active','1','2016-01-24 21:45:37','1','2016-01-26 06:24:43'),(2,'pdf','PDF document ','.pdf','active','1','2016-01-26 10:09:35','1','2016-01-27 11:46:08');

/*Table structure for table `tams_experience_items` */

DROP TABLE IF EXISTS `tams_experience_items`;

CREATE TABLE `tams_experience_items` (
  `experience_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `experience_item_name` varchar(50) DEFAULT NULL,
  `experience_item_desc` varchar(255) DEFAULT NULL,
  `experience_item_status` varchar(50) NOT NULL DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` date DEFAULT NULL,
  PRIMARY KEY (`experience_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tams_experience_items` */

insert  into `tams_experience_items`(`experience_item_id`,`experience_item_name`,`experience_item_desc`,`experience_item_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,'Actor','Actor ( Female )','active','1','2016-01-24','1','2016-01-27'),(2,'Dancer','Dancer','active','1','2016-01-24','1','2016-01-27');

/*Table structure for table `tams_languages` */

DROP TABLE IF EXISTS `tams_languages`;

CREATE TABLE `tams_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(50) NOT NULL,
  `language_status` varchar(50) NOT NULL DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tams_languages` */

insert  into `tams_languages`(`language_id`,`language_name`,`language_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,'English (United States)','active','1','2016-01-24 00:00:00','1','2016-01-27 11:45:07'),(2,'Arabic','active','1','2016-01-24 00:00:00','1','2016-01-26 17:26:21'),(5,'Urdu','active','1','2016-01-26 17:08:31','1','2016-01-27 11:44:30');

/*Table structure for table `tams_portfolio_items` */

DROP TABLE IF EXISTS `tams_portfolio_items`;

CREATE TABLE `tams_portfolio_items` (
  `portfolio_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_item_name` varchar(100) DEFAULT NULL,
  `portfolio_item_desc` varchar(255) DEFAULT NULL,
  `portfolio_item_status` varchar(50) NOT NULL DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`portfolio_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tams_portfolio_items` */

insert  into `tams_portfolio_items`(`portfolio_item_id`,`portfolio_item_name`,`portfolio_item_desc`,`portfolio_item_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,'Showreel','Showreel','active','1','2016-01-24 21:53:25','1','2016-01-24 21:53:25'),(2,'Photos','Photos Gallary','active','1','2016-01-24 21:54:55','1','2016-01-26 18:40:50'),(3,'IMDB','IMDB Profile Link','active','1','2016-01-24 21:55:18','1','2016-01-24 21:55:18'),(4,'Spotlight','Spotlight Profile','active','1','2016-01-24 21:55:47','1','2016-01-24 21:55:47'),(5,'YouTube','YouTube Channel','active','1','2016-01-24 21:56:44','1','2016-01-24 21:56:44'),(6,'Vimeo','Vimeo Channel','active','1','2016-01-24 21:57:07','1','2016-01-24 21:57:07'),(7,'Other','Other URL','active','1','2016-01-24 21:57:30','1','2016-01-27 11:40:12');

/*Table structure for table `tams_talent` */

DROP TABLE IF EXISTS `tams_talent`;

CREATE TABLE `tams_talent` (
  `talent_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `brief` varchar(150) DEFAULT NULL,
  `events` tinyint(1) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `is_qatari` tinyint(1) DEFAULT NULL COMMENT 'Is belongs to Qatar',
  `qatari_id` varchar(100) DEFAULT NULL,
  `qatari_id_copy_attached` tinyint(1) DEFAULT NULL,
  `noc_required` tinyint(1) DEFAULT NULL,
  `noc_copy_attached` tinyint(1) DEFAULT '0',
  `passport_no` varchar(100) DEFAULT NULL,
  `passport_copy_attached` tinyint(1) DEFAULT NULL,
  `sponsors_id_copy_attached` tinyint(1) DEFAULT NULL,
  `height_cm` varchar(50) DEFAULT NULL,
  `weight_kg` varchar(50) DEFAULT NULL,
  `hair_color` varchar(50) DEFAULT NULL,
  `eye_color` varchar(50) DEFAULT NULL,
  `dress_size` varchar(50) DEFAULT NULL,
  `shoe_size` varchar(50) DEFAULT NULL,
  `waist_cm` varchar(50) DEFAULT NULL,
  `collar_cm` varchar(50) DEFAULT NULL,
  `chest_cm` varchar(50) DEFAULT NULL,
  `photo1_url` varchar(50) DEFAULT NULL,
  `photo1_caption` varchar(100) DEFAULT NULL,
  `photo2_url` varchar(50) DEFAULT NULL,
  `photo2_caption` varchar(100) DEFAULT NULL,
  `registration_date` varchar(50) DEFAULT NULL,
  `talent_status` varchar(50) NOT NULL DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`talent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent` */

insert  into `tams_talent`(`talent_id`,`first_name`,`last_name`,`dob`,`sex`,`Address`,`mobile_no`,`email_id`,`brief`,`events`,`nationality`,`is_qatari`,`qatari_id`,`qatari_id_copy_attached`,`noc_required`,`noc_copy_attached`,`passport_no`,`passport_copy_attached`,`sponsors_id_copy_attached`,`height_cm`,`weight_kg`,`hair_color`,`eye_color`,`dress_size`,`shoe_size`,`waist_cm`,`collar_cm`,`chest_cm`,`photo1_url`,`photo1_caption`,`photo2_url`,`photo2_caption`,`registration_date`,`talent_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,'Mansoor','Rana','1978-01-20','Male','Al-Sadeeq Akbar House, Lodhran								','+923333414999','mansoor@sutlej.net','																																																																																																																					',NULL,'Pakistan',NULL,'446666',0,0,0,'5313113344',0,0,'180.33','95','black','Dark brown','Large','40','38','24','34','/talent/uploads/talent_profiles/1_photo1.jpg','Hello World','/talent/uploads/talent_profiles/1_photo2.jpg','Hello',NULL,'draft','1','2016-02-08 10:56:04','1','2016-02-08 10:56:04'),(2,'john','rambo','1993-08-26','Male','	XYZ								','8907876677','john@gmail.com','																											',NULL,'United States',0,'676975695767',0,1,1,'7679807659765',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/talent/uploads/talent_profiles/2_photo1.jpg','My Brand','/talent/uploads/talent_profiles/2_photo2.jpg','My Brand',NULL,'draft','1','2016-02-08 09:08:24','1','2016-02-08 09:08:24'),(3,'Alexandra ','Saint','1991-05-09','Female','california, united states						','98706565674','saint@gmail.com','									',NULL,'United States',0,'',0,1,1,'98787765675',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/talent/uploads/talent_profiles/3_photo1.jpg','Hi','/talent/uploads/talent_profiles/3_photo2.jpg','Hello',NULL,'draft','1','2016-02-08 09:10:07','1','2016-02-08 09:10:07'),(12,'Hello','Fellow','2016-02-08','Male','street XYZ,																							','789787766','anybody@example.com','																																				',NULL,'Pakistan',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/talent/uploads/talent_profiles/12_photo1.jpg','Hello World','/talent/uploads/talent_profiles/12_photo2.jpg','Hello',NULL,'draft','1','2016-02-08 08:59:08','1','2016-02-08 08:59:09');

/*Table structure for table `tams_talent_comments` */

DROP TABLE IF EXISTS `tams_talent_comments`;

CREATE TABLE `tams_talent_comments` (
  `talent_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) DEFAULT NULL COMMENT 'Foreign Key',
  `comment` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`talent_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_comments` */

/*Table structure for table `tams_talent_documents` */

DROP TABLE IF EXISTS `tams_talent_documents`;

CREATE TABLE `tams_talent_documents` (
  `talent_document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_id` int(11) NOT NULL,
  `talent_id` int(11) NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `document_description` varchar(255) DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `document_status` varchar(50) DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`talent_document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_documents` */

insert  into `tams_talent_documents`(`talent_document_id`,`document_type_id`,`talent_id`,`document_name`,`document_description`,`document_path`,`document_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,2,3,NULL,NULL,NULL,'active','1','2016-02-03 10:25:45','1','2016-02-03 10:25:45'),(2,1,1,NULL,NULL,NULL,'active','1','2016-02-04 08:59:49','1','2016-02-04 08:59:49');

/*Table structure for table `tams_talent_experience` */

DROP TABLE IF EXISTS `tams_talent_experience`;

CREATE TABLE `tams_talent_experience` (
  `talent_experience_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) DEFAULT NULL,
  `experience_item_id` int(11) DEFAULT NULL,
  `experience_status` varchar(50) DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`talent_experience_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_experience` */

insert  into `tams_talent_experience`(`talent_experience_item_id`,`talent_id`,`experience_item_id`,`experience_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,1,1,'active','1','2016-02-01 09:31:31','1','2016-02-01 09:31:31'),(2,1,2,'active','1','2016-02-01 09:32:19','1','2016-02-01 09:32:19'),(3,1,1,'active','1','2016-02-01 09:32:26','1','2016-02-01 09:32:26'),(4,1,2,'active','1','2016-02-01 09:32:45','1','2016-02-01 09:32:45');

/*Table structure for table `tams_talent_language` */

DROP TABLE IF EXISTS `tams_talent_language`;

CREATE TABLE `tams_talent_language` (
  `talent_language_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `language_status` varchar(50) DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`talent_language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_language` */

insert  into `tams_talent_language`(`talent_language_id`,`talent_id`,`language_id`,`language_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,1,1,'active','1','2016-02-01 10:12:08','1','2016-02-01 10:12:08'),(2,1,2,'active','1','2016-02-01 10:13:02','1','2016-02-01 10:13:02'),(3,1,5,'active','1','2016-02-01 10:13:23','1','2016-02-01 10:13:23');

/*Table structure for table `tams_talent_photos` */

DROP TABLE IF EXISTS `tams_talent_photos`;

CREATE TABLE `tams_talent_photos` (
  `talent_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) NOT NULL,
  `photo_path` varchar(50) DEFAULT NULL,
  `photo_caption` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`talent_photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_photos` */

/*Table structure for table `tams_talent_portfolio` */

DROP TABLE IF EXISTS `tams_talent_portfolio`;

CREATE TABLE `tams_talent_portfolio` (
  `talent_portfolio_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `talent_id` int(11) NOT NULL,
  `portfolio_item_id` int(11) NOT NULL,
  `portfolio_item_description` varchar(255) DEFAULT NULL,
  `talent_portfolio_item_url` varchar(255) DEFAULT NULL,
  `portfolio_item_status` varchar(50) DEFAULT 'active',
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`talent_portfolio_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tams_talent_portfolio` */

insert  into `tams_talent_portfolio`(`talent_portfolio_item_id`,`talent_id`,`portfolio_item_id`,`portfolio_item_description`,`talent_portfolio_item_url`,`portfolio_item_status`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,1,2,NULL,NULL,'active','1','2016-02-04 08:52:04','1','2016-02-04 08:52:04');

/*Table structure for table `tams_user_comments` */

DROP TABLE IF EXISTS `tams_user_comments`;

CREATE TABLE `tams_user_comments` (
  `user_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`user_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tams_user_comments` */

/*Table structure for table `tams_user_roles` */

DROP TABLE IF EXISTS `tams_user_roles`;

CREATE TABLE `tams_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  `role_description` varchar(150) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tams_user_roles` */

insert  into `tams_user_roles`(`role_id`,`role_name`,`role_description`,`created_by`,`created_on`,`last_modified_by`,`last_modified_on`) values (1,'Administrator','User with full access to all system','1','2016-01-21 00:00:00','1','2016-01-24 15:53:06'),(2,'Manager','User with full access except System Settings','1','2016-01-21 00:00:00','1','2016-01-24 15:53:17'),(3,'Operator','User With Limited Access, only Talent and Client Modules','1','2016-01-21 00:00:00','1','2016-01-24 15:53:28');

/*Table structure for table `tams_users` */

DROP TABLE IF EXISTS `tams_users`;

CREATE TABLE `tams_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(24) NOT NULL,
  `user_title` varchar(255) DEFAULT NULL,
  `first_name` varchar(24) NOT NULL,
  `last_name` varchar(24) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_avatar_url` varchar(255) DEFAULT NULL,
  `auth_code` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` varchar(255) DEFAULT 'active',
  `created_by` varchar(255) DEFAULT NULL,
  `last_modified_on` datetime DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `last_modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tams_users` */

insert  into `tams_users`(`user_id`,`user_name`,`user_title`,`first_name`,`last_name`,`user_email`,`role_id`,`user_avatar_url`,`auth_code`,`password`,`user_status`,`created_by`,`last_modified_on`,`created_on`,`last_modified_by`) values (1,'test','Mr.','Mansoor ','Rana','mansoor@sutlej.net',1,'http://www.gravatar.com/avatar/28c442cff3c7bad642a680754ddf1598fs=150','778899','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','active','1','2016-01-24 22:21:41','2015-03-23 19:14:45','1'),(2,'kafia','Miss','Kafia','Ahmed','kafia@sutlej.net',1,'http://www.gravatar.com/avatar/dd242ad63854fb13dfdbc08e8ed2b5cdfs=150','7445211','277b0bf37f9e5abf473cca5efa6e98dc7348c036','active','1','2016-01-27 11:56:57','2016-01-24 21:04:14','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
