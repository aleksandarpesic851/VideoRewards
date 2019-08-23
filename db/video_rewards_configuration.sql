
USE `playnews_video_rewards`;

/*Table structure for table `configuration` */

DROP TABLE IF EXISTS `configuration`;

CREATE TABLE `configuration` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(100) NOT NULL,
  `config_value` varchar(64) NOT NULL,
  `api_status` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `configuration` */

insert  into `configuration`(`id`,`config_name`,`config_value`,`api_status`) values 
(1,'APP_NAME','Video Rewards','0'),
(2,'APP_DESC','Android App','0'),
(3,'SITE_NAME','Dashboard','0'),
(4,'SITE_DESC','VideoRewards - Android App','0'),
(5,'WEB_ROOT','http://localhost:8000/','1'),
(6,'SUPPORT_EMAIL','support@droidoxy.com','1'),
(7,'BASE','VIDRW','0'),
(8,'VERSION','2.0','0'),
(9,'INSTALL','1','0'),
(10,'COMPANY_NAME','Example Company','1'),
(11,'COMPANY_SITE','www.example.com1','1'),
(12,'SUPPORT_PHONE','+1 123 456 7890','0'),
(13,'COMPANY_COUNTRY','USA','0'),
(14,'COMPANY_EMAIL','hello@example.com','0'),
(15,'FIREBASE_API_KEY','AIzaSyAv23NYMxosFdEF7kkWxs2Dv_FwdOGqo','0'),
(16,'INCOME_OVERVIEW','1','0'),
(17,'INCOME_OVERVIEW_TITLE','0','0'),
(18,'ADMIN_RATIO','250','0'),
(19,'REFER_ACTIVE','1','1'),
(20,'REFER_REWARD','10','1'),
(21,'USER_RATIO','1000','0'),
(22,'DAILY_ACTIVE','1','1'),
(23,'DAILY_REWARD','25','1'),
(24,'LAST_SAVE','1566544067','0'),
(25,'LAST_ADMIN_ACCESS','1566544067','0'),
(26,'PACKAGE_NAME','com.example.appname','1'),
(27,'ADMIN','1','0'),
(28,'ADMIN_IMAGE','person-placeholder.jpeg','0'),
(29,'ACCESS_TOKEN','tm58pal17padDt70','0'),
(30,'ADMIN_NAME','John Doe','0'),
(31,'TRANSACTION_PREFIX','VIDRW','1'),
(32,'TRANSACTION_CREDIT_PREFIX','CR010','0'),
(33,'TRANSACTION_DEBIT_PREFIX','DB010','0'),
(34,'APP_NAVBAR_ENABLE','1','1'),
(35,'APP_TABS_ENABLE','0','1'),
(36,'APP_DEBUG_MODE','0','1'),
(37,'POLICY_ACTIVE','1','1'),
(38,'APP_POLICY_URL','http://example.com/privacy','1'),
(39,'CONTACT_US_ACTIVE','1','1'),
(40,'APP_CONTACT_US_URL','http://example.com/contact','1'),
(41,'RATE_APP_ACTIVE','1','1'),
(42,'INSTRUCTIONS_ACTIVE','1','1'),
(43,'SHARE_APP_ACTIVE','1','1'),
(44,'APP_SHARE_TEXT','Hey Look, What a Wonderful App i have found..','1'),
(45,'CHECKIN_BONUS_TITLE','Daily Checkin Credit','0'),
(46,'REFERAL_BONUS_TITLE','Invitation Bonus','0'),
(47,'REFERER_BONUS_TITLE','Referral Bonus','0'),
(48,'APP_VENDOR','DroidOXY','0'),
(49,'VENDOR_URL','www.droidoxy.com','0'),
(50,'VENDOR_SUPPORT_URL','http://www.droidoxy.com/support','1'),
(51,'WEB_LICENSE_URL','http://www.codyhub.com/item/video-rewards-webpanel','1'),
(52,'APP_LICENSE_URL','http://www.codyhub.com/item/video-rewards-android-app','1'),
(53,'AdmobVideoCredit_Amount','3','0'),
(54,'AdmobVideoCredit_Title','Admob Video Credit','1'),
(55,'StartApp_AppID','ADD STARTAPP ID HERE','1'),
(56,'StartAppActive','1','1'),
(57,'StartAppVideoCredit_Amount','3','0'),
(58,'StartAppVideoCredit_Title','StartApp Video Credit','1'),
(59,'WEB_VIDEO_CREDIT_TITLE','WebPanel Video Credit','0'),
(60,'DAILY_PREMIUM_REWARD','','1'),
(61,'REFER_PREMIUM_REWARD','20','1'),
(62,'AdmobVideoCredit_Premium_Amount','5','1'),
(63,'StartAppVideoCredit_Premium_Amount','6','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
