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

    $payouts = new redeem($dbo);
    $result = $payouts->getPayouts();

    echo json_encode($result);
    exit;