<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$follower_id = $_SESSION['user_id'];
$following_id = $_POST['following_id'] ?? null;

if (!$following_id) {
    echo json_encode(["error" => "Invalid unfollow request"]);
    exit;
}

// Delete follow relationship
$query = "DELETE FROM followers WHERE follower_id = '$follower_id' AND following_id = '$following_id'";
if (mysqli_query($conn, $query)) {
    echo json_encode(["success" => "Unfollowed successfully"]);
} else {
    echo json_encode(["error" => "Failed to unfollow"]);
}
?>
