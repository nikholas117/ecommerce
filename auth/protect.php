<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Access Denied. Redirecting to login...";
    header("refresh:2; url=login.php");
    exit();
}
?>
