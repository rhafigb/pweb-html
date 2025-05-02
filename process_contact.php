<?php
// Include configuration
require_once 'config.php';

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate inputs
    if (empty($name)) {
        $errors[] = "Nama harus diisi.";
    }

    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (empty($subject)) {
        $errors[] = "Subjek harus diisi.";
    }

    if (empty($message)) {
        $errors[] = "Pesan harus diisi.";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        // Prepare SQL statement
        $sql = "INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $name, $email, $subject, $message);
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Success response
                echo json_encode([
                    'success' => true,
                    'message' => 'Pesan Anda telah terkirim! Terima kasih.'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Terjadi kesalahan. Silakan coba lagi nanti.'
                ]);
            }
            
            // Close statement
            $stmt->close();
        }
    } else {
        // Return validation errors
        echo json_encode([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors' => $errors
        ]);
    }
    
    // Close connection
    $conn->close();
} else {
    // Not a POST request
    echo json_encode([
        'success' => false,
        'message' => 'Permintaan tidak valid'
    ]);
}
?>