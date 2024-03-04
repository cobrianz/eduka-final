<?php
require './header/header.php';
$name = $_SESSION['product-data']['name'] ?? null;
$description = $_SESSION['product-data']['description'] ?? null;
$details = $_SESSION['product-data']['details'] ?? null;
$price = $_SESSION['product-data']['price'] ?? null;
$discount = $_SESSION['product-data']['dis$discount'] ?? null;
$category = $_SESSION['product-data']['category'] ?? null;

//delete the product data session
unset($_SESSION['product-data']);

?>



<body>
    <div class="container">
    <?php
        require './_aside-left/aside-left.php';
    ?>

    <!-- main -->
    <main>
        <div class="form">
            <h1>Add Product</h1>
            <small>Please enter details</small>
            <?php if (isset($_SESSION['product'])): ?>
                    <div class="alert__message error">
                        <p>
                            <?= $_SESSION['product'];
                            unset($_SESSION['product']);
                            ?>
                        </p>
                    </div>

                    <?php
                endif ?>

            <form action="addproduct-logic.php" method="POST" enctype="multipart/form-data">
                <label for="name">Product Name *</label>
                <input type="text" name="name" value="<?=$name?>">
                <label for="name">Product Description *</label>
                <input type="text" name="description" value="<?=$description?>">
                <label for="name">Product Details *</label>
                <textarea name="details" id="" cols="30" rows="10"><?=$details?></textarea>
                <label for="price">Price *</label>
                <input type="text" name="price" value="<?=$price?>">
                <label for="price">Discount *</label>
                <input type="text" name="discount" value="<?=$discount?>">
                <label for="price">Category *</label>
                <input type="text" name="category" value="<?=$category?>">
                <label for="thumbnail">Thumbnail *</label>
                <input type="file" name="thumbnail">
                <button type="submit" class="btn form__btn" name="submit">Add Product</button>
            </form>
        </div>
    </main>
    <!-- end of main -->

    <?php 
        require './_aside-right/aside-right.php';
    ?>
    </div>

    <script src="./orders.js"></script>
    <script src="./index.js"></script>
</body>
