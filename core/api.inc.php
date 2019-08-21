<?php

	/*!
	* VIDEO REWARDS v2.0
	*
	* http://www.droidoxy.com
	* support@droidoxy.com
	*
	* Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	*/

header("Content-type: application/json; charset=utf-8");
$numFunc = new functions($dbo);
if(!$numFunc->getConfig('ADMIN')){ api::printError(999, ""); }
