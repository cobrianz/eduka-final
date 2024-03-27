<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $amount = filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_INT);
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
    // Validate inputs
    if (!$amount) {
        $_SESSION['deposit'] = "Please enter amount";
    } else {
        $id = $_SESSION['user-id'];
        $statement = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare($connection, $statement);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $transaction_date = date('Y-m-d H:i:s');
        $description = "User with ID ".$id." Deposited";
        $insert_purchase_query = "INSERT INTO finances (transaction_id, user_id, transaction_date, description, credit) 
                                  VALUES ('$TransactionId', '$id', '$transaction_date', '$description', '$amount')";
         $insert_purchase_result = mysqli_query($connection, $insert_purchase_query);
        
        if ($row) {
            $balance = $row['balance'];
            if ($balance > 0) {
                $newbalance = $amount + $balance;
                $query = "UPDATE users SET balance=? WHERE id=?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "ii", $newbalance, $id);
                $result = mysqli_stmt_execute($stmt);
               
            } else {
                $query = "UPDATE users SET balance=? WHERE id=?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "ii", $amount, $id);
                $result = mysqli_stmt_execute($stmt);
            }

            if ($result) {
                $_SESSION['deposit-success'] = "Your amount is successfully deposited";
            } else {
                $_SESSION['deposit'] = "Unable to deposit";
            }
            header('Location: '.ROOT_URL.'account.php');
            exit(); // Terminate script after redirection
        }
    }
}
header('Location: '.ROOT_URL.'account.php'); // Redirect to account.php if not already redirected
