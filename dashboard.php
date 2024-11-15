<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit();
}

echo "<h1>Welcome to your dashboard, " . htmlspecialchars($_SESSION['user_email']) . "!</h1>";
echo "<p><a href='logout.php'>Logout</a></p>";
?>