<?php
// Include configuration
require_once 'config.php';

header('Content-Type: application/json');

// Fetch projects from database
$sql = "SELECT * FROM projects ORDER BY created_at DESC";
$result = $conn->query($sql);

$projects = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

// Fetch testimonials from database
$sql = "SELECT * FROM testimonials ORDER BY created_at DESC";
$result = $conn->query($sql);

$testimonials = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
}

// Close connection
$conn->close();

// Return data as JSON
echo json_encode([
    'success' => true,
    'projects' => $projects,
    'testimonials' => $testimonials
]);
?>