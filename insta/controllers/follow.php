<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$follower_id = $_SESSION['user_id'];
$following_id = $_POST['following_id'] ?? null;

if (!$following_id || $follower_id == $following_id) {
    echo json_encode(["error" => "Invalid follow request"]);
    exit;
}

// Check if already following
$check = mysqli_query($conn, "SELECT * FROM followers WHERE follower_id = '$follower_id' AND following_id = '$following_id'");
if (mysqli_num_rows($check) > 0) {
    echo json_encode(["error" => "Already following"]);
    exit;
}

// Insert follow relationship
$query = "INSERT INTO followers (follower_id, following_id) VALUES ('$follower_id', '$following_id')";
if (mysqli_query($conn, $query)) {
    // Insert notification
    $notif_query = "INSERT INTO notifications (user_id, type, related_id) VALUES ('$following_id', 'follow', '$follower_id')";
    mysqli_query($conn, $notif_query);
    
    echo json_encode(["success" => "Followed successfully"]);
} else {
    echo json_encode(["error" => "Failed to follow"]);
}
?>
