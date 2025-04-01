<?php
session_start();
include "../db.php"; 

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Fetch the user's cart items
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT cart.*, products.name, products.price FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = '$user_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../style.css">  
</head>
<body>


 <nav>
    <a href="../index.php">Home</a> 
    <a href="../products.php">Products</a> 
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="cart.php">Cart</a> 
        <a href="../auth/logout.php">Logout</a> 
    <?php else: ?>
        <a href="../auth/login.php">Login</a> 
        <a href="../auth/register.php">Register</a> 
    <?php endif; ?>
</nav>
<hr>

<div class="cart-container">
    <h2>Your Cart</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td>$<?= $row['price'] ?></td>
            <td>
                <form action="remove_from_cart.php" method="POST">
                    <input type="hidden" name="cart_id" value="<?= $row['id'] ?>">
                    <button type="submit">Remove</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>
</div>



<?php include "../footer.php"; ?>

</body>
</html>

