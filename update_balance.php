<?php
require_once 'config/database.php';

// Check if the user is logged in
if (!isset($_SESSION['user-id'])) {
    // Redirect the user to login page if not logged in
    header("Location: login.php");
    exit(); // Stop further execution
}

// Get the user's ID from the session
$user_id = $_SESSION['user-id'];

// Retrieve user's balance from the database
$query = "SELECT balance FROM users WHERE id = $user_id";
$result = mysqli_query($connection, $query);
function generateTransactionId($length) {
    $characters = '0123456789'; // Only numbers
    $charactersLength = strlen($characters);
    $TransactionId = '';

    for ($i = 0; $i < $length; $i++) {
        $TransactionId .= $characters[rand(0, $charactersLength - 1)];
    }

    return $TransactionId;
}


$TransactionId = 'TRANS' . generateTransactionId(4); 
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $balance = $row['balance'];

    // Read cart details from cart.json
    $cart_json = file_get_contents("cart.json");
    $cart_data = json_decode($cart_json, true); // Decode JSON data as associative array


    // Loop through each cart entry in cart.json
    foreach ($cart_data as $cart_id => $cart_info) {
        $subtotalAmount = $cart_info['subtotal'];
        $cart = $cart_info['cart'];

        // Check if the balance is sufficient for the transaction
        if ($balance >= $subtotalAmount) {
            // Perform the transaction: Update the balance in the database
            $new_balance = $balance - $subtotalAmount;
            $update_balance_query = "UPDATE users SET balance = $new_balance WHERE id = $user_id";
            $update_balance_result = mysqli_query($connection, $update_balance_query);
            $transaction_date = date('Y-m-d H:i:s');
            $description = "Purchased order ".$cart_id;
            $insert_purchase_query = "INSERT INTO finances (transaction_id, user_id, transaction_date, description, debit) 
                                      VALUES ('$TransactionId', '$user_id', '$transaction_date', '$description', '$subtotalAmount')";
             $insert_purchase_result = mysqli_query($connection, $insert_purchase_query);
            if ($update_balance_result) {
                // Transaction successful, now update product quantities
                foreach ($cart as $item) {
                    $product_id = $item['product_id'];
                    $quantity = $item['quantity'];
                    
                    // Update product quantity in the database
                    $update_product_quantity_query = "UPDATE products SET quantity = quantity - $quantity WHERE id = $product_id";
                    $update_product_quantity_result = mysqli_query($connection, $update_product_quantity_query);
                    if (!$update_product_quantity_result) {
                        // Handle error if updating product quantity fails
                        echo json_encode(array("error" => "Failed to update product quantity."));
                        exit();
                    }
                }
                
                // All updates successful
                // Now insert cart details into the database
                foreach ($cart as $item) {
                    $product_id = $item['product_id'];
                    $quantity = $item['quantity'];
                    $insert_cart_query = "INSERT INTO cart (cart_id, user_id, product_id, quantity, cost) VALUES ('$cart_id', $user_id, $product_id, $quantity, '$subtotalAmount')";
                    $insert_cart_result = mysqli_query($connection, $insert_cart_query);
                    if (!$insert_cart_result) {
                        // Handle error if inserting cart details fails
                        echo json_encode(array("error" => "Failed to insert cart details."));
                        exit();
                    }
                }
                
                // All inserts successful
                echo json_encode(array("success" => true));
                file_put_contents("cart.json", json_encode(array()));
            } else {
                // Error updating balance
                echo json_encode(array("error" => "Failed to update balance."));
            }
        } else {
            // Insufficient balance
            echo json_encode(array("error" => "Insufficient balance."));
        }
    }
} else {
    // Error fetching balance
    echo json_encode(array("error" => "Failed to fetch balance."));
}
