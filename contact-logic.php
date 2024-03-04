<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validate inputs
    if(!$name) {
        $_SESSION['message'] = "Please enter your name";
    } elseif (!$email) {
        $_SESSION['message'] = "Please enter a valid email address";
    } elseif (!$message) {
        $_SESSION['message'] = "Please enter a message";
    } else {
        $statement = "SELECT * FROM messages";
        $result = mysqli_query($connection, $statement);
        $row = mysqli_num_rows($result);

        $id = $row++;
        // Insert data into the database
        $insert_message_query = "INSERT INTO messages (id, name, email, message) VALUES ('$id', '$name', '$email', '$message')";
        $sql = mysqli_query($connection, $insert_message_query);
        if ($sql) {
            $_SESSION['message-success'] = "Message sent successfully.";
            header('location: '.ROOT_URL.'#contact');
            exit();
        } else {
            $_SESSION['message'] = "Failed to send message. Please try again.";
            header('Location: ' . ROOT_URL.'#contact');
            exit();
        }
    }
} else {

  // Redirect back to the home page after form submission
  header('Location: ' . ROOT_URL . '#contact');
  exit();
}
