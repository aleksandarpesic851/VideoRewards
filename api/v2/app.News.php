<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */

    include_once("../api.inc.php");

    $videos = new News($dbo);
    $result = $videos->getAllNews();
   
    echo json_encode($result);
    exit;