<?php
include "header.php";  
include "db.php";  
?>

<style>
    /* Hero Section Styles */
    .hero {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 60vh;
        text-align: center;
        background: url('images/ecommerce_20ux.webp') no-repeat center center/cover;
        color: black;
        padding: 20px;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .hero p {
        font-size: 1.2rem;
        max-width: 600px;
    }

    .hero .btn {
        display: inline-block;
        margin-top: 15px;
        padding: 12px 24px;
        font-size: 1.2rem;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .hero .btn:hover {
        background: #218838;
    }

    /* Product Section Styles */
    .products-title {
        text-align: center;
        font-size: 2rem;
        margin: 20px 0;
    }

    .products-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .product-card {
        width: 250px;
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
    }

    .product-title {
        font-size: 1.4rem;
        margin: 10px 0;
    }

    .product-description {
        font-size: 1rem;
        color: #555;
    }

    .product-price {
        font-size: 1.2rem;
        font-weight: bold;
        color: #28a745;
    }

    .add-to-cart-btn {
        display: block;
        margin-top: 10px;
        padding: 8px 16px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .add-to-cart-btn:hover {
        background:rgb(118, 173, 131);
    }

    /* Cookie Banner Styles */
    .cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
        display: none; 
        z-index: 1000;
    }

    .cookie-banner p {
        margin: 0;
        font-size: 14px;
        padding: 5px 0;
    }

    .cookie-banner button {
        background-color: #4CAF50;
        color: white;
        padding: 5px 15px;
        border: none;
        cursor: pointer;
    }

    .cookie-banner button:hover {
        background-color: #45a049;
    }
</style>



<!-- Hero Section -->
<div class="hero">
    <h1>Welcome to Our Store</h1>
    <p>Discover amazing products at unbeatable prices. Shop now and enjoy exclusive deals!</p>
    <a href="products.php" class="btn">Shop Now</a>
</div>

<?php
// Fetch products from the database
$result = mysqli_query($conn, "SELECT * FROM products");

echo "<h1 class='products-title'>Our Products</h1>"; 
echo "<div class='products-container'>"; 

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='product-card'>";
    echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' class='product-image'>";
    echo "<h3 class='product-title'>" . $row['name'] . "</h3>"; 
    echo "<p class='product-description'>" . $row['description'] . "</p>"; 
    echo "<p class='product-price'>$" . $row['price'] . "</p>"; 
    echo "<a href='cart/add_to_cart.php?product_id=" . $row['id'] . "' class='add-to-cart-btn'>Add to Cart</a>"; 
    echo "</div>";
}

echo "</div>";

include "footer.php";  
?>

<!-- Cookie Consent Banner -->
<div id="cookie-banner" class="cookie-banner">
    <p>We use cookies to improve your experience. By accepting, you agree to our use of cookies.</p>
    <button id="accept-cookies-btn">Accept Cookies</button>
</div>

<script>
    function checkCookieConsent() {
        const cookieAccepted = getCookie("cookie_consent");

        if (!cookieAccepted) {
            document.getElementById("cookie-banner").style.display = "block";
        }
    }

    // Function to set a cookie
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i].trim();
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return "";
    }

    // Function to handle accepting cookies
    function acceptCookies() {
        setCookie("cookie_consent", "accepted", 365); 
        document.getElementById("cookie-banner").style.display = "none";
    }

    document.addEventListener("DOMContentLoaded", function() {
        checkCookieConsent();

        document.getElementById("accept-cookies-btn").addEventListener("click", function() {
            acceptCookies();
        });
    });
</script>
