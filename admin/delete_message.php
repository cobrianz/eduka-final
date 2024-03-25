<?php
// Include your database connection file
require_once 'your_database_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Retrieve message ID from the request
    $messageId = $_GET['id'];

    // Perform deletion query
    $delete_query = "DELETE FROM messages WHERE id = $messageId";
    $result = mysqli_query($connection, $delete_query);

    if ($result) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
}
