<?php

// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from your MySQL database
$sql = "SELECT id, name, price, image FROM your_table";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Fetch data row by row
    while($row = $result->fetch_assoc()) {
        // Build the structure for each item
        $item = array(
            "id" => $row["id"],
            "name" => $row["name"],
            "price" => (int)$row["price"], // Convert price to integer if necessary
            "image" => $row["image"]
        );

        // Add the item to the data array
        $data[] = $item;
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();

// Encode the data array to JSON format
$json_data = json_encode($data, JSON_PRETTY_PRINT);

// Output the JSON data into a JavaScript file
$file = fopen("data.js", "w") or die("Unable to open file!");
fwrite($file, "var jsonData = " . $json_data . ";");
fclose($file);

?>
