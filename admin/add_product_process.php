<?php
$conn = mysqli_connect("localhost", "root", "", "ecommerce");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', 'default.jpg')";

if (mysqli_query($conn, $sql)) {
    echo "Product added successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
