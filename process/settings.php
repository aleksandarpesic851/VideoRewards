<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */
	
	include_once("../core/init.inc.php");

    if (!admin::isSession()) {

        header("Location: ../login.php");
		
    }else if(!empty($_POST) && !APP_DEMO){
		
		$appname = $_POST['appname'];
		$tagline = $_POST['tagline'];
		$package = $_POST['package'];
		$support_email = $_POST['support_email'];
		$webpanel_url = $_POST['webpanel_url'];
		$policy_url = $_POST['policy_url'];
		$contact_url = $_POST['contact_url'];
		$company_name = $_POST['company_name'];
		$company_site = $_POST['company_site'];
		$company_phone = $_POST['company_phone'];
		$company_email = $_POST['company_email'];
		$country = $_POST['country'];
		$income_activate = $_POST['income_activate'];
		$admin_ratio = $_POST['admin_ratio'];
		$firebase_key = $_POST['firebase_key'];
		
		
		$navbar_enable = $_POST['navbar_enable'];
		$tabs_enable = $_POST['tabs_enable'];
		$tn_prefix = $_POST['tn_prefix'];
		$credit_prefix = $_POST['credit_prefix'];
		$debit_prefix = $_POST['debit_prefix'];
		
		$settings = new settings($dbo);
		$save = new functions($dbo);
		
		$result = $settings->saveSettings($appname, $tagline, $package, $support_email, $webpanel_url, $company_name, $company_site,$company_phone, $company_email, $country, $income_activate, $admin_ratio,$firebase_key);
		
		
		$result = $save->updateConfigs($policy_url, 'APP_POLICY_URL');
		$result = $save->updateConfigs($contact_url, 'APP_CONTACT_US_URL');
		
		$result = $save->updateConfigs($navbar_enable, 'APP_NAVBAR_ENABLE');
		$result = $save->updateConfigs($tabs_enable, 'APP_TABS_ENABLE');
		$result = $save->updateConfigs($tn_prefix, 'TRANSACTION_PREFIX');
		$result = $save->updateConfigs($credit_prefix, 'TRANSACTION_CREDIT_PREFIX');
		$result = $save->updateConfigs($debit_prefix, 'TRANSACTION_DEBIT_PREFIX');
		
		if($result){
			
			header("Location: ../settings.php");
			
		}else{
			
			header("Location: ../settings.php");
		}
		
	}else{
		
		header("Location: ../settings.php");
		
	}
	
	
	

?>