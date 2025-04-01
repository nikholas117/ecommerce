<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .about-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .about-container h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about-container p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #555;
        }

        .company-team {
         width: 80%;
            max-width: 500px; 
            height: auto; 
            border-radius: 8px;
            margin: 30px auto; 
            display: block; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            object-fit: cover;
        }

        body.dark-mode .about-container img {
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>

<div class="about-container">
    <h2>About Us</h2>
    <p>Welcome to our e-commerce store! We are dedicated to providing high-quality products and excellent customer service. Our mission is to offer the best shopping experience with a wide range of products at competitive prices.</p>
    <p>Founded in 2024, we strive to build a trustworthy brand that customers can rely on for their shopping needs.</p>
</div>

<img class="company-team" src="images\blog-corp-team-1200px-630px-72dpi.webp" alt="company-team">

<?php include "footer.php"; ?>

</body>
</html>
