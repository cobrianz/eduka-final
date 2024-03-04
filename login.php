<?php
require 'config/constants.php';
$email = $_SESSION['login-data']['email'] ?? null;
$password = $_SESSION['login-data']['password'] ?? null;

unset($_SESSION['login-data']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka | Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="signup__coontainer">
        <div class="signin__thumbnail">
            <a href="<?= ROOT_URL ?>">
                <div class="logo">
                    <h1>EDUKA</h1>
                </div>
            </a>
        </div>
        <div class="signup__form-container"> 
            <div class="form">
                <h1>Welcome 👋🏼</h1>
                <small>Please login here</small>
                                <?php if(isset($_SESSION['login-success'])): ?>

                <div class="alert__message success">
                <p><?= $_SESSION['login-success'];
                unset($_SESSION['login-success']);
                ?></p>
                </div>
                <?php elseif (isset($_SESSION['login'])) : ?>
                <div class="alert__message error">
                <p><?= $_SESSION['login'];
                unset($_SESSION['login']);
                ?></p>
                </div>
                <?php endif ?>  
                <form action="<?=ROOT_URL?>login-logic.php" method="POST">
                    <label for="name">Email Address *</label>
                    <input type="email" name="email" value = "<?=$email?>">
                    <label for="name">Password *</label>
                    <input type="password"  name = "password" value = "<?=$password?>">
                    <button type="submit" name="submit" class="btn form__btn">Login</button>
                </form>
                <span>
                    <a href="signup.php">Create Account?</a>
                    <a href="forgot_password.php">Forgot Password?</a>
                </span>

            </div>
        </div>
    </div>
</body>

</html>