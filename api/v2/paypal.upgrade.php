<?php

    include_once("../api.inc.php");
    $orderId = $_POST['orderID'];
    $accountId = $_POST['accountID'];

    $account = new account($dbo, $accountId);
    $account->updatePaymentReferer("PAYPAL", $orderId);
    $account->updateToPremium();
?>