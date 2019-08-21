<?php

	/*!
	* VIDEO REWARDS v2.0
	*
	* http://www.droidoxy.com
	* support@droidoxy.com
	*
	* Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	*/

class api extends db_connect
{
    public function __construct($dbo = NULL)
    {
        parent::__construct($dbo);

    }

    static function printError($error_code, $error_description = "unknown")
    {
        $result = array("error" => true,
                        "error_code" => $error_code,
                        "error_description" => $error_description);

        echo json_encode($result);
        exit;
    }
}
