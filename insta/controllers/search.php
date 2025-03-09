<?php
require 'db.php'; // Database connection file

// Initialize variables
$users = [];
$searchQuery = "";

// Debugging - print the current session data to see what's available
// echo "<pre>"; print_r($_SESSION); echo "</pre>";

// Make sure we have the current user's username
$currentUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Check if search form was submitted
if (isset($_GET['search']) && !empty($_GET['search'])) {
    // Get and sanitize search query
    $searchQuery = $conn->real_escape_string($_GET['search']);
    
    // Search query to find users matching the search term, excluding the current user
    $sql = "SELECT * FROM users 
            WHERE username LIKE '%$searchQuery%' 
            AND username != '$currentUsername'
            LIMIT 20";
            
    $result = $conn->query($sql);
    
    // Check if query was successful and if there are results
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
} else {
    // If no search query, retrieve all users except the current user
    $sql = "SELECT * FROM users 
            WHERE username != '$currentUsername' 
            LIMIT 20";
    $result = $conn->query($sql);
    
    // Check if query was successful and if there are results
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }       
}

// Alternative filtering method in PHP if SQL filtering isn't working
if (!empty($currentUsername)) {
    $filteredUsers = [];
    foreach ($users as $user) {
        if ($user['username'] !== $currentUsername) {
            $filteredUsers[] = $user;
        }
    }
    $users = $filteredUsers;
}

// Include the view file
require "views/search_view.php";
?>