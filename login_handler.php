<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind without the is_active check
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_email'] = $email; // Store email in session
            
            // Redirect to homepage after successful login
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid login credentials.";
        }
    } else {
        echo "Invalid login credentials.";
    }

    $stmt->close();
}

$conn->close();
?>