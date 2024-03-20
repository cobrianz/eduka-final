<?php
$cartData = file_get_contents('php://input');
file_put_contents('cart.json', $cartData);
echo "Cart data has been written to cart.json";
