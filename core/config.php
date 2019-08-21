<?php

	/*!
	* POCKET v3.0
	*
	* http://www.droidoxy.com
	* support@droidoxy.com
	*
	* Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	*/
	
$B = array();

//Please edit database details

$B['DB_HOST'] = "localhost";                                //localhost or your Database host
$B['DB_NAME'] = "video_rewards";                             //your Database name
$B['DB_USER'] = "root";                             //your Database user
$B['DB_PASS'] = "";                         //your Database password

// SMTP Settings | For password recovery

$B['SMTP_AUTH'] = true;                                     //SMTP auth (Enable SMTP authentication)
$B['SMTP_SECURE'] = "tls";                                  //SMTP secure (Enable TLS encryption, `ssl` also accepted)
$B['SMTP_PORT'] = 587;                                      //SMTP port (TCP port to connect to)
$B['SMTP_EMAIL'] = "example@gmail.com";                     //SMTP email
$B['SMTP_USERNAME'] = "example@gmail.com";                  //SMTP username
$B['SMTP_PASSWORD'] = "EMAIL_PASSWORD_HERE";                      //SMTP password

// TimeZone
// date_default_timezone_set('Asia/Kolkata');

$INSTALL_STATUS = "SUCCESS";

?>