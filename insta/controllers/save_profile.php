<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "db.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

$user_id = $_SESSION['user_id'];

// Validate and process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = trim($_POST['username']);
    $bio = trim($_POST['bio']);
    
    // Username validation
    if (empty($username)) {
        $_SESSION['error'] = "Username cannot be empty.";
        header("Location: editpf.php");
        exit();
    }
    
    if (strlen($username) < 3 || strlen($username) > 30) {
        $_SESSION['error'] = "Username must be between 3 and 30 characters.";
        header("Location: /editpf");
        exit();
    }
    
    // Check if username is already taken (by another user)
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND id != ?");
    $stmt->bind_param("si", $username, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Username already taken. Please choose another one.";
        header("Location: /editpf");
        exit();
    }
    
    // Bio validation
    if (strlen($bio) > 150) {
        $_SESSION['error'] = "Bio cannot exceed 150 characters.";
        header("Location: /editpf");
        exit();
    }
    
    // Handle profile picture upload
    $profile_pic_path = null;
    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB
        
        if (!in_array($_FILES['profilePic']['type'], $allowed_types)) {
            $_SESSION['error'] = "Only JPG, PNG, and GIF images are allowed.";
            header("Location: /editpf");
            exit();
        }
        
        if ($_FILES['profilePic']['size'] > $max_size) {
            $_SESSION['error'] = "Image size should not exceed 5MB.";
            header("Location: /editpf");
            exit();
        }
        
        // Create uploads directory if it doesn't exist
        $upload_dir = "uploads/profile_pics/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        // Generate unique filename
        $file_extension = pathinfo($_FILES['profilePic']['name'], PATHINFO_EXTENSION);
        $file_name = $user_id . '_' . time() . '.' . $file_extension;
        $upload_path = $upload_dir . $file_name;
        
        // Move uploaded file
        if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $upload_path)) {
            $profile_pic_path = $upload_path;
            
            // Delete old profile picture if exists
            $stmt = $conn->prepare("SELECT profile_pic FROM users WHERE id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            
            if (!empty($user['profile_pic']) && file_exists($user['profile_pic']) && $user['profile_pic'] != $profile_pic_path) {
                unlink($user['profile_pic']);
            }
        } else {
            $_SESSION['error'] = "Failed to upload image. Please try again.";
            header("Location: /editpf");
            exit();
        }
    }
    
    // Update user data in database
    if ($profile_pic_path) {
        // Update with new profile picture
        $stmt = $conn->prepare("UPDATE users SET username = ?, bio = ?, profile_pic = ? WHERE id = ?");
        $stmt->bind_param("sssi", $username, $bio, $profile_pic_path, $user_id);
    } else {
        // Update without changing profile picture
        $stmt = $conn->prepare("UPDATE users SET username = ?, bio = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $bio, $user_id);
    }
    
    if ($stmt->execute()) {
        $_SESSION['username'] = $username; // Update session with new username
        $_SESSION['success'] = "Profile updated successfully!";
        header("Location: profile.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to update profile. Please try again.";
        header("Location: editpf.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>