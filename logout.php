<?php
require "config/constants.php";

//destroy all sessions and redirect the user to home page
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar container">
        <a href="./index.php">
            <div class="logo">
                <h1>EDUKA</h1>
            </div>
        </a>
        <ul>
            <li><a href="<?=ROOT_URL ?>">Home</a></li>
            <li><a href="<?=ROOT_URL ?>shop.php">Shop</a></li>
            <li><a href="<?=ROOT_URL ?>login.php" class="btn">Login</a></li>
        </ul>
    </nav>

    <div class="thanks__hero">
        <h1>Logged out successfully.</h1>
        <p>Thanks you for shopping with us! We look forward to serving you again in the future. </p>
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