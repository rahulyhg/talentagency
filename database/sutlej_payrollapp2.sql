-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 12:07 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sutlej_payrollapp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_payments`
--

CREATE TABLE IF NOT EXISTS `bank_payments` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_country` varchar(100) DEFAULT NULL,
  `bank_account_no` varchar(100) NOT NULL,
  `bank_swift_code` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bank_payments`
--

INSERT INTO `bank_payments` (`bank_id`, `employee_id`, `bank_name`, `bank_country`, `bank_account_no`, `bank_swift_code`, `status`) VALUES
(3, 59, 'barclyes', 'Pakistan', '455511-554-554', '455411-41', '1'),
(4, 59, 'Sample Bank', 'Haiti', '1231234', '293H78', '1');

-- --------------------------------------------------------

--
-- Table structure for table `base`
--

CREATE TABLE IF NOT EXISTS `base` (
  `base_id` int(11) NOT NULL AUTO_INCREMENT,
  `base_name` varchar(50) NOT NULL,
  `n_work_day` double(2,0) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`base_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `base`
--

INSERT INTO `base` (`base_id`, `base_name`, `n_work_day`, `company_id`, `status`) VALUES
(1, 'KIOSK 1', 26, 1, '1'),
(2, 'KIOSK 2', 26, 1, '1'),
(3, 'KIOSK 3', 26, 1, '1'),
(4, 'KIOSK 4', 26, 1, '1'),
(5, 'HQ_O', 26, 1, '1'),
(6, 'HQ_S', 22, 1, '1'),
(7, 'REGION 1 ', 26, 1, '1'),
(8, 'Kiosk 5', 26, 1, '1'),
(9, 'Kiosk 6', 26, 1, '1'),
(10, 'Kiosk 7', 26, 1, '1'),
(11, 'Kiosk 8', 26, 1, '1'),
(12, 'Kiosk 9', 26, 1, '1'),
(13, 'Kiosk 10', 26, 1, '1'),
(14, 'Region 3', 26, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_types`
--

CREATE TABLE IF NOT EXISTS `benefit_types` (
  `benefit_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `benefit_type` varchar(100) NOT NULL,
  `tax_multiplier` double(11,5) NOT NULL DEFAULT '0.10000',
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`benefit_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `benefit_types`
--

INSERT INTO `benefit_types` (`benefit_type_id`, `company_id`, `order`, `benefit_type`, `tax_multiplier`, `status`) VALUES
(5, 1, 1, 'Commission', 0.10000, '1'),
(6, 1, 2, '13th Month Bonus', 0.10000, '1'),
(7, 1, 0, 'KPI Bonus', 0.00000, '1'),
(8, 1, 0, 'R&R', 0.00000, '1'),
(9, 1, 0, 'Overtime', 0.10000, '1'),
(10, 1, 0, 'Transportation Allowance', 0.00000, '1'),
(11, 1, 0, 'Pension', 0.00000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_plan_id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `UNIQUE` (`user_id`),
  KEY `subscription_plan_id` (`subscription_plan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `user_id`, `subscription_plan_id`, `status`) VALUES
(1, 'Dlo Haiti', 7, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `address_line_1` varchar(100) DEFAULT NULL,
  `address_line_2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip_postal_code` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `fiscal_year_start` date DEFAULT NULL,
  `overtime_multiplier` decimal(11,2) NOT NULL DEFAULT '1.50',
  `client_id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`company_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `address_line_1`, `address_line_2`, `city`, `zip_postal_code`, `country`, `phone`, `fax`, `email`, `company_logo`, `fiscal_year_start`, `overtime_multiplier`, `client_id`, `status`) VALUES
(1, 'Dlo Haiti Operations S.A.', '177, Rue Faubert', 'addres453', 'Petionville', '6412', '99', '3054071346', '1239877896', 'alexandra@dlohaiti.com', 'dloHaiti Logo-2.pdf', '2015-05-01', '1.50', 1, '1'),
(6, 'SampleCompany Inc', 'test', 'test', 'Moscow', '12345', '1', '1315684569', '4511554', 'dummy@dummy.com', 'office-clocks.jpg', '2015-06-10', '1.50', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE IF NOT EXISTS `contract_types` (
  `contract_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_type` varchar(100) NOT NULL,
  `taxable_salary_multiple` double(11,5) NOT NULL DEFAULT '1.00000',
  `company_id` int(11) NOT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`contract_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`contract_type_id`, `contract_type`, `taxable_salary_multiple`, `company_id`, `status`) VALUES
(1, 'DHI', 0.00000, 1, '1'),
(2, 'DHOSA 100%', 1.00000, 1, '1'),
(4, 'DHI 60% DHOSA 40%', 0.40000, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `fipsCode` char(2) DEFAULT NULL,
  `isoNumeric` char(4) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `isoAlpha3` char(3) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `countryCode`, `countryName`, `fipsCode`, `isoNumeric`, `languages`, `isoAlpha3`, `status`) VALUES
(1, 'AD', 'Andorra', 'AN', '020', 'ca', 'AND', NULL),
(2, 'AE', 'United Arab Emirates', 'AE', '784', 'ar-AE,fa,en,hi,ur', 'ARE', NULL),
(3, 'AF', 'Afghanistan', 'AF', '004', 'fa-AF,ps,uz-AF,tk', 'AFG', NULL),
(4, 'AG', 'Antigua and Barbuda', 'AC', '028', 'en-AG', 'ATG', NULL),
(5, 'AI', 'Anguilla', 'AV', '660', 'en-AI', 'AIA', NULL),
(6, 'AL', 'Albania', 'AL', '008', 'sq,el', 'ALB', NULL),
(7, 'AM', 'Armenia', 'AM', '051', 'hy', 'ARM', NULL),
(8, 'AO', 'Angola', 'AO', '024', 'pt-AO', 'AGO', NULL),
(9, 'AQ', 'Antarctica', 'AY', '010', '', 'ATA', NULL),
(10, 'AR', 'Argentina', 'AR', '032', 'es-AR,en,it,de,fr,gn', 'ARG', NULL),
(11, 'AS', 'American Samoa', 'AQ', '016', 'en-AS,sm,to', 'ASM', NULL),
(12, 'AT', 'Austria', 'AU', '040', 'de-AT,hr,hu,sl', 'AUT', NULL),
(13, 'AU', 'Australia', 'AS', '036', 'en-AU', 'AUS', NULL),
(14, 'AW', 'Aruba', 'AA', '533', 'nl-AW,es,en', 'ABW', NULL),
(15, 'AX', 'Åland', '', '248', 'sv-AX', 'ALA', NULL),
(16, 'AZ', 'Azerbaijan', 'AJ', '031', 'az,ru,hy', 'AZE', NULL),
(17, 'BA', 'Bosnia and Herzegovina', 'BK', '070', 'bs,hr-BA,sr-BA', 'BIH', NULL),
(18, 'BB', 'Barbados', 'BB', '052', 'en-BB', 'BRB', NULL),
(19, 'BD', 'Bangladesh', 'BG', '050', 'bn-BD,en', 'BGD', NULL),
(20, 'BE', 'Belgium', 'BE', '056', 'nl-BE,fr-BE,de-BE', 'BEL', NULL),
(21, 'BF', 'Burkina Faso', 'UV', '854', 'fr-BF', 'BFA', NULL),
(22, 'BG', 'Bulgaria', 'BU', '100', 'bg,tr-BG,rom', 'BGR', NULL),
(23, 'BH', 'Bahrain', 'BA', '048', 'ar-BH,en,fa,ur', 'BHR', NULL),
(24, 'BI', 'Burundi', 'BY', '108', 'fr-BI,rn', 'BDI', NULL),
(25, 'BJ', 'Benin', 'BN', '204', 'fr-BJ', 'BEN', NULL),
(26, 'BL', 'Saint Barthélemy', 'TB', '652', 'fr', 'BLM', NULL),
(27, 'BM', 'Bermuda', 'BD', '060', 'en-BM,pt', 'BMU', NULL),
(28, 'BN', 'Brunei', 'BX', '096', 'ms-BN,en-BN', 'BRN', NULL),
(29, 'BO', 'Bolivia', 'BL', '068', 'es-BO,qu,ay', 'BOL', NULL),
(30, 'BQ', 'Bonaire', '', '535', 'nl,pap,en', 'BES', NULL),
(31, 'BR', 'Brazil', 'BR', '076', 'pt-BR,es,en,fr', 'BRA', NULL),
(32, 'BS', 'Bahamas', 'BF', '044', 'en-BS', 'BHS', NULL),
(33, 'BT', 'Bhutan', 'BT', '064', 'dz', 'BTN', NULL),
(34, 'BV', 'Bouvet Island', 'BV', '074', '', 'BVT', NULL),
(35, 'BW', 'Botswana', 'BC', '072', 'en-BW,tn-BW', 'BWA', NULL),
(36, 'BY', 'Belarus', 'BO', '112', 'be,ru', 'BLR', NULL),
(37, 'BZ', 'Belize', 'BH', '084', 'en-BZ,es', 'BLZ', NULL),
(38, 'CA', 'Canada', 'CA', '124', 'en-CA,fr-CA,iu', 'CAN', NULL),
(39, 'CC', 'Cocos [Keeling] Islands', 'CK', '166', 'ms-CC,en', 'CCK', NULL),
(40, 'CD', 'Democratic Republic of the Congo', 'CG', '180', 'fr-CD,ln,kg', 'COD', NULL),
(41, 'CF', 'Central African Republic', 'CT', '140', 'fr-CF,sg,ln,kg', 'CAF', NULL),
(42, 'CG', 'Republic of the Congo', 'CF', '178', 'fr-CG,kg,ln-CG', 'COG', NULL),
(43, 'CH', 'Switzerland', 'SZ', '756', 'de-CH,fr-CH,it-CH,rm', 'CHE', NULL),
(44, 'CI', 'Ivory Coast', 'IV', '384', 'fr-CI', 'CIV', NULL),
(45, 'CK', 'Cook Islands', 'CW', '184', 'en-CK,mi', 'COK', NULL),
(46, 'CL', 'Chile', 'CI', '152', 'es-CL', 'CHL', NULL),
(47, 'CM', 'Cameroon', 'CM', '120', 'en-CM,fr-CM', 'CMR', NULL),
(48, 'CN', 'China', 'CH', '156', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', NULL),
(49, 'CO', 'Colombia', 'CO', '170', 'es-CO', 'COL', NULL),
(50, 'CR', 'Costa Rica', 'CS', '188', 'es-CR,en', 'CRI', NULL),
(51, 'CU', 'Cuba', 'CU', '192', 'es-CU', 'CUB', NULL),
(52, 'CV', 'Cape Verde', 'CV', '132', 'pt-CV', 'CPV', NULL),
(53, 'CW', 'Curacao', 'UC', '531', 'nl,pap', 'CUW', NULL),
(54, 'CX', 'Christmas Island', 'KT', '162', 'en,zh,ms-CC', 'CXR', NULL),
(55, 'CY', 'Cyprus', 'CY', '196', 'el-CY,tr-CY,en', 'CYP', NULL),
(56, 'CZ', 'Czech Republic', 'EZ', '203', 'cs,sk', 'CZE', NULL),
(57, 'DE', 'Germany', 'GM', '276', 'de', 'DEU', NULL),
(58, 'DJ', 'Djibouti', 'DJ', '262', 'fr-DJ,ar,so-DJ,aa', 'DJI', NULL),
(59, 'DK', 'Denmark', 'DA', '208', 'da-DK,en,fo,de-DK', 'DNK', NULL),
(60, 'DM', 'Dominica', 'DO', '212', 'en-DM', 'DMA', NULL),
(61, 'DO', 'Dominican Republic', 'DR', '214', 'es-DO', 'DOM', NULL),
(62, 'DZ', 'Algeria', 'AG', '012', 'ar-DZ', 'DZA', NULL),
(63, 'EC', 'Ecuador', 'EC', '218', 'es-EC', 'ECU', NULL),
(64, 'EE', 'Estonia', 'EN', '233', 'et,ru', 'EST', NULL),
(65, 'EG', 'Egypt', 'EG', '818', 'ar-EG,en,fr', 'EGY', NULL),
(66, 'EH', 'Western Sahara', 'WI', '732', 'ar,mey', 'ESH', NULL),
(67, 'ER', 'Eritrea', 'ER', '232', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', NULL),
(68, 'ES', 'Spain', 'SP', '724', 'es-ES,ca,gl,eu,oc', 'ESP', NULL),
(69, 'ET', 'Ethiopia', 'ET', '231', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', NULL),
(70, 'FI', 'Finland', 'FI', '246', 'fi-FI,sv-FI,smn', 'FIN', NULL),
(71, 'FJ', 'Fiji', 'FJ', '242', 'en-FJ,fj', 'FJI', NULL),
(72, 'FK', 'Falkland Islands', 'FK', '238', 'en-FK', 'FLK', NULL),
(73, 'FM', 'Micronesia', 'FM', '583', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 'FSM', NULL),
(74, 'FO', 'Faroe Islands', 'FO', '234', 'fo,da-FO', 'FRO', NULL),
(75, 'FR', 'France', 'FR', '250', 'fr-FR,frp,br,co,ca,eu,oc', 'FRA', NULL),
(76, 'GA', 'Gabon', 'GB', '266', 'fr-GA', 'GAB', NULL),
(77, 'GB', 'United Kingdom', 'UK', '826', 'en-GB,cy-GB,gd', 'GBR', NULL),
(78, 'GD', 'Grenada', 'GJ', '308', 'en-GD', 'GRD', NULL),
(79, 'GE', 'Georgia', 'GG', '268', 'ka,ru,hy,az', 'GEO', NULL),
(80, 'GF', 'French Guiana', 'FG', '254', 'fr-GF', 'GUF', NULL),
(81, 'GG', 'Guernsey', 'GK', '831', 'en,fr', 'GGY', NULL),
(82, 'GH', 'Ghana', 'GH', '288', 'en-GH,ak,ee,tw', 'GHA', NULL),
(83, 'GI', 'Gibraltar', 'GI', '292', 'en-GI,es,it,pt', 'GIB', NULL),
(84, 'GL', 'Greenland', 'GL', '304', 'kl,da-GL,en', 'GRL', NULL),
(85, 'GM', 'Gambia', 'GA', '270', 'en-GM,mnk,wof,wo,ff', 'GMB', NULL),
(86, 'GN', 'Guinea', 'GV', '324', 'fr-GN', 'GIN', NULL),
(87, 'GP', 'Guadeloupe', 'GP', '312', 'fr-GP', 'GLP', NULL),
(88, 'GQ', 'Equatorial Guinea', 'EK', '226', 'es-GQ,fr', 'GNQ', NULL),
(89, 'GR', 'Greece', 'GR', '300', 'el-GR,en,fr', 'GRC', NULL),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'SX', '239', 'en', 'SGS', NULL),
(91, 'GT', 'Guatemala', 'GT', '320', 'es-GT', 'GTM', NULL),
(92, 'GU', 'Guam', 'GQ', '316', 'en-GU,ch-GU', 'GUM', NULL),
(93, 'GW', 'Guinea-Bissau', 'PU', '624', 'pt-GW,pov', 'GNB', NULL),
(94, 'GY', 'Guyana', 'GY', '328', 'en-GY', 'GUY', NULL),
(95, 'HK', 'Hong Kong', 'HK', '344', 'zh-HK,yue,zh,en', 'HKG', NULL),
(96, 'HM', 'Heard Island and McDonald Islands', 'HM', '334', '', 'HMD', NULL),
(97, 'HN', 'Honduras', 'HO', '340', 'es-HN', 'HND', NULL),
(98, 'HR', 'Croatia', 'HR', '191', 'hr-HR,sr', 'HRV', NULL),
(99, 'HT', 'Haiti', 'HA', '332', 'ht,fr-HT', 'HTI', NULL),
(100, 'HU', 'Hungary', 'HU', '348', 'hu-HU', 'HUN', NULL),
(101, 'ID', 'Indonesia', 'ID', '360', 'id,en,nl,jv', 'IDN', NULL),
(102, 'IE', 'Ireland', 'EI', '372', 'en-IE,ga-IE', 'IRL', NULL),
(103, 'IL', 'Israel', 'IS', '376', 'he,ar-IL,en-IL,', 'ISR', NULL),
(104, 'IM', 'Isle of Man', 'IM', '833', 'en,gv', 'IMN', NULL),
(105, 'IN', 'India', 'IN', '356', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 'IND', NULL),
(106, 'IO', 'British Indian Ocean Territory', 'IO', '086', 'en-IO', 'IOT', NULL),
(107, 'IQ', 'Iraq', 'IZ', '368', 'ar-IQ,ku,hy', 'IRQ', NULL),
(108, 'IR', 'Iran', 'IR', '364', 'fa-IR,ku', 'IRN', NULL),
(109, 'IS', 'Iceland', 'IC', '352', 'is,en,de,da,sv,no', 'ISL', NULL),
(110, 'IT', 'Italy', 'IT', '380', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 'ITA', NULL),
(111, 'JE', 'Jersey', 'JE', '832', 'en,pt', 'JEY', NULL),
(112, 'JM', 'Jamaica', 'JM', '388', 'en-JM', 'JAM', NULL),
(113, 'JO', 'Jordan', 'JO', '400', 'ar-JO,en', 'JOR', NULL),
(114, 'JP', 'Japan', 'JA', '392', 'ja', 'JPN', NULL),
(115, 'KE', 'Kenya', 'KE', '404', 'en-KE,sw-KE', 'KEN', NULL),
(116, 'KG', 'Kyrgyzstan', 'KG', '417', 'ky,uz,ru', 'KGZ', NULL),
(117, 'KH', 'Cambodia', 'CB', '116', 'km,fr,en', 'KHM', NULL),
(118, 'KI', 'Kiribati', 'KR', '296', 'en-KI,gil', 'KIR', NULL),
(119, 'KM', 'Comoros', 'CN', '174', 'ar,fr-KM', 'COM', NULL),
(120, 'KN', 'Saint Kitts and Nevis', 'SC', '659', 'en-KN', 'KNA', NULL),
(121, 'KP', 'North Korea', 'KN', '408', 'ko-KP', 'PRK', NULL),
(122, 'KR', 'South Korea', 'KS', '410', 'ko-KR,en', 'KOR', NULL),
(123, 'KW', 'Kuwait', 'KU', '414', 'ar-KW,en', 'KWT', NULL),
(124, 'KY', 'Cayman Islands', 'CJ', '136', 'en-KY', 'CYM', NULL),
(125, 'KZ', 'Kazakhstan', 'KZ', '398', 'kk,ru', 'KAZ', NULL),
(126, 'LA', 'Laos', 'LA', '418', 'lo,fr,en', 'LAO', NULL),
(127, 'LB', 'Lebanon', 'LE', '422', 'ar-LB,fr-LB,en,hy', 'LBN', NULL),
(128, 'LC', 'Saint Lucia', 'ST', '662', 'en-LC', 'LCA', NULL),
(129, 'LI', 'Liechtenstein', 'LS', '438', 'de-LI', 'LIE', NULL),
(130, 'LK', 'Sri Lanka', 'CE', '144', 'si,ta,en', 'LKA', NULL),
(131, 'LR', 'Liberia', 'LI', '430', 'en-LR', 'LBR', NULL),
(132, 'LS', 'Lesotho', 'LT', '426', 'en-LS,st,zu,xh', 'LSO', NULL),
(133, 'LT', 'Lithuania', 'LH', '440', 'lt,ru,pl', 'LTU', NULL),
(134, 'LU', 'Luxembourg', 'LU', '442', 'lb,de-LU,fr-LU', 'LUX', NULL),
(135, 'LV', 'Latvia', 'LG', '428', 'lv,ru,lt', 'LVA', NULL),
(136, 'LY', 'Libya', 'LY', '434', 'ar-LY,it,en', 'LBY', NULL),
(137, 'MA', 'Morocco', 'MO', '504', 'ar-MA,fr', 'MAR', NULL),
(138, 'MC', 'Monaco', 'MN', '492', 'fr-MC,en,it', 'MCO', NULL),
(139, 'MD', 'Moldova', 'MD', '498', 'ro,ru,gag,tr', 'MDA', NULL),
(140, 'ME', 'Montenegro', 'MJ', '499', 'sr,hu,bs,sq,hr,rom', 'MNE', NULL),
(141, 'MF', 'Saint Martin', 'RN', '663', 'fr', 'MAF', NULL),
(142, 'MG', 'Madagascar', 'MA', '450', 'fr-MG,mg', 'MDG', NULL),
(143, 'MH', 'Marshall Islands', 'RM', '584', 'mh,en-MH', 'MHL', NULL),
(144, 'MK', 'Macedonia', 'MK', '807', 'mk,sq,tr,rmm,sr', 'MKD', NULL),
(145, 'ML', 'Mali', 'ML', '466', 'fr-ML,bm', 'MLI', NULL),
(146, 'MM', 'Myanmar [Burma]', 'BM', '104', 'my', 'MMR', NULL),
(147, 'MN', 'Mongolia', 'MG', '496', 'mn,ru', 'MNG', NULL),
(148, 'MO', 'Macao', 'MC', '446', 'zh,zh-MO,pt', 'MAC', NULL),
(149, 'MP', 'Northern Mariana Islands', 'CQ', '580', 'fil,tl,zh,ch-MP,en-MP', 'MNP', NULL),
(150, 'MQ', 'Martinique', 'MB', '474', 'fr-MQ', 'MTQ', NULL),
(151, 'MR', 'Mauritania', 'MR', '478', 'ar-MR,fuc,snk,fr,mey,wo', 'MRT', NULL),
(152, 'MS', 'Montserrat', 'MH', '500', 'en-MS', 'MSR', NULL),
(153, 'MT', 'Malta', 'MT', '470', 'mt,en-MT', 'MLT', NULL),
(154, 'MU', 'Mauritius', 'MP', '480', 'en-MU,bho,fr', 'MUS', NULL),
(155, 'MV', 'Maldives', 'MV', '462', 'dv,en', 'MDV', NULL),
(156, 'MW', 'Malawi', 'MI', '454', 'ny,yao,tum,swk', 'MWI', NULL),
(157, 'MX', 'Mexico', 'MX', '484', 'es-MX', 'MEX', NULL),
(158, 'MY', 'Malaysia', 'MY', '458', 'ms-MY,en,zh,ta,te,ml,pa,th', 'MYS', NULL),
(159, 'MZ', 'Mozambique', 'MZ', '508', 'pt-MZ,vmw', 'MOZ', NULL),
(160, 'NA', 'Namibia', 'WA', '516', 'en-NA,af,de,hz,naq', 'NAM', NULL),
(161, 'NC', 'New Caledonia', 'NC', '540', 'fr-NC', 'NCL', NULL),
(162, 'NE', 'Niger', 'NG', '562', 'fr-NE,ha,kr,dje', 'NER', NULL),
(163, 'NF', 'Norfolk Island', 'NF', '574', 'en-NF', 'NFK', NULL),
(164, 'NG', 'Nigeria', 'NI', '566', 'en-NG,ha,yo,ig,ff', 'NGA', NULL),
(165, 'NI', 'Nicaragua', 'NU', '558', 'es-NI,en', 'NIC', NULL),
(166, 'NL', 'Netherlands', 'NL', '528', 'nl-NL,fy-NL', 'NLD', NULL),
(167, 'NO', 'Norway', 'NO', '578', 'no,nb,nn,se,fi', 'NOR', NULL),
(168, 'NP', 'Nepal', 'NP', '524', 'ne,en', 'NPL', NULL),
(169, 'NR', 'Nauru', 'NR', '520', 'na,en-NR', 'NRU', NULL),
(170, 'NU', 'Niue', 'NE', '570', 'niu,en-NU', 'NIU', NULL),
(171, 'NZ', 'New Zealand', 'NZ', '554', 'en-NZ,mi', 'NZL', NULL),
(172, 'OM', 'Oman', 'MU', '512', 'ar-OM,en,bal,ur', 'OMN', NULL),
(173, 'PA', 'Panama', 'PM', '591', 'es-PA,en', 'PAN', NULL),
(174, 'PE', 'Peru', 'PE', '604', 'es-PE,qu,ay', 'PER', NULL),
(175, 'PF', 'French Polynesia', 'FP', '258', 'fr-PF,ty', 'PYF', NULL),
(176, 'PG', 'Papua New Guinea', 'PP', '598', 'en-PG,ho,meu,tpi', 'PNG', NULL),
(177, 'PH', 'Philippines', 'RP', '608', 'tl,en-PH,fil', 'PHL', NULL),
(178, 'PK', 'Pakistan', 'PK', '586', 'ur-PK,en-PK,pa,sd,ps,brh', 'PAK', NULL),
(179, 'PL', 'Poland', 'PL', '616', 'pl', 'POL', NULL),
(180, 'PM', 'Saint Pierre and Miquelon', 'SB', '666', 'fr-PM', 'SPM', NULL),
(181, 'PN', 'Pitcairn Islands', 'PC', '612', 'en-PN', 'PCN', NULL),
(182, 'PR', 'Puerto Rico', 'RQ', '630', 'en-PR,es-PR', 'PRI', NULL),
(183, 'PS', 'Palestine', 'WE', '275', 'ar-PS', 'PSE', NULL),
(184, 'PT', 'Portugal', 'PO', '620', 'pt-PT,mwl', 'PRT', NULL),
(185, 'PW', 'Palau', 'PS', '585', 'pau,sov,en-PW,tox,ja,fil,zh', 'PLW', NULL),
(186, 'PY', 'Paraguay', 'PA', '600', 'es-PY,gn', 'PRY', NULL),
(187, 'QA', 'Qatar', 'QA', '634', 'ar-QA,es', 'QAT', NULL),
(188, 'RE', 'Réunion', 'RE', '638', 'fr-RE', 'REU', NULL),
(189, 'RO', 'Romania', 'RO', '642', 'ro,hu,rom', 'ROU', NULL),
(190, 'RS', 'Serbia', 'RI', '688', 'sr,hu,bs,rom', 'SRB', NULL),
(191, 'RU', 'Russia', 'RS', '643', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 'RUS', NULL),
(192, 'RW', 'Rwanda', 'RW', '646', 'rw,en-RW,fr-RW,sw', 'RWA', NULL),
(193, 'SA', 'Saudi Arabia', 'SA', '682', 'ar-SA', 'SAU', NULL),
(194, 'SB', 'Solomon Islands', 'BP', '090', 'en-SB,tpi', 'SLB', NULL),
(195, 'SC', 'Seychelles', 'SE', '690', 'en-SC,fr-SC', 'SYC', NULL),
(196, 'SD', 'Sudan', 'SU', '729', 'ar-SD,en,fia', 'SDN', NULL),
(197, 'SE', 'Sweden', 'SW', '752', 'sv-SE,se,sma,fi-SE', 'SWE', NULL),
(198, 'SG', 'Singapore', 'SN', '702', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 'SGP', NULL),
(199, 'SH', 'Saint Helena', 'SH', '654', 'en-SH', 'SHN', NULL),
(200, 'SI', 'Slovenia', 'SI', '705', 'sl,sh', 'SVN', NULL),
(201, 'SJ', 'Svalbard and Jan Mayen', 'SV', '744', 'no,ru', 'SJM', NULL),
(202, 'SK', 'Slovakia', 'LO', '703', 'sk,hu', 'SVK', NULL),
(203, 'SL', 'Sierra Leone', 'SL', '694', 'en-SL,men,tem', 'SLE', NULL),
(204, 'SM', 'San Marino', 'SM', '674', 'it-SM', 'SMR', NULL),
(205, 'SN', 'Senegal', 'SG', '686', 'fr-SN,wo,fuc,mnk', 'SEN', NULL),
(206, 'SO', 'Somalia', 'SO', '706', 'so-SO,ar-SO,it,en-SO', 'SOM', NULL),
(207, 'SR', 'Suriname', 'NS', '740', 'nl-SR,en,srn,hns,jv', 'SUR', NULL),
(208, 'SS', 'South Sudan', 'OD', '728', 'en', 'SSD', NULL),
(209, 'ST', 'São Tomé and Príncipe', 'TP', '678', 'pt-ST', 'STP', NULL),
(210, 'SV', 'El Salvador', 'ES', '222', 'es-SV', 'SLV', NULL),
(211, 'SX', 'Sint Maarten', 'NN', '534', 'nl,en', 'SXM', NULL),
(212, 'SY', 'Syria', 'SY', '760', 'ar-SY,ku,hy,arc,fr,en', 'SYR', NULL),
(213, 'SZ', 'Swaziland', 'WZ', '748', 'en-SZ,ss-SZ', 'SWZ', NULL),
(214, 'TC', 'Turks and Caicos Islands', 'TK', '796', 'en-TC', 'TCA', NULL),
(215, 'TD', 'Chad', 'CD', '148', 'fr-TD,ar-TD,sre', 'TCD', NULL),
(216, 'TF', 'French Southern Territories', 'FS', '260', 'fr', 'ATF', NULL),
(217, 'TG', 'Togo', 'TO', '768', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', NULL),
(218, 'TH', 'Thailand', 'TH', '764', 'th,en', 'THA', NULL),
(219, 'TJ', 'Tajikistan', 'TI', '762', 'tg,ru', 'TJK', NULL),
(220, 'TK', 'Tokelau', 'TL', '772', 'tkl,en-TK', 'TKL', NULL),
(221, 'TL', 'East Timor', 'TT', '626', 'tet,pt-TL,id,en', 'TLS', NULL),
(222, 'TM', 'Turkmenistan', 'TX', '795', 'tk,ru,uz', 'TKM', NULL),
(223, 'TN', 'Tunisia', 'TS', '788', 'ar-TN,fr', 'TUN', NULL),
(224, 'TO', 'Tonga', 'TN', '776', 'to,en-TO', 'TON', NULL),
(225, 'TR', 'Turkey', 'TU', '792', 'tr-TR,ku,diq,az,av', 'TUR', NULL),
(226, 'TT', 'Trinidad and Tobago', 'TD', '780', 'en-TT,hns,fr,es,zh', 'TTO', NULL),
(227, 'TV', 'Tuvalu', 'TV', '798', 'tvl,en,sm,gil', 'TUV', NULL),
(228, 'TW', 'Taiwan', 'TW', '158', 'zh-TW,zh,nan,hak', 'TWN', NULL),
(229, 'TZ', 'Tanzania', 'TZ', '834', 'sw-TZ,en,ar', 'TZA', NULL),
(230, 'UA', 'Ukraine', 'UP', '804', 'uk,ru-UA,rom,pl,hu', 'UKR', NULL),
(231, 'UG', 'Uganda', 'UG', '800', 'en-UG,lg,sw,ar', 'UGA', NULL),
(232, 'UM', 'U.S. Minor Outlying Islands', '', '581', 'en-UM', 'UMI', NULL),
(233, 'US', 'United States', 'US', '840', 'en-US,es-US,haw,fr', 'USA', NULL),
(234, 'UY', 'Uruguay', 'UY', '858', 'es-UY', 'URY', NULL),
(235, 'UZ', 'Uzbekistan', 'UZ', '860', 'uz,ru,tg', 'UZB', NULL),
(236, 'VA', 'Vatican City', 'VT', '336', 'la,it,fr', 'VAT', NULL),
(237, 'VC', 'Saint Vincent and the Grenadines', 'VC', '670', 'en-VC,fr', 'VCT', NULL),
(238, 'VE', 'Venezuela', 'VE', '862', 'es-VE', 'VEN', NULL),
(239, 'VG', 'British Virgin Islands', 'VI', '092', 'en-VG', 'VGB', NULL),
(240, 'VI', 'U.S. Virgin Islands', 'VQ', '850', 'en-VI', 'VIR', NULL),
(241, 'VN', 'Vietnam', 'VM', '704', 'vi,en,fr,zh,km', 'VNM', NULL),
(242, 'VU', 'Vanuatu', 'NH', '548', 'bi,en-VU,fr-VU', 'VUT', NULL),
(243, 'WF', 'Wallis and Futuna', 'WF', '876', 'wls,fud,fr-WF', 'WLF', NULL),
(244, 'WS', 'Samoa', 'WS', '882', 'sm,en-WS', 'WSM', NULL),
(245, 'XK', 'Kosovo', 'KV', '0', 'sq,sr', 'XKX', NULL),
(246, 'YE', 'Yemen', 'YM', '887', 'ar-YE', 'YEM', NULL),
(247, 'YT', 'Mayotte', 'MF', '175', 'fr-YT', 'MYT', NULL),
(248, 'ZA', 'South Africa', 'SF', '710', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 'ZAF', NULL),
(249, 'ZM', 'Zambia', 'ZA', '894', 'en-ZM,bem,loz,lun,lue,ny,toi', 'ZMB', NULL),
(250, 'ZW', 'Zimbabwe', 'ZI', '716', 'en-ZW,sn,nr,nd', 'ZWE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `currency_code` varchar(3) NOT NULL,
  `currency_name` varchar(100) NOT NULL,
  `currency_symbol` varchar(100) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT '1',
  KEY `country_id` (`currency_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_code`, `currency_name`, `currency_symbol`, `active`) VALUES
('USD', 'US Dollars', '$', '1'),
('HTG', 'Groude', 'G', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_types`
--

CREATE TABLE IF NOT EXISTS `deduction_types` (
  `deduction_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `deduction_type` varchar(100) NOT NULL,
  `is_amount` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'is amount or percentage',
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`deduction_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deduction_types`
--

INSERT INTO `deduction_types` (`deduction_type_id`, `company_id`, `order`, `deduction_type`, `is_amount`, `status`) VALUES
(1, 1, 1, 'Health Insurance (International)', 1, '1'),
(2, 1, 2, 'Pension', 1, '1'),
(3, 1, 0, 'Loan', 1, '1'),
(4, 1, 0, 'Health Insurance', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT '1',
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`department_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `company_id`, `status`) VALUES
(1, 'Finance', 1, '1'),
(2, 'HR', 1, '1'),
(3, 'Construction', 1, '1'),
(4, 'Technical', 1, '1'),
(5, 'Operations', 1, '1'),
(6, 'Administrative', 1, '1'),
(7, 'Executive', 1, '1'),
(8, 'Marketing', 1, '1'),
(9, 'Water Quality', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_code` varchar(50) NOT NULL DEFAULT '',
  `job_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `base_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `status_type_id` int(11) DEFAULT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `handicap` char(3) DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip_postal_code` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `ssn` varchar(50) NOT NULL,
  `n_day_off` int(2) DEFAULT NULL,
  `currency_code` varchar(3) NOT NULL DEFAULT 'USD',
  `salary` double(11,2) NOT NULL,
  `n_work_day` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`company_id`,`employee_code`),
  KEY `employees_jfk_1` (`job_id`),
  KEY `employees_dfk_1` (`department_id`),
  KEY `employees_bfk_1` (`base_id`),
  KEY `id` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `company_id`, `employee_code`, `job_id`, `department_id`, `base_id`, `location_id`, `status_type_id`, `contract_type_id`, `firstname`, `lastname`, `sex`, `birthday`, `phone`, `mobile`, `email`, `marital_status`, `handicap`, `nationality`, `address_1`, `address_2`, `city`, `zip_postal_code`, `country`, `hire_date`, `ssn`, `n_day_off`, `currency_code`, `salary`, `n_work_day`, `status`, `active`) VALUES
(69, 1, '002-222-222-2', 20, 6, 5, 1, 1, 2, 'Test', 'Driver', 'M', '2015-06-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-01-01', '', NULL, 'USD', 15.00, 26, '0', NULL),
(48, 1, '002-265-030-2', 11, 5, 2, 4, 1, 2, 'Diphimar', 'MINISTRE', 'M', '1985-08-31', '', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cabaret', NULL, NULL, NULL, '2014-10-01', '', 15, 'HTG', 22000.00, 26, '1', 1),
(2, 1, '002-862-095-3', 2, 1, 6, 1, 1, 4, 'Alexandra Moise', 'SAINT ELIEN', 'F', '1984-11-08', '(+509) 48907862', NULL, 'alexandra@dlohaiti.com', 'Married', 'No', 'American', NULL, '', NULL, NULL, NULL, '2014-06-01', '', 15, 'USD', 4500.00, 22, '1', 1),
(71, 1, '003-222-222-2', 20, 6, 5, 1, 1, 2, 'Test', 'Driver', 'M', '2080-06-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-06-25', '', NULL, 'USD', 17525.00, 26, '0', NULL),
(13, 1, '003-438-453-3', 23, 3, 6, 1, 1, 2, 'Augustin', 'CENE', 'M', '1972-07-18', '(+509) 4894-2711', NULL, 'procurement@dlo.ht', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-01-05', '', 0, 'USD', 2500.00, 22, '1', 1),
(58, 1, '003-529-420-7', 20, 6, 5, 1, 0, 2, 'Marco Mirvil', 'SAJUSTE', 'M', '1969-07-16', '+5094890-0778', '', 'mirvil2227@gmail.com', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2013-04-01', '', 15, 'HTG', 21563.00, 26, '1', 1),
(16, 1, '003-545-542-8', 15, 4, 6, 1, 1, 2, 'Jean Rene', 'LAMOUR', 'M', '1972-01-10', '(+509) 3872-3912', NULL, '', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-11-17', '', 15, '', 29247.00, 26, '1', 1),
(18, 1, '003-585-766-0', 6, 5, 1, 2, 1, 2, 'Alierist', 'WILMINSE', 'M', '1992-07-25', '+5093411-5263 ', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Saintard', NULL, NULL, NULL, '2013-10-01', '', 15, '', 11000.00, 26, '1', 1),
(59, 1, '003-664-705-9', 20, 6, 5, 1, 1, 2, 'Fritz', 'JEAN PIERRE', 'M', '1968-09-07', '+5094891-5580', NULL, 'fritzjp68@gmail.com', 'Married', 'No', 'Haitian', NULL, '47, Impasse Fraicheur, Sarthe 45', NULL, NULL, NULL, '2014-08-05', '', 15, 'HTG', 23976.00, 26, '1', 1),
(19, 1, '003-818-949-6', 6, 5, 1, 2, 1, 2, 'Pierre Louis', 'LAROCHELLE', 'M', '1968-08-23', '+5093697-1701', NULL, '', 'Married', 'No', 'Haitian', NULL, 'SAINTARD', NULL, NULL, NULL, '2014-03-01', '', 15, '', 10000.00, 26, '1', 1),
(8, 1, '003-974-239-9', 10, 6, 6, 1, 1, 2, 'Nanoucheka', 'OLIS', 'F', '1982-02-08', '(+509) 4890 0740', NULL, 'nolis@dlohaiti.com', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2012-04-08', '', 15, 'USD', 2500.00, 22, '1', 1),
(61, 1, '004-151-196-6', 4, 5, 6, 1, 1, 4, 'Pierre Luigi', 'ROY', 'M', '1975-03-14', '+5093111-3111', NULL, 'gino@dlohaiti.com', 'Married', 'No', 'French', NULL, '', NULL, NULL, NULL, '2015-03-01', '', 0, 'HTG', 315000.00, 22, '1', 1),
(14, 1, '004-256-238-1', 14, 3, 6, 1, 1, 2, 'Wolfson Fedler', 'CAZEAU', 'M', '1978-01-09', '(+509) 4894-0158', NULL, '', 'Single', '', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-07-01', '', 15, '', 41175.00, 22, '1', 1),
(15, 1, '004-263-573-6', 15, 4, 6, 1, 1, 2, 'Pascale', 'MERSAN', 'F', '1980-10-04', '(+509) 4894-0158', NULL, 'pascale@dlohaiti.com', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-01-13', '', 0, 'USD', 2955.00, 22, '1', 1),
(39, 1, '004-327-161-2', 24, 4, 7, 0, 1, 2, 'Marc-philippe', 'ESTIVERNE', 'M', '1980-11-09', '+5094894-0157', NULL, '', 'Single', 'No', 'Haitian', NULL, '#29, Saintard Arcahaie', NULL, NULL, NULL, '2014-06-16', '', 15, 'HTG', 17600.00, 26, '1', 1),
(1, 1, '004-345-943-2', 1, 1, 6, 1, 1, 2, 'Karl Olivier', 'MEDE', 'M', '1989-03-04', '(+509)4846 5887', NULL, 'medekarl@gmail.com', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2012-07-01', '', 15, '', 65000.00, 26, '1', 1),
(36, 1, '004-409-452-2', 0, 5, 5, 1, 0, 0, 'Woodlee', 'ABELARD', 'M', '2014-05-03', '+5094890-0746', NULL, 'wqt_region1@dlo.ht', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-10-16', '', 15, '', 69125.00, 26, '1', 1),
(42, 1, '004-474-026-3', 12, 5, 7, 0, 1, 2, 'Wilkien', 'THOMAS', 'M', '1980-08-01', '', NULL, '', 'Single', 'No', 'Haitian', NULL, '567, Carrefour Damier, Cabaret', NULL, NULL, NULL, '2015-02-02', '', 15, 'HTG', 11000.00, 26, '1', 1),
(25, 1, '004-494-531-5', 12, 5, 2, 4, 1, 2, 'Luckson', 'IMBERT', 'M', '1984-08-21', '+5093485-5175', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Corail', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(23, 1, '004-504-598-5', 12, 5, 2, 4, 1, 2, 'Rouby', 'MARCELLUS', 'M', '1988-02-18', '+5093102-2349', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Corail', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 17600.00, 26, '1', 1),
(51, 1, '004-653-162-8', 11, 5, 8, 5, 1, 2, 'Eder Frantz', 'CLEMENT', 'M', '1987-11-23', '+5094472-8174 ', NULL, '', 'Single', 'No', 'Haitian', NULL, 'SANTO', NULL, NULL, NULL, '2014-09-22', '', 15, 'HTG', 17600.00, 26, '1', 1),
(60, 1, '004-709-190-3', 9, 5, 14, 11, 1, 2, 'Mackenson', 'POLIFRANC', 'M', '1983-12-11', '+5094890-7447', NULL, 'polifranc.mackenson@gmail.com', 'Married', 'No', 'Haitian', NULL, '316, Soleil 19b, Port-au-prince', NULL, NULL, NULL, '2013-02-14', '', 15, 'HTG', 22000.00, 26, '1', 1),
(33, 1, '004-730-031-2', 12, 5, 3, 6, 1, 2, 'Marc Fedner', 'RAPHAEL', 'M', '1984-08-18', '+5093664-0974 ', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Courjolles', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(49, 1, '004-996-954-6', 6, 5, 4, 12, 1, 2, 'Ronald', 'DOMINGUE', 'M', '1989-07-07', '', NULL, '', 'Single', 'No', 'Haitian', 'Terre Chaude', 'Cabaret', '', NULL, 'Haïti', '2014-10-01', '', 15, 'HTG', 10000.00, 26, '1', 1),
(56, 1, '005-598-260-0', 25, 2, 6, 1, 1, 2, 'Guerdy Saint Louis', 'FAUSTIN', 'F', '1980-07-12', '+5094891-5570', NULL, 'guerdy@dlohaiti.com', 'Married', 'No', 'Haitian', NULL, 'Vivi Mitchel', NULL, NULL, NULL, '2014-08-11', '', 0, 'USD', 3500.00, 22, '1', 1),
(35, 1, '006-061-101-0', 6, 5, 3, 6, 0, 0, 'Dely', 'TOUSSAINT', 'M', '1985-05-18', '', NULL, '', 'Married', 'No', 'Haitian', NULL, 'Courjolles', NULL, NULL, NULL, '2015-03-03', '', 15, 'HTG', 10000.00, 26, '0', 1),
(34, 1, '006-993-310-4', 6, 5, 3, 6, 1, 2, 'Jean Frantz', 'LOUIS JEUNE', 'M', '1976-06-10', '+5093895-2665', NULL, '', 'Married', 'No', 'Haitian', NULL, 'Courjolles', NULL, NULL, NULL, '2014-10-01', '', 15, 'HTG', 10000.00, 26, '1', 1),
(5, 1, '007-851-146-3', 3, 1, 6, 1, 1, 2, 'Nicolas', 'ANTONIO', 'M', '1984-11-07', '(+509) 4890 0754', NULL, 'antonio@dlo.ht', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-07-27', '', 5, 'HTG', 41795.00, 22, '1', 1),
(55, 1, '008-747-081-7', 6, 5, 8, 5, 1, 2, 'Aristilde', 'MICLAUDE', 'M', '1983-03-02', '', NULL, '', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2015-03-23', '', 15, 'HTG', 10000.00, 26, '1', 1),
(29, 1, '008-748-475-3', 16, 5, 3, 6, 1, 2, 'Pierre Ronald', 'DEROSIERS', 'M', '1978-05-10', '+5093609-8731', NULL, 'courjolles3@dlo.ht', 'Married', 'No', 'Haitian', NULL, 'COURJOLLES', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 22000.00, 26, '1', 1),
(64, 1, '01-01-99-1977-12-00743', 26, 1, 6, 1, 2, 2, 'Jean Nickenson', 'ANTOINE', 'M', '1990-03-30', '+5094060-0141', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cite Soleil', NULL, NULL, NULL, '2015-03-30', '', 15, 'HTG', 10000.00, 26, '1', 1),
(52, 1, '01-01-99-1982-10-00931', 12, 5, 8, 5, 1, 2, 'Reginald', 'LEGER', 'M', '0000-00-00', '+5093470-8508', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Saintard', NULL, NULL, NULL, '2014-09-22', '', 15, 'HTG', 11000.00, 26, '1', 1),
(21, 1, '01-01-99-1984-08-00746', 16, 5, 1, 2, 1, 2, 'Maudeline', 'THOMAS', 'F', '1984-08-11', '+5093743-1849', NULL, 'saintard1@dlo.ht', 'Single', 'No', 'Haitian', NULL, 'Saintard', NULL, NULL, NULL, '2014-05-01', '', 15, '', 22000.00, 26, '1', 1),
(50, 1, '01-01-99-1984-12-00738', 16, 5, 8, 5, 1, 2, 'Ronald', 'VOLMAR', 'M', '1984-12-03', '+5093796-1488', NULL, 'santo5@dlo.ht', 'Single', 'No', 'Haitian', NULL, 'Santo', NULL, NULL, NULL, '2014-09-22', '', 15, 'HTG', 22000.00, 26, '1', 1),
(7, 1, '01-01-99-1988-07-00659', 9, 8, 5, 1, 1, 2, 'Romeus', 'LEONE', 'M', '1988-07-13', '(+509) 4890 0744', NULL, 'leone@dlo.ht', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2013-11-01', '', 15, '', 67950.00, 22, '1', 1),
(6, 1, '01-01-99-1988-12-00886', 8, 5, 6, 1, 1, 2, 'Raoul Moliere', 'AMISIAL', 'M', '1988-12-30', '(+509) 3855 7702', NULL, 'raoul@dlo.ht', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-07-01', '', 15, 'HTG', 90000.00, 22, '1', 1),
(65, 1, '01-01-99-1990-02-00567', 12, 5, 9, 11, 1, 2, 'Ronald', 'RENE', 'M', '0000-00-00', '+5094643-2317', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cite Soleil', NULL, NULL, NULL, '2015-04-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(38, 1, '01-01-99-1992-05-00165', 27, 5, 7, 0, 1, 2, 'Oradma', 'ROBERT', 'F', '1992-05-31', '+5094475-3205', NULL, '', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-09-22', '', 15, 'HTG', 22000.00, 26, '1', 1),
(30, 1, '01-02-99-1984-10-00131', 11, 5, 3, 6, 1, 2, 'Stive', 'DELIUS', 'M', '1984-10-17', '+5093749-6039', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Courjolles', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 17600.00, 26, '1', 1),
(53, 1, '01-02-99-1987-12-00163', 12, 5, 8, 5, 1, 2, 'Marvens', 'RENFORT', 'M', '1987-12-29', '+5093710-2938', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Santo', NULL, NULL, NULL, '2014-09-22', '', 15, 'HTG', 11000.00, 26, '1', 1),
(66, 1, '01-02-99-1993-10-00625', 12, 5, 9, 11, 1, 2, 'Falone', 'JOACHIM', 'F', '0000-00-00', '+5093425-7265', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cite Soleil', NULL, NULL, NULL, '2015-04-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(17, 1, '01-04-99-1981-01-00057', 15, 4, 5, 1, 1, 2, 'Sorel', 'MASSILON', 'M', '1981-01-17', '', NULL, '', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-11-17', '', 15, 'HTG', 29247.00, 26, '1', 1),
(54, 1, '01-10-99-1974-56-00011', 12, 5, 8, 5, 1, 2, 'Marie Myrtha', 'DENAU', 'F', '1974-06-06', '', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Saintard', NULL, NULL, NULL, '2014-09-22', '', 15, 'HTG', 11000.00, 26, '1', 1),
(22, 1, '01-15-99-1968-05-00021', 16, 5, 2, 4, 1, 2, 'Miranda', 'SAINT LOUIS', 'M', '1968-05-15', '+5093687-3898', NULL, 'corail2@dlo.ht', 'Married', 'No', 'Haitian', NULL, 'Corail', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 22000.00, 26, '1', 1),
(43, 1, '01-15-99-1970-09-00062', 28, 5, 7, 0, 1, 2, 'Pierre Jenks Levelt', 'LAMARRE', 'M', '1970-09-01', '', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Courjolles', NULL, NULL, NULL, '2014-09-01', '', 15, 'HTG', 10000.00, 26, '1', 1),
(31, 1, '01-15-99-1973-03-00063', 12, 5, 3, 6, 1, 2, 'Pierre Widens', 'LAMARRE', 'M', '1973-03-29', '+5093651-1671', NULL, '', 'Married', 'No', 'Haitian', NULL, 'Courjolles', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(3, 1, '01-15-99-1973-03-00105', 7, 5, 7, 0, 1, 2, 'Dorsainville', 'PIERRE SAINVIL', 'M', '0000-00-00', '(+509) 3862 7939', NULL, 'regional1@dlo.ht', 'Married', 'No', 'Haitian', NULL, 'SAINTARD', NULL, NULL, NULL, '2013-10-01', '', 15, 'HTG', 47750.00, 26, '1', 1),
(11, 1, '01-15-99-1981-07-00029', 12, 5, 1, 2, 1, 2, 'Solail', 'JEAN BAPTISTE', 'M', '1981-07-10', '', NULL, '', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2013-10-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(41, 1, '01-15-99-1981-11-00041', 12, 5, 7, 0, 1, 2, 'Jean Junior', 'TOUSSAINT', 'M', '0000-00-00', '', NULL, '', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(26, 1, '01-15-99-1983-06-00164', 12, 5, 2, 4, 1, 2, 'Jean Remy', 'PIERRE', 'M', '1983-06-16', '+5093632-0845', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Corail', NULL, NULL, NULL, '2014-05-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(12, 1, '01-15-99-1985-03-00093', 12, 5, 1, 2, 1, 2, 'Jeune', 'VALENTIN', 'M', '1985-03-15', '', NULL, 'saintard1@dlo.ht', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2013-10-01', '', 15, 'HTG', 11000.00, 26, '1', 1),
(27, 1, '01-15-99-1988-01-00072', 6, 5, 2, 4, 1, 2, 'Frandy', 'DORVIL', 'M', '1988-01-06', '+5093723-9488', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Corail', NULL, NULL, NULL, '2014-07-16', '', 15, 'HTG', 10000.00, 26, '1', 1),
(10, 1, '01-15-99-1989-01-00009', 11, 5, 1, 2, 1, 2, 'Daphmar', 'ARMAND', 'F', '1989-01-24', '', NULL, '', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2013-10-01', '', 15, 'HTG', 17600.00, 26, '1', 1),
(40, 1, '01-15-99-1989-10-00051', 0, 0, 0, 0, 0, 0, 'Farah', 'EUCHER', 'F', '1989-10-27', '+5093617-3463', NULL, '', 'Single', 'No', 'Haitian', NULL, '#11, Mitan, Arcahaie', NULL, NULL, NULL, '2014-02-15', '', 15, '', 17600.00, 26, '1', 1),
(20, 1, '01-15-99-1990-03-00144', 16, 5, 1, 0, 1, 2, 'Carlos', 'JOSEPH', 'M', '1990-03-03', '+5093439-8768', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Saintard', NULL, NULL, NULL, '2014-03-01', '', 15, '', 10000.00, 26, '1', 1),
(28, 1, '01-15-99-1991-02-00026', 12, 5, 2, 0, 1, 2, 'Wisler', 'PIERRE LOUIS', 'M', '1991-02-17', '+5094646-7906 ', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Corail', NULL, NULL, NULL, '2014-07-15', '', 15, '', 10000.00, 26, '1', 1),
(24, 1, '01-15-99-1993-03-00040', 12, 5, 2, 0, 1, 2, 'Dossous', 'ROSE-BERLINE', 'F', '1993-03-06', '+5093629-7450', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Corail', NULL, NULL, NULL, '2014-05-01', '', 15, '', 11000.00, 26, '1', 1),
(47, 1, '01-16-99-1984-02-00065', 0, 0, 0, 0, 0, 0, 'Wilson', 'PAYOUTE', 'M', '1984-02-14', '+5093314-6343', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cabaret', NULL, NULL, NULL, '2014-09-22', '', 15, '', 11000.00, 26, '1', 1),
(44, 1, '01-16-99-1988-09-00025', 0, 0, 0, 0, 0, 0, 'Sainte Helene', 'JEAN', 'F', '1988-09-07', '+5093336-3392 ', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cabaret', NULL, NULL, NULL, '2014-09-22', '', 15, '', 22000.00, 26, '1', 1),
(4, 1, '01-16-99-1989-09-00012', 12, 5, 4, 0, 1, 2, 'Daniel', 'MICHAUD', 'F', '1989-09-17', '', NULL, '', 'Married', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2014-12-01', '', 15, '', 11000.00, 26, '1', 1),
(45, 1, '01-16-99-1990-05-00016', 0, 0, 0, 0, 0, 0, 'Michel Ader', 'LAURORE', 'M', '1990-05-17', '+50938184269', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cabaret', NULL, NULL, NULL, '2014-09-22', '', 15, '', 17600.00, 26, '1', 1),
(46, 1, '01-16-99-1990-08-00009', 0, 0, 0, 0, 0, 0, 'Juliette', 'FRANCOIS', 'F', '1990-08-17', '+5094331-5629', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cabaret', NULL, NULL, NULL, '2014-09-22', '', 15, '', 11000.00, 26, '1', 1),
(37, 1, '01-17-99-1987-01-00009', 0, 0, 0, 0, 0, 0, 'Sophonie', 'SIMERVIL', 'F', '1987-01-29', '+5093393-4376', NULL, 'mare1@dlo.ht', 'Single', 'No', 'Haitian', NULL, '#10, Rue Hostin, Arcahaie', NULL, NULL, NULL, '2014-05-01', '', 15, '', 28833.00, 26, '1', 1),
(63, 1, '01-18-99-1988-08-00062', 0, 0, 0, 0, 0, 0, 'Wenso', 'LEGER', 'M', '0000-00-00', '', NULL, '', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2015-04-01', '', 15, '', 22000.00, 26, '1', 1),
(67, 1, '01-19-99-1988-10-00169', 0, 0, 0, 0, 0, 0, 'Jackenson', 'ESTHER', 'M', '0000-00-00', '+5093752-7706', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Cite Soleil', NULL, NULL, NULL, '2015-04-01', '', 15, '', 11000.00, 26, '1', 1),
(57, 1, '07-08-99-1968-04-00002', 0, 0, 0, 0, 0, 0, 'Sonise', 'SEIDE', 'F', '1968-04-03', '+5093796-9340', NULL, '', 'Single', 'No', 'Haitian', NULL, '', NULL, NULL, NULL, '2015-02-24', '', 15, '', 7500.00, 26, '1', 1),
(32, 1, '07-10-99-1985-11-00032', 0, 0, 0, 0, 0, 0, 'John', 'ODENAT', 'M', '1985-11-18', '', NULL, '', 'Single', 'No', 'Haitian', NULL, 'Courjolles', NULL, NULL, NULL, '2015-01-01', '', 15, '', 11000.00, 26, '1', 1),
(62, 1, '422110571', 17, 7, 6, 1, 1, 1, 'James J.', 'CHU', 'M', '1972-04-05', '+5094890-0743', NULL, 'jim@dlohaiti.com', 'Married', 'No', 'American', '1065 De Haro St', '', 'San Francisco', NULL, 'USA', '2013-04-25', '', 0, 'USD', 9000.00, 22, '1', 1),
(9, 1, '433802766', 11, 3, 6, 0, 1, 1, 'Jason Edwin', 'HERSH', 'M', '1976-02-10', '(+509) 48936984', NULL, 'jason@dlohaiti.com', 'Single', 'No', 'American', NULL, '', NULL, NULL, NULL, '2015-02-01', '433802766', 0, '', 229500.00, 22, '1', 1),
(68, 1, '47233-222-555', 0, 0, 0, 0, 0, 0, 'Masoor Rana', 'RANA', 'M', '0000-00-00', '', NULL, 'masnoor@sutlej.net', 'Single', 'No', '', NULL, '', NULL, NULL, NULL, '2015-02-02', '', 0, '', 50000.00, 26, '1', 1),
(72, 1, 'CHOLD', 21, 5, 6, 1, 3, 1, 'Camaria ', 'Holder', 'F', '1981-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-01', 'CHOLD-01', NULL, 'USD', 500.00, 26, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_benefits`
--

CREATE TABLE IF NOT EXISTS `employee_benefits` (
  `employee_benefit_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `benefit_type_id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL DEFAULT 'HTG',
  `amount` decimal(11,5) NOT NULL DEFAULT '0.00000',
  `comments` varchar(100) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employee_benefit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee_benefits`
--

INSERT INTO `employee_benefits` (`employee_benefit_id`, `employee_id`, `benefit_type_id`, `currency_code`, `amount`, `comments`, `status`) VALUES
(1, 2, 5, 'HTG', '0.00000', NULL, '1'),
(2, 48, 5, 'HTG', '0.00000', NULL, '1'),
(3, 2, 8, 'USD', '0.00000', NULL, '1'),
(4, 2, 7, 'USD', '0.00000', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_deductions`
--

CREATE TABLE IF NOT EXISTS `employee_deductions` (
  `employee_deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `deduction_type_id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL DEFAULT 'HTG',
  `employee_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `employer_cont` decimal(11,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(100) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employee_deduction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `employee_deductions`
--

INSERT INTO `employee_deductions` (`employee_deduction_id`, `employee_id`, `deduction_type_id`, `currency_code`, `employee_amount`, `employer_cont`, `comments`, `status`) VALUES
(5, 2, 1, 'USD', '139.00', '0.00', NULL, '1'),
(6, 2, 2, 'USD', '0.00', '0.00', NULL, '1'),
(7, 13, 1, 'USD', '0.00', '0.00', NULL, '1'),
(8, 48, 1, 'HTG', '0.00', '0.00', NULL, '1'),
(9, 19, 2, 'USD', '500.00', '200.00', NULL, '1'),
(10, 19, 4, 'HTG', '1200.00', '1200.00', NULL, '1'),
(11, 58, 4, 'HTG', '285.40', '285.40', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employment_types`
--

CREATE TABLE IF NOT EXISTS `employment_types` (
  `status_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_type_name` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`status_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employment_types`
--

INSERT INTO `employment_types` (`status_type_id`, `status_type_name`, `company_id`, `status`) VALUES
(1, 'FullTime', 1, '1'),
(2, 'Internship-Trainee', 1, '1'),
(3, 'Contractor-PartTime', 1, '1'),
(4, 'Daily Contractor', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

CREATE TABLE IF NOT EXISTS `exchange_rates` (
  `company_id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL DEFAULT 'HTG',
  `period_id` int(11) NOT NULL,
  `usd_exchange_rate` float NOT NULL,
  `active` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`company_id`,`currency_code`,`period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`company_id`, `currency_code`, `period_id`, `usd_exchange_rate`, `active`) VALUES
(1, 'HTG', 1, 50, '1'),
(1, 'HTG', 2, 50, '1'),
(1, 'HTG', 3, 50, '1'),
(1, 'HTG', 4, 50, '1'),
(1, 'HTG', 5, 50, '1'),
(1, 'HTG', 6, 50, '1'),
(1, 'HTG', 7, 50, '1'),
(1, 'HTG', 8, 50, '1'),
(1, 'HTG', 9, 50, '1'),
(1, 'HTG', 10, 50, '1'),
(1, 'HTG', 11, 50, '1'),
(1, 'HTG', 12, 50, '1'),
(1, 'HTG', 13, 50, '1'),
(1, 'HTG', 14, 50, '1'),
(1, 'HTG', 15, 50, '1'),
(1, 'HTG', 16, 50, '1'),
(1, 'HTG', 17, 50, '1'),
(1, 'HTG', 18, 50, '1'),
(1, 'HTG', 19, 50, '1'),
(1, 'HTG', 20, 50, '1'),
(1, 'HTG', 21, 50, '1'),
(1, 'HTG', 22, 50, '1'),
(1, 'HTG', 23, 50, '1'),
(1, 'HTG', 24, 50, '1'),
(1, 'HTG', 25, 50, '1'),
(1, 'HTG', 26, 50, '1'),
(1, 'HTG', 27, 50, '1'),
(1, 'HTG', 28, 50, '1'),
(1, 'HTG', 29, 50, '1'),
(1, 'HTG', 30, 50, '1'),
(1, 'HTG', 31, 50, '1'),
(1, 'HTG', 32, 50, '1'),
(1, 'HTG', 33, 50, '1'),
(1, 'HTG', 34, 50, '1'),
(1, 'HTG', 35, 50, '1'),
(1, 'HTG', 36, 50, '1'),
(1, 'HTG', 37, 50, '1');

-- --------------------------------------------------------

--
-- Table structure for table `flat_rate_taxes`
--

CREATE TABLE IF NOT EXISTS `flat_rate_taxes` (
  `flat_tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `tax_name` varchar(100) NOT NULL,
  `tax_description` varchar(100) DEFAULT NULL,
  `payable_by` varchar(10) NOT NULL DEFAULT 'employee' COMMENT 'employee or company',
  `tax_multiplier` double(11,5) NOT NULL DEFAULT '0.00000',
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`flat_tax_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `flat_rate_taxes`
--

INSERT INTO `flat_rate_taxes` (`flat_tax_id`, `company_id`, `tax_name`, `tax_description`, `payable_by`, `tax_multiplier`, `status`) VALUES
(1, 1, 'ONA', 'Office National d’Assurance Vieillesse', 'Employee', 0.06000, '1'),
(2, 1, 'TCT', 'Contributions au Fonds de Gestion et de Développement des Collectivités Territoriales', 'Employee', 0.01000, '1'),
(3, 1, 'CAS', 'Caisse d''Assistance Sociale', 'Employee', 0.01000, '1'),
(4, 1, 'FDU', 'Fonds d''Urgence', 'Employee', 0.01000, '1'),
(5, 1, 'ONA E.C', 'Office National d’Assurance Vieillesse', 'Company', 0.06000, '1'),
(6, 1, 'TMS', 'Taxe Sur La Masse Salariale', 'Company', 0.02000, '1'),
(7, 1, 'DSAV', 'Droit Special Ad Valorem', 'Company', 0.00200, '1'),
(8, 1, 'OFATMA', 'Office d''Assurance Accidents du Travail, Maladie et Maternité', 'Company', 0.03000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `iri_tax_slabs`
--

CREATE TABLE IF NOT EXISTS `iri_tax_slabs` (
  `slab_id` int(11) NOT NULL AUTO_INCREMENT,
  `sr_no` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `start_amount` double(11,2) NOT NULL,
  `end_amount` double(11,2) NOT NULL,
  `tax_multiplier` double(11,5) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`slab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `iri_tax_slabs`
--

INSERT INTO `iri_tax_slabs` (`slab_id`, `sr_no`, `company_id`, `start_amount`, `end_amount`, `tax_multiplier`, `status`) VALUES
(1, 1, 1, 0.00, 60000.00, 0.00000, '1'),
(2, 2, 1, 60001.00, 240000.00, 0.10000, '1'),
(3, 3, 1, 240001.00, 480000.00, 0.15000, '1'),
(4, 4, 1, 480001.00, 1000000.00, 0.25000, '1'),
(5, 5, 1, 1000001.00, 99999999.00, 0.30000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(100) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `direct_report_to` int(11) DEFAULT NULL,
  `payscale_id` int(11) DEFAULT NULL,
  `required_skills` varchar(255) DEFAULT NULL,
  `min_qualification` varchar(255) DEFAULT NULL,
  `vacancy_ad_text` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`job_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_description`, `company_id`, `department_id`, `direct_report_to`, `payscale_id`, `required_skills`, `min_qualification`, `vacancy_ad_text`, `status`) VALUES
(1, 'Finance Assistant', '', 1, 1, 0, 1300, '', '', '', '1'),
(2, 'Finance Manager', '', 1, 1, 0, 0, '', '', '', '1'),
(3, 'Procurement Assistant', '', 1, 1, 0, 0, 'etc', 'etc', 'aaa', '1'),
(4, 'Operations Director', '', 1, 5, 0, 0, '', '', '', '1'),
(5, 'Construction Assistant', '', 1, 3, 0, 0, '', '', '', '1'),
(6, 'Trike Driver', '', 1, 5, 0, 0, '', '', '', '1'),
(7, 'Regionl Manager', '', 1, 5, 0, 0, '', '', '', '1'),
(8, 'Operations Coordinator', '', 1, 5, NULL, 0, '', '', '', '1'),
(9, 'Community Marketing Manager', '', 1, 8, NULL, 0, '', '', '', '1'),
(10, 'Administrative Manager', '', 1, 6, 0, 0, '', '', '', '1'),
(11, 'Kiosk Operator', '', 1, 5, NULL, 0, '', '', '', '1'),
(12, 'Kiosk Assistant', '', 1, 5, NULL, 0, '', '', '', '1'),
(13, 'Construction Assista', '', 0, 1, NULL, NULL, NULL, NULL, NULL, '1'),
(14, 'Technical Support Manager', '', 1, 4, NULL, 0, '', '', '', '1'),
(15, 'Plumber', '', 1, 4, NULL, 0, '', '', '', '1'),
(16, 'Kiosk Manager', '', 1, 5, NULL, 0, '', '', '', '1'),
(17, 'CEO', '', 1, 7, 0, 0, '', '', '', '1'),
(18, 'Accountant', '', 1, 1, 0, 0, '', '', '', '1'),
(19, 'Constructions Assistant Manager', '', 1, 3, NULL, 0, '', '', '', '1'),
(20, 'HQ Driver', '', 1, 6, NULL, 0, '', '', '', '1'),
(21, 'Water Quality Coordinator', '', 1, 5, NULL, 0, '', '', '', '1'),
(22, 'Water Quality Consultant', '', 1, 9, NULL, 0, '', '', '', '1'),
(23, 'Manager Adjoint de Construction ', '', 1, 3, NULL, 0, '', '', '', '1'),
(24, 'Regional Technician', '', 1, 4, NULL, 0, '', '', '', '1'),
(25, 'Human Ressources Manager', '', 1, 2, NULL, 0, '', '', '', '1'),
(26, 'Finance Intern', '', 1, 1, NULL, 0, '', '', '', '1'),
(27, 'Community Marketing Assistant', '', 1, 8, NULL, 0, '', '', '', '1'),
(28, 'Guardian', '', 1, 5, NULL, 0, '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) NOT NULL,
  `base_id` int(11) NOT NULL,
  `address_line_1` varchar(150) DEFAULT NULL,
  `address_line_2` varchar(150) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state_province` varchar(50) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `lat` decimal(10,8) DEFAULT NULL,
  `long` decimal(11,8) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`location_id`),
  KEY `company_id` (`company_id`),
  KEY `base_id` (`base_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `base_id`, `address_line_1`, `address_line_2`, `code_postal`, `city`, `state_province`, `country`, `company_id`, `lat`, `long`, `status`) VALUES
(1, 'HQ', 6, '177, Rue Faubert', 'Complexe Tropicale, Second Floor', 0, 'Petionville', 'Port au Prince', 'Haiti', 1, '18.50998400', '-72.28887400', '1'),
(2, 'Saintard', 1, ' ', ' ', 0, 'Luly', ' ', 'Haiti', 1, '18.83449700', '-72.57056700', '1'),
(3, 'Cabaret', 4, ' ', ' ', 0, 'Cabaret', ' ', 'Haiti', 1, '18.72943600', '-72.42130600', '1'),
(4, 'Corail', 2, ' ', ' ', 0, 'Corail', ' ', 'Haiti', 1, '18.79912200', '-72.54274400', '1'),
(5, 'Santo19', 8, 'Santo', 'Santo', 0, 'ARCAHAIE', 'OUEST', 'Haiti', 1, '18.60633600', '-72.24647200', '1'),
(6, 'Courjolle', 3, 'Courjolle', ' ', 0, 'Courjolle', 'Ouest', 'Haiti', 1, '18.77408100', '-72.50638900', '1'),
(7, 'Limonade', 11, 'Carrefour Bohama', ' ', 0, 'Limonade', 'North', 'Haiti', 1, '19.68824700', '-72.14109000', '1'),
(8, 'Quatier Morin', 10, 'Cite Dessalines', ' ', 0, 'Quatier Morin', 'North', 'Haiti', 1, '19.69176000', '-72.15406500', '1'),
(9, 'Ouanaminthe', 13, 'Manquette', ' ', 0, 'Ouanaminthe', 'North', 'Haiti', 1, '19.54156500', '-71.72247200', '1'),
(10, 'Ferrier', 12, 'Merann ou bas Maribahoux', ' ', 0, 'Ferrier', 'North', 'Haiti', 1, '19.61227800', '-71.76607500', '1'),
(11, 'Cite Soleil', 9, 'Bois 9', 'Cite Soleil', 0, 'Port-au-Prince', 'OUEST', 'Haiti', 1, '18.53333300', '-72.33333300', '1'),
(12, 'Terre Chaude', 4, 'Terre Chaude', 'Cabaret', 0, 'Ouest', 'Cabaret', 'Haiti', 1, '18.49570150', '-72.47315290', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_payments`
--

CREATE TABLE IF NOT EXISTS `mobile_payments` (
  `mobile_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `id_no` int(30) DEFAULT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `mobile_company` varchar(100) NOT NULL,
  `status` char(1) DEFAULT '0',
  PRIMARY KEY (`mobile_payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mobile_payments`
--

INSERT INTO `mobile_payments` (`mobile_payment_id`, `employee_id`, `id_no`, `mobile_no`, `mobile_company`, `status`) VALUES
(2, 59, NULL, '(502)-325412554', 'VIsta', '1'),
(3, 59, NULL, '(545)-3255412554', 'Indigo', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `active` char(1) DEFAULT '0',
  `default` char(1) DEFAULT '0',
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_method_id`, `employee_id`, `payment_type`, `active`, `default`) VALUES
(1, 59, 'Cash', '0', '0'),
(2, 59, 'Mobile-Payment', '0', '0'),
(3, 59, 'Bank-Account', '0', '0'),
(4, 59, 'Bank-Account', '0', '0'),
(5, 59, 'Cash', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_calendar`
--

CREATE TABLE IF NOT EXISTS `payroll_calendar` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `fiscal_year` varchar(50) NOT NULL,
  `period_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`period_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `payroll_calendar`
--

INSERT INTO `payroll_calendar` (`period_id`, `company_id`, `fiscal_year`, `period_name`, `start_date`, `end_date`, `status`) VALUES
(1, 1, '2013-14', 'September-2014', '2014-09-01', '2014-09-30', '1'),
(2, 1, '2014-15', 'October-2014', '2014-10-01', '2014-10-31', '1'),
(3, 1, '2014-15', 'November-2014', '2014-11-01', '2014-11-30', '1'),
(4, 1, '2014-15', 'December-2014', '2014-12-01', '2014-12-31', '1'),
(5, 1, '2014-15', 'January-2015', '2015-01-01', '2015-01-31', '1'),
(6, 1, '2014-15', 'February-2015', '2015-02-01', '2015-02-28', '1'),
(7, 1, '2014-15', 'March-2015', '2015-03-01', '2015-03-31', '1'),
(8, 1, '2014-15', 'April-2015', '2015-04-01', '2015-04-30', '1'),
(9, 1, '2014-15', 'May-2015', '2015-05-01', '2015-05-31', '1'),
(10, 1, '2014-15', 'June-2015', '2015-06-01', '2015-06-30', '1'),
(11, 1, '2014-15', 'July-2015', '2015-07-01', '2015-07-31', '1'),
(12, 1, '2014-15', 'August-2015', '2015-08-01', '2015-08-31', '1'),
(13, 1, '2014-15', 'September-2015', '2015-09-01', '2015-09-30', '1'),
(14, 1, '2015-16', 'October-2015', '2015-10-01', '2015-10-31', '1'),
(15, 1, '2015-16', 'November-2015', '2015-11-01', '2015-11-30', '1'),
(16, 1, '2015-16', 'December-2015', '2015-12-01', '2015-12-31', '1'),
(17, 1, '2015-16', 'January-2016', '2016-01-01', '2016-01-31', '1'),
(18, 1, '2015-16', 'February-2016', '2016-02-01', '2016-02-29', '1'),
(19, 1, '2015-16', 'March-2016', '2016-03-01', '2016-03-31', '1'),
(20, 1, '2015-16', 'April-2016', '2016-04-01', '2016-04-30', '1'),
(21, 1, '2015-16', 'May-2016', '2016-05-01', '2016-05-31', '1'),
(22, 1, '2015-16', 'June-2016', '2016-06-01', '2016-06-30', '1'),
(23, 1, '2015-16', 'July-2016', '2016-07-01', '2016-07-31', '1'),
(24, 1, '2015-16', 'August-2016', '2016-08-01', '2016-08-31', '1'),
(25, 1, '2015-16', 'September-2016', '2016-09-01', '2016-09-30', '1'),
(26, 1, '2016-17', 'October-2016', '2016-10-01', '2016-10-31', '1'),
(27, 1, '2016-17', 'November-2016', '2016-11-01', '2016-11-30', '1'),
(28, 1, '2016-17', 'December-2016', '2016-12-01', '2016-12-31', '1'),
(29, 1, '2016-17', 'January-2017', '2017-01-01', '2017-01-31', '1'),
(30, 1, '2016-17', 'February-2017', '2017-02-01', '2017-02-28', '1'),
(31, 1, '2016-17', 'March-2017', '2017-03-01', '2017-03-31', '1'),
(32, 1, '2016-17', 'April-2017', '2017-04-01', '2017-04-30', '1'),
(33, 1, '2016-17', 'May-2017', '2017-05-01', '2017-05-31', '1'),
(34, 1, '2016-17', 'June-2017', '2017-06-01', '2017-06-30', '1'),
(35, 1, '2016-17', 'July-2017', '2017-07-01', '2017-07-31', '1'),
(36, 1, '2016-17', 'August-2017', '2017-08-01', '2017-08-31', '1'),
(37, 1, '2016-17', 'September-2017', '2017-09-01', '2017-09-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payslips`
--

CREATE TABLE IF NOT EXISTS `payslips` (
  `payslip_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address_line_1` varchar(100) DEFAULT NULL,
  `company_address_line_2` varchar(100) DEFAULT NULL,
  `company_city` varchar(50) DEFAULT NULL,
  `company_country` varchar(50) DEFAULT NULL,
  `company_phone` varchar(100) DEFAULT NULL,
  `company_fax` varchar(100) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_over_time_multipier` decimal(11,2) DEFAULT NULL,
  `period_id` int(11) NOT NULL,
  `period_name` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_code` varchar(50) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `base_id` int(11) DEFAULT NULL,
  `base_name` varchar(50) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `status_type_id` int(11) DEFAULT NULL,
  `status_type_name` varchar(100) DEFAULT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `contract_type` varchar(100) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `handicap` char(3) DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip_postal_code` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `ssn` varchar(50) DEFAULT NULL,
  `n_day_off` int(2) DEFAULT NULL,
  `n_work_day` int(11) DEFAULT NULL,
  `days_worked` int(11) DEFAULT NULL,
  `currency_code` varchar(3) NOT NULL,
  `gross_salary` double(11,2) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_method_dhi` varchar(100) DEFAULT NULL,
  `payment_method_dhosi` varchar(100) DEFAULT NULL,
  `iri_amount` double(11,5) DEFAULT NULL,
  `dvas_tax` double(11,5) DEFAULT NULL,
  `ot_hours` int(11) NOT NULL DEFAULT '0',
  `ot_amount` double(11,5) NOT NULL DEFAULT '0.00000',
  `ot_tax` double(11,5) NOT NULL DEFAULT '0.00000',
  `benefits_total` double(11,5) DEFAULT NULL,
  `employee_tax_total` double(11,5) DEFAULT NULL,
  `benefits_tax_total` double(11,5) DEFAULT NULL,
  `employee_deductions_total` double(11,5) DEFAULT NULL,
  `net_salary` double(11,5) DEFAULT NULL,
  `employer_tax_total` double(11,5) DEFAULT NULL,
  `employer_deductions_total` double(11,5) DEFAULT NULL,
  `wage_bill` double(11,5) DEFAULT NULL,
  PRIMARY KEY (`payslip_id`),
  UNIQUE KEY `SECONDARY` (`company_id`,`period_id`,`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_benefits`
--

CREATE TABLE IF NOT EXISTS `payslip_benefits` (
  `benefit_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `benefit_type_id` int(11) NOT NULL,
  `amount` double(11,5) DEFAULT NULL,
  `tax_amount` double(11,5) DEFAULT NULL,
  PRIMARY KEY (`benefit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_deductions`
--

CREATE TABLE IF NOT EXISTS `payslip_deductions` (
  `deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `deduction_type_id` int(11) NOT NULL,
  `amount` double(11,5) NOT NULL,
  PRIMARY KEY (`deduction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_deductions_ec`
--

CREATE TABLE IF NOT EXISTS `payslip_deductions_ec` (
  `deductions_ec_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `deduction_type_id` int(11) NOT NULL,
  `amount` decimal(11,5) DEFAULT NULL,
  PRIMARY KEY (`deductions_ec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_taxes`
--

CREATE TABLE IF NOT EXISTS `payslip_taxes` (
  `tax_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `flat_tax_id` int(11) NOT NULL,
  `tax_name` varchar(100) NOT NULL,
  `payable_by` varchar(10) NOT NULL,
  `amount` double(11,5) NOT NULL,
  PRIMARY KEY (`tax_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE IF NOT EXISTS `subscription_plans` (
  `subscription_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_plan_name` varchar(100) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`subscription_plan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`subscription_plan_id`, `subscription_plan_name`, `status`) VALUES
(1, 'Basic (Free)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varbinary(100) NOT NULL,
  `user_group_id` int(11) NOT NULL DEFAULT '1',
  `company_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8 DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `user_group_id`, `company_id`, `client_id`, `status`) VALUES
(1, 'Karl Oliviers', 'MEDE', 'karlO', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'M', 1, 1, 1, '1'),
(2, 'Alexandra Moise', 'SAINT ELIEN', 'alexandra', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'F', 1, 1, 1, '1'),
(4, 'Rh_2', 'RH_2', 'rh_2', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 2, 1, 1, '1'),
(5, 'Rh_1', 'RH_1', 'rh_1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'M', 2, 1, 1, '1'),
(6, 'Nicolas', 'ANTONIO', 'nantonio', 'b5add45bcab63f2d170093f1edde66c0227c76af', 'M', 1, 0, 0, '1'),
(7, 'Mansoor', 'Rana', 'mansoor', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'mansoor@sutlej.net', 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`user_group_id`, `user_group_name`) VALUES
(1, 'Super Admin'),
(2, 'Clients'),
(3, 'Company Managers');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `base`
--
ALTER TABLE `base`
  ADD CONSTRAINT `base_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`subscription_plan_id`) REFERENCES `subscription_plans` (`subscription_plan_id`),
  ADD CONSTRAINT `clients_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`base_id`) REFERENCES `base` (`base_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`user_group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
