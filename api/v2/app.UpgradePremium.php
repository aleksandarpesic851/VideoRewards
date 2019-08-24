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
    
    $data = $_POST['data'];
    
    $json = json_decode($data, true);

    $clientId = isset($json['clientId']) ? $json['clientId'] : 0;

    $accountId = isset($json['accountId']) ? $json['accountId'] : '';
    $accessToken = isset($json['accessToken']) ? $json['accessToken'] : '';
    
    $user = isset($json['user']) ? $json['user'] : '11';
    $premium_referer = isset($json['name']) ? $json['name'] : '0';
    
    $ip_addr = $_SERVER['REMOTE_ADDR'];
    
    $clientId = helper::clearInt($clientId);
    $accountId = helper::clearInt($accountId);
    
    $accessToken = helper::clearText($accessToken);
    $accessToken = helper::escapeText($accessToken);
    
    $result = array("error" => true);
    $auth = new auth($dbo);
    
    if($clientId != CLIENT_ID) {

        api::printError(ERROR_UNKNOWN, "Error client Id.");
        
    }else if(!$auth->authorize($accountId, $accessToken)) {

        api::printError(ERROR_ACCESS_TOKEN, "Error authorization.");
    }

    $account = new account($dbo, $accountId);
    $userdata = $account->get();
    
    if($userdata['username'] != $user){
        
        api::printError(ERROR_UNKNOWN, "Account Mismatch");
    
    }else if($userdata['premium'] == '1'){
        
        api::printError(420, "You Are Premium Member Already");
        
    }else if($userdata['premium'] == '0'){
        
        // Saving News Item Details
        
        $sql = "UPDATE users SET premium = 1, premium_referer = '$premium_referer' WHERE login = '$user'";
        $stmt = $dbo->prepare($sql);
        
        if($stmt->execute()){
            
            $result = array("error" => false, "error_code" => ERROR_SUCCESS, "error_description" => "Updated to Premium");
            
        }else{
            
            api::printError(ERROR_UNKNOWN, "Server Error");
            
        }
        
    }else{
        
        api::printError(ERROR_UNKNOWN, "UNKNOWN Status Error");
    }
    
    echo json_encode($result);
    exit;
} 