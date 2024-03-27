<?php
require './header/header.php';
?>

<body>
    <div class="container">
    <?php
        require './_aside-left/aside-left.php';
        ?>

        <!-- main -->
        <main>

            <!-- end of insights -->
            <div class="recent-orders">
                <h1>Available products</h1>
                <?php if(isset($_SESSION['product-success'])): ?>

                <div class="alert__message success" style="margin: 1.6rem;">
                <p><?= $_SESSION['product-success'];
                unset($_SESSION['product-success']);
                ?></p>
                </div>
                <?php endif ?>  
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>price</th>
                            <th>Discount</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Fetch products data from the database
                    $fetch_product_query = "SELECT * FROM products";
                    $fetch_product_result = mysqli_query($connection, $fetch_product_query);

                    // Convert the record into an associative array
                    while($product_record = mysqli_fetch_assoc($fetch_product_result)):
                ?>
                        <tr>
                            <td><img style="width: 2rem; margin: 0 auto;" src="../products/<?php echo $product_record['thumbnail']?>" alt=""></td>
                            <td><?= $product_record['id'] ?></td>
                            <td><?= $product_record['name'] ?></td>
                            <td><?= $product_record['price'] ?></td>
                            <td><?php if(!$product_record['discount'] == ''){
                                echo $product_record['discount']; 
                            } else {
                                echo "Not Available"; 

                            } ?></td>
                            <td><?= $product_record['description'] ?></td>
                            <td><?= $product_record['quantity'] ?></td>
                            <td><?= $product_record['cost'] ?></td>
                            <td class="primary"><?php if($product_record['quantity'] > 0){
                                echo 'Available'; 
                            } else {
                                echo "Not Available"; 
                                
                            } ?></td>
                             <td></td>
                        </tr>
                        <?php endwhile; ?>
                </table>
                <a href="#">Show All</a>
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
<!-- copyright @Briankipkemoi
 CREATED AND ONWNED BY BRIAN KIPKEMOI CHERUIYOT
 -->
</html>