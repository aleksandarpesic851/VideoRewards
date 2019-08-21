<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */

	if(isset($_GET['url'])){
		
		$link = $_GET['url'];
		
		header("location: http://".$link);
		
	}else{ header("Location: ../index.php"); }

?>
