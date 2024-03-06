<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Center forms horizontally */
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Hide the registration form by default */
        #registrationForm {
            display: none;
        }

        /* Add fade-in animation */
        .fadeIn {
            animation-name: fadeIn;
            animation-duration: 1s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">User Registration & Login System</h2>
        <div class="centered-form">
            <div class="col-md-6 fadeIn" id="loginForm"> <!-- This div wraps the login form -->
                <h3>Login</h3>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
                <br>
                <!-- Button to toggle the visibility of the registration form -->
                <button type="button" class="btn btn-link" id="showRegistrationForm">Register</button>
            </div>
            
            <div class="col-md-6 fadeIn" id="registrationForm"> <!-- This div wraps the registration form -->
                <h3>Register</h3>
                <form action="register.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <br>
                <!-- Button to toggle the visibility of the login form -->
                <button type="button" class="btn btn-link" id="showLoginForm">Login</button>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to toggle visibility of login and registration forms when the buttons are clicked
        document.getElementById('showRegistrationForm').addEventListener('click', function() {
            var loginForm = document.getElementById('loginForm');
            var registrationForm = document.getElementById('registrationForm');
            loginForm.style.display = 'none';
            registrationForm.style.display = 'block';
        });

        document.getElementById('showLoginForm').addEventListener('click', function() {
            var loginForm = document.getElementById('loginForm');
            var registrationForm = document.getElementById('registrationForm');
            loginForm.style.display = 'block';
            registrationForm.style.display = 'none';
        });
    </script>
</body>
</html>
