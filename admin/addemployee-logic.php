<?php
require 'config/database.php';
if(!isset($_SESSION['user-id'])){
    header('Location:'.ROOT_URL.'admin/login.php');
    $_SESSION['admin'] = 'You have to login to access this page';
    exit();
}
//get data from database

if (isset($_POST['submit'])) {

    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //validate inputs

    if (!$name) {
        $_SESSION['add-epmloyee'] = "Please enter the employee's  name";
    } elseif (!$email) {
        $_SESSION['add-epmloyee'] = "Please enter employee email";
    } elseif (!$role) {
        $_SESSION['add-epmloyee'] = "Please enter employee occupation";
    } else {
        //check password equality
            //check if the username arealdy exists

            $user_check_query = "SELECT * FROM employees WHERE email = '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);

            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['add-epmloyee'] = "Email already exist";
            } 
        
    }

    //if there is an error redirects back to login

    if (isset($_SESSION['add-epmloyee'])) {
        //pass data to add-epmloyee page
        $_SESSION['add-epmloyee-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/addEmployees.php');
        die();
    } else {
        $statement = "SELECT * FROM employees";
        $result = mysqli_query($connection, $statement);
        $row = mysqli_num_rows($result);

        $id = $row++;
        //insert  data into database
        $insert_user_query = "INSERT INTO employees (id, name, email, role) VALUES ('$id','$name','$email','$role')";

        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            //redirect to login page with success message

            $_SESSION['add-employee-success'] = "Employee Successfully added.";
            header('location: ' . ROOT_URL . 'admin/employees.php');
            die();
        }
    }

} else {

    //if button was not clicked then back to signup

    header('Location: ' . ROOT_URL . '/admin/addEmployees.php');
    die();

}