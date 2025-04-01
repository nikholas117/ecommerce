<?php
session_start();
include "../db.php";


if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if the product ID is set in either GET or POST request
if (isset($_GET['product_id']) || isset($_POST['product_id'])) {
  
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : $_POST['product_id'];

    if (!is_numeric($product_id)) {
        echo "Invalid product ID.";
        exit();
    }
    
   
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        echo "Product not found.";
        exit();
    }
    
    // Check if the product is already in the user's cart
    $cart_stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $cart_stmt->bind_param("ii", $user_id, $product_id);
    $cart_stmt->execute();
    $check_cart = $cart_stmt->get_result();
    
    // If product is not in cart, add it
    if ($check_cart->num_rows == 0) {
        $insert_stmt = $conn->prepare("INSERT INTO cart (user_id, product_id) VALUES (?, ?)");
        $insert_stmt->bind_param("ii", $user_id, $product_id);
        $result = $insert_stmt->execute();
        
        if ($result) {
          
            header("Location: ../cart/cart.php");
            exit();
        } else {
            echo "Error adding product to cart: " . $conn->error;
        }
    } else {
        echo "This product is already in your cart. <a href='../cart/cart.php'>View Cart</a>";
    }
} else {
    header("Location: ../cart/cart.php");
    exit();
}
?>