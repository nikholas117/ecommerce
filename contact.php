<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .contact-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .contact-container h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .contact-container form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-container input, 
        .contact-container textarea {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
        }

        .contact-container button {
            background-color: #45a049;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .contact-container button:hover {
            background-color:rgb(42, 159, 48);
        }
    </style>
</head>
<body>

<div class="contact-container">
    <h2>Contact Us</h2>
    <form action="send_message.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</div>

<?php include "footer.php"; ?>

</body>
</html>
