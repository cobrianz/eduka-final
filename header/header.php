<?php
require 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Glide js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Eduka ecommerce Website</title>
<style>
html{
  scroll-behavior: smooth;
}
  #contact__form{
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }

  #contact__form textarea{
   width: 100%;
   border: none;
   outline: none;
   border-radius: 1rem;
   resize: none;
  }
  #contact__form button {
    width: fit-content;
    padding: 1rem;
    background: slateblue;
    color: #fff;
    font-size: 1.2rem;
    margin: 0 auto;
    border-radius: .5rem;
    border: none;
  }
  #contact__form button:hover {
    background: #000;
    color: #fff;
    border: 1px solid slateblue;
  }
</style>
  </head>
  <body>
    <!-- Header -->
    <header class="header" id="header">
      <!-- Top Nav -->
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
      <div class="navigation">
        <div class="nav-center container d-flex">
        <a href="<?=ROOT_URL?>" class="logo"><h1>Eduka</h1></a>

          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="<?=ROOT_URL?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?=ROOT_URL?>shop.php" class="nav-link">Shop</a>
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
            <?php if(isset($_SESSION['user-id'])): ?>
          <a href="account.php" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <?php else: ?>
          <a href="login.php" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <?php endif;?>
            <div class="icon">
              <i class="bx bx-search"></i>
            </div>
            <div class="icon">
              <i class="bx bx-heart"></i>
              <span class="d-flex">0</span>
            </div>
                  <a href="cart.php" class="icon">
          <i class="bx bx-cart"></i>
          <span class="d-flex" id="cartCount">0</span>
      </a>

          </li>
          </ul>

          <div class="icons d-flex">
          <?php if(isset($_SESSION['user-id'])): ?>
          <a href="account.php" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <?php else: ?>
          <a href="login.php" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <?php endif;?>
            <div class="icon">
              <i class="bx bx-search"></i>
            </div>
            <div class="icon">
              <i class="bx bx-heart"></i>
              <span class="d-flex">0</span>
            </div>
            <a href="cart.php" class="icon">
              <i class="bx bx-cart"></i>
              <span class="d-flex"  id="cartCount">0</span>
            </a>
          </div>

          <div class="hamburger">
            <i class="bx bx-menu-alt-left"></i>
          </div>
        </div>
      </div>

      