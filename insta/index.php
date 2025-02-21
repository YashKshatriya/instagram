<?php
session_start(); // Start the session here
require_once "db.php"; // Reference the connect.php in the root

$routes = require 'routes.php'; // Include the routes

// Get the requested URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if the requested route exists and load it
if (array_key_exists($requestUri, $routes)) {
    require $routes[$requestUri]; // Load the corresponding view
} else {
    http_response_code(404);
    echo "404 Not Found";
}
    