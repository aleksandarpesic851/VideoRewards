
USE `playnews_video_rewards`;

/*Table structure for table `offerwalls` */

DROP TABLE IF EXISTS `offerwalls`;

CREATE TABLE `offerwalls` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `points` varchar(255) NOT NULL,
  `points_premium` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `featured` varchar(2) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `offerwalls` */

insert  into `offerwalls`(`id`,`name`,`subtitle`,`points`,`points_premium`,`image`,`type`,`featured`,`status`) values 
(1,'Daily Checkin','open App daily and get 25 Points','25','30','http://localhost:8000/images/daily_check.png','checkin','1','1'),
(2,'WebPanel Videos','Watch videos To Earn Points','0','0','http://localhost:8000/images/webpanel_video.png','webvids','1','1'),
(3,'Admob Videos','Watch videos To Earn Points','3','5','https://pocket.droidoxy.com/images/place_holder.png','admobvideo','1','1'),
(4,'StartApp Videos','Watch videos To Earn Points','3','6','https://pocket.droidoxy.com/images/place_holder.png','startapp','1','1'),
(5,'Refer & Earn','Refer Friends and Get Points','10','20','https://pocket.droidoxy.com/beta/images/place_holder.png','refer','1','1'),
(6,'Transactions','View All your Transactions','0',NULL,'https://pocket.droidoxy.com/beta/images/place_holder.png','transactions','1','1'),
(7,'Redeem','Turn your Points into cash','0',NULL,'https://pocket.droidoxy.com/beta/images/place_holder.png','redeem','1','1'),
(8,'Instructions','How to Earn Points','0',NULL,'https://pocket.droidoxy.com/beta/images/place_holder.png','instructions','1','0'),
(9,'Share This App','Help your friends find this App','0',NULL,'https://pocket.droidoxy.com/beta/images/place_holder.png','share','1','0'),
(10,'Rate the App','Support us by Rating our App','0',NULL,'https://pocket.droidoxy.com/beta/images/place_holder.png','rate','1','0'),
(11,'About Us','Advertise with Us','0',NULL,'https://pocket.droidoxy.com/beta/images/place_holder.png','about','1','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
