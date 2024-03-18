<?php
require './header/header.php';

?>

<div class="container cart">
<?php

if (isset($_SESSION[$product['id']])):
    $product = $_SESSION[$product['id']];
   // Fetch products data from the database
   $fetch_product_query = "SELECT * FROM products WHERE id = $product";
   $fetch_product_result = mysqli_query($connection, $fetch_product_query);

   // Convert the record into an associative array
   while ($product_record = mysqli_fetch_assoc($fetch_product_result)):

?>

    <!-- Cart Items -->
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <tr>
          <td>
            <div class="cart-info">
              <img src="./images/product-6.jpg" alt="" />
              <div>
                <p> <?= $product_record['name'] ?></p>
                <span>Price: Ksh. <?= $product_record['price'] ?></span> <br />
                <a href="#">remove</a>
              </div>
            </div>
          </td>
          <td><input type="number" value="1" min="1" /></td>
          <td>Ksh. 60.00</td>
        </tr>
      </table>
      <?php endwhile ?>
      <div class="total-price">
        <table>
          <tr>
            <td>Subtotal</td>
            <td>Ksh. 200</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>Ksh. 50</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>Ksh. 250</td>
          </tr>
        </table>
        <a href="#" class="checkout btn">Proceed To Checkout</a>
      </div>
    </div>
    <?php endif ?>
    <!-- Latest Products -->
    <section class="section featured">
      <div class="top container">
        <h1>Latest Products</h1>
        <a href="#" class="view-more">View more</a>
      </div>
      <div class="product-center container">
        <div class="product-item">
          <div class="overlay">
            <a href="" class="product-thumb">
              <img src="./images/product-6.jpg" alt="" />
            </a>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Concepts Solid Pink Men’s Polo</a>
            <h4>Ksh. 150</h4>
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
              <img src="./images/product-1.jpg" alt="" />
            </a>
            <span class="discount">40%</span>
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Concepts Solid Pink Men’s Polo</a>
            <h4>Ksh. 150</h4>
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
          </div>
          <div class="product-info">
            <span>MEN'S CLOTHES</span>
            <a href="">Concepts Solid Pink Men’s Polo</a>
            <h4>Ksh. 150</h4>
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
            <h4>Ksh. 150</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php
require './footer/footer.php';

?>

    <!-- Custom Script -->
    <script src="./js/index.js"></script>
    <script src="./js/cart.js"></script>
  </body>
</html>
