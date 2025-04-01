<?php
session_start();
include "../db.php";  // Make sure db.php is included correctly

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];  // Get the logged-in user ID

// Check if cart_id is set in the POST request
if (isset($_POST['cart_id'])) {
    $cart_id = $_POST['cart_id'];

    // Validate the cart_id (sanitize and check if it's numeric)
    if (!is_numeric($cart_id)) {
        echo "Invalid cart ID.";
        exit();
    }

    // Delete the product from the user's cart using the cart_id
    $delete_query = mysqli_query($conn, "DELETE FROM cart WHERE id = '$cart_id' AND user_id = '$user_id'");

    if ($delete_query) {
        echo "Product removed from cart.";
        header("Location: ../cart/cart.php");  // Redirect to the cart page
        exit();
    } else {
        echo "Error removing product from cart.";
    }
} else {
    echo "No cart ID specified.";
}
?>
