<?php
require 'config/database.php';

unset($_SESSION['is_admin']);
header('location: login.php');