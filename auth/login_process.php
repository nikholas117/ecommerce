<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "All fields are required";
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

if (strlen($_POST['password']) < 8) {
    echo "Password must be at least 8 characters long";
    exit;
}


$email = $_POST['email'];
$password = $_POST['password'];


$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);


if($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];

    echo "Login successful";
    header('refresh:2; url=../index.php');

} else {
    echo "Invalid email or password";
}

mysqli_close($conn);




?>