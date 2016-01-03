/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.27-log : Database - mypayapp_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `base` */

DROP TABLE IF EXISTS `base`;

CREATE TABLE `base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `n_work_day` double(2,0) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `base_lfk_1` (`city`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `base` */

insert  into `base`(`id`,`name`,`city`,`n_work_day`,`status`) values (1,'REGION A','',26,'1'),(2,'REGION B',NULL,26,'1'),(3,'HQ_O','HQ OFFICE',26,'1'),(4,'KIOSK 1',NULL,26,'1'),(5,'KIOSK 2',NULL,26,'1'),(6,'KIOSK 3',NULL,26,'1'),(7,'KIOSK 4',NULL,26,'1'),(8,'KIOSK 5',NULL,26,'1'),(9,'HQ_S',NULL,22,'1'),(10,'KIOSK 6','BOIS 9',26,'1');

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `departments` */

insert  into `departments`(`department_id`,`department_name`,`status`) values (1,'Finance','1'),(2,'HR','1'),(3,'Construction','1'),(4,'Technical','1'),(5,'Operations','1'),(6,'Administration','1'),(7,'Executive','1');

/*Table structure for table `employee_salary` */

DROP TABLE IF EXISTS `employee_salary`;

CREATE TABLE `employee_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) DEFAULT NULL,
  `month_sal` double DEFAULT NULL,
  `day_sal` double DEFAULT NULL,
  `tx_hor` double DEFAULT NULL,
  `net_sal` double DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `employees_salary_efk_1` (`employee_id`),
  CONSTRAINT `employee_salary_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

/*Data for the table `employee_salary` */

insert  into `employee_salary`(`id`,`employee_id`,`month_sal`,`day_sal`,`tx_hor`,`net_sal`,`status`) values (1,'004-345-943-2',58500,2659.09090909,332.386363636,44110,'1'),(2,'002-862-095-3',202500,9204.54545455,1150.56818182,133191.66666667,'1'),(3,'01-15-99-1973-03-00105',47750,1836.53846154,229.567307692,37015,'1'),(4,'01-16-99-1989-09-00012',11000,423.076923077,52.8846153846,11000,'1'),(5,'007-851-146-3',41795,1899.77272727,237.471590909,NULL,'1'),(6,'01-01-99-1988-12-00886',90000,4090.90909091,511.363636364,NULL,'1'),(7,'01-01-99-1988-07-00659',67950,3088.63636364,386.079545455,NULL,'1'),(8,'003-974-239-9',112500,5113.63636364,639.204545455,NULL,'1'),(9,'01-15-99-1989-01-00009',17600,676.923076923,84.6153846154,NULL,'1'),(10,'01-15-99-1981-07-00029',11000,423.076923077,52.8846153846,NULL,'1'),(11,'01-15-99-1985-03-00093',11000,423.076923077,52.8846153846,NULL,'1'),(12,'003-438-453-3',112500,5113.63636364,639.204545455,NULL,'1'),(13,'004-256-238-1',41175,1871.59090909,233.948863636,NULL,'1'),(14,'004-263-573-6',132975,6044.31818182,755.539772727,NULL,'1'),(15,'003-545-542-8',29247,1124.88461538,140.610576923,NULL,'1'),(16,'01-04-99-1981-01-00057',29247,1124.88461538,140.610576923,NULL,'1'),(17,'003-585-766-0',11000,423.076923077,52.8846153846,NULL,'1'),(18,'003-818-949-6',10000,384.615384615,48.0769230769,NULL,'1'),(19,'01-15-99-1990-03-00144',10000,384.615384615,48.0769230769,NULL,'1'),(20,'01-01-99-1984-08-00746',22000,846.153846154,105.769230769,NULL,'1'),(21,'01-15-99-1968-05-00021',22000,846.153846154,105.769230769,NULL,'1'),(22,'004-504-598-5',17600,676.923076923,84.6153846154,NULL,'1'),(23,'01-15-99-1993-03-00040',11000,423.076923077,52.8846153846,NULL,'1'),(24,'004-494-531-5',11000,423.076923077,52.8846153846,NULL,'1'),(25,'01-15-99-1983-06-00164',11000,423.076923077,52.8846153846,NULL,'1'),(26,'01-15-99-1988-01-00072',10000,384.615384615,48.0769230769,NULL,'1'),(27,'01-15-99-1991-02-00026',10000,384.615384615,48.0769230769,NULL,'1'),(28,'008-748-475-3',22000,846.153846154,105.769230769,NULL,'1'),(29,'01-02-99-1984-10-00131',17600,676.923076923,84.6153846154,NULL,'1'),(30,'01-15-99-1973-03-00063',11000,423.076923077,52.8846153846,NULL,'1'),(31,'07-10-99-1985-11-00032',11000,423.076923077,52.8846153846,NULL,'1'),(32,'004-730-031-2',11000,423.076923077,52.8846153846,NULL,'1'),(33,'006-993-310-4',10000,384.615384615,48.0769230769,NULL,'1'),(34,'006-061-101-0',10000,384.615384615,48.0769230769,NULL,'1'),(35,'004-409-452-2',69125,2658.65384615,332.331730769,NULL,'1'),(36,'01-17-99-1987-01-00009',28833,1108.96153846,138.620192308,NULL,'1'),(37,'01-01-99-1992-05-00165',22000,846.153846154,105.769230769,NULL,'1'),(38,'004-327-161-2',17600,676.923076923,84.6153846154,NULL,'1'),(39,'01-15-99-1989-10-00051',17600,676.923076923,84.6153846154,NULL,'1'),(40,'01-15-99-1981-11-00041',11000,423.076923077,52.8846153846,NULL,'1'),(41,'004-474-026-3',11000,423.076923077,52.8846153846,NULL,'1'),(42,'01-15-99-1970-09-00062',10000,384.615384615,48.0769230769,NULL,'1'),(43,'01-16-99-1988-09-00025',22000,846.153846154,105.769230769,NULL,'1'),(44,'01-16-99-1990-05-00016',17600,676.923076923,84.6153846154,NULL,'1'),(45,'01-16-99-1990-08-00009',11000,423.076923077,52.8846153846,NULL,'1'),(46,'01-16-99-1984-02-00065',11000,423.076923077,52.8846153846,NULL,'1'),(47,'002-265-030-2',10000,384.615384615,48.0769230769,NULL,'1'),(48,'004-996-954-6',10000,384.615384615,48.0769230769,NULL,'1'),(49,'01-01-99-1984-12-00738',22000,846.153846154,105.769230769,NULL,'1'),(50,'004-653-162-8',17600,676.923076923,84.6153846154,NULL,'1'),(51,'01-01-99-1982-10-00931',11000,423.076923077,52.8846153846,NULL,'1'),(52,'01-02-99-1987-12-00163',11000,423.076923077,52.8846153846,NULL,'1'),(53,'01-10-99-1974-56-00011',11000,423.076923077,52.8846153846,NULL,'1'),(54,'008-747-081-7',10000,384.615384615,48.0769230769,NULL,'1'),(55,'005-598-260-0',157500,7159.09090909,894.886363636,NULL,'1'),(56,'07-08-99-1968-04-00002',7500,288.461538462,36.0576923077,NULL,'1'),(57,'003-529-420-7',25560,983.076923077,122.884615385,NULL,'1'),(58,'003-664-705-9',23976,922.153846154,115.269230769,NULL,'1'),(59,'004-709-190-3',22000,846.153846154,105.769230769,NULL,'1'),(60,'004-151-196-6',315000,14318.1818182,1789.77272727,NULL,'1'),(61,'422110571',405000,18409.0909091,2301.13636364,NULL,'1'),(62,'01-18-99-1988-08-00062',22000,846.153846154,105.769230769,NULL,'1'),(63,'01-01-99-1977-12-00743',17600,676.923076923,84.6153846154,NULL,'1'),(64,'01-01-99-1990-02-00567',11000,423.076923077,52.8846153846,NULL,'1'),(65,'01-02-99-1993-10-00625',11000,423.076923077,52.8846153846,NULL,'1'),(66,'01-19-99-1988-10-00169',11000,423.076923077,52.8846153846,NULL,'1'),(67,'47233-222-555',50000,1923.0769230769,240.38461538462,NULL,'1');

/*Table structure for table `employee_taxe` */

DROP TABLE IF EXISTS `employee_taxe`;

CREATE TABLE `employee_taxe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) DEFAULT NULL,
  `iri` int(11) NOT NULL,
  `ona` int(11) NOT NULL,
  `tct` int(11) NOT NULL,
  `cas` int(11) NOT NULL,
  `fdu` int(11) NOT NULL,
  `tx_over` double NOT NULL,
  `tx_com` double NOT NULL,
  `tx_bonus` double NOT NULL,
  `status` char(1) DEFAULT '1',
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_taxe_efk_1` (`employee_id`),
  CONSTRAINT `employee_taxe_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

/*Data for the table `employee_taxe` */

insert  into `employee_taxe`(`id`,`employee_id`,`iri`,`ona`,`tct`,`cas`,`fdu`,`tx_over`,`tx_com`,`tx_bonus`,`status`,`total`) values (1,'004-345-943-2',0,0,0,0,0,0,0,0,'1',17603),(2,'002-862-095-3',0,0,0,0,0,0,0,0,'1',0),(3,'01-15-99-1973-03-00105',0,0,0,0,0,0,0,0,'1',0),(4,'01-16-99-1989-09-00012',0,0,0,0,0,0,0,0,'1',0),(5,'007-851-146-3',0,0,0,0,0,0,0,0,'1',0),(6,'01-01-99-1988-12-00886',0,0,0,0,0,0,0,0,'1',0),(7,'01-01-99-1988-07-00659',0,0,0,0,0,0,0,0,'1',0),(8,'003-974-239-9',0,0,0,0,0,0,0,0,'1',0),(9,'01-15-99-1989-01-00009',0,0,0,0,0,0,0,0,'1',0),(10,'01-15-99-1981-07-00029',0,0,0,0,0,0,0,0,'1',0),(11,'01-15-99-1985-03-00093',0,0,0,0,0,0,0,0,'1',0),(12,'003-438-453-3',0,0,0,0,0,0,0,0,'1',0),(13,'004-256-238-1',0,0,0,0,0,0,0,0,'1',0),(14,'004-263-573-6',0,0,0,0,0,0,0,0,'1',0),(15,'003-545-542-8',0,0,0,0,0,0,0,0,'1',0),(16,'01-04-99-1981-01-00057',0,0,0,0,0,0,0,0,'1',0),(17,'003-585-766-0',0,0,0,0,0,0,0,0,'1',0),(18,'003-818-949-6',0,0,0,0,0,0,0,0,'1',0),(19,'01-15-99-1990-03-00144',0,0,0,0,0,0,0,0,'1',0),(20,'01-01-99-1984-08-00746',0,0,0,0,0,0,0,0,'1',0),(21,'01-15-99-1968-05-00021',0,0,0,0,0,0,0,0,'1',0),(22,'004-504-598-5',0,0,0,0,0,0,0,0,'1',0),(23,'01-15-99-1993-03-00040',0,0,0,0,0,0,0,0,'1',0),(24,'004-494-531-5',0,0,0,0,0,0,0,0,'1',0),(25,'01-15-99-1983-06-00164',0,0,0,0,0,0,0,0,'1',0),(26,'01-15-99-1988-01-00072',0,0,0,0,0,0,0,0,'1',0),(27,'01-15-99-1991-02-00026',0,0,0,0,0,0,0,0,'1',0),(28,'008-748-475-3',0,0,0,0,0,0,0,0,'1',0),(29,'01-02-99-1984-10-00131',0,0,0,0,0,0,0,0,'1',0),(30,'01-15-99-1973-03-00063',0,0,0,0,0,0,0,0,'1',0),(31,'07-10-99-1985-11-00032',0,0,0,0,0,0,0,0,'1',0),(32,'004-730-031-2',0,0,0,0,0,0,0,0,'1',0),(33,'006-993-310-4',0,0,0,0,0,0,0,0,'1',0),(34,'006-061-101-0',0,0,0,0,0,0,0,0,'1',0),(35,'004-409-452-2',0,0,0,0,0,0,0,0,'1',0),(36,'01-17-99-1987-01-00009',0,0,0,0,0,0,0,0,'1',0),(37,'01-01-99-1992-05-00165',0,0,0,0,0,0,0,0,'1',0),(38,'004-327-161-2',0,0,0,0,0,0,0,0,'1',0),(39,'01-15-99-1989-10-00051',0,0,0,0,0,0,0,0,'1',0),(40,'01-15-99-1981-11-00041',0,0,0,0,0,0,0,0,'1',0),(41,'004-474-026-3',0,0,0,0,0,0,0,0,'1',0),(42,'01-15-99-1970-09-00062',0,0,0,0,0,0,0,0,'1',0),(43,'01-16-99-1988-09-00025',0,0,0,0,0,0,0,0,'1',0),(44,'01-16-99-1990-05-00016',0,0,0,0,0,0,0,0,'1',0),(45,'01-16-99-1990-08-00009',0,0,0,0,0,0,0,0,'1',0),(46,'01-16-99-1984-02-00065',0,0,0,0,0,0,0,0,'1',0),(47,'002-265-030-2',0,0,0,0,0,0,0,0,'1',0),(48,'004-996-954-6',0,0,0,0,0,0,0,0,'1',0),(49,'01-01-99-1984-12-00738',0,0,0,0,0,0,0,0,'1',0),(50,'004-653-162-8',0,0,0,0,0,0,0,0,'1',0),(51,'01-01-99-1982-10-00931',0,0,0,0,0,0,0,0,'1',0),(52,'01-02-99-1987-12-00163',0,0,0,0,0,0,0,0,'1',0),(53,'01-10-99-1974-56-00011',0,0,0,0,0,0,0,0,'1',0),(54,'008-747-081-7',0,0,0,0,0,0,0,0,'1',0),(55,'005-598-260-0',0,0,0,0,0,0,0,0,'1',0),(56,'07-08-99-1968-04-00002',0,0,0,0,0,0,0,0,'1',0),(57,'003-529-420-7',0,0,0,0,0,0,0,0,'1',0),(58,'003-664-705-9',0,0,0,0,0,0,0,0,'1',0),(59,'004-709-190-3',0,0,0,0,0,0,0,0,'1',0),(60,'004-151-196-6',0,0,0,0,0,0,0,0,'1',0),(61,'422110571',0,0,0,0,0,0,0,0,'1',0),(62,'01-18-99-1988-08-00062',0,0,0,0,0,0,0,0,'1',0),(63,'01-01-99-1977-12-00743',0,0,0,0,0,0,0,0,'1',0),(64,'01-01-99-1990-02-00567',0,0,0,0,0,0,0,0,'1',0),(65,'01-02-99-1993-10-00625',0,0,0,0,0,0,0,0,'1',0),(66,'01-19-99-1988-10-00169',0,0,0,0,0,0,0,0,'1',0),(67,'47233-222-555',7000,3000,500,500,500,0,0,0,'1',0);

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `situation` varchar(10) DEFAULT NULL,
  `handicap` char(3) DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `stat` varchar(10) DEFAULT NULL,
  `contract` varchar(10) DEFAULT NULL,
  `ssn` varchar(50) NOT NULL,
  `boss` char(3) NOT NULL,
  `n_day_off` int(2) DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `base` varchar(20) DEFAULT NULL,
  `n_work_day` int(11) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_country` varchar(100) DEFAULT NULL,
  `bank_account_no` varchar(100) DEFAULT NULL,
  `bank_swift_code` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `employees_jfk_1` (`job`),
  KEY `employees_dfk_1` (`department`),
  KEY `employees_bfk_1` (`base`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

/*Data for the table `employees` */

insert  into `employees`(`id`,`employee_id`,`firstname`,`lastname`,`phone`,`email`,`sex`,`situation`,`handicap`,`nationality`,`birthday`,`address`,`hire_date`,`stat`,`contract`,`ssn`,`boss`,`n_day_off`,`job`,`salary`,`department`,`base`,`n_work_day`,`region`,`bank_name`,`bank_country`,`bank_account_no`,`bank_swift_code`,`status`,`active`) values (48,'002-265-030-2','Diphimar','MINISTRE','','','M','Single','No','Haitian','1985-08-31','Cabaret','2014-10-01','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 4',26,'',NULL,NULL,NULL,NULL,'1',1),(2,'002-862-095-3','Alexandra Moise','SAINT ELIEN','(+509) 48907862','alexandra@dlohaiti.com','F','Married','No','American','1984-11-08','','2014-06-01','Fulltime','DHI','','',20,'Finance Manager',202500,'Finance','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(13,'003-438-453-3','Augustin','CENE','(+509) 4894-2711','procurement@dlo.ht','M','Single','No','Haitian','1972-07-18','','2014-01-05','Fulltime','DHOSA','','',0,'Construction Assista',112500,'Construction','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(58,'003-529-420-7','Marco Mirvil','SAJUSTE','+5094890-0778','mirvil2227@gmail.com','M','Married','No','Haitian','1969-07-16','','2013-04-01','Fulltime','DHOSA','','',15,'Head HQ Driver',25560,'Administration','HQ_O',26,'HQ OFFICE',NULL,NULL,NULL,NULL,'1',1),(16,'003-545-542-8','Jean Rene','LAMOUR','(+509) 3872-3912','','M','Married','No','Haitian','1972-01-10','','2014-11-17','Fulltime','DHOSA','','',15,'Plumber',29247,'Technical','HQ_O',26,'HQ OFFICE',NULL,NULL,NULL,NULL,'1',1),(18,'003-585-766-0','Alierist','WILMINSE','+5093411-5263 ','','M','Single','No','Haitian','1992-07-25','Saintard','2013-10-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1),(59,'003-664-705-9','Fritz','JEAN PIERRE','+5094891-5580','fritzjp68@gmail.com','M','Married','No','Haitian','1968-09-07','47, Impasse Fraicheur, Sarthe 45','2014-08-05','Fulltime','DHOSA','','',15,'Driver',23976,'Administration','HQ_O',26,'HQ OFFICE',NULL,NULL,NULL,NULL,'1',1),(19,'003-818-949-6','Pierre Louis','LAROCHELLE','+5093697-1701','','M','Married','No','Haitian','1968-08-23','SAINTARD','2014-03-01','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1),(8,'003-974-239-9','Nanoucheka','OLIS','(+509) 4890 0740','nolis@dlohaiti.com','F','Married','No','Haitian','1982-02-08','','2012-04-08','Fulltime','DHOSA','','',15,'Administration Manag',112500,'Administration','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(61,'004-151-196-6','Pierre Luigi','ROY','+5093111-3111','gino@dlohaiti.com','M','Married','No','French','1975-03-14','','2015-03-01','Fulltime','DHI','','No',0,'Operations Director',315000,'Operations','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(14,'004-256-238-1','Wolfson Fedler','CAZEAU','(+509) 4894-0158','','M','Single','','Haitian','1978-01-09','','2014-07-01','Fulltime','DHOSA','','',15,'Construction Assista',41175,'Construction','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(15,'004-263-573-6','Pascale','MERSAN','(+509) 4894-0158','pascale@dlohaiti.com','F','Married','No','Haitian','1980-10-04','','2014-01-13','Fulltime','DHOSA','','',0,'Technical Support Ma',132975,'Technical','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(39,'004-327-161-2','Marc-philippe','ESTIVERNE','+5094894-0157','','M','Single','No','Haitian','1980-11-09','#29, Saintard Arcahaie','2014-06-16','Fulltime','DHOSA','','',15,'Regional Mecanic',17600,'Technical','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(1,'004-345-943-2','Karl Olivier','MEDE','(+509)4846 5887','medekarl@gmail.com','M','Single','No','Haitian','1989-03-04','','2012-07-01','Fulltime','DHOSA','','',15,'Finance Assistant',58500,'Finance','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(36,'004-409-452-2','Woodlee','ABELARD','+5094890-0746','wqt_region1@dlo.ht','M','Single','No','Haitian','2014-05-03','','2014-10-16','Fulltime','DHOSA','','',15,'Water Quality Techni',69125,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(42,'004-474-026-3','Wilkien','THOMAS','','','M','Single','No','Haitian','1980-08-01','567, Carrefour Damier, Cabaret','2015-02-02','Fulltime','DHOSA','','',15,'Regional Assistant',11000,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(25,'004-494-531-5','Luckson','IMBERT','+5093485-5175','','M','Single','No','Haitian','1984-08-21','Corail','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 2',26,'',NULL,NULL,NULL,NULL,'1',1),(23,'004-504-598-5','Rouby','MARCELLUS','+5093102-2349','','M','Single','No','Haitian','1988-02-18','Corail','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Operator',17600,'Operations','KIOSK 2',26,'',NULL,NULL,NULL,NULL,'1',1),(51,'004-653-162-8','Eder Frantz','CLEMENT','+5094472-8174 ','','M','Single','No','Haitian','1987-11-23','SANTO','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Operator',17600,'Operations','KIOSK 5',26,'',NULL,NULL,NULL,NULL,'1',1),(60,'004-709-190-3','Mackenson','POLIFRANC','+5094890-7447','polifranc.mackenson@gmail.com','M','Married','No','Haitian','1983-12-11','316, Soleil 19b, Port-au-prince','2013-02-14','Fulltime','DHOSA','','',15,'Community Marketing ',22000,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(33,'004-730-031-2','Marc Fedner','RAPHAEL','+5093664-0974 ','','M','Single','No','Haitian','1984-08-18','Courjolles','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 3',26,'',NULL,NULL,NULL,NULL,'1',1),(49,'004-996-954-6','Ronald','DOMINGUE','','','M','Single','No','Haitian','1989-07-07','Cabaret','2014-10-01','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 4',26,'',NULL,NULL,NULL,NULL,'1',1),(56,'005-598-260-0','Guerdy Saint Louis','FAUSTIN','+5094891-5570','guerdy@dlohaiti.com','F','Married','No','Haitian','1980-07-12','Vivi Mitchel','2014-08-11','Fulltime','DHOSA','','',0,'HR Manager',157500,'HR','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(35,'006-061-101-0','Dely','TOUSSAINT','','','M','Married','No','Haitian','1985-05-18','Courjolles','2015-03-03','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 3',26,'',NULL,NULL,NULL,NULL,'1',1),(34,'006-993-310-4','Jean Frantz','LOUIS JEUNE','+5093895-2665','','M','Married','No','Haitian','1976-06-10','Courjolles','2014-10-01','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 3',26,'',NULL,NULL,NULL,NULL,'1',1),(5,'007-851-146-3','Nicolas','ANTONIO','(+509) 4890 0754','antonio@dlo.ht','M','Single','No','Haitian','1984-11-07','','2014-07-27','Fulltime','DHOSA','','',5,'Procurement Assistan',41795,'Finance','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(55,'008-747-081-7','Aristilde','MICLAUDE','','','M','Single','No','Haitian','1983-03-02','','2015-03-23','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 5',26,'',NULL,NULL,NULL,NULL,'1',1),(29,'008-748-475-3','Pierre Ronald','DEROSIERS','+5093609-8731','courjolles3@dlo.ht','M','Married','No','Haitian','1978-05-10','COURJOLLES','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Manager',22000,'Operations','KIOSK 3',26,'',NULL,NULL,NULL,NULL,'1',1),(64,'01-01-99-1977-12-00743','Jean Nickenson','ANTOINE','+5094060-0141','','M','Married','No','Haitian','0000-00-00','Cite Soleil','2015-03-30','Fulltime','DHOSA','','',15,'Kiosk Operator',17600,'Operations','KIOSK 6',26,'BOIS 9',NULL,NULL,NULL,NULL,'1',1),(52,'01-01-99-1982-10-00931','Reginald','LEGER','+5093470-8508','','M','Single','No','Haitian','0000-00-00','Saintard','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 5',26,'',NULL,NULL,NULL,NULL,'1',1),(21,'01-01-99-1984-08-00746','Maudeline','THOMAS','+5093743-1849','saintard1@dlo.ht','F','Single','No','Haitian','1984-08-11','Saintard','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Manager',22000,'Operations','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1),(50,'01-01-99-1984-12-00738','Ronald','VOLMAR','+5093796-1488','santo5@dlo.ht','M','Single','No','Haitian','1984-12-03','Santo','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Manager',22000,'Operations','KIOSK 5',26,'',NULL,NULL,NULL,NULL,'1',1),(7,'01-01-99-1988-07-00659','Romeus','LEONE','(+509) 4890 0744','leone@dlo.ht','M','Single','No','Haitian','1988-07-13','','2013-11-01','Fulltime','DHOSA','','',15,'Community Marketing ',67950,'Operations','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(6,'01-01-99-1988-12-00886','Raoul Moliere','AMISIAL','(+509) 3855 7702','raoul@dlo.ht','M','Single','No','Haitian','1988-12-30','','2014-07-01','Fulltime','DHOSA','','',15,'Operations Coordinat',90000,'Operations','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(65,'01-01-99-1990-02-00567','Ronald','RENE','+5094643-2317','','M','Single','No','Haitian','0000-00-00','Cite Soleil','2015-04-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 6',26,'BOIS 9',NULL,NULL,NULL,NULL,'1',1),(38,'01-01-99-1992-05-00165','Oradma','ROBERT','+5094475-3205','','F','Single','No','Haitian','1992-05-31','','2014-09-22','Fulltime','DHOSA','','',15,'CMM Assistant',22000,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(30,'01-02-99-1984-10-00131','Stive','DELIUS','+5093749-6039','','M','Single','No','Haitian','1984-10-17','Courjolles','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Operator',17600,'Operations','KIOSK 3',26,'',NULL,NULL,NULL,NULL,'1',1),(53,'01-02-99-1987-12-00163','Marvens','RENFORT','+5093710-2938','','M','Single','No','Haitian','1987-12-29','Santo','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 5',26,'',NULL,NULL,NULL,NULL,'1',1),(66,'01-02-99-1993-10-00625','Falone','JOACHIM','+5093425-7265','','F','Single','No','Haitian','0000-00-00','Cite Soleil','2015-04-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 6',26,'BOIS 9',NULL,NULL,NULL,NULL,'1',1),(17,'01-04-99-1981-01-00057','Sorel','MASSILON','','','M','Married','No','Haitian','1981-01-17','','2014-11-17','Fulltime','DHOSA','','',15,'Plumber',29247,'Technical','HQ_O',26,'HQ OFFICE',NULL,NULL,NULL,NULL,'1',1),(54,'01-10-99-1974-56-00011','Marie Myrtha','DENAU','','','F','Single','No','Haitian','1974-06-06','Saintard','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 5',26,'',NULL,NULL,NULL,NULL,'1',1),(22,'01-15-99-1968-05-00021','Miranda','SAINT LOUIS','+5093687-3898','corail2@dlo.ht','M','Married','No','Haitian','1968-05-15','Corail','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Manager',22000,'Operations','KIOSK 2',26,'',NULL,NULL,NULL,NULL,'1',1),(43,'01-15-99-1970-09-00062','Pierre Jenks Levelt','LAMARRE','','','M','Single','No','Haitian','1970-09-01','Courjolles','2014-09-01','Fulltime','DHOSA','','',15,'Guardian',10000,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(31,'01-15-99-1973-03-00063','Pierre Widens','LAMARRE','+5093651-1671','','M','Married','No','Haitian','1973-03-29','Courjolles','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 3',26,'',NULL,NULL,NULL,NULL,'1',1),(3,'01-15-99-1973-03-00105','Dorsainville','PIERRE SAINVIL','(+509) 3862 7939','regional1@dlo.ht','M','Married','No','Haitian','0000-00-00','SAINTARD','2013-10-01','Fulltime','DHOSA','','',15,'Regional Manager',47750,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(11,'01-15-99-1981-07-00029','Solail','JEAN BAPTISTE','','','M','Single','No','Haitian','1981-07-10','','2013-10-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1),(41,'01-15-99-1981-11-00041','Jean Junior','TOUSSAINT','','','M','Married','No','Haitian','0000-00-00','','2014-05-01','Fulltime','DHOSA','','',15,'Regional Assistant',11000,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(26,'01-15-99-1983-06-00164','Jean Remy','PIERRE','+5093632-0845','','M','Single','No','Haitian','1983-06-16','Corail','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 2',26,'',NULL,NULL,NULL,NULL,'1',1),(12,'01-15-99-1985-03-00093','Jeune','VALENTIN','','saintard1@dlo.ht','M','Married','No','Haitian','1985-03-15','','2013-10-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1),(27,'01-15-99-1988-01-00072','Frandy','DORVIL','+5093723-9488','','M','Single','No','Haitian','1988-01-06','Corail','2014-07-16','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 2',26,'',NULL,NULL,NULL,NULL,'1',1),(10,'01-15-99-1989-01-00009','Daphmar','ARMAND','','','F','Married','No','Haitian','1989-01-24','','2013-10-01','Fulltime','DHOSA','','',15,'Kiosk Operator',17600,'Operations','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1),(40,'01-15-99-1989-10-00051','Farah','EUCHER','+5093617-3463','','F','Single','No','Haitian','1989-10-27','#11, Mitan, Arcahaie','2014-02-15','Fulltime','DHOSA','','',15,'Regional Technician',17600,'Technical','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(20,'01-15-99-1990-03-00144','Carlos','JOSEPH','+5093439-8768','','M','Single','No','Haitian','1990-03-03','Saintard','2014-03-01','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1),(28,'01-15-99-1991-02-00026','Wisler','PIERRE LOUIS','+5094646-7906 ','','M','Single','No','Haitian','1991-02-17','Corail','2014-07-15','Fulltime','DHOSA','','',15,'Trike Driver',10000,'Operations','KIOSK 2',26,'',NULL,NULL,NULL,NULL,'1',1),(24,'01-15-99-1993-03-00040','Dossous','ROSE-BERLINE','+5093629-7450','','F','Single','No','Haitian','1993-03-06','Corail','2014-05-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 2',26,'',NULL,NULL,NULL,NULL,'1',1),(47,'01-16-99-1984-02-00065','Wilson','PAYOUTE','+5093314-6343','','M','Single','No','Haitian','1984-02-14','Cabaret','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 4',26,'',NULL,NULL,NULL,NULL,'1',1),(44,'01-16-99-1988-09-00025','Sainte Helene','JEAN','+5093336-3392 ','','F','Single','No','Haitian','1988-09-07','Cabaret','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Manager',22000,'Operations','KIOSK 4',26,'',NULL,NULL,NULL,NULL,'1',1),(4,'01-16-99-1989-09-00012','Daniel','MICHAUD','','','F','Married','No','Haitian','1989-09-17','','2014-12-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 4',26,'',NULL,NULL,NULL,NULL,'1',1),(45,'01-16-99-1990-05-00016','Michel Ader','LAURORE','+50938184269','','M','Single','No','Haitian','1990-05-17','Cabaret','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Operator',17600,'Operations','KIOSK 4',26,'',NULL,NULL,NULL,NULL,'1',1),(46,'01-16-99-1990-08-00009','Juliette','FRANCOIS','+5094331-5629','','F','Single','No','Haitian','1990-08-17','Cabaret','2014-09-22','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 4',26,'',NULL,NULL,NULL,NULL,'1',1),(37,'01-17-99-1987-01-00009','Sophonie','SIMERVIL','+5093393-4376','mare1@dlo.ht','F','Single','No','Haitian','1987-01-29','#10, Rue Hostin, Arcahaie','2014-05-01','Fulltime','DHOSA','','',15,'Community Marketing ',28833,'Operations','REGION A',26,'',NULL,NULL,NULL,NULL,'1',1),(63,'01-18-99-1988-08-00062','Wenso','LEGER','','','M','Single','No','Haitian','0000-00-00','','2015-04-01','Fulltime','DHOSA','','',15,'Kiosk Manager',22000,'Operations','KIOSK 6',26,'BOIS 9',NULL,NULL,NULL,NULL,'1',1),(67,'01-19-99-1988-10-00169','Jackenson','ESTHER','+5093752-7706','','M','Single','No','Haitian','0000-00-00','Cite Soleil','2015-04-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 6',26,'BOIS 9',NULL,NULL,NULL,NULL,'1',1),(57,'07-08-99-1968-04-00002','Sonise','SEIDE','+5093796-9340','','F','Single','No','Haitian','1968-04-03','','2015-02-24','Fulltime','DHOSA','','',15,'Office Cleaner',7500,'Administration','HQ_O',26,'HQ OFFICE',NULL,NULL,NULL,NULL,'1',1),(32,'07-10-99-1985-11-00032','John','ODENAT','','','M','Single','No','Haitian','1985-11-18','Courjolles','2015-01-01','Fulltime','DHOSA','','',15,'Kiosk Assistant',11000,'Operations','KIOSK 3',26,'',NULL,NULL,NULL,NULL,'1',1),(62,'422110571','James J.','CHU','+5094890-0743','jim@dlohaiti.com','M','Married','No','American','1972-04-05','','2013-04-25','Fulltime','DHI','1065 De Haro St, San Francisco, California','Yes',0,'Chief Executive Offi',405000,'Executive','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(9,'433802766','Jason Edwin','HERSH','(+509) 48936984','jason@dlohaiti.com','M','Single','No','American','1976-02-10','','2015-02-01','Fulltime','DHI','433802766','No',0,'Contruction Manager',229500,'Construction','HQ_S',22,'',NULL,NULL,NULL,NULL,'1',1),(68,'47233-222-555','Masoor Rana','RANA','','masnoor@sutlej.net','M','Single','No','','0000-00-00','','2015-02-02','Fulltime','DHOSA','','',0,'Plumber',50000,'Technical','KIOSK 1',26,'',NULL,NULL,NULL,NULL,'1',1);

/*Table structure for table `job_history` */

DROP TABLE IF EXISTS `job_history`;

CREATE TABLE `job_history` (
  `employee_id` varchar(50) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `departements_dfk_1` (`department`),
  KEY `jobs_jfk_1` (`job`),
  KEY `emp_efk_1` (`employee_id`),
  CONSTRAINT `job_history_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

/*Data for the table `job_history` */

insert  into `job_history`(`employee_id`,`start_date`,`end_date`,`job`,`department`,`id`,`status`) values ('004-345-943-2','2012-07-01',NULL,'Finance Assistant','Finance',1,'1'),('002-862-095-3','2014-06-01',NULL,'Finance Manager','Finance',2,'1'),('01-15-99-1973-03-00105','2013-10-01',NULL,'Regional Manager','Operations',3,'1'),('01-16-99-1989-09-00012','2014-12-01','0000-00-00','Kiosk Assistant','Operations',4,'0'),('007-851-146-3','2014-07-27',NULL,'Procurement Assistan','Finance',5,'1'),('01-01-99-1988-12-00886','2014-07-01',NULL,'Operations Coordinat','Operations',6,'1'),('01-01-99-1988-07-00659','2013-11-01',NULL,'Community Marketing ','Operations',7,'1'),('003-974-239-9','2012-04-08',NULL,'Administration Manag','Administration',8,'1'),('01-15-99-1989-01-00009','2013-10-01',NULL,'Kiosk Operator','Operations',9,'1'),('01-15-99-1981-07-00029','2013-10-01',NULL,'Kiosk Assistant','Operations',10,'1'),('01-15-99-1985-03-00093','2013-10-01',NULL,'Kiosk Assistant','Operations',11,'1'),('003-438-453-3','2014-01-05',NULL,'Construction Assista','Construction',12,'1'),('004-256-238-1','2014-07-01',NULL,'Construction Assista','Construction',13,'1'),('004-263-573-6','2014-01-13',NULL,'Technical Support Ma','Technical',14,'1'),('003-545-542-8','2014-11-17',NULL,'Plumber','Technical',15,'1'),('01-04-99-1981-01-00057','2014-11-17',NULL,'Plumber','Technical',16,'1'),('003-585-766-0','2013-10-01',NULL,'Kiosk Assistant','Operations',17,'1'),('003-818-949-6','2014-03-01',NULL,'Trike Driver','Operations',18,'1'),('01-15-99-1990-03-00144','2014-03-01',NULL,'Trike Driver','Operations',19,'1'),('01-01-99-1984-08-00746','2014-05-01',NULL,'Kiosk Manager','Operations',20,'1'),('01-15-99-1968-05-00021','2014-05-01',NULL,'Kiosk Manager','Operations',21,'1'),('004-504-598-5','2014-05-01',NULL,'Kiosk Operator','Operations',22,'1'),('01-15-99-1993-03-00040','2014-05-01',NULL,'Kiosk Assistant','Operations',23,'1'),('004-494-531-5','2014-05-01',NULL,'Kiosk Assistant','Operations',24,'1'),('01-15-99-1983-06-00164','2014-05-01',NULL,'Kiosk Assistant','Operations',25,'1'),('01-15-99-1988-01-00072','2014-07-16',NULL,'Trike Driver','Operations',26,'1'),('01-15-99-1991-02-00026','2014-07-15',NULL,'Trike Driver','Operations',27,'1'),('008-748-475-3','2014-05-01',NULL,'Kiosk Manager','Operations',28,'1'),('01-02-99-1984-10-00131','2014-05-01',NULL,'Kiosk Operator','Operations',29,'1'),('01-15-99-1973-03-00063','2014-05-01',NULL,'Kiosk Assistant','Operations',30,'1'),('07-10-99-1985-11-00032','2015-01-01',NULL,'Kiosk Assistant','Operations',31,'1'),('004-730-031-2','2014-05-01',NULL,'Kiosk Assistant','Operations',32,'1'),('006-993-310-4','2014-10-01',NULL,'Trike Driver','Operations',33,'1'),('006-061-101-0','2015-03-03',NULL,'Trike Driver','Operations',34,'1'),('004-409-452-2','2014-10-16',NULL,'Water Quality Techni','Operations',35,'1'),('01-17-99-1987-01-00009','2014-05-01',NULL,'Community Marketing ','Operations',36,'1'),('01-01-99-1992-05-00165','2014-09-22',NULL,'CMM Assistant','Operations',37,'1'),('004-327-161-2','2014-06-16',NULL,'Regional Mecanic','Technical',38,'1'),('01-15-99-1989-10-00051','2014-02-15',NULL,'Regional Technician','Technical',39,'1'),('01-15-99-1981-11-00041','2014-05-01',NULL,'Regional Assistant','Operations',40,'1'),('004-474-026-3','2015-02-02',NULL,'Regional Assistant','Operations',41,'1'),('01-15-99-1970-09-00062','2014-09-01',NULL,'Guardian','Operations',42,'1'),('01-16-99-1988-09-00025','2014-09-22',NULL,'Kiosk Manager','Operations',43,'1'),('01-16-99-1990-05-00016','2014-09-22',NULL,'Kiosk Operator','Operations',44,'1'),('01-16-99-1990-08-00009','2014-09-22',NULL,'Kiosk Assistant','Operations',45,'1'),('01-16-99-1984-02-00065','2014-09-22',NULL,'Kiosk Assistant','Operations',46,'1'),('002-265-030-2','2014-10-01',NULL,'Trike Driver','Operations',47,'1'),('004-996-954-6','2014-10-01',NULL,'Trike Driver','Operations',48,'1'),('01-01-99-1984-12-00738','2014-09-22',NULL,'Kiosk Manager','Operations',49,'1'),('004-653-162-8','2014-09-22',NULL,'Kiosk Operator','Operations',50,'1'),('01-01-99-1982-10-00931','2014-09-22',NULL,'Kiosk Assistant','Operations',51,'1'),('01-02-99-1987-12-00163','2014-09-22',NULL,'Kiosk Assistant','Operations',52,'1'),('01-10-99-1974-56-00011','2014-09-22',NULL,'Kiosk Assistant','Operations',53,'1'),('008-747-081-7','2015-03-23',NULL,'Trike Driver','Operations',54,'1'),('005-598-260-0','2014-08-11',NULL,'HR Manager','HR',55,'1'),('07-08-99-1968-04-00002','2015-02-24',NULL,'Office Cleaner','Administration',56,'1'),('003-529-420-7','2013-04-01',NULL,'Head HQ Driver','Administration',57,'1'),('003-664-705-9','2014-08-05',NULL,'Driver','Administration',58,'1'),('004-709-190-3','2013-02-14',NULL,'Community Marketing ','Operations',59,'1'),('004-151-196-6','2015-03-01',NULL,'Operations Director','Operations',60,'1'),('422110571','2013-04-25',NULL,'Chief Executive Offi','Executive',61,'1'),('01-18-99-1988-08-00062','2015-04-01',NULL,'Kiosk Manager','Operations',62,'1'),('01-01-99-1977-12-00743','2015-03-30',NULL,'Kiosk Operator','Operations',63,'1'),('01-01-99-1990-02-00567','2015-04-01',NULL,'Kiosk Assistant','Operations',64,'1'),('01-02-99-1993-10-00625','2015-04-01',NULL,'Kiosk Assistant','Operations',65,'1'),('01-19-99-1988-10-00169','2015-04-01',NULL,'Kiosk Assistant','Operations',66,'1'),('47233-222-555','2015-02-02',NULL,'Plumber','Technical',67,'1');

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`job_id`),
  KEY `jobs_dfk_1` (`department_id`),
  CONSTRAINT `jobs_dfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `jobs` */

insert  into `jobs`(`job_id`,`job_title`,`department_id`,`status`) values (1,'Finance Assistant',1,'1'),(2,'Finance Manager',1,'1'),(3,'HR Manager',2,'1'),(4,'Contruction Manager',3,'1'),(5,'Regional Technician',4,'1'),(6,'Regional Manager',5,'1'),(7,'Kiosk Manager',5,'1'),(8,'Kiosk Operator',5,'1'),(9,'Kiosk Assistant',5,'1'),(10,'Procurement Assistant',1,'1'),(11,'Operations Coordinator',5,'1'),(12,'Community Marketing Manager',5,'1'),(13,'Administration Manager',6,'1'),(15,'Construction Coordinator',3,'1'),(16,'Construction Assistant',3,'1'),(17,'Technical Support Manager',4,'1'),(18,'Plumber',4,'1'),(19,'Trike Driver',5,'1'),(20,'Water Quality Technician',5,'1'),(21,'CMM Assistant',5,'1'),(22,'Regional Mecanic',4,'1'),(23,'Regional Operator',5,'1'),(24,'Regional Assistant',5,'1'),(25,'Guardian',5,'1'),(26,'Office Cleaner',6,'1'),(27,'Head HQ Driver',6,'1'),(28,'Driver',6,'1'),(29,'Operations Director',5,'1'),(30,'Chief Executive Officer',7,'1');

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_address` varchar(150) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state_province` varchar(50) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `locations` */

insert  into `locations`(`location_id`,`street_address`,`code_postal`,`city`,`state_province`,`country`,`status`) values (1,NULL,NULL,'HQ Office',NULL,NULL,'1'),(3,NULL,NULL,'Terre Chaude',NULL,NULL,'1'),(4,NULL,NULL,'Courjolles',NULL,NULL,'1'),(5,NULL,NULL,'Corail',NULL,NULL,'1'),(6,NULL,NULL,'Saintard',NULL,NULL,'1'),(7,NULL,NULL,'Santo',NULL,NULL,'1'),(8,NULL,NULL,'Bois 9',NULL,NULL,'1');

/*Table structure for table `manager_contr` */

DROP TABLE IF EXISTS `manager_contr`;

CREATE TABLE `manager_contr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) DEFAULT NULL,
  `ona` double DEFAULT NULL,
  `cot_ass` double DEFAULT NULL,
  `ofatma` double DEFAULT NULL,
  `tms` double DEFAULT NULL,
  `dsav` double DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `manager_contr_efk_1` (`employee_id`),
  CONSTRAINT `manager_contr_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

/*Data for the table `manager_contr` */

insert  into `manager_contr`(`id`,`employee_id`,`ona`,`cot_ass`,`ofatma`,`tms`,`dsav`,`status`) values (1,'004-345-943-2',0,NULL,1755,1170,117,'1'),(2,'002-862-095-3',0,NULL,6075,4050,405,'1'),(3,'01-15-99-1973-03-00105',0,NULL,1432.5,955,95.5,'1'),(4,'01-16-99-1989-09-00012',0,NULL,330,220,22,'1'),(5,'007-851-146-3',0,NULL,1253.85,835.9,83.59,'1'),(6,'01-01-99-1988-12-00886',0,NULL,2700,1800,180,'1'),(7,'01-01-99-1988-07-00659',0,NULL,2038.5,1359,135.9,'1'),(8,'003-974-239-9',0,NULL,3375,2250,225,'1'),(9,'01-15-99-1989-01-00009',0,NULL,528,352,35.2,'1'),(10,'01-15-99-1981-07-00029',0,NULL,330,220,22,'1'),(11,'01-15-99-1985-03-00093',0,NULL,330,220,22,'1'),(12,'003-438-453-3',0,NULL,3375,2250,225,'1'),(13,'004-256-238-1',0,NULL,1235.25,823.5,82.35,'1'),(14,'004-263-573-6',0,NULL,3989.25,2659.5,265.95,'1'),(15,'003-545-542-8',0,NULL,877.41,584.94,58.494,'1'),(16,'01-04-99-1981-01-00057',0,NULL,877.41,584.94,58.494,'1'),(17,'003-585-766-0',0,NULL,330,220,22,'1'),(18,'003-818-949-6',0,NULL,300,200,20,'1'),(19,'01-15-99-1990-03-00144',0,NULL,300,200,20,'1'),(20,'01-01-99-1984-08-00746',0,NULL,660,440,44,'1'),(21,'01-15-99-1968-05-00021',0,NULL,660,440,44,'1'),(22,'004-504-598-5',0,NULL,528,352,35.2,'1'),(23,'01-15-99-1993-03-00040',0,NULL,330,220,22,'1'),(24,'004-494-531-5',0,NULL,330,220,22,'1'),(25,'01-15-99-1983-06-00164',0,NULL,330,220,22,'1'),(26,'01-15-99-1988-01-00072',0,NULL,300,200,20,'1'),(27,'01-15-99-1991-02-00026',0,NULL,300,200,20,'1'),(28,'008-748-475-3',0,NULL,660,440,44,'1'),(29,'01-02-99-1984-10-00131',0,NULL,528,352,35.2,'1'),(30,'01-15-99-1973-03-00063',0,NULL,330,220,22,'1'),(31,'07-10-99-1985-11-00032',0,NULL,330,220,22,'1'),(32,'004-730-031-2',0,NULL,330,220,22,'1'),(33,'006-993-310-4',0,NULL,300,200,20,'1'),(34,'006-061-101-0',0,NULL,300,200,20,'1'),(35,'004-409-452-2',0,NULL,2073.75,1382.5,138.25,'1'),(36,'01-17-99-1987-01-00009',0,NULL,864.99,576.66,57.666,'1'),(37,'01-01-99-1992-05-00165',0,NULL,660,440,44,'1'),(38,'004-327-161-2',0,NULL,528,352,35.2,'1'),(39,'01-15-99-1989-10-00051',0,NULL,528,352,35.2,'1'),(40,'01-15-99-1981-11-00041',0,NULL,330,220,22,'1'),(41,'004-474-026-3',0,NULL,330,220,22,'1'),(42,'01-15-99-1970-09-00062',0,NULL,300,200,20,'1'),(43,'01-16-99-1988-09-00025',0,NULL,660,440,44,'1'),(44,'01-16-99-1990-05-00016',0,NULL,528,352,35.2,'1'),(45,'01-16-99-1990-08-00009',0,NULL,330,220,22,'1'),(46,'01-16-99-1984-02-00065',0,NULL,330,220,22,'1'),(47,'002-265-030-2',0,NULL,300,200,20,'1'),(48,'004-996-954-6',0,NULL,300,200,20,'1'),(49,'01-01-99-1984-12-00738',0,NULL,660,440,44,'1'),(50,'004-653-162-8',0,NULL,528,352,35.2,'1'),(51,'01-01-99-1982-10-00931',0,NULL,330,220,22,'1'),(52,'01-02-99-1987-12-00163',0,NULL,330,220,22,'1'),(53,'01-10-99-1974-56-00011',0,NULL,330,220,22,'1'),(54,'008-747-081-7',0,NULL,300,200,20,'1'),(55,'005-598-260-0',0,NULL,4725,3150,315,'1'),(56,'07-08-99-1968-04-00002',0,NULL,225,150,15,'1'),(57,'003-529-420-7',0,NULL,766.8,511.2,51.12,'1'),(58,'003-664-705-9',0,NULL,719.28,479.52,47.952,'1'),(59,'004-709-190-3',0,NULL,660,440,44,'1'),(60,'004-151-196-6',0,NULL,9450,6300,630,'1'),(61,'422110571',0,NULL,12150,8100,810,'1'),(62,'01-18-99-1988-08-00062',0,NULL,660,440,44,'1'),(63,'01-01-99-1977-12-00743',0,NULL,528,352,35.2,'1'),(64,'01-01-99-1990-02-00567',0,NULL,330,220,22,'1'),(65,'01-02-99-1993-10-00625',0,NULL,330,220,22,'1'),(66,'01-19-99-1988-10-00169',0,NULL,330,220,22,'1'),(67,'47233-222-555',3000,NULL,1500,1000,100,'1');

/*Table structure for table `other_emp_taxe` */

DROP TABLE IF EXISTS `other_emp_taxe`;

CREATE TABLE `other_emp_taxe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) DEFAULT NULL,
  `pret` double DEFAULT NULL,
  `cot_ass` double DEFAULT NULL,
  `penality` double DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `other_emp_taxe_efk_1` (`employee_id`),
  CONSTRAINT `other_emp_taxe_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `other_emp_taxe` */

insert  into `other_emp_taxe`(`id`,`employee_id`,`pret`,`cot_ass`,`penality`,`status`) values (1,'47233-222-555',0,0,0,'1');

/*Table structure for table `payroll` */

DROP TABLE IF EXISTS `payroll`;

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payroll_efk_1` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `payroll` */

insert  into `payroll`(`id`,`employee_id`,`date`) values (1,'002-265-030-2','2015-05-28'),(2,'47233-222-555','2015-05-28');

/*Table structure for table `rapport` */

DROP TABLE IF EXISTS `rapport`;

CREATE TABLE `rapport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` char(1) NOT NULL,
  `situation` char(10) NOT NULL,
  `handicap` char(3) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `hire_date` date NOT NULL,
  `stat` char(10) NOT NULL,
  `contract` char(5) NOT NULL,
  `ssn` varchar(50) NOT NULL,
  `boss` char(3) NOT NULL,
  `n_day_off` int(11) NOT NULL,
  `job` varchar(50) NOT NULL,
  `salary` double NOT NULL,
  `department` varchar(30) NOT NULL,
  `base` varchar(30) NOT NULL,
  `n_work_day` int(11) NOT NULL,
  `region` varchar(100) NOT NULL,
  `day_sal` double NOT NULL,
  `tx_hor` double NOT NULL,
  `net_sal` double NOT NULL,
  `over` double NOT NULL,
  `com` double NOT NULL,
  `bonus` double NOT NULL,
  `frais` double NOT NULL,
  `bon_spec` double NOT NULL,
  `remb` double NOT NULL,
  `iri` double NOT NULL,
  `ona` double NOT NULL,
  `tct` double NOT NULL,
  `cas` double NOT NULL,
  `fdu` double NOT NULL,
  `tx_over` double NOT NULL,
  `tx_com` double NOT NULL,
  `tx_bonus` double NOT NULL,
  `pret` double NOT NULL,
  `cot_ass` double NOT NULL,
  `penality` double NOT NULL,
  `ofatma` double NOT NULL,
  `tms` double NOT NULL,
  `dsav` double NOT NULL,
  `total` double NOT NULL,
  `pay_date` date DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `rapport` */

insert  into `rapport`(`id`,`employee_id`,`firstname`,`lastname`,`phone`,`email`,`sex`,`situation`,`handicap`,`nationality`,`birthday`,`address`,`hire_date`,`stat`,`contract`,`ssn`,`boss`,`n_day_off`,`job`,`salary`,`department`,`base`,`n_work_day`,`region`,`day_sal`,`tx_hor`,`net_sal`,`over`,`com`,`bonus`,`frais`,`bon_spec`,`remb`,`iri`,`ona`,`tct`,`cas`,`fdu`,`tx_over`,`tx_com`,`tx_bonus`,`pret`,`cot_ass`,`penality`,`ofatma`,`tms`,`dsav`,`total`,`pay_date`,`status`,`active`) values (1,'47233-222-555','Masoor Rana','RANA','','masnoor@sutlej.net','M','Single','No','','0000-00-00','','2015-02-02','Fulltime','DHOSA','','',0,'Plumber',50000,'Technical','KIOSK 1',26,'',1923.0769230769,240.38461538462,0,0,0,0,0,0,0,7000,3000,500,500,500,0,0,0,0,0,0,1500,1000,100,0,'2015-05-28','1',1);

/*Table structure for table `sup_revenu` */

DROP TABLE IF EXISTS `sup_revenu`;

CREATE TABLE `sup_revenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) DEFAULT NULL,
  `over` double NOT NULL,
  `com` double NOT NULL,
  `bonus` double NOT NULL,
  `frais` double NOT NULL,
  `bonus_spec` double NOT NULL,
  `remb_dep` double NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `sup_revenu_efk_1` (`employee_id`),
  CONSTRAINT `sup_revenu_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sup_revenu` */

insert  into `sup_revenu`(`id`,`employee_id`,`over`,`com`,`bonus`,`frais`,`bonus_spec`,`remb_dep`,`status`) values (1,'47233-222-555',0,0,0,0,0,0,'1');

/*Table structure for table `taxes` */

DROP TABLE IF EXISTS `taxes`;

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` char(10) NOT NULL,
  `percent` double NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `taxes` */

insert  into `taxes`(`id`,`description`,`percent`,`status`) values (1,'ONA',0.06,'1'),(2,'TCT',0.01,'1'),(3,'CAS',0.01,'1'),(4,'FDU',0.01,'1'),(5,'TX',0.1,'1'),(6,'OFATMA',0.03,'1'),(7,'TMS',0.02,'1'),(8,'DSAV',0.002,'1');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `sex` char(1) NOT NULL,
  `privilege` int(11) DEFAULT NULL,
  `emp_added` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`username`,`password`,`sex`,`privilege`,`emp_added`,`status`) values (1,'Karl Olivier','MEDE','karlO','d033e22ae348aeb5660fc2140aec35850c4da997','M',1,NULL,'1'),(2,'Alexandra Moise','SAINT ELIEN','alexandra','d033e22ae348aeb5660fc2140aec35850c4da997','F',1,NULL,'1'),(4,'Rh_2','RH_2','rh_2','d033e22ae348aeb5660fc2140aec35850c4da997','',0,NULL,'1'),(5,'Rh_1','RH_1','rh_1','d033e22ae348aeb5660fc2140aec35850c4da997','M',0,NULL,'1'),(6,'Nicolas','ANTONIO','nantonio','b5add45bcab63f2d170093f1edde66c0227c76af','M',1,NULL,'1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
