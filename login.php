<?php
// Set session cookie parameters
session_set_cookie_params(0); // Session cookie expires when browser is closed

// Start or resume the session
session_start();

// Database connection details
$servername = "localhost";
$username = "root"; // Update with your actual username
$password = ""; // Update with your actual password
$database = "weekly_report_db"; // Update with your actual database name

// Function to redirect to a URL
function redirect($url) {
    header("Location: $url");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to retrieve user data
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username_input);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if query was successful
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password_input, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            // Redirect to profile page
            redirect("profile.php");
        } else {
            $_SESSION['message'] = "Incorrect password. Please try again.";
            // Redirect back to login page
            redirect("index.php");
        }
    } else {
        $_SESSION['message'] = "User not found. Please register.";
        // Redirect back to login page
        redirect("index.php");
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>
