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

// Get all unread notifications for the user
$notifications = [];

$sql = "SELECT n.*, u.username, u.profile_pic 
        FROM notifications n 
        JOIN users u ON n.related_id = u.id 
        WHERE n.user_id = ? 
        ORDER BY n.created_at DESC 
        LIMIT 20";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    // Format notification message based on type
    switch ($row['type']) {
        case 'follow':
            $row['message'] = '<strong>' . htmlspecialchars($row['username']) . '</strong> started following you';
            break;
        // Add more notification types as needed
        default:
            $row['message'] = 'You have a new notification';
    }
    
    // Format time ago
    $timestamp = strtotime($row['created_at']);
    $current_time = time();
    $time_difference = $current_time - $timestamp;
    
    if ($time_difference < 60) {
        $row['time_ago'] = 'Just now';
    } elseif ($time_difference < 3600) {
        $minutes = floor($time_difference / 60);
        $row['time_ago'] = $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
    } elseif ($time_difference < 86400) {
        $hours = floor($time_difference / 3600);
        $row['time_ago'] = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
    } else {
        $days = floor($time_difference / 86400);
        $row['time_ago'] = $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
    }
    
    $notifications[] = $row;
}

// Mark notifications as read if requested
if (isset($_GET['mark_read']) && $_GET['mark_read'] == 'true') {
    $mark_read_sql = "UPDATE notifications SET is_read = TRUE WHERE user_id = ?";
    $mark_read_stmt = $conn->prepare($mark_read_sql);
    $mark_read_stmt->bind_param("i", $user_id);
    $mark_read_stmt->execute();
}

// Count unread notifications
$count_sql = "SELECT COUNT(*) as unread_count FROM notifications WHERE user_id = ? AND is_read = FALSE";
$count_stmt = $conn->prepare($count_sql);
$count_stmt->bind_param("i", $user_id);
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$count_row = $count_result->fetch_assoc();
$unread_count = $count_row['unread_count'];

// Return JSON if requested via AJAX
if (isset($_GET['format']) && $_GET['format'] == 'json') {
    header('Content-Type: application/json');
    echo json_encode([
        'notifications' => $notifications,
        'unread_count' => $unread_count
    ]);
    exit();
}

// Otherwise, include the notifications view
include "views/notifications_view.php";
?>