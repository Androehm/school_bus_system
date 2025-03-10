<?php
session_start();

// If the user is logged in, redirect them to the dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: http://localhost/school_bus_system/dashboard/dashboard.php");
    exit();
}

// Randomized welcome messages
$welcomeMessages = [
    "Hi, Welcome Back! 👋",
    "Good to see you again! 😊",
    "Hello! Ready to log in? 🚀",
    "Welcome back, we've missed you! 💙",
    "Let's get you signed in! 🔑",
    "Glad to have you back! 😊",
    "Hope you're having a great day! 🌞",
    "Your journey continues here! 🚀",
    "We’re happy to see you again! 🎉",
    "Time to get things done! 💪"
];

$randomMessage = $welcomeMessages[array_rand($welcomeMessages)];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
       body {
            background: url('../../assets/images/AU-EEC.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.10);
        }
        .container {
            max-width: 550px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }
        .logo {
            display: block;
            margin: 0 auto;
            width: 90px;
        }
        .login-header {
            font-size: 35px;
            font-weight: bold;
        }
        .login-description {
            font-size: 20px;
        }
        .input-group {
            position: relative;
        }
        .input-group .btn {
            border-radius: 0;
            border-left: none;
        }
        .remember-me {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .text-link {
            color: #0d6efd;
            text-decoration: none;
        }
        .text-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container mt-5">
        <div class="text-center">
            <img src="../../assets/images/AU-logo.png" alt="Arellano University Logo" width="150">
            <h2 class="login-header">Login</h2>
            <h2 class="login-description"><?php echo $randomMessage; ?></h2>
        </div>

        <!-- Display error message -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form action="../backend/login_process.php" method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3 input-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                    <i id="eyeIcon" class="bi bi-eye"></i>
                </button>
            </div>

            <div class="remember-me mb-3">
                <div>
                    <input type="checkbox" name="remember_me" id="rememberMe">
                    <label for="rememberMe">Remember Me</label>
                </div>
                <a href="forgot_password.php" class="text-decoration-none">Forgot your password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100">Log in</button>

            <div class="text-center mt-3">
                <p>Don't have an account yet? <a href="signup.php">Create one here</a></p>
                <a href="/school_bus_system/index.php" class="text-link"><i class="bi bi-house-door"></i> Home</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("bi-eye");
                eyeIcon.classList.add("bi-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("bi-eye-slash");
                eyeIcon.classList.add("bi-eye");
            }
        }
    </script>
</body>
</html>