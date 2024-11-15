<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fName, $lName, $email, $password);

    if ($stmt->execute()) {
        // Redirect to homepage after successful registration
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
