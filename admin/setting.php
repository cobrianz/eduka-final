<?php
require 'config/database.php';
if(!isset($_SESSION['user-id'])){
    header('Location:'.ROOT_URL.'admin/login.php');
    $_SESSION['admin'] = 'You have to login to access this page';
    exit();
}