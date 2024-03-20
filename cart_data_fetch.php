<?php

// Read the JSON file
$json_data = file_get_contents('cart.json');

// Decode JSON data
$cart_data = json_decode($json_data, true);

// Check if decoding was successful
if ($cart_data === null) {
    echo "Error decoding JSON data.\n";
    // Stop further execution if there's an error
    exit;
}

// Iterate over each entry in the cart data
foreach ($cart_data as $key => $cart_entry) {
    // Assign variables for easier access
    $cart = $cart_entry['cart'];
    $subtotal = $cart_entry['subtotal'];
    $tax = $cart_entry['tax'];
    $total = $cart_entry['total'];

    // Output the key
    echo $key;

    // Output the cart contents
    echo "Cart Contents:\n";
    foreach ($cart as $item) {
        echo "Product ID: " . $item['product_id'] . ", Quantity: " . $item['quantity'] . "\n";
    }

    // Output subtotal, tax, and total
    echo "Subtotal: $" . number_format($subtotal / 100, 2) . "\n";
    echo "Tax: $" . number_format($tax / 100, 2) . "\n";
    echo "Total: $" . number_format($total / 100, 2) . "\n";

}