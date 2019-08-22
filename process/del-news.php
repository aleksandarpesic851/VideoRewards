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
		
    }else if(isset($_GET['vid']) && !APP_DEMO){
		
		$ID = $_GET['vid'];
		
		$requests = new requests($dbo);
		
		$sql = "DELETE FROM news_list WHERE id = '$ID'";
        $stmt = $dbo->prepare($sql);
		
		if($stmt->execute()){
			
			header("Location: ../news.php");
			
		}else{
			
			header("Location: ../news.php");
		}
		
	}else{
		
		header("Location: ../news.php");
		
	}
	
	
	

?>