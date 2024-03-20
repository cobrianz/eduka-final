<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $amount = filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_INT);

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
