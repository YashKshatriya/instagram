<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "db.php"; 

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if not logged in
    header("Location: /login");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data from the database
$sql = "SELECT username, email, bio, profile_pic FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
$conn->close();

// Include the profile view template
include "views/profile_view.php";
?>