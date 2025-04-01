<?php
session_start();
include "db.php";


// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add Product Form Styles */
        .add-product-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-product-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .add-product-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .add-product-form label {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .add-product-form input, 
        .add-product-form textarea {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
        }

        .add-product-form button {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-product-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<?php include "header.php"; ?>

<!-- Page Content -->
<div class="add-product-container">
    <h2>Add a New Product</h2>

    <form action="add_product.php" method="POST" class="add-product-form">
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name" required><br>

        <label for="description">Product Description</label>
        <textarea name="description" id="description" required></textarea><br>

        <label for="price">Price</label>
        <input type="text" name="price" id="price" required><br>

        <label for="image">Image URL</label>
        <input type="text" name="image" id="image" required><br>

        <button type="submit">Add Product</button>
    </form>
</div>

<?php include "footer.php"; ?>

</body>
</html>
