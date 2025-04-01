<?php
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
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



$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful";
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>