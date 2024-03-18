<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    //get the form submission data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$email) {
        $_SESSION['admin'] = "Please enter email address";
    } elseif (!$password) {
        $_SESSION['admin'] = "Please enter password";
    } else {
        //fetch user dat from database
        $fetch_user_query = "SELECT * FROM administration WHERE email = '$email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if (mysqli_num_rows($fetch_user_result) == 1) {
            //convert the record into an assoc array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            //compare the passwords

            if ($password == $db_password) {
                //set session for access control

                $_SESSION['user_id'] = $user_record['id'];
                header('Location: ' . ROOT_URL . 'admin/');

            } else {
                $_SESSION['admin'] = "Password is incorrect";
            }
        } else {
            $_SESSION['admin'] = "User not found";
        }
    }
    //if an error occured, redirect back to login with login details

    if (isset($_SESSION['admin'])) {
        $_SESSION['admin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/login.php');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'admin/login.php');
    die();
}