<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    echo "Thank you, $name! Your message has been received.";
    header("Location: contact.php");
} else {
    echo "Invalid request.";
}
?>
