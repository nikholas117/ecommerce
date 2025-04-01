<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if dark mode cookie is set, if not default to light mode
$darkmode = isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] === 'true' ? 'dark-mode' : '';

include "db.php";
?>
<!DOCTYPE html>
<html lang="en" class="<?= $darkmode; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="brand">MyStore</div>

        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <div class="nav-links" id="navMenu">
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="cart/cart.php">Cart</a>
                <a href="auth/logout.php">Logout</a>
            <?php else: ?>
                <a href="auth/login.php">Login</a>
                <a href="auth/register.php">Register</a>
            <?php endif; ?>
        </div>

        <!-- Dark Mode Toggle Button -->
        <button class="theme-toggle-btn" onclick="toggleDarkMode()">🌙 / ☀️</button>

    
    </nav>

    <script>
        // Function to toggle the dark mode and set the cookie
        function toggleDarkMode() {
            const body = document.body;
            const nav = document.querySelector('nav');
            const footer = document.querySelector('footer');
            const productCards = document.querySelectorAll('.product-card');
            const themeToggleBtn = document.querySelector('.theme-toggle-btn');

            // Toggle dark mode class on body, nav, footer, and product cards
            body.classList.toggle('dark-mode');
            nav.classList.toggle('dark-mode');
            footer.classList.toggle('dark-mode');
            productCards.forEach(card => card.classList.toggle('dark-mode'));
            themeToggleBtn.classList.toggle('dark-mode');

            // Set a cookie to remember user's dark mode preference
            const darkModeEnabled = body.classList.contains('dark-mode');
            document.cookie = `darkmode=${darkModeEnabled ? 'true' : 'false'}; path=/; max-age=31536000`; // expires in 1 year
        }

        // Toggle mobile menu
        function toggleMenu() {
            const menu = document.getElementById("navMenu");
            menu.style.display = menu.style.display === "flex" ? "none" : "flex";
        }
    </script>
</body>
</html>
