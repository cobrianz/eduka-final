<?php
require './header/header.php'
  ?>

<?php

//get back form data after an error occurred

$name = $_SESSION['message-data']['name'] ?? null;
$email = $_SESSION['message-data']['email'] ?? null;
$message = $_SESSION['message-data']['message'] ?? null;

//delete the message data session
unset($_SESSION['message-data']);
?>


<div class="hero">
  <div class="glide" id="glide_1">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides">
        <li class="glide__slide">
          <div class="center">
            <div class="left">
              <span class="">New Inspiration 2020</span>
              <h1 class="">NEW COLLECTION!</h1>
              <p>Trending from men's and women's style collection</p>
              <a href="<?= ROOT_URL ?>shop.php" class="hero-btn">SHOP NOW</a>
            </div>
            <div class="right">
              <img class="img1" src="./images/hero-1.png" alt="">
            </div>
          </div>
        </li>
        <li class="glide__slide">
          <div class="center">
            <div class="left">
              <span>New Inspiration 2020</span>
              <h1>THE PERFECT MATCH!</h1>
              <p>Trending from men's and women's style collection</p>
              <a href="#" class="hero-btn">SHOP NOW</a>
            </div>
            <div class="right">
              <img class="img2" src="./images/hero-2.png" alt="">
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
</header>

<!-- Categories Section -->
<section class="section category">
  <div class="cat-center">
    <div class="cat">
      <img src="./images/cat3.jpg" alt="" />
      <div>
        <p>WOMEN'S WEAR</p>
      </div>
    </div>
    <div class="cat">
      <img src="./images/cat2.jpg" alt="" />
      <div>
        <p>ACCESSORIES</p>
      </div>
    </div>
    <div class="cat">
      <img src="./images/cat1.jpg" alt="" />
      <div>
        <p>MEN'S WEAR</p>
      </div>
    </div>
  </div>
</section>

<!-- New Arrivals -->
<section class="section new-arrival">
  <div class="title">
    <h1>NEW ARRIVALS</h1>
    <p>All the latest picked from designer of our store</p>
  </div>

  <div class="product-center">
    <div class="product-item">
      <div class="overlay">
        <a href="productDetails.html" class="product-thumb">
          <img src="./images/product-1.jpg" alt="" />
        </a>
      </div>
      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="productDetails.html">Quis Nostrud Exercitation</a>
        <h4>$700</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
    <div class="product-item">
      <div class="overlay">
        <a href="" class="product-thumb">
          <img src="./images/product-3.jpg" alt="" />
        </a>
        <span class="discount">50%</span>
      </div>

      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="">Sonata White Men’s Shirt</a>
        <h4>$800</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
    <div class="product-item">
      <div class="overlay">
        <a href="" class="product-thumb">
          <img src="./images/product-2.jpg" alt="" />
        </a>
      </div>
      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="">Concepts Solid Pink Men’s Polo</a>
        <h4>$150</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
    <div class="product-item">
      <div class="overlay">
        <a href="" class="product-thumb">
          <img src="./images/product-4.jpg" alt="" />
        </a>
        <span class="discount">50%</span>
      </div>
      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="">Edor do eiusmod tempor</a>
        <h4>$900</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
    <div class="product-item">
      <div class="overlay">
        <a href="" class="product-thumb">
          <img src="./images/product-5.jpg" alt="" />
        </a>
      </div>
      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="">Edor do eiusmod tempor</a>
        <h4>$100</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
    <div class="product-item">
      <div class="overlay">
        <a href="" class="product-thumb">
          <img src="./images/product-6.jpg" alt="" />
        </a>
      </div>
      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="">Edor do eiusmod tempor</a>
        <h4>$500</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
    <div class="product-item">
      <div class="overlay">
        <a href="" class="product-thumb">
          <img src="./images/product-7.jpg" alt="" />
        </a>
        <span class="discount">50%</span>
      </div>
      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="">Edor do eiusmod tempor</a>
        <h4>$200</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
    <div class="product-item">
      <div class="overlay">
        <a href="" class="product-thumb">
          <img src="./images/product-2.jpg" alt="" />
        </a>
      </div>
      <div class="product-info">
        <span>MEN'S CLOTHES</span>
        <a href="">Edor do eiusmod tempor</a>
        <h4>$560</h4>
      </div>
      <ul class="icons">
        <li><i class="bx bx-heart"></i></li>
        <li><i class="bx bx-search"></i></li>
        <li><i class="bx bx-cart"></i></li>
      </ul>
    </div>
  </div>
</section>


<!-- Promo -->

<section class="section banner">
  <div class="left">
    <span class="trend">Trend Design</span>
    <h1>New Collection 2021</h1>
    <p>New Arrival <span class="color">Sale 50% OFF</span> Limited Time Offer</p>
    <a href="#" class="btn btn-1">Discover Now</a>
  </div>
  <div class="right">
    <img src="./images/banner.png" alt="">
  </div>
</section>




<!-- Featured -->

<section class="section new-arrival">
  <div class="title">
    <h1>Featured</h1>
    <p>All the latest picked from designer of our store</p>
  </div>

  <div class="product-center container">

    <?php
    // Fetch products data from the database
    $fetch_product_query = "SELECT * FROM products";
    $fetch_product_result = mysqli_query($connection, $fetch_product_query);

    // Convert the record into an associative array
    while ($product_record = mysqli_fetch_assoc($fetch_product_result)):
      ?>

      <div class="product-item">
        <div class="overlay">
          <a href="" class="product-thumb">
            <img src="./products/<?php echo $product_record['thumbnail'] ?>" alt="" />
          </a>
          <span class="discount">
            <?php if (!$product_record['discount'] == '') {
              echo $product_record['discount'];
            } else {
              echo "";

            } ?>
          </span>
        </div>
        <div class="product-info">
          <span>
            <?= $product_record['category'] ?>
          </span>
          <a href="">
            <?= $product_record['name'] ?>
          </a>
          <h4>
            <?= $product_record['price'] ?>
          </h4>
        </div>
        <ul class="icons">
          <li><i class="bx bx-heart"></i></li>
          <li><i class="bx bx-search"></i></li>
          <li><i class="bx bx-cart"></i></li>
        </ul>
      </div>
    <?php endwhile; ?>

  </div>


</section>

<!-- Contact -->
<section class="section contact">
  <div class="title">
    <h1>
      Contact us for any <span class="slateblue">information</span>
    </h1>
    <p>We always ready to serve you</p>
  </div>
  <div class="row">
    <div class="col">
      <h2>EXCELLENT SUPPORT</h2>
      <p>We love our customers and they can reach us any time
        of day we will be at your service 24/7</p>
      <a href="" class="btn btn-1">Contact</a>
    </div>
    <div class="col" id="contact">
      <?php if (isset($_SESSION['message-success'])): ?>

        <div class="alert__message success" style="width: 80%; font-size: 1.5rem; margin: 0 auto;">
          <p>
            <?= $_SESSION['message-success'];
            unset($_SESSION['message-success']);
            ?>
          </p>
        </div>
      <?php elseif (isset($_SESSION['message'])): ?>
        <div class="alert__message error" style="width: 80%; font-size: 1.5rem; margin: 0 auto;">
          <p>
            <?= $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
          </p>
        </div>
      <?php endif ?>
      <form id="contact__form" action="contact-logic.php" method="post">
        <div class="form__item">
          <label class="form__item--label">Name</label>
          <input type="text" name="name" class="input" value="<?= $name ?>">
        </div>
        <div class="form__item">
          <label class="form__item--label">Email</label>
          <input type="email" name="email" class="input" value="<?= $email ?>">
        </div>
        <div class="form__item">
          <label class="form__item--label">Message</label>
          <textarea name="message" id="message" cols="30" rows="15" value="<?= $message ?>"></textarea>
        </div>
        <button type="submit" id="contact__submit" class="form__submit" name="submit">send</button>
      </form>
    </div>
  </div>
</section>

<!-- Footer -->
<?php

require './footer/footer.php';

?>


<!-- PopUp -->
<div class="popup hide-popup">
  <div class="popup-content">
    <div class="popup-close">
      <i class='bx bx-x'></i>
    </div>
    <div class="popup-left">
      <div class="popup-img-container">
        <img class="popup-img" src="./images/popup.jpg" alt="popup">
      </div>
    </div>
    <div class="popup-right">
      <div class="right-content">
        <h1>Get Discount <span>50%</span> Off</h1>
        <p>Sign up to our newsletter and save 30% for you next purchase. No spam, we promise!
        </p>
        <form action="#">
          <input type="email" placeholder="Enter your email..." class="popup-form">
          <a href="#">Subscribe</a>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
<script src="./js/slider.js"></script>
<script src="./js/index.js"></script>

</html>