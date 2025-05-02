<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root'); // Change to your MySQL username
define('DB_PASSWORD', ''); // Change to your MySQL password
define('DB_NAME', 'portfolio_db');

// Create database connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
$conn->set_charset("utf8");
?>