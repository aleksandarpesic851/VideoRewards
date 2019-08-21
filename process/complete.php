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
		
    }else if(isset($_GET['id']) && isset($_GET['type']) && !APP_DEMO){
		
		$ID = $_GET['id'];
		$type = $_GET['type'];
		
		$requests = new requests($dbo);
		$result = false;
		
		if($type == "complete"){
			
			$result = $requests->CompleteRequest($ID);
			
		}else if($type == "processing"){
			
			$result = $requests->ProcessingRequest($ID);
			
		}else if($type == "reject"){
			
			$result = $requests->RejectRequest($ID);
			
		}
		
		if($result){
			
			header("Location: ../requests.php");
			
		}else{
			
			header("Location: ../requests.php");
		}
		
	}else{
		
		header("Location: ../requests.php");
		
	}
	
	
	

?>