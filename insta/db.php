<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it has not been started yet
}

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "bjvbibvrivirvihrwivi[v90u99"; // Change this to your actual database password
$dbName = "insta";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
