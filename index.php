<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */
	 
	if (file_exists('install')) {
		
		echo '<html lang="en"><head><title>VideoRewards - Android App</title></head>';
		echo '<body style="color: #525252; sans-serif; font-size: 16px; -webkit-font-smoothing: antialiased; margin: 0">';
		echo '<div style="text-align: center;font-size: 56px; font-weight: 200; margin: 100px 0;">';
		echo '<p style="font-size: 56px; font-weight: 200;">VideoRewards - Android App</p><br>';
		echo '<a href="install/" rel="nofollow" style="padding: 20px 20px; text-decoration: none; font-size: 14px; text-transform: uppercase;color: #fff; background: #1880c9;transition: all 0.3s;">Install WebPanel</a>';
		echo '<p style="font-size: 20px;margin-top: 10%; line-height: 1.5;">Click Install to proceed to the Installer<br>or<br>Remove the install folder after installation and then refresh the page to continue.</p>'; 
		echo '<p style="font-size: 14px;margin-top: 8%;">&copy; <a href="http://www.droidoxy.com/" target="_blank" style="text-decoration: none;color: inherit;">DroidOXY</a>. All Rights Reserved.</p>';
		echo '</div>';
		echo '</body>';
		exit(); 
		
	}else if(file_exists('update')){
		
		echo '<html lang="en"><head><title>VideoRewards - Android App</title></head>';
		echo '<body style="color: #525252; sans-serif; font-size: 16px; -webkit-font-smoothing: antialiased; margin: 0">';
		echo '<div style="text-align: center;font-size: 56px; font-weight: 200; margin: 100px 0;">';
		echo '<p style="font-size: 56px; font-weight: 200;">VideoRewards - Android App</p><br>';
		echo '<a href="update/" rel="nofollow" style="padding: 20px 20px; text-decoration: none; font-size: 14px; text-transform: uppercase;color: #fff; background: #1880c9;transition: all 0.3s;">Update WebPanel</a>';
		echo '<p style="font-size: 20px;margin-top: 10%; line-height: 1.5;">Click Update to proceed to the script updation<br>or<br>Remove the update folder after updation and then refresh the page to continue.</p>'; 
		echo '<p style="font-size: 14px;margin-top: 8%;">&copy; <a href="redirect/?url=www.droidoxy.com/" target="_blank" style="text-decoration: none;color: inherit;">DroidOXY</a>. All Rights Reserved.</p>';
		echo '</div>';
		echo '</body>';
		exit(); 
		
	}else{
		
		include_once("core/init.inc.php");

		if (admin::isSession()) {

			header("Location: admin.php");
		}
		$configs = new functions($dbo);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $configs->getConfig('APP_NAME'); ?> - <?php echo $configs->getConfig('APP_DESC'); ?></title>
    <meta name="google-site-verification" content="" />
    <meta name='yandex-verification' content='' />
    <meta name="msvalidate.01" content="" />
    <meta charset="utf-8">
    <meta name="description" content="">
    <link href="assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body style="color: #525252; font-family: 'Source Sans Pro', sans-serif; font-size: 16px; -webkit-font-smoothing: antialiased; margin: 0">

    <div style="text-align: center;font-size: 56px; font-weight: 200; margin: 140px 0;">
        <?php echo $configs->getConfig('APP_NAME'); ?> - <?php echo $configs->getConfig('APP_DESC'); ?>
        <div style="margin-top: 50px;">
            <a href="https://play.google.com/store/apps/details?id=<?php echo $configs->getConfig('PACKAGE_NAME'); ?>" rel="nofollow">
                <img src="assets/images/googleplay.png">
            </a>
        </div>
        <div style="margin-top: 40px; font-size: 22px;">
            <a style="color: #3A6DA5" href="login.php">Go to Admin Panel -></a>
        </div>
    </div>
</body>
</html>

