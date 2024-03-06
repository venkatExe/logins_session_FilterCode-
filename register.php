<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root"; // Update with your actual username
$password = ""; // Update with your actual password
$database = "weekly_report_db"; // Update with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare and execute SQL statement to insert user data into 'users' table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Registration successful. You can now login.";
        header("Location: index.php");
        exit; // Make sure to exit after redirection
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: index.php");
        exit; // Make sure to exit after redirection
    }
}
?>
