<?php
require 'config/database.php';

// Function to fetch data from the database
function fetchDataFromDatabase($connection) {
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
            $data[$row["id"]] = $item; // Use product ID as array key
        }
    }

    return $data;
}

// Function to merge existing JSON data with new data
function mergeData($existingData, $newData) {
    // Merge only new data that doesn't already exist in the existing data
    foreach ($newData as $productId => $product) {
        if (!array_key_exists($productId, $existingData)) {
            $existingData[$productId] = $product;
        }
    }
    return $existingData;
}

// Wait for 2 seconds before proceeding
sleep(2);

// Redirect to shop.php
header('Location: shop.php');

// Read existing JSON data from the file
$file_path = 'products.json';
$existing_json = file_get_contents($file_path);
$existing_data = json_decode($existing_json, true);

// Fetch new data from the database
$new_data = fetchDataFromDatabase($connection);

// Merge existing data with new data
$merged_data = mergeData($existing_data, $new_data);

// Encode the merged data array to JSON
$products_json = json_encode($merged_data);

// Write the JSON data back to the file
file_put_contents($file_path, $products_json);
?>

<script>
    var products = <?php echo $products_json ?>;
    console.log(products)
</script>