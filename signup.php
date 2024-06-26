<?php
require 'config/constants.php';

//get back form data after an error occurred

$name = $_SESSION['signup-data']['name'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$password = $_SESSION['signup-data']['password'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

//delete the signup data session
unset($_SESSION['signup-data']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka | signup</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="signup__coontainer">
        <div class="signup__form-container">
            <div class="form">
                <h1>Create Account 👋🏼</h1>
                <small>Please enter details</small>
                <?php if (isset($_SESSION['signup'])): ?>
                    <div class="alert__message error">
                        <p>
                            <?= $_SESSION['signup'];
                            unset($_SESSION['signup']);
                            ?>
                        </p>
                    </div>

                    <?php
                endif ?>

                <form action="<?= ROOT_URL ?>signup-logic.php" method="POST">
                    <label for="name">Full Name *</label>
                    <input type="text" name="name" value="<?=$name ?>">
                    <label for="name">Email Address *</label>
                    <input type="email" name="email" value="<?=$email ?>">
                    <label for="name">Password *</label>
                    <input type="password" name="password" value="<?=$password ?>">
                    <label for="name">Confirm Password *</label>
                    <input type="password" name="confirmpassword" value="<?=$confirmpassword ?>">
                    <button type="submit" class="btn form__btn" name="submit">Sign Up</button>
                </form>
                <Span style="display: block;">Already have an account? <a href="<?= ROOT_URL ?>login.php">Login</a></Span>

            </div>
        </div>
    </div>
</body>

</html>