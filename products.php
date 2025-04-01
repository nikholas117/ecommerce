<?php
include "db.php"; 
session_start();

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<?php include "header.php"; ?>

<div class="product-page-container">
    <h2>All Products</h2>
    
    <hr>

    <div class="product-grid">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="product-card">
                <h3><?= $row['name']; ?></h3>
                <p><?= $row['description']; ?></p>
                <p class="price">Price: $<?= $row['price']; ?></p>
                <img src="images/<?= basename($row['image']); ?>" alt="<?= $row['name']; ?>" class="product-image">
                <form action="cart/add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
                    <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
