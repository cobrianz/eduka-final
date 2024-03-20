<?php
require 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka | Shop</title>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <!-- Glide js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="shop.css">
</head>

<body class="">
    <div class="top-nav">
        <div class="container d-flex">
            <p>Order Online Or Call Us: (+245) 702764907</p>
            <ul class="d-flex">
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <header class="navigation">
            <div class="nav-center container d-flex">
                <ul class="nav-list d-flex">
                    <li class="nav-item">
                        <a href="<?= ROOT_URL ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= ROOT_URL ?>products_json_fetch.php" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="#terms" class="nav-link">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                    <li class="icons d-flex">
                        <?php if (isset ($_SESSION['user-id'])): ?>
                            <a href="account.php" class="icon">
                                <i class="bx bx-user"></i>
                            </a>
                            <?php
                                $id = $_SESSION['user-id'];
                                $fetch_user_query = "SELECT * FROM users WHERE id = $id";
                                $run_query = mysqli_query($connection, $fetch_user_query);
                                $user_record = mysqli_fetch_assoc($run_query);
                                
                                ?>
                                <div class="icon">
                                <i>Ksh.<b id='balance'><?php echo ' '.$user_record['balance']?> </b></i>
                            </div>
                        <?php else: ?>
                            <a href="login.php" class="icon">
                                <i class="bx bx-user"></i>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>

                <div class="icons d-flex">
                    <?php if (isset ($_SESSION['user-id'])): ?>
                        <a href="account.php" class="icon">
                            <i class="bx bx-user"></i>
                        </a>
                        <div class="icon">
                        <i>Ksh.<b id='balance'><?php echo ' '.$user_record['balance']?> </b></i>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="icon">
                            <i class="bx bx-user"></i>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="hamburger">
                    <i class="bx bx-menu-alt-left"></i>
                </div>
            </div>
            <div class="icon-cart">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
                </svg>
                <span>0</span>
            </div>
        </header>
    </div>
    <div class="listProduct">

    </div>
    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">

        </div>

        <div class="payment">
            <h2>Payment</h2>
            <div id="subtotal">
                <span>Subtotal</span>
                <span>Ksh. <span id="subtotalAmount">0</span></span>
            </div>
            <div id="tax">
                <span>Tax</span>
                <span>Ksh. <span id="taxAmount">0</span></span>
            </div>
            <div id="total">
                <span>Total</span>
                <span>Ksh. <span id="totalAmount">0</span></span>
            </div>
        </div>


        <div class="btn">
            <button class="close">CLOSE</button>
            <button class="checkOut" onclick="checkout()">Buy</button>
        </div>
    </div>

    <script src="main.js"></script>
    <footer class="footer">
        <div class="row">
            <div class="col d-flex">
                <h4>INFORMATION</h4>
                <a href="">About us</a>
                <a href="">Contact Us</a>
                <a href="">Term & Conditions</a>
                <a href="">Shipping Guide</a>
            </div>
            <div class="col d-flex">
                <h4>USEFUL LINK</h4>
                <a href="">Online Store</a>
                <a href="">Customer Services</a>
                <a href="">Promotion</a>
                <a href="">Top Brands</a>
            </div>
            <div class="col d-flex">
                <span><i class="bx bxl-facebook-square"></i></span>
                <span><i class="bx bxl-instagram-alt"></i></span>
                <span><i class="bx bxl-github"></i></span>
                <span><i class="bx bxl-twitter"></i></span>
                <span><i class="bx bxl-pinterest"></i></span>
            </div>
        </div>
    </footer>
</body>

</html>