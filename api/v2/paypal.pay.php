
<!DOCTYPE html>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AfLNJDChLWkGIw0gbNVVB3zx_SjUflBL-q0GfOUV3nuFkyWB9F2XWPbNZ2ZkdPv5xi27RGV2wGFsKQA5&currency=USD"></script>
    <script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
    let accountId = '';
    <?php
        if(!empty($_GET['accountID']))
            echo "accountId = '". $_GET['accountID'] . "';\n";
    ?>
    if (!accountId) {
        alert("You have to visit this page from your app");
    } else {
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01'
                    }
                }]
            });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Call your server to save the transaction
                $.post('/api/v2/paypal.upgrade.php', {
                        orderID: data.orderID,
                        accountID: accountId
                    }, function(){
                        alert('Thank you for upgrading to premium ' + details.payer.name.given_name + ' !');
                });
            });
        }

        }).render('#paypal-button-container');
    }
    </script>
</body>
    