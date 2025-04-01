<?php
$_SERVER = 'localhost';
$_USER = 'root';
$password = '';
$database = 'ecommerce';

$conn = mysqli_connect($_SERVER, $_USER, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>