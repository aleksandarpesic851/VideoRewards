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
		
    }else if(!empty($_POST) && !APP_DEMO){
		
		$ID = $_POST['id'];
		$name = $_POST['name'];
		$subtitle = $_POST['sub'];
		$image_name = isset($_POST['image_name']) ? $_POST['image_name'] : $ID."_offerwall_image.png";
		$type = $_POST['type'];
		$points = isset($_POST['points']) ? $_POST['points'] : 0;
		$val1 = isset($_POST['val1']) ? $_POST['val1'] : "0000";
		$val2 = isset($_POST['val2']) ? $_POST['val2'] : "0000";
		
		$result = false;
		$configs = new functions($dbo);
		
		if($type == "checkin"){
		    
		    $result = $configs->updateConfigs($points, 'DAILY_REWARD');
		    
		}else if($type == "refer"){
		    
		    $result = $configs->updateConfigs($points, 'REFER_REWARD');
		    
		}else if($type == "admobvideo"){
		    
		    $result = $configs->updateConfigs($points, 'AdmobVideoCredit_Amount');
		    
		}else if($type == "startapp"){
		    
		    $result = $configs->updateConfigs($points, 'StartAppVideoCredit_Amount');
		    $result = $configs->updateConfigs($val1, 'StartApp_AppID');
		    
		}
		
		$urlfinal = $configs->getConfig('WEB_ROOT')."images/";
		
		require_once  "../core/class.imagehelper.php";
		
		$image = new Imagehelper\Image($_FILES);
			
		if($image["offer_image"]){
				
			$image->setSize(0, 5000000);
			$image->setMime(array('png', 'jpg','jpeg'));
			$image->setLocation("../images");
			
				$imageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_name);
				$image->setName($imageName);
			
			$upload = $image->upload();
			
			if($upload){
				
				// update with image
				
				$urlfinal = $urlfinal.$image->getName().'.'.$image->getMime();
    		    
    		    $sql = "UPDATE offerwalls SET name = '$name', subtitle = '$subtitle', points = '$points', image = '$urlfinal' WHERE id = '$ID' ";
    			$stmt = $dbo->prepare($sql);
    			if($stmt->execute()){ $result = true; }
				
			}else{
				
				 //echo $image->getError();
				 
				 // update without image
		    
    		    $sql = "UPDATE offerwalls SET name = '$name', subtitle = '$subtitle', points = '$points' WHERE id = '$ID' ";
    			$stmt = $dbo->prepare($sql);
    			
    			if($stmt->execute()){ $result = true; }
				
			}
			
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