<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Fetch contacts
$contacts = [];
$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }
}

// Fetch projects
$projects = [];
$sql = "SELECT * FROM projects ORDER BY created_at DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

// Fetch testimonials
$testimonials = [];
$sql = "SELECT * FROM testimonials ORDER BY created_at DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Admin Panel</h1>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Messages</h5>
                    </div>
                    <div class="card-body">
                        <p>Total Messages: <?php echo count($contacts); ?></p>
                        <a href="messages.php" class="btn btn-primary">View All</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Projects</h5>
                    </div>
                    <div class="card-body">
                        <p>Total Projects: <?php echo count($projects); ?></p>
                        <a href="projects.php" class="btn btn-primary">Manage Projects</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Testimonials</h5>
                    </div>
                    <div class="card-body">
                        <p>Total Testimonials: <?php echo count($testimonials); ?></p>
                        <a href="testimonials.php" class="btn btn-primary">Manage Testimonials</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>