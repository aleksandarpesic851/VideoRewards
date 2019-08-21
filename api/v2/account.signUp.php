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

if (!empty($_POST)) {

    $clientId = isset($_POST['clientId']) ? $_POST['clientId'] : 0;

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $clientId = helper::clearInt($clientId);

    $username = helper::clearText($username);
    $username = helper::escapeText($username);

    $fullname = helper::clearText($fullname);
    $fullname = helper::escapeText($fullname);

    $password = helper::clearText($password);
    $password = helper::escapeText($password);

    $email = helper::clearText($email);
    $email = helper::escapeText($email);

    if ($clientId != CLIENT_ID) {

        api::printError(ERROR_UNKNOWN, "Error client Id.");
    }

    $result = array("error" => true);

    $account = new account($dbo);
    $result = $account->signup($username, $fullname, $password, $email);
    unset($account);

    if ($result['error'] === false) {

        $account = new account($dbo);
        $result = $account->signin($username, $password);
        unset($account);

        if ($result['error'] === false) {

            $auth = new auth($dbo);
            $result = $auth->create($result['accountId'], $clientId);

            if ($result['error'] === false) {

                $account = new account($dbo, $result['accountId']);
                $result['account'] = array();
                $result['config'] = array();

                array_push($result['account'], $account->get());
                array_push($result['config'], $account->getConfigs());
            }
        }
    }

    echo json_encode($result);
    exit;
}
