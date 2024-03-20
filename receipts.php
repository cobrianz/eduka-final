<?php
require 'config/database.php';

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka | Receipt</title>
    <link rel="stylesheet" href="receipt.css">
</head>
<style>
    .download{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
  }
  button {
    margin: 0 auto;
  }
</style>
<body>

<?php 
foreach ($cart_data as $key => $cart_entry) {
    // Assign variables for easier access
    $cart = $cart_entry['cart'];
    $subtotal = $cart_entry['subtotal'];
    $tax = $cart_entry['tax'];
    $total = $cart_entry['total'];

    // Fetch user information
    $id = $_SESSION['user-id'];
    $fetch_user_query = "SELECT * FROM users WHERE id = $id";
    $run_query = mysqli_query($connection, $fetch_user_query);
    $user_record = mysqli_fetch_assoc($run_query);
?>

<div id="invoice-POS">
    <div class="info">
        <h2>Eduka Limited Company</h2>
    </div><!--End Info-->
    <div id="mid">
        <div class="info">
            <h2>Contact Info</h2>
            <p class="details">
                <span>Name : <strong  style="color: black;"><?= $user_record['name'] ?></strong></span><br>
                <span>Email : <strong style="color: black;"><?= $user_record['email'] ?></strong></span><br>
                <span>Order ID : <strong style="color: black;"><?= $key ?></strong></span>
            </p>
        </div>
    </div><!--End Invoice Mid-->

    <div id="bot">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item">
                        <h2>Item</h2>
                    </td>
                    <td class="Hours">
                        <h2>Qty</h2>
                    </td>
                    <td class="Rate">
                        <h2>Sub Total</h2>
                    </td>
                </tr>
                <?php
                foreach ($cart as $item) {
                    // Fetch product information from the database based on product ID
                    $product_id = $item['product_id'];
                    $fetch_product_query = "SELECT * FROM products WHERE id = $product_id";
                    $run_query = mysqli_query($connection, $fetch_product_query);
                    $product_record = mysqli_fetch_assoc($run_query);

                    // Output product information
                    if ($product_record) {
                        echo "<tr class='service'>";
                        echo "<td class='tableitem'><p class='itemtext'>" . $product_record['name'] . "</p></td>";
                        echo "<td class='tableitem'><p class='itemtext'>" . $item['quantity'] . "</p></td>";
                        echo "<td class='tableitem'><p class='itemtext'>Ksh. " . number_format(($product_record['price'] * $item['quantity'])) . "</p></td>";
                        echo "</tr>";
                    } else {
                        echo "Product with ID $product_id not found in database.\n";
                    }
                }
                ?>
                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate">
                        <h2>Subtotal</h2>
                    </td>
                    <td class="payment">
                        <h2>Ksh. <?= number_format($subtotal) ?></h2>
                    </td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate">
                        <h2>Tax Rate</h2>
                    </td>
                    <td class="payment">
                        <h2>2%</h2>
                    </td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate">
                        <h2>Tax</h2>
                    </td>
                    <td class="payment">
                        <h2>Ksh. <?= number_format($tax) ?></h2>
                    </td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate">
                        <h2>Total</h2>
                    </td>
                    <td class="payment">
                        <h2>Ksh. <?= number_format($total) ?></h2>
                    </td>
                </tr>
            </table>
        </div><!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Thank you for your business!</strong> Payment is expected within 31 days;
                please process this invoice within that time. There will be a 5% interest charge per month on late
                invoices.
            </p>
        </div>

    </div><!--End InvoiceBot-->
</div><!--End Invoice-->
<div class="download">

    <button style="margin: auto;" onclick="download()" id="download">Download Receipt</button>
</div>



<?php } ?>
<script>
    function download() {
        const downloadReceipt  = document.getElementById('download');

        downloadReceipt.style.display = 'none';
        window.print();
    }
</script>

</body>

</html>
