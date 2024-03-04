<?php
require './header/header.php'

  ?>
<!-- All Products -->
<section class="section all-products" id="products">
  <div class="top container">
    <h1>All Products</h1>
    <form>
      <select>
        <option value="1">Defualt Sorting</option>
        <option value="2">Sort By Price</option>
        <option value="3">Sort By Popularity</option>
        <option value="4">Sort By Sale</option>
        <option value="5">Sort By Rating</option>
      </select>
      <span><i class="bx bx-chevron-down"></i></span>
    </form>
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
<section class="pagination">
  <div class="container">
    <span>1</span> <span>2</span> <span>3</span> <span>4</span>
    <span><i class="bx bx-right-arrow-alt"></i></span>
  </div>
</section>
<!-- Footer -->
<?php

require './footer/footer.php';

?>
<!-- Custom Script -->
<script src="./js/index.js"></script>
<script src="./js/addtocart.js"></script>
</body>

</html>