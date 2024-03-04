<?php
require 'config/constants.php';

$email = $_SESSION['admin-data']['email'] ?? null;
$password = $_SESSION['admin-data']['password'] ?? null;

unset($_SESSION['admin-data']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="../css/styles.css" />
  <title>Admin Login</title>
</head>

<body>
  <!-- Login -->
  <div class="container">
    <div class="login-form">
      <h1>ADMIN LOGIN</h1>
      <p>
        This form is only used by administration, if you're not admin click
        <a href="<?=ROOT_URL?>login.php" style='color: slateblue;'>Here</a>
      </p>
           <?php if(isset($_SESSION['admin-success'])): ?>

              <div class="alert__message success">
              <p style='font-size: 1.6rem; margin: 1rem 0;'><?= $_SESSION['admin-success'];
              unset($_SESSION['admin-success']);
              ?></p>
              </div>
              <?php elseif (isset($_SESSION['admin'])) : ?>
              <div class="alert__message error">
              <p style='font-size: 1.6rem; margin: 1rem 0;'><?= $_SESSION['admin'];
              unset($_SESSION['admin']);
              ?></p>
              </div>
              <?php endif ?>  
      <form action="login-logic.php" method="POST">

        <label for="email"><b>Email *</b></label>
        <input type="text" name="email" value="<?=$email?>" />
        <label for="password"><b>Password *</b></label>
        <input type="password" name="password" value="<?=$password?>" />
        <p>
          if you have lost your password contact: 
          <a href="#">+254702764907</a>.
        </p>
          <button type="submit" class="signupbtn" name="submit" style='margin: 0 auto; width: 100%;'>Login</button>
      </form>
    </div>
  </div>

  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>
