<?php require './header/header.php'; ?>

<body>
    <div class="container">
        <?php require './_aside-left/aside-left.php'; ?>

        <!-- main -->
        <main>
            <!-- end of insights -->
            <div class="recent-orders">
                <h1>Orders</h1>
                <table>
                    <thead>
                        <tr style="font-size: 1.5rem">
                            <th>Order ID</th>
                            <th>Email</th>
                            <th>Products</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'config/database.php';

                        // Fetch all cart details from the database
                        $query = "SELECT * FROM cart";
                        $result = mysqli_query($connection, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $order_id = $row['cart_id'];
                                $user_id = $row['user_id']; // Assuming user_id is available in cart table
                                $product_id = $row['product_id']; // Assuming product_id is available in cart table
                                $quantity = $row['quantity'];
                                $cost = $row['cost'];
                                $created_at = $row['created_at']; // Assuming created_at is available in cart table

                                // Fetch user email based on user_id (Assuming users table)
                                $user_query = "SELECT email FROM users WHERE id = $user_id";
                                $user_result = mysqli_query($connection, $user_query);
                                $user_email = ($user_result && mysqli_num_rows($user_result) > 0) ? mysqli_fetch_assoc($user_result)['email'] : 'N/A';

                                // Fetch product details based on product_id (Assuming products table)
                                $product_query = "SELECT name FROM products WHERE id = $product_id";
                                $product_result = mysqli_query($connection, $product_query);
                                $product_name = ($product_result && mysqli_num_rows($product_result) > 0) ? mysqli_fetch_assoc($product_result)['name'] : 'N/A';
                        ?>
                                <tr>
                                    <td><?php echo $order_id; ?></td>
                                    <td><?php echo $user_email; ?></td>
                                    <td><?php echo $product_name; ?></td>
                                    <td><?php echo $cost; ?></td>
                                    <td><?php echo $created_at; ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            // No orders found
                            echo "<tr><td colspan='6'>No orders found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- <a href="#">Show All</a> --> <!-- You can add this if needed -->
            </div>
        </main>

        <?php require './_aside-right/aside-right.php'; ?>
    </div>

    <script src="./orders.js"></script>
    <script src="./index.js"></script>
</body>
</html>
