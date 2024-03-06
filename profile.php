<?php
session_set_cookie_params(0); // Session cookie expires when browser is closed
session_start();

// Redirect to index.php if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom CSS styles here */
        /* Example: */
        .profile-photo {
            max-width: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        /* Center content vertically */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <?php
            // Display profile photo if available
            $profilePhoto = ""; // Path to user's profile photo
            if (isset($_SESSION['profile_photo'])) {
                $profilePhoto = $_SESSION['profile_photo'];
                echo '<img src="' . $profilePhoto . '" class="profile-photo img-fluid" alt="Profile Photo">';
            } else {
                // If no profile photo available, you can display a default image
                echo '<img src="https://via.placeholder.com/150" class="profile-photo img-fluid" alt="Profile Photo">';
            }
            ?>
        </div>
        <h2 class="text-center">Welcome, <?php echo $_SESSION['username']; ?></h2>
        <p class="text-center">Email: <?php echo $_SESSION['email']; ?></p>
        <!-- Logout button -->
        <div class="text-center">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script>
        window.addEventListener('beforeunload', function(event) {
            // Perform logout action when the browser/tab is closed
            fetch('logout.php', { method: 'POST' });
        });
    </script>
</body>
</html>
