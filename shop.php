<?php
require './header/header.php'
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
// Dynamically generate product items
document.addEventListener('DOMContentLoaded', function() {
    var productContainer = document.getElementById('productContainer');
    products.forEach(function(product) {
      var productItem = `
        <div class="product-item" dataset="${product.id}">
          <div class="overlay">
            <a href="${product.thumbnail}" class="product-thumb">
              <img src="./products/${product.thumbnail}" alt="${product.name}" />
            </a>
            <span class="discount">${product.discount}</span>
          </div>
          <div class="product-info">
            <span>${product.category}</span>
            <a href="">${product.name}</a>
            <h4>Ksh. ${product.price}</h4>
          </div>
          <ul class="icons">
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>`;
      productContainer.insertAdjacentHTML('beforeend', productItem);
    });
  });
</script>

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
  <div class="product-center container" id="productContainer">
    <!-- Product items will be dynamically added here -->
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

