<?php

require 'config/database.php';
if (!isset($_SESSION['user-id'])) {
    header('Location:' . ROOT_URL . 'login.php');
    $_SESSION['login'] = 'You have to login to access this page';
    exit();
}

$email = $_SESSION['update-data']['email'] ?? null;
$name = $_SESSION['update-data']['name'] ?? null;
$amount = $_SESSION['deposit-data']['amount'] ?? null;
$password = $_SESSION['update-data']['password'] ?? null;
unset($_SESSION['update-data']);
unset($_SESSION['deposit-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

</head>

<body style="background: #ebedf1;
">
    <nav class="navbar container">
        <a href="<?= ROOT_URL ?>">
            <div class="logo">
                <h1>EDUKA</h1>
            </div>
        </a>
        <ul>
            <?php
             if (isset($_SESSION['user-id'])):
                $id = $_SESSION['user-id'];
                $fetch_user_query = "SELECT * FROM users WHERE id = $id";
                $run_query = mysqli_query($connection, $fetch_user_query);
                $user_record = mysqli_fetch_assoc($run_query);
            
            ?>
            <li><a href="<?= ROOT_URL ?>">Home</a></li>
            <li><a href="<?= ROOT_URL ?>shop.php">Shop</a></li>
            <li>Ksh.<b><?php echo ' '.$user_record['balance']?> </b></li>
            <li><a href="<?= ROOT_URL ?>cart.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
        </ul>
        <i class="fa fa-bars"></i>
        <i class="fa fa-times"></i>
    </nav>

    <div class="account__hero container">
        <aside>
            <h1>My Profile</h1>
            <div class="account__user">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <span>
                    <?php
                   
                        echo '<h4>' . $user_record['name'] . '</h4>';
                        echo '<p>' . $user_record['email'] . '</p>';
                        ?>
                    <?php else:
                        header('Location :' . ROOT_URL . 'login.php');
                    endif ?>
                </span>
            </div>
            <span class="aside__span">
                <i class="fa fa-user-o" aria-hidden="true"></i>
                <p>Personal Information</p>
            </span>
            <span class="aside__span">
                <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                <p>My Purchase</p>
            </span>
            <span class="aside__span">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <p>My Orders</p>
            </span>
            <span class="aside__span">
                <i class="fa fa-money" aria-hidden="true"></i>
                <p>Deposit</p>
            </span>
            <span class="aside__span">
                <i class="fa fa-sign-out" aria-hidden="true" style="color: red;"></i>
                <p><a href="./logout.php" style="color: #c27272;">Logout</a></p>
            </span>
        </aside>

        <main>
            <div id="main" class="main Personal__information">
                <div class="signup__form-container">
                    <div class="form">
                        <h3>Personal Information</h3>
                        <?php if (isset($_SESSION['update-success'])): ?>

                            <div class="alert__message success">
                                <p>
                                    <?= $_SESSION['update-success'];
                                    unset($_SESSION['update-success']);
                                    ?>
                                </p>
                            </div>
                        <?php elseif (isset($_SESSION['update'])): ?>
                            <div class="alert__message error">
                                <p>
                                    <?= $_SESSION['update'];
                                    unset($_SESSION['update']);
                                    ?>
                                </p>
                            </div>
                        <?php endif ?>
                        <form action="<?= ROOT_URL ?>update.php" method="POST">
                            <label for="name">Email Address *</label>
                            <input type="email" value="" placeholder="<?= $user_record['email'] ?>">
                            <label for="name">Name *</label>
                            <input type="text" value="" placeholder="<?= $user_record['name'] ?>">
                            <p>Change your details below, or <a href="#" id="passcode-toggler">click here</a> to change
                                your password.</p>
                            <label id="passcode" class="passcode" for="name">Password *</label>
                            <input id="passcode" class="passcode" type="password" value=""
                                placeholder="<?= $user_record['password'] ?>">
                            <button type="submit" class="btn" name="">Update Account</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="main" class="main purchase__info">
                <h3>Purchased Products</h3>
                <div class="Purchased__item">
                    <img src="./assets/images/15-inch-macbook-air-2tb-midnight.png" alt="">
                    <div class="purchased__item-details">
                        <small>15-inch Macbook Air (2tb)-midnight</small>
                        <p>Ksh. 175,000</p>
                        <span>Purchased On 11/02/2024</span>
                    </div>
                </div>
            </div>

            <div id="main" class="main purchase__info">
                <h3>My orders</h3>
                <div class="Purchased__item my__orders">
                    <div class="purchased__item-details">
                        <div>Order: <b>955wertyfa65798etwg95bnch45</b></div>
                        <p>Total: Ksh. 175,000</p>
                        <span>Purchased On 11/02/2024</span>
                    </div>
                    <small><a href="#">View Order</a></small>
                </div>
            </div>
            <div id="main" class="main purchase__info">
    <?php if (isset($_SESSION['deposit-success'])): ?>
        <div class="alert__message success">
            <p>
                <?= $_SESSION['deposit-success'];
                unset($_SESSION['deposit-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['deposit'])): ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['deposit'];
                unset($_SESSION['deposit']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <h1 id='deposit'>Deposit</h1>
    <form action="<?= ROOT_URL ?>deposit.php" method="POST">
        <label for="name">Enter Amount *</label>
        <input type="number" value="" placeholder="<?= isset($user_record['balance']) ? $user_record['balance'] : ''; ?>" name="amount">
        <button type="submit" class="btn" name="submit">Deposit</button>
    </form>
</div>
   <div id="main" class="main">
                <div class="itemDetails">
                    <h3>Order: 955wertyfa65798etwg95bnch45</h3>
                    <span>ID: 955wertyfa65798etwg95bnch45</span>
                    <span>Payment ref: SB19S8ZD0Z</span>
                    <span>Order On: 11/02/2024</span>
                    <span><b>Total: Ksh. 175,000</b></span>
                    <div class="Purchased__item">
                        <img src="./assets/images/15-inch-macbook-air-2tb-midnight.png" alt="">
                        <div class="purchased__item-details">
                            <small>15-inch Macbook Air (2tb)-midnight</small>
                            <div>Quantity: <b>1</b></div>
                            <p>Ksh. 175,000</p>
                        </div>
                    </div>
                </div>
            </div>          
        </main>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const asideSpans = document.querySelectorAll('.aside__span');
    const mainSections = document.querySelectorAll('.main');
    const viewOrderLinks = document.querySelectorAll('.my__orders a');
    const openMenu = document.querySelector('.fa-bars');
    const closeMenu = document.querySelector('.fa-times');
    const menu = document.querySelector('ul');


    // Function to remove 'active-aside__span' class from all spans
    const removeActiveClass = () => {
        asideSpans.forEach(s => s.classList.remove('active-aside__span'));
    };

    asideSpans.forEach((span, index) => {
        span.addEventListener('click', () => {
            removeActiveClass();
            span.classList.add('active-aside__span');
            mainSections.forEach(section => section.style.display = 'none');
            mainSections[index].style.display = 'block';
        });
    });

    viewOrderLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            removeActiveClass();
            mainSections.forEach(section => section.style.display = 'none');
            const orderDetailsIndex = mainSections.length - 1; // Assuming order details is the last section
            mainSections[orderDetailsIndex].style.display = 'block';
        });
    });

    // Set default open section (Personal Information)
    const defaultSectionIndex = 0;
    asideSpans[defaultSectionIndex].classList.add('active-aside__span');
    mainSections.forEach((section, index) => {
        section.style.display = index === defaultSectionIndex ? 'block' : 'none';
    });

    
openMenu.addEventListener('click', () => {
    menu.style.display = 'flex';
    openMenu.style.display = 'none';
    closeMenu.style.display = 'flex';
    
});

closeMenu.addEventListener('click', () => {
    menu.style.display = 'none';
    openMenu.style.display = 'flex';
    closeMenu.style.display = 'none';
    
});

//Shop aside javascript

const asideToggler = document.querySelector('.aside__toggler');
const aside = document.querySelector('.shop__aside');

asideToggler.addEventListener('click', () => {
    aside.classList.toggle('shop__aside-active');
});
;

});
    </script>
</body>

</html>