<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
   <!--  <script>
        const thanks =document.getElementById('thanks');
        thanks.onload = runFireworks();
    </script> -->
    <head>
    </head>

</head>

<body id='thanks'>
    <nav class="navbar container">
        <a href="./index.php">
            <div class="logo">
                <h1>EDUKA</h1>
            </div>
        </a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="./shop.php">Shop</a></li>
            <li><a href="./account.php">Account</a></li>
        </ul>
        <i class="fa fa-bars"></i>
        <i class="fa fa-times"></i>
    </nav>

    <div class="thanks__hero">
        <?php

        // Read the JSON file
        $json_data = file_get_contents('cart.json');

        // Decode JSON data
        $cart_data = json_decode($json_data, true);

        // Check if decoding was successful
        if ($cart_data === null) {
            echo "Error decoding JSON data.\n";
            // Stop further execution if there's an error
            exit;
        }

        // Iterate over each entry in the cart data
        foreach ($cart_data as $key => $cart_entry) {
        }
        ?>

        <h1>Thanks you for your order!</h1>
        <p>Your order has been confirmed. You will
            receive an email confirmation shortly.
            Your order ID
            <a href="./account.php"><b style="font-size: 1.2rem"><?=$key?></b></a>.
        </p>
        <div class="thanks__btns">
            <a href="./receipts.php" class="btn">View order</a>
            <a href="./shop.php" class="btn">Continue Shopping</a>

        </div>
    </div>
    <!-- SERVICES SECTION -->

    <section class="container">
        <div class="services__container">
            <div class="service">
                <span><i class="fa fa-truck" aria-hidden="true"></i></span>
                <h3>Free Shipping</h3>
                <small>Free Shipping for orders above ksh. 15,000</small>
            </div>
            <div class="service">
                <span><i class="fa fa-usd" aria-hidden="true"></i></span>
                <h3>Money Guarantee</h3>
                <small>Within 30 days for an exchange</small>
            </div>
            <div class="service">
                <span><i class="fa fa-headphones" aria-hidden="true"></i></span>
                <h3>Online Support</h3>
                <small>24 hours a day, 7 days a week</small>
            </div>
            <div class="service">
                <span><i class="fa fa-credit-card-alt" aria-hidden="true"></i></span>
                <h3>Flexible Payment</h3>
                <small>Pay with multiple choices</small>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->

    <footer>
        <h1>EDUKA</h1>
        <p>&copy;Eduka. All rights are reserved</p>
        <div class="social__icons">
            <a href="#"><img src="./assets/icons/facebook.svg" alt=""></a>
            <a href="#"><img src="./assets/icons/instagram.svg" alt=""></a>
            <a href="#"><img src="./assets/icons/twitter.svg" alt=""></a>
        </div>
    </footer>

    <script src="./app.js"></script>
</body>

</html>