<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    // Check for empty fields
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: /login");
        exit();
    }
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            
            // Set remember me cookie if requested
            if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
                $token = bin2hex(random_bytes(16));
                // Store token in database for this user
                // Code to store token would go here
                
                // Set cookie for 30 days
                setcookie('remember_token', $token, time() + (86400 * 30), "/");
            }

            $_SESSION['success'] = "Welcome back, " . $user['username'] . "!";
            header("Location: /home");
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password!";
            header("Location: /login");
            exit();
        }
    } else {
        $_SESSION['error'] = "User not found!";
        header("Location: /login");
        exit();
    }
    
    $stmt->close();
}

$conn->close();

// Display the login page
require "views/login_view.php";
?>