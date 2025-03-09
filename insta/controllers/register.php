<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($email) || empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: /");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format!";
        header("Location: /");
        exit();
    }

    // Check if email or username already exists - using prepared statements for security
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Email or username already exists!";
        header("Location: /");
        exit();
    }
    $stmt->close();

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, $hashedPassword);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Account created successfully!";
        header("Location: /login");
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: /");
    }
    
    $stmt->close();
}

$conn->close();

// Display the register page
require 'views/register_view.php';
?>