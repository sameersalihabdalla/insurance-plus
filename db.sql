/*
SQLyog Ultimate v10.42 
MySQL - 8.3.0 : Database - extra_insurance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cat` */

CREATE TABLE `cat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` float DEFAULT '0',
  `commission_office` float DEFAULT '0',
  `premium` float DEFAULT '0',
  `passengers` float DEFAULT '0',
  `issue` float DEFAULT '500',
  `commission_agent` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `clients` */

CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `document` */

CREATE TABLE `document` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'المعرف التلقائي',
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'اسم المؤمن له',
  `document` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'معرف الوثيقة',
  `date` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'تاريخ الوثيقة',
  `type` int DEFAULT NULL COMMENT 'نوع الوثيقة',
  `broker_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'الوسيط',
  `premium` float DEFAULT '0' COMMENT 'القسط الأساسي',
  `passengers` float DEFAULT '0' COMMENT 'رسوم الركاب',
  `commission_office` float DEFAULT '0' COMMENT 'عمولة المكتب',
  `commission_agent` float DEFAULT '0' COMMENT 'عمولة الوكيل',
  `issue` float DEFAULT '0' COMMENT 'رسوم الإصدار',
  `StampCost` float DEFAULT '0' COMMENT 'الدمغة',
  `SupportTax` float DEFAULT '0' COMMENT 'ضريبة الدعم',
  `SuperVisionCost` float DEFAULT '0' COMMENT 'رسوم الإشراف',
  `Employertax` float DEFAULT '0' COMMENT 'ضرية اصحاب العمل',
  `TotalCost` float DEFAULT '0' COMMENT 'التكلفة الإجمالية',
  `broker_id` int DEFAULT '0',
  `status` varchar(1) COLLATE utf8mb3_unicode_ci DEFAULT '0',
  `cancel` int DEFAULT '0',
  `note` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=348 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Table structure for table `cost_f` */

DROP TABLE IF EXISTS `cost_f`;

/*!50001 CREATE TABLE  `cost_f`(
 `id` int ,
 `name` varchar(200) ,
 `cost` float ,
 `commission_office` float ,
 `premium` float ,
 `passengers` float ,
 `issue` float ,
 `commission_agent` float ,
 `SupportTax` double ,
 `StampCost` double ,
 `SuperVisionCost` double 
)*/;

/*Table structure for table `cost_s` */

DROP TABLE IF EXISTS `cost_s`;

/*!50001 CREATE TABLE  `cost_s`(
 `id` int ,
 `name` varchar(200) ,
 `cost` float ,
 `commission_office` float ,
 `premium` float ,
 `passengers` float ,
 `issue` float ,
 `commission_agent` float ,
 `SupportTax` double ,
 `StampCost` double ,
 `SuperVisionCost` double ,
 `TotalCost` double 
)*/;

/*Table structure for table `sam` */

DROP TABLE IF EXISTS `sam`;

/*!50001 CREATE TABLE  `sam`(
 `client_name` varchar(255) ,
 `phone` varchar(15) ,
 `cat_name` varchar(200) ,
 `id` int ,
 `name` varchar(255) ,
 `document` varchar(255) ,
 `date` varchar(20) ,
 `type` int ,
 `broker_name` varchar(255) ,
 `premium` float ,
 `passengers` float ,
 `commission_office` float ,
 `commission_agent` float ,
 `issue` float ,
 `StampCost` float ,
 `SupportTax` float ,
 `SuperVisionCost` float ,
 `Employertax` float ,
 `TotalCost` float ,
 `broker_id` int ,
 `status` varchar(1) ,
 `cancel` int 
)*/;

/*View structure for view cost_f */

/*!50001 DROP TABLE IF EXISTS `cost_f` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cost_f` AS select `cat`.`id` AS `id`,`cat`.`name` AS `name`,`cat`.`cost` AS `cost`,`cat`.`commission_office` AS `commission_office`,`cat`.`premium` AS `premium`,`cat`.`passengers` AS `passengers`,`cat`.`issue` AS `issue`,`cat`.`commission_agent` AS `commission_agent`,round(((`cat`.`premium` * 2) / 100),1) AS `SupportTax`,round(((`cat`.`premium` * 10) / 100),1) AS `StampCost`,round(((`cat`.`premium` * 1) / 100),1) AS `SuperVisionCost` from `cat` */;

/*View structure for view cost_s */

/*!50001 DROP TABLE IF EXISTS `cost_s` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cost_s` AS select `cost_f`.`id` AS `id`,`cost_f`.`name` AS `name`,`cost_f`.`cost` AS `cost`,`cost_f`.`commission_office` AS `commission_office`,`cost_f`.`premium` AS `premium`,`cost_f`.`passengers` AS `passengers`,`cost_f`.`issue` AS `issue`,`cost_f`.`commission_agent` AS `commission_agent`,floor(`cost_f`.`SupportTax`) AS `SupportTax`,floor(`cost_f`.`StampCost`) AS `StampCost`,floor(`cost_f`.`SuperVisionCost`) AS `SuperVisionCost`,round((((((floor(`cost_f`.`SupportTax`) + `cost_f`.`passengers`) + round(`cost_f`.`StampCost`,0)) + floor(`cost_f`.`SuperVisionCost`)) + `cost_f`.`issue`) + `cost_f`.`premium`),0) AS `TotalCost` from `cost_f` */;

/*View structure for view sam */

/*!50001 DROP TABLE IF EXISTS `sam` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sam` AS select `clients`.`name` AS `client_name`,`clients`.`phone` AS `phone`,`cat`.`name` AS `cat_name`,`document`.`id` AS `id`,`document`.`name` AS `name`,`document`.`document` AS `document`,`document`.`date` AS `date`,`document`.`type` AS `type`,`document`.`broker_name` AS `broker_name`,`document`.`premium` AS `premium`,`document`.`passengers` AS `passengers`,`document`.`commission_office` AS `commission_office`,`document`.`commission_agent` AS `commission_agent`,`document`.`issue` AS `issue`,`document`.`StampCost` AS `StampCost`,`document`.`SupportTax` AS `SupportTax`,`document`.`SuperVisionCost` AS `SuperVisionCost`,`document`.`Employertax` AS `Employertax`,`document`.`TotalCost` AS `TotalCost`,`document`.`broker_id` AS `broker_id`,`document`.`status` AS `status`,`document`.`cancel` AS `cancel` from ((`document` join `clients` on((`document`.`broker_id` = `clients`.`id`))) join `cat` on((`document`.`type` = `cat`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
