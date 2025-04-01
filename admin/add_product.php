<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>

<h2>Add Product</h2>

<form action="add_product_process.php" method="POST">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" name="price" placeholder="Price" required>
    <button type="submit">Add Product</button>
</form>

</body>
</html>
