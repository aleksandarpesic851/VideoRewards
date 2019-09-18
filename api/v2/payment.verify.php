<?php
include_once("../api.inc.php");

    $email = 'developer1@madalalameyah.com';    //paystack account email
    $secret_key = 'sk_test_74036b72dd268b61fb4113e5e4710dfc2e36f157';   //paystack secret key

    $account = new account($dbo, $_POST["accountID"]);
    $accountInfo = $account->get();
    $payType = $accountInfo['payment_type'];
    $payReference = $accountInfo['payment_reference'];
    $response = array("error" => true);

    if ($payType == 'PAYSTACK') {

        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = 'https://api.paystack.co/transaction/verify/'. $payReference;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $secret_key]
        );
        $request = curl_exec($ch);
        curl_close($ch);
        
        if ($request) {
            $result = json_decode($request, true);
        }
    
        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
            $account->updateToPremium();
            $response = array("error" => false, "error_code" => ERROR_SUCCESS, "premium" => true);
        }else{
            $response = array("error" => false, "error_code" => ERROR_SUCCESS, "premium" => false);
        }

    }

    else if ($payType == 'PAYPAL') {

    }

    echo json_encode($response);
    exit;
?>