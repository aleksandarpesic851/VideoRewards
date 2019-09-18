<?php
include_once("../api.inc.php");

    $amount = 100*100; //The amount passed is in Kobo
    $email = 'developer1@madalalameyah.com';    //paystack account email
    $secret_key = 'sk_test_74036b72dd268b61fb4113e5e4710dfc2e36f157';   //paystack secret key

    function genReference($qtd){
    //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;

        $Hash=NULL;

        for($x=1;$x<=$qtd;$x++){
            $Posicao = rand(0,$QuantidadeCaracteres);
            $Hash .= substr($Caracteres,$Posicao,1);
        }

        return $Hash;
    }


    $result = array();

    //Set other parameters as keys in the $postdata array
    $postdata = array(
        'email' => $email,
        'amount' => $amount,
        "reference" => genReference(10)
    );

    $url = "https://api.paystack.co/transaction/initialize";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = [
        'Authorization: Bearer ' . $secret_key,
        'Content-Type: application/json',

    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $request = curl_exec($ch);

    curl_close($ch);

    if (!$request) {
        echo "Can't access paystack payment link. Please check your network state.";
        return;
    }

    $result = json_decode($request, true);
    $account = new account($dbo, $_GET["accountID"]);
    $account->updatePaymentReferer("PAYSTACK", $result['data']['reference']);
    // var_dump($result);
    header('Location: ' . $result['data']['authorization_url']);

?>