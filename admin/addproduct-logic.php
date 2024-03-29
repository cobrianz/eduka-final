<?php
require 'config/database.php';

// Check if form was submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $details = filter_var($_POST['details'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $discount = filter_var($_POST['discount'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cost = filter_var($_POST['cost'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];
    function generateTransactionId($length)
    {
        $characters = '0123456789'; // Only numbers
        $charactersLength = strlen($characters);
        $TransactionId = '';

        for ($i = 0; $i < $length; $i++) {
            $TransactionId .= $characters[rand(0, $charactersLength - 1)];
        }

        return $TransactionId;
    }


    $TransactionId = 'TRANS' . generateTransactionId(4);
    // Validate inputs
    if (!$name || !$description || !$details || !$price || !$category || !$quantity || !$cost || !$thumbnail['name']) {
        $_SESSION['product'] = "Please fill in all fields.";
        header('Location: ' . ROOT_URL . '/admin/addproduct.php');
        exit();
    }

    // Handle thumbnail upload
    $thumbnail_name = handleThumbnailUpload($thumbnail);

    // Insert data into database
    $statement = "SELECT * FROM products";
    $result = mysqli_query($connection, $statement);
    $row = mysqli_num_rows($result);

    $id = $row++;
    $insert_product_query = "INSERT INTO products (id, name, description, details, price, discount, category,  quantity, cost, thumbnail) 
                             VALUES ('$id','$name', '$description', '$details', '$price','$discount','$category', '$quantity', '$cost', '$thumbnail_name')";
    $sql = mysqli_query($connection, $insert_product_query);
    $transaction_date = date('Y-m-d H:i:s');
    $description = "Purchased stock " . $quantity . "" . $name . "s";
    $insert_purchase_query = "INSERT INTO finances (transaction_id, user_id, transaction_date, description, credit) 
                              VALUES ('$TransactionId', 'Admin', '$transaction_date', '$description', '$cost')";
    $insert_purchase_result = mysqli_query($connection, $insert_purchase_query);

    if ($sql) {
        $_SESSION['product-success'] = "Product added successfully.";
        header('Location: ' . ROOT_URL . '../products_json_fetch.php');
        exit();
        
    } else {
        $_SESSION['product'] = "Failed to add product. Please try again later.";
        header('Location: ' . ROOT_URL . '/admin/addproduct.php');
        exit();
    }
} else {
    // Redirect if form was not submitted
    header('Location: ' . ROOT_URL . '/admin/addproduct.php');
    exit();
}

function handleThumbnailUpload($thumbnail)
{
    $targetDir = '../products/';
    $thumbnail_name = time() . '_' . $thumbnail['name'];
    $targetFilePath = $targetDir . $thumbnail_name;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Check if file is an actual image
    $check = getimagesize($thumbnail["tmp_name"]);
    if ($check !== false) {
        // Check file size
        if ($thumbnail["size"] > 5000000) {
            $_SESSION['product'] = "Sorry, your file is too large.";
            header('Location: ' . ROOT_URL . '/admin/addproduct.php');
            exit();
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "webp" && $imageFileType != "jpeg") {
            $_SESSION['product'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
            header('Location: ' . ROOT_URL . '/admin/addproduct.php');
            exit();
        }
        // Upload file
        if (move_uploaded_file($thumbnail["tmp_name"], $targetFilePath)) {
            return $thumbnail_name;
        } else {
            $_SESSION['product'] = "Sorry, there was an error uploading your file.";
            header('Location: ' . ROOT_URL . '/admin/addproduct.php');
            exit();
        }
      
    } else {
        $_SESSION['product'] = "File is not an image.";
        header('Location: ' . ROOT_URL . '/admin/addproduct.php');
        exit();
    }

  
}