<?php
require './header/header.php';
?>

<?php
// Query to fetch data from your MySQL database
$sql = "SELECT id, name, description, details, price, discount, category, thumbnail FROM products";
$result = mysqli_query($connection, $sql);

$data = array();
if ($result->num_rows > 0) {
  // Fetch data row by row
  while ($row = $result->fetch_assoc()) {
    // Build the structure for each item
    $item = array(
      "id" => $row["id"],
      "name" => $row["name"],
      "description" => $row["description"],
      "details" => $row["details"],
      "price" => $row["price"], // Convert price to integer if necessary
      "discount" => $row["discount"],
      "category" => $row["category"],
      "thumbnail" => $row["thumbnail"],
    );
    // Add the item to the data array
    $data[] = $item;
  }
} else {
  echo "";
}

// Close the connection
$connection->close();
$products = json_encode($data);
?>

<script>
  var products = <?php echo $products; ?>;
  console.log(products);

  // Function to add item to cart
  function addToCart(productId) {
    console.log('Adding product to cart:', productId);
    // You can implement your add to cart logic here
  }
</script>

<section class="section all-products" id="products">
  <div class="top container">
    <h1>All Products</h1>
    <form>
      <select>
        <option value="1">Default Sorting</option>
        <option value="2">Sort By Price</option>
        <option value="3">Sort By Popularity</option>
        <option value="4">Sort By Sale</option>
        <option value="5">Sort By Rating</option>
      </select>
      <span><i class="bx bx-chevron-down"></i></span>
    </form>
  </div>
  <div class="product-center container" id="productContainer">
    <!-- Product items will be dynamically added here -->
    <?php foreach ($data as $product): ?>
      <div class="product-item" dataset="<?php echo $product['id']; ?>">
        <div class="overlay">
          <a href="<?php echo $product['thumbnail']; ?>" class="product-thumb">
            <img src="./products/<?php echo $product['thumbnail']; ?>" alt="<?php echo $product['name']; ?>" />
          </a>
          <?php if (!empty($product['discount'])): ?>
            <span class="discount"><?php echo $product['discount']; ?></span>
          <?php endif; ?>
        </div>
        <div class="product-info">
          <span><?php echo $product['category']; ?></span>
          <a href="javascript:void(0);" class="product-name" data-id="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
          <h4>Ksh. <?php echo $product['price']; ?></h4>
        </div>
        <ul class="icons">
          <li><i class="bx bx-heart"></i></li>
          <li><i class="bx bx-search"></i></li>
          <li><i class="bx bx-cart" onclick="addToCart(<?php echo $product['id']; ?>);"></i></li>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="pagination">
  <div class="container">
    <span>1</span> <span>2</span> <span>3</span> <span>4</span>
    <span><i class="bx bx-right-arrow-alt"></i></span>
  </div>
</section>

<?php
require './footer/footer.php';
?>

<!-- Custom Script -->
<script src="./js/index.js"></script>
<script src="./js/addtocart.js"></script>
