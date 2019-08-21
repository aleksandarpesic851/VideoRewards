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

        header("Location: ../index.php");
		
    }else if(isset($_GET['id']) && isset($_GET['action']) && !APP_DEMO){
		
		$ID = $_GET['id'];
		$status = $_GET['action'];
		$type = isset($_GET['type']) ? $_GET['type'] : "nothi";
		$configs = new functions($dbo);
		
        $sql = "UPDATE offerwalls SET status = '$status' WHERE id = '$ID'";
        $stmt = $dbo->prepare($sql);
        
        $result = $stmt->execute();
        
        if($type == "startapp"){
		    $result = $configs->updateConfigs($status, 'StartAppActive');
        }
        
        if($result){
			
			header("Location: ../offerwalls.php");
			
		}else{
			
			header("Location: ../offerwalls.php");
		}
		
	}else{
		
		header("Location: ../offerwalls.php");
		
	}
	
	
	

?>